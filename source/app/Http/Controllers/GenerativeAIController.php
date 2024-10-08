<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Profile;
use App\Models\ImageResource;
use App\Models\RequestModel;
use App\Models\ContentCategory;
use App\Models\CelebArticle;
use App\Models\BannedWord;
use App\Models\PromptchanAccount;
use App\Models\FacebookPages;
use App\Models\ModelAI;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use PhpParser\Node\Expr\AssignOp\Mod;

class GenerativeAIController extends Controller
{
  const NegativePromptchan = 'bad prompt version2, badhandv4, EasyNegativeV2, negative hand-neg, (worst quality, low quality:2), NSFW, (monochrome:1.10), zombie, overexposure, watermark, text, bad anatomy, bad hand, extra hands, (extra fingers:1.2), too many fingers, fused fingers, bad arm, distorted arm, extra arms, fused arms, extra legs, missing leg, disembodied leg, extra nipples, detached arm, liquid hand, inverted hand, disembodied limb, oversized head, extra body, extra navel, easynegative, (hair between eyes:1.10), sketch, duplicate, ugly, huge eyes, logo, worst face, (bad and mutated hands:1.3), (blurry:2), horror, geometry, bad prompt, (bad hands:1.10), (missing fingers:1.10), multiple limbs, bad anatomy, (interlocked fingers:1.2), Ugly Fingers, (extra digit and hands and fingers and legs and arms:1.4), (deformed fingers:1.2), (long fingers:1.2), (bad-artist-anime:1.10), bad-artist, bad hand, extra legs, (ng deepnegative v1 75t:1.10), (worst quality, low quality, nsfw, nipple, pussy:1.5)';

  public function socialpost(){
    if (Auth::check()) {
      $menu = 'generativeai';
      $submenu = 'socialpost';
      $pagetitle = 'Social Post Generator';

      $profilelist = Profile::orderBy('profile.follow', 'desc')
        ->join('image_resource', 'profile.id_image_resource', '=', 'image_resource.id_image_resource')
        ->select('profile.*', 'image_resource.url as avatar')
        ->get();

      return view('socialpost', ['pagetitle' => $pagetitle, 'menu' => $menu, 'submenu' => $submenu, 'profilelist' => $profilelist]);
    }
    Auth::logout();
    //session()->flush();
    return view('/login');
  }

  public function socialcomment() {
    if (Auth::check()) {
      $fbpages = FacebookPages::where('id_user', Auth::user()->id)->get();

      $totalProfiles = $fbpages->count();

      $modelais = ModelAI::where('is_delete', 0)->get();

      $menu = 'generativeai';
      $submenu = 'socialcomment';
      $pagetitle = 'Social Comment';

      return view('socialcomment', ['fbpages' => $fbpages, 'totalProfiles' => $totalProfiles, 'menu' => $menu, 'submenu' => $submenu, 'pagetitle' => $pagetitle, 'modelais' => $modelais]);
    }
    Auth::logout();
    //session()->flush();
    return view('/login');
  }

  public function getPromptSocialPost(Request $request){
    $profile = Profile::where('code_profile', $request->profileCode)->first();

    $hour = date('H');
    $dayOfWeek = date('l');

    if ($hour >= 5 && $hour < 12) {
        $partofday = 'Morning';
    } elseif ($hour >= 12 && $hour < 17) {
        $partofday = 'Afternoon';
    } elseif ($hour >= 17 && $hour < 20) {
        $partofday = 'Evening';
    } else {
        $partofday = 'Night';
    }

    $content_prompt = "I'm a ".$profile->job." ".$profile->gender.". Please give me a description so I can create an image of an activity I can do on ".$dayOfWeek." ".$partofday." (work, play, travel, rest...). Description in no more than 30 words, including description of mood, clothing, movements, background. Make sure to avoid potentially banned words or banned Celebrity Names when generating images through the AI model.";

    $modelai = 'gpt-4o-2024-05-13';

    $category = ContentCategory::where('code_content_category', 'fbpostimage')->first();
    $id_cate = 0;
    if(!empty($category)) {
      $id_cate = $category->id_content_category;
    }

    // API endpoint
    $url_endpoint = 'https://api.openai.com/v1/chat/completions';

    // Data to send to the API
    $postfields = [
      "model" => $modelai,
      "messages" => [
        [
          "role" => "user",
          "content" => $content_prompt
        ]
      ],
      "max_tokens" => 1500,
      "n" => 1
    ];

    try {
      // Initialize cURL session
      $curl = curl_init($url_endpoint);

      // Configure cURL options
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postfields));
      curl_setopt($curl, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json',
          'Authorization: Bearer ' . config('app.openai'),
      ]);

      $response = curl_exec($curl);
      curl_close($curl);
      $data = json_decode($response, true);
      $content = $data['choices'][0]['message']['content'];

      $this->storeRequest(1, $request->code_profile." - ".$content_prompt, $modelai, 2, $url_endpoint, json_encode($postfields), $content, $id_cate);

      $bannedWords = BannedWord::pluck('word')->toArray();
      $content = strtolower($content);
      $content = str_replace($bannedWords, '', $content);

      return response()->json([
          'success' => true,
          'message' => 'success',
          'prompt' => $content
      ], 200);
    } catch (\Exception $e) {
      Log::debug($e->getMessage());

      return response()->json([
          'success' => false,
          'message' => $e->getMessage(),
          'prompt' => ''
      ], 500);
    }
  }

  public function getSocialPost(Request $request){
    $profile = Profile::where('code_profile', $request->profileCode)->first();
    $image_id = 0;
    $image_path = '';
    
    if($profile) {
        $image_path = ImageResource::where('id_image_resource', $profile->id_image_resource)->first()->url;

        $env = config('app.env');

        if($env == "local"){
          $image_id = $this->uploadFaceimageLeoAI($image_path);
          Log::debug("Init image id: ".$image_id);
        }
    }

    $content_prompt = "Here is the description of my image: [".$request->prompt."].\nPlease give me a caption to post with that image on Facebook, that caption should be no more than 100 words, attracting readers to create a response or interactive reaction.";

    $modelai = 'gpt-4o-2024-05-13';

    $category = ContentCategory::where('code_content_category', 'fbpostimage')->first();
    $id_cate = 0;
    if(!empty($category)) {
      $id_cate = $category->id_content_category;
    }

    // API endpoint
    $url_endpoint = 'https://api.openai.com/v1/chat/completions';

    // Data to send to the API
    $postfields = [
      "model" => $modelai,
      "messages" => [
        [
          "role" => "user",
          "content" => $content_prompt
        ]
      ],
      "max_tokens" => 1500,
      "n" => 1
    ];

    try {
      // Initialize cURL session
      $curl = curl_init($url_endpoint);

      // Configure cURL options
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postfields));
      curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . config('app.openai'),
      ]);

      $response = curl_exec($curl);
      curl_close($curl);
      $data = json_decode($response, true);

      $imgcap1 = $data['choices'][0]['message']['content'];

      $this->storeRequest(1, $content_prompt, $modelai, 2, $url_endpoint, json_encode($postfields), $imgcap1, $id_cate);

      $code_profile = $profile->code_profile;
      $imgdes1 = $request->prompt;

      if($env == "production"){
        $img_data1 = $this->RenderImagePromptchan($imgdes1, $code_profile, $id_cate, 1);
      } else {
        $img_data1 = $this->RenderImageLeoAI($imgdes1, $id_cate, 1, $image_id, $code_profile);
      }

      $imgcap1 = trim($imgcap1, '"');

      if(array_key_exists('error', $img_data1)){
        return response()->json([
          'success' => false,
          'message' => json_encode($img_data1),
          'img1' => $image_path,
          'imgcap1' => $imgcap1
        ], 500);
      } else {
        return response()->json([
          'success' => true,
          'message' => 'success',
          'img1' => $img_data1['img_link'],
          'imgid1' => $img_data1['img_id'],
          'imgcap1' => $imgcap1
        ], 200);
      }
    } catch (\Exception $e) {
        Log::debug($e->getMessage());

        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
            'img1' => '',
            'imgid1' => 0,
            'imgcap1' => ''
        ], 500);
    }
  }

  private function RenderImageLeoAI($description, $id_cate, $order, $image_id, $code_profile){
    $api_key = config('app.leoai');
    $authorization = "Bearer " . $api_key;

    $content_prompt = $description;

    $modelai = 'Leonardo AI';

    // Get a presigned URL for uploading an image
    $url_endpoint = "https://cloud.leonardo.ai/api/rest/v1/generations";

    // Data to send to the API
    $postfields = [
        "alchemy" => true,
        "height" => 768,
        "width" => 1024,
        "prompt" => $content_prompt,
        //"negative_prompt" => self::NegativePromptchan,
        "modelId" => "5c232a9e-9061-4777-980a-ddc8e65647c6",//Leonardo Kino XL model
        "num_images" => 1,
        "photoReal" => true,
        "photoRealVersion" => "v2",
        "presetStyle" => "STOCK_PHOTO",
        "fantasyAvatar" => true,
        'init_image_id' => $image_id,
        //"highContrast" => true
    ];

    Log::debug(json_encode($postfields));

    try {
        // Initialize cURL session
        $curl = curl_init($url_endpoint);

        // Configure cURL options
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postfields));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "accept: application/json",
            "content-type: application/json",
            "authorization: $authorization"
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        Log::debug($response);

        $id_request = $this->storeRequest(2, $code_profile." - ".$content_prompt, $modelai, 2, $url_endpoint, json_encode($postfields), $response, $id_cate);

        $img_data = $this->AwaitRender($data['sdGenerationJob']['generationId'], $id_request, $id_cate, $order, $code_profile);

        return array(
            'img_id' =>  $img_data['img_id'],
            'img_link' =>  $img_data['img_link']
        );
    } catch (\Exception $e) {
        Log::debug($e->getMessage());
        return array(
            'img_id' =>  0,
            'error' =>  'RenderImageLeoAI > '.$e->getMessage()
        );
    }
  }

  private function AwaitRender($generationId, $id_request, $id_cate, $order, $code_profile){
    $api_key = config('app.leoai');
    $authorization = "Bearer " . $api_key;

    $url_endpoint = "https://cloud.leonardo.ai/api/rest/v1/generations/".$generationId;

    $modelai = 'Leonardo AI';

    try {
        // Initialize cURL session
        $curl = curl_init($url_endpoint);

        // Configure cURL options
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "accept: application/json",
            "authorization: $authorization"
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        Log::debug($response);

        while ($data['generations_by_pk']['status'] != "COMPLETE" && $data['generations_by_pk']['status'] != "FAILED"){
            sleep(3);
            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response, true);
        }

        if($data['generations_by_pk']['generated_images'][0]['url'] != ""){
            $image_url = $data['generations_by_pk']['generated_images'][0]['url'];
            $folder = 'refaceprofile';
            $image_link = 'https://cdn.fnews.ai/refaceprofile/'.$code_profile;
            $count = ImageResource::where('url', 'like', $image_link.'%')->count();
            $filename = $code_profile.'-'.$count;

            $r2object = $this->uploadToCloudFlareFromFile($image_url, $code_profile, $folder, $filename);
            $image_link = 'https://cdn.fnews.ai/'.$r2object;
            $id_image = $this->storeImage($id_request, $data['generations_by_pk']['prompt'], $modelai, $order, $id_cate, $image_link, 2);

            return array(
                'img_id' =>  $id_image,
                'img_link' =>  $image_link
            );
        }
    } catch (\Exception $e) {
        Log::debug($e->getMessage());
        return array(
            'img_id' =>  0,
            'error' =>  'AwaitRender > '.$e->getMessage()
        );
    }
  }

  private function RenderImagePromptchan($description_image, $code_profile, $id_cate, $order){
    $content_prompt = $description_image;

    $profile = Profile::where('code_profile', $code_profile)->first();

    $content_prompt = $content_prompt . ". Woman looking sexy with part of her breasts exposed. With clearly defined facial features. The hands and fingers should look natural and realistic, without any deformities. Make sure the feet are naturally positioned with clear and accurate details. The image should be high-quality and visually appealing.";
    $bannedWords = BannedWord::pluck('word')->toArray();
    $content_prompt = strtolower($content_prompt);
    $content_prompt = str_replace($bannedWords, '', $content_prompt);

    $avatar = ImageResource::where('id_image_resource', $profile->id_image_resource)->first()->url;
    //$avatar = 'https://cdn.fnews.ai/avatarimage/'.$code_profile.'.jpg';
    
    $modelai = "PromptChan";
    $url_endpoint = 'https://api.promptchan.ai/api/external/create';

    $imagesizes = ['768x512', '512x768'];
    $random_imagesize = $imagesizes[array_rand($imagesizes)];

    $postfields = [
        "style" => "Real",
        "poses" => "Default",
        "filter" => "Default",
        "detail" => 0,
        "prompt" => $content_prompt,
        "seed" => 0,
        "quality" => "Ultra",
        "creativity" => 0,
        "image_size" => $random_imagesize,
        "negative_prompt" => self::NegativePromptchan,
        "restore_faces" => false,
        "character_image" => $avatar
    ];

    $promptchan_account = PromptchanAccount::orderBy('gem', 'desc')->first();
    $gem = $promptchan_account->gem;
    $x_api_key = config('app.promptchan_'.$promptchan_account->id_promptchan_account);

    try
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($postfields),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'x-api-key: ' . $x_api_key
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        if (array_key_exists('error', $data)) {
            Log::debug($data);
            $id_request = $this->storeRequest(2, $code_profile." - ".$content_prompt, $modelai, 2, $url_endpoint, json_encode($postfields), $response, $id_cate);

            return array(
                'img_id' =>  0,
                'error' =>  'RenderImagePromptchan > '.json_encode($data),
                'img_link' =>  $avatar.','.$code_profile.','.$content_prompt
            );
        } else {
            $used_gem = $promptchan_account->used_gem;
            if($gem <= $data['gems']) {
                $first_gem = $data['gems'];
                $new_used_gem = $used_gem + 2;
                $promptchan_account->first_gem = $first_gem;
            } else {
                $new_used_gem = $gem - $data['gems'] + $used_gem;
            }
            
            $promptchan_account->gem = $data['gems'];
            $promptchan_account->used_gem = $new_used_gem;
            $promptchan_account->save();

            $id_request = $this->storeRequest(2, $code_profile." - ".$content_prompt, $modelai, 2, $url_endpoint, json_encode($postfields), $data['gems'], $id_cate);
        }

        $filename = $code_profile.'_FBPOST'. time() . $this->generateRandomString(1);
        $folder = 'fbpostimage';
        $r2object = $this->uploadToCloudFlare($folder, $filename, $data['image'], $code_profile);
        
        $image_link = 'https://cdn.fnews.ai/'. $r2object;
        $id_image = $this->storeImage($id_request, $content_prompt, $modelai, $order, $id_cate, $image_link, 2);

        return array(
            'img_id' =>  $id_image,
            'img_link' =>  $image_link
        );
    }  catch (\Exception $e) {
        Log::debug($e->getMessage());

        return array(
            'img_id' =>  0,
            'error' =>  'RenderImagePromptchan > '.$e->getMessage(),
            'img_link' =>  $avatar.','.$code_profile.','.$content_prompt
        );
    }
  }

  private function uploadToCloudFlareFromFile($image_url, $code_profile, $folder, $filename)
    {
        try {
          $ch = curl_init($image_url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_TIMEOUT, 60);  // Timeout in seconds
          $imageData = curl_exec($ch);

          if ($imageData === false) {
              // Handle error
              echo 'Curl error: ' . curl_error($ch);
          } else {
              // Process the image data
              file_put_contents('local-image.jpg', $imageData);
          }

          curl_close($ch);

            // Decode base64 image
            $imageContent = file_get_contents('local-image.jpg');
            $r2object = $folder.'/'.$filename.'.jpg'; // You can generate a unique name for each image

            $accountid = '453d5dc9390394015b582d09c1e82365';
            $r2bucket = 'imagehub';

            // Example usage
            $accessKey = '246eacf6e9a33cfe39dd02095820634d';
            $secretKey = 'a98e160d60ecb864e5098f9ba380e347b2e4124f271add8c3d84b9e859c4de98';
            $region = 'auto';
            $contentType = 'image/jpeg'; // Content type of your file

            // AWS credentials and Cloudflare R2 endpoint
            $credentials = [
                'key'    => $accessKey,
                'secret' => $secretKey,
            ];
            $endpoint = "https://$accountid.r2.cloudflarestorage.com";

            // Create an S3 client
            $s3Client = new S3Client([
                'version'     => 'latest',
                'region'      => $region, // Change this to your region
                'credentials' => $credentials,
                'endpoint'    => $endpoint,
                'use_path_style_endpoint' => true
            ]);

            // Upload file to Cloudflare R2
            try {
                $result = $s3Client->putObject([
                    'Bucket' => $r2bucket,
                    'Key'    => $r2object,
                    'Body'   => $imageContent,
                    'ContentType' => $contentType,
                ]);

                $this->storeRequest(2, $code_profile." - Upload to CloudFlare", "CloudFlare", 1, $endpoint, $r2object, $result, 0);

                return $r2object;
            } catch (S3Exception $e) {
                Log::debug("Error uploading file: ". $e->getMessage());
            }
        } catch (\Throwable $th) {
            Log::debug($th);
            return 'error';
        }
    }

  private function uploadToCloudFlare($folder, $filename, $imageresponse, $code_profile)
  {
      try {
          // Decode base64 image
          $imageData = base64_decode($imageresponse);
          $r2object = $folder.'/'.$filename.'.jpg'; // You can generate a unique name for each image

          $accountid = '453d5dc9390394015b582d09c1e82365';
          $r2bucket = 'imagehub';

          // Example usage
          $accessKey = '246eacf6e9a33cfe39dd02095820634d';
          $secretKey = 'a98e160d60ecb864e5098f9ba380e347b2e4124f271add8c3d84b9e859c4de98';
          $region = 'auto';
          $contentType = 'image/jpeg'; // Content type of your file

          // AWS credentials and Cloudflare R2 endpoint
          $credentials = [
              'key'    => $accessKey,
              'secret' => $secretKey,
          ];
          $endpoint = "https://$accountid.r2.cloudflarestorage.com";

          // Create an S3 client
          $s3Client = new S3Client([
              'version'     => 'latest',
              'region'      => $region, // Change this to your region
              'credentials' => $credentials,
              'endpoint'    => $endpoint,
          ]);

          // Upload file to Cloudflare R2
          try {
              $result = $s3Client->putObject([
                  'Bucket' => $r2bucket,
                  'Key'    => $r2object,
                  'Body'   => $imageData,
                  'ContentType' => $contentType,
              ]);

              $this->storeRequest(2, $code_profile." - Upload to CloudFlare", "CloudFlare", 1, $endpoint, $r2object, $result, 0);

              return $r2object;
          } catch (S3Exception $e) {
              Log::debug("Error uploading file: ". $e->getMessage());
          }
      } catch (\Throwable $th) {
          Log::debug($th);
          return 'error';
      }
  }

  private function uploadFaceimageLeoAI($image_file_path){
    $api_key = config('app.leoai');
    $authorization = "Bearer " . $api_key;

    $headers = [
        'accept: application/json',
        'content-type: application/json',
        'authorization: ' . $authorization
    ];

    list($response, $status_code) = $this->post_request($authorization);
    $response_data = json_decode($response, true);

    $fields = $response_data['uploadInitImage']['fields'];
    $url = $response_data['uploadInitImage']['url'];

    //$fields = $response_data['uploadCanvasInitImage']['initFields'];
    //$url = $response_data['uploadCanvasInitImage']['initUrl'];

    // For getting the image later
    $image_id = $response_data['uploadInitImage']['id'];
    //$image_id = $response_data['uploadCanvasInitImage']['initImageId'];

    // Step 2: Upload face image via presigned URL
    $status_code = $this->upload_file($url, $fields, $image_file_path);

    return $image_id;
  }

  // Function to make a POST request
  private function post_request($authorization) {
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://cloud.leonardo.ai/api/rest/v1/init-image",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
          'extension' => 'jpg'
      ]),
      CURLOPT_HTTPHEADER => [
        "accept: application/json",
        "authorization: ".$authorization,
        "content-type: application/json"
    ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    return [$response, $err];
  }

// Function to make a file upload request
private function upload_file($url, $fields, $file_path) {
    // Convert fields to array if it's in JSON format
    $fields = json_decode($fields, true);

    // Prepare the file to upload
    $post_fields = [];
    foreach ($fields as $name => $value) {
      if ($name !== 'file') {
        $post_fields[$name] = $value;
      }
    }
    $post_fields['file'] =  new \CURLFile($file_path);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $status_code;
  }

  private function generateRandomString($length)
  {
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
  }

  private function storeRequest($request_type, $prompt, $modelai, $method, $url_endpoint, $postfields, $response, $id_content_category) {
    $request = new RequestModel();
    $request->id_user = Auth::user()->id;
    $request->request_type = $request_type;
    $request->prompt = $prompt;
    $request->code_model_ai = $modelai;
    $request->method = $method;
    $request->endpoint = $url_endpoint;
    $request->postfields = $postfields;
    $request->response = $response;
    $request->id_content_category = $id_content_category;
    $request->save();

    return $request->id_request;
  }

  private function storeImage($id_request, $prompt, $code_model_ai, $order, $id_content_category, $url, $location) {
    $image = new ImageResource();
    $image->id_request = $id_request;
    $image->prompt = $prompt;
    $image->code_model_ai = $code_model_ai;
    $image->order = $order;
    $image->id_content_category = $id_content_category;
    $image->url = $url;
    $image->location = $location;
    $image->save();

    return $image->id_image_resource;
  }
}
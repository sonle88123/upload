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
use App\Models\ProfileSchedule;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class ProfileController extends Controller
{
    public function profilemanagement()
    {
        if (Auth::check()) {
            $profilelist = Profile::orderBy('profile.follow', 'desc')
                ->get();

            $totalProfiles = Profile::count();

            $menu = 'profile';
            $submenu = 'profilemanagement';

            return view('profilemanagement', ['profilelist' => $profilelist, 'totalProfiles' => $totalProfiles, 'menu' => $menu, 'submenu' => $submenu]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }

    public function getprofile(Request $request)
    {
        Log::debug($request);

        $profile = Profile::where('id_profile', $request->id)
            ->first();

        $avatar = ImageResource::where('id_image_resource', $profile->id_image_resource)
            ->first();

        $imagecount = ImageResource::where('url', 'like', '%'.$profile->code_profile.'%')
            ->get()->count();

        return response()->json(['profile' => $profile, 'avatar' => $avatar, 'imagecount' => $imagecount]);
    }

    public function generateprofile()
    {
        if (Auth::check()) {
            $menu = 'profile';
            $submenu = 'generateprofile';

            return view('generateprofile', ['menu' => $menu, 'submenu' => $submenu]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }

    public function performanceprofile() {
        if (Auth::check()) {
            $menu = 'performance';
            $submenu = 'facebookperformance';

            $profilelist = Profile::orderBy('profile.follow', 'desc')
                ->join('image_resource', 'profile.id_image_resource', '=', 'image_resource.id_image_resource')
                ->select('profile.*', 'image_resource.url as avatar')
                ->get();

            return view('performanceprofile', ['menu' => $menu, 'submenu' => $submenu, 'profilelist' => $profilelist]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }

    public function profileschedule()
    {
        if (Auth::check()) {
            $menu = 'profile';
            $submenu = 'profileschedule';
            $pagetitle = 'Profile Schedule';

            $profilelist = Profile::orderBy('profile.follow', 'desc')
                ->join('image_resource', 'profile.id_image_resource', '=', 'image_resource.id_image_resource')
                ->select('profile.*', 'image_resource.url as avatar')
                ->get();

            return view('profileschedule', ['menu' => $menu, 'submenu' => $submenu, 'profilelist' => $profilelist, 'pagetitle' => $pagetitle]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }

    public function getProfileSchedulebyID($id_profile) {
        $profile_schedule = ProfileSchedule::where('id_profile', $id_profile)
            ->get();

        return response()->json(['profile_schedule' => $profile_schedule]);
    }

    public function profilearticle(){
        if (Auth::check()) {
            $menu = 'content';
            $submenu = 'profilearticle';

            $profilelist = Profile::orderBy('profile.follow', 'desc')
                ->take(500)->get();

            return view('profilearticle', ['menu' => $menu, 'submenu' => $submenu, 'profilelist' => $profilelist]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }

    public function getarticle(Request $request) {
        $profile_id = $request->id;

        $article_list = CelebArticle::where('id_profile', $profile_id)
            ->get();

        return response()->json(['articles' => $article_list]);
    }

    public function getProfileDetails(Request $request) {
        $profile_id = $request->id;

        $profile = Profile::where('id_profile', $profile_id)
            ->first();

        $avatar = ImageResource::where('id_image_resource', $profile->id_image_resource)
            ->first();

        $article_list = CelebArticle::where('id_profile', $profile_id)
            ->get();

        return response()->json(['profile' => $profile, 'avatar' => $avatar, 'articles' => $article_list]);
    }

    public function profileimporter(){
        if (Auth::check()) {
            $menu = 'profile';
            $submenu = 'profileimporter';
            $pagetitle = 'Profile Importer';

            return view('profileimporter', ['menu' => $menu, 'submenu' => $submenu, 'pagetitle' => $pagetitle]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }

    public function saveProfile(Request $request){
        $profile = Profile::where('code_profile', $request->code_profile)
            ->first();

        $content = $request->content;

        if($content == 'detail') {
            $profile->fullname = $request->fullname;
            $profile->job = $request->job;
            $profile->age = $request->age;
            $profile->place_of_birth = $request->pob;
        } else if($content == 'appearance') {
            $profile->face = $request->face;
            $profile->skin_color = $request->skin;
            $profile->body = $request->body;
        } else if($content == 'personality') {
            $profile->lifestyle = $request->lifestyle;
            $profile->interests = $request->interests;
            $profile->tone = $request->tone;
            $profile->engagement = $request->engagement;
            $profile->language = $request->language;
        } else if($content == 'professional') {
            $profile->industry = $request->industry;
            $profile->experience = $request->experience;
            $profile->content_style = $request->content_style;
            $profile->influence_scope = $request->influence_scope;
        } else if($content == 'social') {
            $profile->fb_link = $request->fb_link;
            $profile->x_id = $request->x_id;
            $profile->instagram_id = $request->instagram_id;
            $profile->tiktok_id = $request->tiktok_id;
            $profile->threads_id = $request->threads_id;
        }

        $profile->save();

        return response()->json(['success' => true]);
    }

    public function generateProfileSample(Request $request) {
        $qty_profile = 1;
        if($request->qtyProfile < 1) {
            $qty_profile = 1;
        } else if ($request->qtyProfile > 100) {
            $qty_profile = 100;
        } else {
            $qty_profile = $request->qtyProfile;
        }
        $modelai = 'gpt-4o-2024-05-13';

        $content_prompt = "give me ".$qty_profile." random sample with: [".$request->profileSample."].\nThe result only is json according to the form (not include any anothe character, not include 'json' word):\n
        {[\"fullname\": \"value\",\"age\": \"value\",\"gender\": \"value\",\"placeofbirth\": \"value\",\"nationality\": \"value\",\"job\": \"value\",\"face\": \"value\",\"skincolor\": \"value\",\"body\": \"value\",\"lifestyle\": \"value\",\"interests\": \"value\",\"tone\": \"value\",\"engagement\": \"value\",\"language\": \"value\",\"industry\": \"value\",\"experience\": \"value\",\"contentstyle\": \"value\",\"influencescope\": \"value\"]}";

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

            $this->storeRequest(1, $content_prompt, $modelai, 2, $url_endpoint, json_encode($postfields), $response, 0);

            $arrayProfile = json_decode($data['choices'][0]['message']['content'], true);

            // Check if decoding was successful
            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::debug('Invalid JSON: ' . json_last_error_msg());
            }

            $profile_list = '';

            // Process the array
            foreach ($arrayProfile as $profiledata) {
                $code_profile = 'PS'. time() . $this->generateRandomString(2);
                $id_image = 0;

                $content_prompt = 'Avatar of '.$profiledata['nationality'].' '.$profiledata['gender'].', '.$profiledata['face'].'. Skin color is '.$profiledata['skincolor'].'.';

                $content_category = ContentCategory::where('code_content_category', 'avatarimage')->first();
                $id_content_category = 0;
                if(!empty($content_category)) {
                    $id_content_category = $content_category->id_content_category;
                }

                $image = $this->RenderImageLeoAI($content_prompt, $id_content_category, 0, $code_profile);

                $id_image = $image['img_id'];

                sleep(1);

                $id_profile = $this->storeProfile($profiledata, $code_profile, $id_image);
                $profile_list = $profile_list.$code_profile.', ';
            }

            $profile_list = rtrim($profile_list, ', ');
            $profiles = Profile::whereIn('code_profile', explode(', ', $profile_list))
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Profile generated successfully',
                'profiles' => $profiles,
                'avatar' => $image
            ], 200);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function RenderImageLeoAI($description, $id_cate, $order, $code_profile){
        $api_key = config('app.leoai');
        $authorization = "Bearer " . $api_key;

        $content_prompt = $description;

        // Get a presigned URL for uploading an image
        $url_endpoint = "https://cloud.leonardo.ai/api/rest/v1/generations";

        $modelai = 'Leonardo AI';

        // Data to send to the API
        $postfields = [
            "alchemy" => true,
            "height" => 1024,
            "width" => 1024,
            "prompt" => $content_prompt,
            //"negative_prompt" => self::NegativePromptchan,
            "modelId" => "5c232a9e-9061-4777-980a-ddc8e65647c6",//Leonardo Kino XL model
            "num_images" => 1,
            "photoReal" => true,
            "photoRealVersion" => "v2",
            "presetStyle" => "STOCK_PHOTO",
            //"highContrast" => true
        ];

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
                'error' =>  'RenderImageLeoAI > '.$e->getMessage(),
                'img_link' =>  ''
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

            while ($data['generations_by_pk']['status'] != "COMPLETE" && $data['generations_by_pk']['status'] != "FAILED"){
                sleep(3);
                $response = curl_exec($curl);
                curl_close($curl);
                $data = json_decode($response, true);
            }

            if($data['generations_by_pk']['generated_images'][0]['url'] != ""){
                $image_url = $data['generations_by_pk']['generated_images'][0]['url'];
                $folder = 'avatarimage';
                $r2object = $this->uploadToCloudFlareFromFile($image_url, $code_profile, $folder);
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

    private function uploadToCloudFlareFromFile($image_url, $code_profile, $folder)
    {
        try {
            $imageContent = file_get_contents($image_url);

            // Decode base64 image
            $imageData = base64_decode($imageContent);
            $filename = $code_profile;
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

                $this->storeRequest(2, "Upload to CloudFlare", "CloudFlare", 1, $endpoint, $r2object, $result, 0);

                return $r2object;
            } catch (S3Exception $e) {
                Log::debug("Error uploading file: ". $e->getMessage());
            }
        } catch (\Throwable $th) {
            Log::debug($th);
            return 'error';
        }
    }

    private function storeProfile($profiledata, $code_profile, $id_image){
        $profilesample = new Profile();
        $profilesample->code_profile = $code_profile;
        $profilesample->fullname = $profiledata['fullname'];
        $profilesample->age = $profiledata['age'];
        $profilesample->gender = $profiledata['gender'];
        $profilesample->place_of_birth = $profiledata['placeofbirth'];
        $profilesample->nationality = $profiledata['nationality'];
        $profilesample->job = $profiledata['job'];

        $profilesample->face = $profiledata['face'];
        $profilesample->skin_color = $profiledata['skincolor'];
        $profilesample->body = $profiledata['body'];

        $profilesample->lifestyle = $profiledata['lifestyle'];
        $profilesample->interests = $profiledata['interests'];
        $profilesample->tone = $profiledata['tone'];
        $profilesample->engagement = $profiledata['engagement'];
        $profilesample->language = $profiledata['language'];

        $profilesample->industry = $profiledata['industry'];
        $profilesample->experience = $profiledata['experience'];
        $profilesample->content_style = $profiledata['contentstyle'];
        $profilesample->influence_scope = $profiledata['influencescope'];

        $profilesample->id_image_resource = $id_image;
        $profilesample->save();

        return $profilesample->id_profile;
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

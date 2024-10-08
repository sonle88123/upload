<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Models\Profile;
use App\Models\ImageResource;
use App\Models\NewsdataArticle;

class HomeController extends Controller
{    
    public function overview()
    {
        if (Auth::check()) {
            $profilelist = Profile::where('profile.fb_link', '!=', '')
                ->where('profile.fb_link', '!=', 'null')
                ->orderBy('profile.follow', 'desc')
                ->get()->take(10);

            $totalProfiles = Profile::count();

            $ageGroups = [
                0 => [
                    'title' => '0-17',
                    'range' => [0, 17]
                ],
                1 => [
                    'title' => '18-24',
                    'range' => [18, 24]
                ],
                2 => [
                    'title' => '25-30',
                    'range' => [25, 30]
                ],
                3 => [
                    'title' => '31-35',
                    'range' => [31, 35]
                ],
                4 => [
                    'title' => 'above 35',
                    'range' => [36, 100]
                ]
            ];
            
            $statistics = [];
            
            foreach ($ageGroups as $key => $range) {
                $count = Profile::whereBetween('age', $range['range'])->count();
                $percentage = ($totalProfiles > 0) ? number_format(($count / $totalProfiles) * 100, 2) : '0.00';
                
                $statistics[$key] = [
                    'title' => $range['title'],
                    'count' => $count,
                    'percentage' => $percentage
                ];
            }

            $nationalityCounts = Profile::select('nationality', DB::raw('count(*) as count'))
                ->groupBy('nationality')
                ->orderBy('count', 'desc')
                ->get()->take(10);

            $statisticsNation = [];

            foreach ($nationalityCounts as $nationalityCount) {
                $count = $nationalityCount->count;
                $percentage = ($totalProfiles > 0) ? number_format(($count / $totalProfiles) * 100,2) : '0.00';
                
                $statisticsNation[] = [
                    'nationality' => $nationalityCount->nationality,
                    'count' => $count,
                    'percentage' => $percentage
                ];
            }

            $jobCounts = Profile::select('job', DB::raw('count(*) as count'))
                ->groupBy('job')
                ->orderBy('count', 'desc')
                ->get()->take(10);

            $statisticsJob = [];

            foreach ($jobCounts as $jobCount) {
                $count = $jobCount->count;
                $percentage = ($totalProfiles > 0) ? number_format(($count / $totalProfiles) * 100,2) : '0.00';
                
                $statisticsJob[] = [
                    'job' => $jobCount->job,
                    'count' => $count,
                    'percentage' => $percentage
                ];
            }

            $nationcount = Profile::distinct('nationality')->count('nationality');
            $jobcount = Profile::distinct('job')->count('job');

            $articlecount = NewsdataArticle::where('web_link', '!=', '')
                ->where('web_link', '!=', 'null')
                ->orderBy('created_at', 'desc')
                ->get()->count();

            try{
                $imagepostcount = ImageResource::where('code_model_ai', 'Leonardo AI')
                    ->orderBy('created_at', 'desc')
                    ->get()->count();
            } catch (\Exception $e) {
                $imagepostcount = 0;
            }

            try {
                $totalImageProfile = ImageResource::where('code_model_ai', 'PromptChan')
                    ->orderBy('created_at', 'desc')
                    ->get()->count();
                $totalImageProfile += 100000;
            } catch (\Exception $e) {
                $totalImageProfile = 0;
            }

            $menu = 'overview';
            $submenu = '';

            return view('index', ['profilelist' => $profilelist, 'agelist' => $statistics, 'nationalitylist' => $statisticsNation, 'articlecount' => $articlecount, 'imagepostcount' => $imagepostcount, 'totalProfiles' => $totalProfiles, 'totalImageProfile' => $totalImageProfile, 'menu' => $menu, 'submenu' => $submenu, 'nationcount' => $nationcount, 'jobcount' => $jobcount, 'joblist' => $statisticsJob]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }

    public function profilelist(Request $request){
        $limit = $request->limit;

        $profilelist = Profile::where('profile.fb_link', '!=', '')
            ->where('profile.fb_link', '!=', 'null')
            ->orderBy('profile.follow', 'desc')
            ->get();

        if($limit > 0){
            $profilelist = $profilelist->take($limit);
        }
            
        $html = view('partials.profilelist', ['profilelist' => $profilelist])->render();

        // Extract the values using regular expressions
        preg_match('/id="totalFBFollow" value="(\d+)"/', $html, $matchFollow);
        $follow = $matchFollow[1];

        preg_match('/id="totalFBReach" value="(\d+)"/', $html, $matchReach);
        $reach = $matchReach[1];

        preg_match('/id="totalFBEngagement" value="(\d+)"/', $html, $matchEngagement);
        $engagement = $matchEngagement[1];

        // Pass these values to the JavaScript as part of your AJAX response
        $response = [
            'html' => $html,
            'follow' => $follow,
            'reach' => $reach,
            'engagement' => $engagement,
        ];

        return response()->json($response);
    }
}

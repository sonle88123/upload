<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Profile;
use App\Models\ImageResource;
use App\Models\FbAudienceAge;
use App\Models\FbAudienceNationality;

class PerformanceController extends Controller
{
    public function facebook() {
        if (Auth::check()) {
            $menu = 'performance';
            $submenu = 'facebook';
            $pagetitle = 'Facebook Performance';

            $profilelist = Profile::orderBy('profile.follow', 'desc')
                ->join('image_resource', 'profile.id_image_resource', '=', 'image_resource.id_image_resource')
                ->select('profile.id_profile as id', 'profile.code_profile as code_profile', 'profile.fullname as fullname', 'profile.age as age', 'profile.job as job', 'profile.nationality as nationality', 'image_resource.url as avatar')
                ->get();

            return view('facebookperformance', ['pagetitle' => $pagetitle, 'menu' => $menu, 'submenu' => $submenu, 'profilelist' => $profilelist]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }

    public function fbPerformanceDetail(Request $request) {
        $profile_id = $request->id;

        Log::debug('profile_id: ' . $profile_id);

        $profile = Profile::where('id_profile', $profile_id)
            ->first();

        Log::debug('profile: ' . $profile);

        $avatar = ImageResource::where('id_image_resource', $profile->id_image_resource)
            ->first();

        $fb_audience_age = FbAudienceAge::where('uid', $profile->fb_link)
            ->get();

        $fb_audience_nationality = FbAudienceNationality::where('uid', $profile->fb_link)
            ->orderBy('value', 'desc')
            ->get()->take(5);

        return response()->json(['profile' => $profile, 'avatar' => $avatar, 'fb_audience_age' => $fb_audience_age, 'fb_audience_nationality' => $fb_audience_nationality]);
    }

    public function underconstruction($pagetitle, $menu, $submenu) {
        if (Auth::check()) {
            return view('underconstruction', ['pagetitle' => $pagetitle, 'menu' => $menu, 'submenu' => $submenu]);
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }
}

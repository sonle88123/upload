<?php

use App\Http\Controllers\VirtualController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenerativeAIController;

/*Route::get('/', [HomeController::class, 'overview']);*/

Route::get('/')->middleware(CheckLogin::class);

/*Route::middleware(['auth', 'checkUserGroup:Administrator'])->group(function () {
    Route::get('/index',[HomeController::class,'dashboard']);
});*/

Route::get('/overview', [HomeController::class, 'overview']);
Route::post('/profilelist', [HomeController::class, 'profilelist']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout',[LoginController::class,'logout']);
Route::post('/auth/postlogin', [LoginController::class,'postlogin']);

Route::get('/profilemanagement',[ProfileController::class,'profilemanagement']);
Route::post('/profilemanagement/getprofile',[ProfileController::class,'getprofile']);
Route::post('/profilemanagement/saveprofile',[ProfileController::class,'saveProfile']);

Route::get('/generateprofile',[ProfileController::class,'generateprofile']);
Route::post('/generateprofile/generate',[ProfileController::class,'generateProfileSample']);

Route::get('/profileschedule',[ProfileController::class,'profileschedule']);
Route::get('/profileschedule/{id_profile}',[ProfileController::class,'getProfileSchedulebyID']);

Route::get('/profilearticle',[ProfileController::class,'profilearticle']);
Route::post('/profilearticle/getarticle',[ProfileController::class,'getarticle']);

Route::get('/getprofiledetails',[ProfileController::class,'getProfileDetails']);
Route::get('/profileimporter',[ProfileController::class,'profileimporter']);

Route::get('/performance/facebook',[PerformanceController::class,'facebook']);
Route::post('/performance/facebook/detail',[PerformanceController::class,'fbPerformanceDetail']);

Route::get('/performance/instagram', function () {
    return app()->call('App\Http\Controllers\PerformanceController@underconstruction', [
        'pagetitle' => 'Instagram Performance',
        'menu' => 'performance',
        'submenu' => 'instagram'
    ]);
})->name('performance.instagram')->middleware('auth');
Route::get('/performance/threads', function () {
    return app()->call('App\Http\Controllers\PerformanceController@underconstruction', [
        'pagetitle' => 'Threads Performance',
        'menu' => 'performance',
        'submenu' => 'threads'
    ]);
})->name('performance.threads')->middleware('auth');
Route::get('/performance/tiktok', function () {
    return app()->call('App\Http\Controllers\PerformanceController@underconstruction', [
        'pagetitle' => 'TikTok Performance',
        'menu' => 'performance',
        'submenu' => 'tiktok'
    ]);
})->name('performance.tiktok')->middleware('auth');
Route::get('/performance/x', function () {
    return app()->call('App\Http\Controllers\PerformanceController@underconstruction', [
        'pagetitle' => 'X Performance',
        'menu' => 'performance',
        'submenu' => 'x'
    ]);
})->name('performance.x')->middleware('auth');
Route::get('/performance/youtube', function () {
    return app()->call('App\Http\Controllers\PerformanceController@underconstruction', [
        'pagetitle' => 'Youtube Performance',
        'menu' => 'performance',
        'submenu' => 'youtube'
    ]);
})->name('performance.youtube')->middleware('auth');

Route::get('/generativeai/socialpost',[GenerativeAIController::class,'socialpost']);
Route::post('/generativeai/getpromptsocialpost',[GenerativeAIController::class,'getPromptSocialPost']);
Route::post('/generativeai/getsocialpost',[GenerativeAIController::class,'getSocialPost']);
Route::get('/generativeai/socialvideo', function () {
    return app()->call('App\Http\Controllers\PerformanceController@underconstruction', [
        'pagetitle' => 'Social video generation',
        'menu' => 'generativeai',
        'submenu' => 'socialvideo'
    ]);
})->name('generativeai.socialvideo')->middleware('auth');
Route::get('/generativeai/socialcomment',[GenerativeAIController::class,'socialcomment']);
Route::get('/generativeai/socialinbox', function () {
    return app()->call('App\Http\Controllers\PerformanceController@underconstruction', [
        'pagetitle' => 'Social inbox generation',
        'menu' => 'generativeai',
        'submenu' => 'socialinbox'
    ]);
})->name('generativeai.socialinbox')->middleware('auth');

Route::get('/generativeai/virtual-anyone',[VirtualController::class,'index'])->middleware('auth');
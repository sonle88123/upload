<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('/overview');
        }
        Auth::logout();
        //session()->flush();
        return view('/login');
    }    

    public function postlogin(Request $request)
    {
        try{
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = User::where('email', $request->email)->first();
                if ($user) {
                    $user->last_login = date('Y-m-d H:i:s');
                    $user->save();
                }

                if (Auth::user()->group->title_user_group === 'Administrator') {
                    return redirect('/overview');
                }
                
                return redirect('/overview');
            } else {
                session()->put('error_login', 'Email or Password is incorrect');
                return back()->withInput($request->all());
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }    

    public function logout(Request $request)
    {
        Auth::logout();
        session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('/login');
    }
    
}

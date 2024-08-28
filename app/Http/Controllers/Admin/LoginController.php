<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request){
        // dd($request->all());
        if(Auth::check()){
            return redirect('admin/dashboard');
        }else{
            if($request->isMethod('post')){
                $data = $request->input();
                 if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                    // dd("test");
                    return redirect()->route('dashboard');
                }else{
                    //echo "failed"; die;
                    return redirect()->route('login')->with('flash_message_error','Invalid Username or Password');
                }
            }
        }

        return view("auth.login");
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}

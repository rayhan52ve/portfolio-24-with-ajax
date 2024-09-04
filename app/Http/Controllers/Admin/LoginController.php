<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::check()){
            return redirect('admin/dashboard');
        }else{
            if($request->isMethod('post')){
                $data = $request->input();
                $remember = $request->has('remember');
                 if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']],$remember)) {
                    session()->flash('msg','Logged In Successfully.');
                    session()->flash('cls','success');
                    return redirect()->route('dashboard');
                }else{
                    session()->flash('msg','Invalid Email or Password');
                    session()->flash('title','Invalid Credential!');
                    session()->flash('cls','error');
                    return redirect()->route('login');
                }
            }
        }
        $user  = User::first();

        return view("auth.login",compact('user'));
    }
    public function logout()
    {
        Auth::logout();
        session()->flash('msg', 'Signed Out Sucessfully.');
        session()->flash('title', 'Success!');
        session()->flash('cls', 'success');
        return redirect(route('login'));
    }
}

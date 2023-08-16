<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        if(!empty(Auth::check())){
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2){
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 3){
                return redirect('student/dashboard');
            }
            else {
                return redirect('parent/dashboard');
            }
        }
        return view('auth.login');
    }
    public function Authlogin(Request $request){
        //dd(Hash::make(123456));

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],true)){
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2){
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 3){
                return redirect('student/dashboard');
            }
            else {
                return redirect('parent/dashboard');
            }
        }
        else{
            return redirect()->back()->with('error','Please enter correct email and password');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

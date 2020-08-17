<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Auth;
use Redirect;

class UserAuthController extends Controller
{
    //View Controller for the User Login Page
    public function indexLogin(){
        if(Auth::guard('web')->user()){
            return redirect('/');
        }
        return view('auth.userLogin');
    }

    //View Controller for the User Register Page
    public function indexRegister(){
        if(Auth::user()){
            return redirect('/');
        }
        return view('auth.userRegister');
    }

    //User Registration
    public function userRegistration(Request $request){
        $this->validation($request);
        $pref = '';
        if($request->input('user_food_pref')=='veg'){
            $pref = 'veg';
        }else if($request->input('user_food_pref')=='nonveg'){
            $pref = 'nonveg';
        }else{
            $pref = 'nonveg';
        }
        User::create([
            'name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'remember_token' => $request->input('_token'),
            'veg_pref' => $pref,
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect('/')->with('Status','Successfully Registred');
    }

    //User LogIn
    public function userLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users|max:300',
            'password' => 'required',
        ]);
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password,])){
            return redirect('/')->with('Status','Successfully Logged In');
        }
        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
        return Redirect::to('/login')->withErrors(array('password' => 'Password invalid'));
    }

    //User Logout
    public function userLogout(Request $request){
        return redirect('/login')->with(Auth::logout());
    }

    //Form Validation
    public function validation($request){
        return $this->validate($request, [
            'email' => 'required|email|unique:users|max:300',
            'user_name' => 'required|max:300',
            'user_food_pref' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
        ]);
    }
}

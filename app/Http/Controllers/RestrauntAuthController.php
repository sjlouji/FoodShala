<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restarunt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\ViewErrorBag;


class RestrauntAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/restarunt'; 

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('guest:webrest')->except('logout');
    // }

    //View Controller for the Restarunt Login Page
    public function indexLogin(){
        if(Auth::guard('webrest')->check()){
            return redirect('/restaurant');
        }
        return view('auth.resLogin');
    }

    //View Controller for the Restarunt Register Page
    public function indexRegister(){
        if(Auth::guard('webrest')->user()){
            return redirect('/restaurant');
        }
        return view('auth.resRegister');
    }

    //Restarunt Registration
    public function restaruntRegistration(Request $request){
        $this->validate($request, [
            'rest_email' => 'required|email|unique:restarunts|max:300',
            'rest_name' => 'required|max:300',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
            'mobile' => 'required|numeric|min:10',
        ]);
        Restarunt::create([
            'rest_name' => $request->input('rest_name'),
            'rest_email' => $request->input('rest_email'),
            'remember_token' => $request->input('_token'),
            'mobile' => $request->input('mobile'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect('/restaurant')->with('Status','Successfully Registred');
    }

    //Restarunt LogIn
    public function restaruntLogin(Request $request){
        $this->validate($request, [
            'rest_email' => 'required|email|exists:restarunts|max:300',
            'password' => 'required',
        ]);
        if(Auth::guard('webrest')->attempt(['rest_email' => $request->rest_email, 'password' => $request->password])){
            return redirect('/restaurant')->with('Status','Successfully Logged In');
        }
        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
        $errorssdf = session()->get('errors', app(ViewErrorBag::class));
        return Redirect::to('/restaurant/login')->withErrors(array('password' => 'Password invalid'));
    }

    //Restarunt Logout
    public function restaruntLogout(Request $request){
        Auth::guard('webrest')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/restaurant/login');
    }
    
}

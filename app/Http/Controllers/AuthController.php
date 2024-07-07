<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index(){
        if(Auth::user()){
            return redirect()->route('user.profile');
        }
        else
        {
            return view('auth.login');
        }
    }
    public function register(){
        // return 444;
        if(Auth::user()){
            return redirect()->route('user.profile');
        }
        return view('auth.register');
    }
    public function storeUser(Request $user){

        $user->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required',
        ]);
    
        // Create a new User instance
        $newUser = new User();
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->phone = $user->phone;
        $newUser->password = $user->password;
        // $newUser->password = bcrypt($user->password); // Securely hash the password
    
        // Attempt to save the new user record
        if ($newUser->save()) {
            // $newUser->sendEmailVerificationNotification();
            return redirect()->route('student.index')->with('success', 'User successfully created');
        } else {
            return redirect()->route('auth.register')->withErrors(['error' => 'Failed to create user']);
        }
    }

  

    public function user(){
        $user = User::all();
        return view('auth.user',compact('user'));
    }


    public function check(Request $user){

        $credentials = $user->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($credentials)){
            
            return redirect()->intended('/profile')->cookie('user',$user->email);;
        }
        else{
            return redirect()->route('auth.login')->withErrors(['message'=>'Login Failed , Please Provide Wright Creadential']);
        }
        
    }

    public function logout(Request $request){
        //  $request->user()->currentAccessToken()->delete();
        Auth::logout();
        return redirect('/login');
        //  return redirect()->router('auth.login')->with("Success",'Logout Sussessfully Done');
    }


    //API
    public function getUser(){
     $users = User::all()->select('email', 'name' ,'phone');
     if($users){
        $result = array('status'=>true,'message'=>'get user successfully','data' =>$users);
       
        return response()->json($result,200);
     }
    }
   
}

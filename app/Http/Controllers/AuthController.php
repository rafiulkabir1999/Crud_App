<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    //
    public function index(){
        if(Auth::user()){
            return redirect()->route('showrooms.index');
        }
        else
        {
            return view('auth.login');
        }
    }
    public function register(){
        // return 444;
        if(Auth::user()){
            return redirect()->route('showrooms.index');
        }
        return view('auth.register');
    }
    public function storeUser(Request $user){

      try{
        $credentials = $user->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $credentials['password'] = Hash::make($credentials['password']);
        // Create a new User instance
        $newUser = User::create($credentials);
        // $newUser->name = $user->name;
        // $newUser->email = $user->email;
        // $newUser->phone = $user->phone;
        // $newUser->password = $user->password;
        // $newUser->password = bcrypt($user->password); // Securely hash the password
    
        // Attempt to save the new user record 
         return redirect()->route('auth.login')->with('success', 'User successfully created');
      } catch(\Exception $e){
        $result = array(
            'status' => false,
            'message' => 'Something Went Wrong',
            'data' => null
        );
        return response()->json($result, 500);
      }
        // if ($newUser->save()) {
        //     // $newUser->sendEmailVerificationNotification();
          
        // } else {
        //     return redirect()->route('auth.register')->withErrors(['error' => 'Failed to create user']);
        // }
    }

  

    public function user(){
        $user = User::all();
        return view('showrooms.index',compact('user'));
    }


    public function check(Request $user){

        $credentials = $user->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($credentials)){
            
            return redirect()->intended('/showrooms');
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

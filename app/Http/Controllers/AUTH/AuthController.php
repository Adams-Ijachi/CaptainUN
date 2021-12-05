<?php

namespace App\Http\Controllers\AUTH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\{
    User,
    

};

class AuthController extends Controller
{
    //


    // register

    public function register(Request $request)
    {
        
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'country' => 'required|string',
            'username' => 'required|unique:users',
        ]);

      

        $user = User::create($request->all());
        return redirect()->back()->with('success', 'Account created successfully, Awaiting admin approval');
    }

    public function login(Request $request)
    {
        // dd('login');
        $credentials = $request->validate([
            'email' => ['required', 'email','exists:users,email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
       
        if($user->is_approved == 0){
               
            return redirect()->back()->withErrors('Your account is not approved yet, please wait for admin approval');
        };

        
        if (Auth::attempt($credentials)) {

            
           
            if(Auth::user()->role(0)){
                return redirect()->intended(route('admin.home'));
            }
            elseif(Auth::user()->role(2)){
                return redirect()->intended(route('admin.home'));

            }
            else{
                return redirect()->intended(route('home'));
            }
            
        }
        return back()->withErrors('The provided credentials do not match our records.');

      
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

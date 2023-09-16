<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index(){
        return view("welcome");
    }

    public function signup(Request $request){
        $validatedData = $request->validate([
            "name" => "required"
            , "email" => "required|email|unique:users"
            , "password" => "required|min:8"
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['type'] = "employee";
        
        $user = User::create($validatedData);
        return view("register");

    }

    public function register(){
        return view("register");
    }

    public function login(){
        return view("login");
    }

    public function dashboard(Request $request){
    
        return view("Dashboard");
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials["active"] = 1;
        // admin view
        // if (Auth::guard('admin')->attempt($credentials)) {
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function show(){
        $user = array("name"=>"Jordan");

        return view("user.profile", $user);
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

    public function contact(){
        return view("contact");
    }

    public function showCategory($category){
        return "Category: ".$category;
    }

    public function submit(Request $request){
       $validator =  $request->validate([
            "username" => "required"
        ]);
        $username = $request->input("username");
        $user = User::find(1);
        User::create(["name" => $username, "email"=>"test@gmail.com", "password"=>"asdsa"]);
        
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function page($id){
        $data = [
            [
                'name' => 'Cam1', 
                'img' => "images/img2.jpg"
            ],
            [
                'name' => 'Cam2', 
                'img' => "2.jpg"
            ],
        ];

        return view("cam", ["data" => $data, "active" => $data[$id]]);
    }

    public function cam(){
        $data = [
            [
                'name' => 'Cam1', 
                'img' => "images/img2.jpg"
            ],
            [
                'name' => 'Cam2', 
                'img' => "2.jpg"
            ],
        ];

        return view("cam", ["data" => $data, "active" => $data[0]]);
    }
}

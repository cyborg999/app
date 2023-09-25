<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){
        $profile = Profile::where("userid", Auth::id())
            ->limit(1)
            ->get()->first();

        return view("user.profile", ["profile" => $profile]);
    }

    public function update(Request $request){
        $validation = $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "mobile" => "required|min:11"
        ]);

        $data = array(
            "userid" => Auth::id(),
            "address" => $request->input("address"),
            "dob" => $request->input("dob")
        );

        $data = array_merge($data, $validation);

        $profile = Profile::updateOrCreate(
            ["userid" => Auth::id()]
            , $data
        );

        return back()->with("status", "You have successfully update your record");
    }
}

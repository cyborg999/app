<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //

    public function all(){
        $products = Product::all();

        return view("product/all", [ "data" => $products]);
    }

    public function edit(Request $request){
        // $product = Product::findOrFail($id);
    }

    public function show(){
        return view("product/add");
    }

    public function add(Request $request){
        $validation = $request->validate([
            "name" => "required"
            , "srp" => "required"
            , 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            , "desc" => "required"
            , "orig" => "required"
            , "qty" => "required|min:1"
        ]);

        $validation["user_id"] = Auth::id();

        //upload img
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $product = Product::create($validation);

        $img = array(
            "name" => $imageName
            , "productid" => $product->id
        );

        Image::create($img);

        return back()
        ->with('success', 'You have succesfully added a product.')
        ->with('image', $imageName); 

        // return redirect("products/add")
        //     ->with('image', $imageName)
        //     ->with("status", "You have succesfully added a product.");
    }
}

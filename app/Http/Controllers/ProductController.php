<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all(){
        $products = DB::table('product')
        ->leftJoin("image", "product.id", "=", "image.productid")
        ->select("product.*", "image.name as path")
        ->get();

        return view("product/index", [ "data" => $products]);
    }

    public function edit(Request $request){
        // $product = Product::findOrFail($id);
    }

    public function show(Request $request){
        $barcode = "";

        if(isset($_POST["barcode"])){
            echo "<pre>";
            var_dump($request->input("barcode"));
        }

        return view("product/add");
    }

    public function add(Request $request){
        $validation = $request->validate([
            "name" => "required"
            , "srp" => "required"
            , 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            , "description" => "required"
            , "barcode" => "required"
            , "orig" => "required"
            , "qty" => "required|min:1"
        ]);
        $validation["category_id"] = 1;
        $validation["discount_ids"] = 0;
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

        $inventory = array(
            "userid" => Auth::id()
            , "productid" => $product->id
            , "qty" => $validation["qty"]
        );

        Inventory::create($inventory);

        return back()
        ->with('success', 'You have succesfully added a product.')
        ->with('image', $imageName); 
    }
}

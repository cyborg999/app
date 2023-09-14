<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class PosController extends Controller
{
    public $cartItems = [];

    public function index(){
        return view("pos/index", ["data" => []]);
    }

    public function print(Request $request){
        dd($request->input());
    }

    public function getById(Request $request){
        $id = $request->input("id");
        $product = DB::table('product')
            ->leftJoin("image", "product.id", "=", "image.productid")
            ->where("product.id", "=", $id)
            ->select("product.*", "image.name as path")
            ->limit(1)
            ->get()
            ->first();

        $total = $this->updateCart($product);
        $product->path = asset('images/'.$product->path);

        $data = array(
            "product" => $product,
            "total" => $total
        );

        die(json_encode($data));
    }

    public function addToCart($item1, $item2){
        return $item1->qty + $item2->qty;
    }

    public function updateCart($products){
        $this->cartItems[] = $products;
        $cartItems = $this->cartItems;
        $total = 0;
      

        foreach($cartItems as $idx => $item){
            $total += ($item->srp*$item->qty);
        }

        return $total;
    }

    public function search(Request $request){
        $search = $request->input("search");

        $products = DB::table('product')
            ->leftJoin("image", "product.id", "=", "image.productid")
            ->where("product.name", "like", "%$search%")
            ->select("product.*", "image.name as path")
            ->get();
        
        return view("pos/search", ["data" => $products]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Sale;
use App\Http\Controllers\PosController;

class PosController extends Controller
{
    public $cartItems = [];

    public function index(){
        return view("pos/index", ["data" => []]);
    }

    public function print(Request $request){
        $ids = $request->input("id");
        $qtys = $request->input("qty");
        $id = $ids != null ? explode(",",$ids) : $ids;
        $qty = $qtys != null ? explode(",",$qtys) : $qtys;

        $products = DB::table("product")
            ->whereIn("id", $id)
            ->get();
        
        $transaction = TransactionController::print();
        $total = 0;

        foreach($products as $idx => $product){
            $srp = $product->srp;
            $pId = $product->id;
            $qtyIdx = array_search($pId, $id);

            $total += $srp * $id[$qtyIdx];

            Sale::create([
                "productid" => $pId
                , "transactionid" => $transaction->id
                , "qty" => $id[$qtyIdx]
                , "srp" => $srp
            ]);
        }

        dd($total);
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

        $product->path = asset('images/'.$product->path);

        $data = array(
            "product" => $product
        );

        die(json_encode($data));
    }

    public function addToCart($item1, $item2){
        return $item1->qty + $item2->qty;
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

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
        $paymentReceived = $request->input("payment");
        $id = $ids != null ? explode(",",$ids) : $ids;
        $qty = $qtys != null ? explode(",",$qtys) : $qtys;

        try {
            DB::beginTransaction();

            $transaction = TransactionController::print($paymentReceived);
            $total = 0;

            foreach($id as $idx => $i){
                $product = Product::findOrFail($i);

                $srp = $product->srp;
                $pId = $product->id;
                $qtyIdx = array_search($pId, $id);
                $qtyBought = $qty[$qtyIdx];

                $total += $srp * $qtyBought;

                //update remaining qty
                $product->qty -= $qtyBought;
                $product->save();

                Sale::create([
                    "productid" => $pId
                    , "transactionid" => $transaction->id
                    , "qty" => $qtyBought
                    , "srp" => $srp
                ]);
            }


            $transaction->total = $total;
            $transaction->save();

            DB::commit();

            die(json_encode(["total" => $total, "success" => true]));
        } catch(\Exception $e){
            DB::rollBack();
    
            die(json_encode(["total" => 0, "success" => false]));
        }
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

    public function scan(Request $request){
        $search = $request->input("search");

        $products = DB::table('product')
            ->leftJoin("image", "product.id", "=", "image.productid")
            ->where("product.barcode",  $search)
            ->select("product.*", "image.name as path")
            ->limit(1)
            ->get();
        
        return view("pos/search", ["data" => $products]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index(){
        $products = DB::table('inventory')
        ->leftJoin("users", "users.id", "=", "inventory.userid")
        ->leftJoin("product", "product.id", "=", "inventory.productid")
        ->leftJoin("image", "product.id", "=", "image.productid")
        ->select("users.name as user","users.created_at as dateadded","product.name", "image.name as path", "inventory.qty")
        ->get();

        return view("inventory/index", ["products" => $products]);
    }

    public function add(Request $request){
        $id = $request->input("id");
        $qty = $request->input("qty");

        try {
            DB::beginTransaction();
            $product = Product::findOrFail($id);
            $newQty=  $product->qty += $qty;
            $product->qty = $newQty;
            $product->save();

            $inventory = array(
                "userid" => Auth::id()
                , "productid" => $product->id
                , "qty" => $qty
            );

            Inventory::create($inventory);

            DB::commit();
            
            die(json_encode(array(
                "added" => true
                , "product" => array(
                    "qty" => $newQty
                )
            )));
        } catch(\Exception $e){
            DB::rollBack();
            die(json_encode(array("added" => false)));
        }
    }
}

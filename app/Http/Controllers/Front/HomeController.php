<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $stores = Store::get();
        $products = Product::get();
        return view("front.index",compact("stores","products"));
    }
    public function product($id){
       $products = Product::where("store_id",$id)->get();
        return view("front.product",compact("products"));
    }
    public function searchProduct(Request $request){
        $products = Product::where('name', 'LIKE', "%{$request->search}%")->get();
        return view("front.product",compact("products"));
    }
    public function showProduct($id){
        $product = Product::where("id",$id)->first();
        return view("front.show_product",compact("product"));
    }

    public function addToCart($id){
        $product = Product::where("id",$id)->first();
        $purchase_price = 0;
        if ($product->flag == 0){
            $purchase_price = $product->discount_price;
        }elseif ($product->flag == 1){
            $purchase_price =  $product->base_price;
        }
        Transaction::create([
            "product_id" => $id,
            "store_id" =>$product->store_id,
            "purchase_price" =>$purchase_price
        ]);
        toastr()->success('Data has been saved successfully!', 'Congrats');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::get();
        return view("control-panel.transaction.index" , compact("transactions"));
    }
    public function report($id){
        $transactions = Transaction::where("id",$id)->first();
        $product = Transaction::where("product_id",$transactions->product_id)->get();
        $product_count = count($product);
        $purchase_price = 0;
        foreach ($product as $price){
            $purchase_price += $price->purchase_price;
        }

        return view("control-panel.transaction.report" , compact("purchase_price","transactions","product_count"));
    }
}

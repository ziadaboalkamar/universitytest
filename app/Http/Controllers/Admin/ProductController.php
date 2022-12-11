<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\StoreRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view("control-panel.product.index" , compact("products"));
    }

    public function create(){
        $stores = Store::select(["name","id"])->get();
        return view('control-panel.product.create',compact("stores"));
    }
    public function store(ProductRequest $request){

        $image = '';
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('product','public');
        }
        Product::create([
            'name' => $request->name,
            'flag' =>$request->flag,
            'discount_price' =>$request->discount_price,
            'base_price' =>$request->base_price,
            'store_id' =>$request->store_id,
            'description' =>$request->description,
            'image' => $image,


        ]);

        return redirect()->route('admin.product.index')->with(['success' => 'تم الحفظ بنجاح']);

    }
    public function edit($id){
        $product = Product::find($id);
        $stores = Store::select(["name","id"])->get();
        if (!$product){
            return redirect()->route('admin.store.index')->with(['error' => 'هذا المتجر غير موجود ']);
        }
        return view('control-panel.product.edit' , compact('product','stores'));
    }
    public function update(ProductRequest $request , $id){
        try {
            $product = Product::find($id);
            if (!$product){
                return redirect()->route('admin.product.index')->with(['error' => 'هذا المتجر غير موجود ']);
            }

            $image = $product->image;
            if($request->hasFile('image') && $request->file('image')->isValid()){
                Storage::disk('public')->delete($image);
                $image = $request->file('image')->store('product','public');
            }
            $product->update([
                'name' => $request->name,
                'flag' =>$request->flag,
                'discount_price' =>$request->discount_price,
                'base_price' =>$request->base_price,
                'store_id' =>$request->store_id,
                'description' =>$request->description,
                'image' => $image]);
            return redirect() ->route('admin.product.index')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return redirect() ->route('admin.product.index')->with(['error' => 'حدث خطاء ما الرجاء المحاولة لاحقا']);

        }
    }

    public function destroy($id){
        try {
            $product= Product::find($id);
            if (!$product){
                return redirect()->route('admin.product.edit' , $id)->with(["error" => "هذا القسم غير موجودو"]);
            }
            $product->delete();
            return redirect()->route('admin.product.index')->with(["success" => "تم حذف المتجر بنجاح"]);
        }catch (\Exception $ex){
            return redirect()->route('admin.product.edit')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }
}

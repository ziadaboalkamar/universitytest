<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $stores = Store::get();
        return view("control-panel.store.index" , compact("stores"));
    }

    public function create(){
        return view('control-panel.store.create');
    }
    public function store(StoreRequest $request){

            $image = '';
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $image = $request->file('image')->store('store','public');
            }
            Store::create([
                'name' => $request->name,
                'address' =>$request->address,
                'logo' => $image,

            ]);

            return redirect()->route('admin.store.index')->with(['success' => 'تم الحفظ بنجاح']);

    }
    public function edit($id){
        $store = Store::find($id);
        if (!$store){
            return redirect()->route('admin.store.index')->with(['error' => 'هذا المتجر غير موجود ']);
        }
        return view('control-panel.store.edit' , compact('store'));
    }
    public function update(StoreRequest $request , $id){
        try {
            $store = Store::find($id);
            if (!$store){
                return redirect()->route('admin.store.index')->with(['error' => 'هذا المتجر غير موجود ']);
            }

            $image = $store->logo;
            if($request->hasFile('image') && $request->file('image')->isValid()){
                Storage::disk('public')->delete($image);
                $image = $request->file('image')->store('store','public');
            }
            $store->update([
                'name' => $request->name,
                'description' =>$request->description,
                'logo' => $image]);





            return redirect() ->route('admin.store.index')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $ex){
            return redirect() ->route('admin.store.index')->with(['error' => 'حدث خطاء ما الرجاء المحاولة لاحقا']);

        }
    }

    public function destroy($id){
        try {
            $store= Store::find($id);
            if (!$store){
                return redirect()->route('admin.store.edit' , $id)->with(["error" => "هذا القسم غير موجودو"]);
            }
            $store->delete();
 return redirect()->route('admin.store.index')->with(["success" => "تم حذف المتجر بنجاح"]);
        }catch (\Exception $ex){
            return redirect()->route('admin.store.edit')->with(["error" => "هناك خطاء ما يرجا المحاولة فيما بعد"]);

        }
    }

}

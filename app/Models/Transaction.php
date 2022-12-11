<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
protected $fillable = ["purchase_price","product_id","store_id"];
public $timestamps = true;
 protected $dates = ['deleted_at'];

    public function stores(){
        return $this->belongsTo(Store::class,"store_id");
    }
    public function products(){
        return $this->belongsTo(Product::class,"product_id");
    }
}

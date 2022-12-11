<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =["flag","discount_price","base_price","store_id","description","name","image"];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    public function stores(){
        return $this->belongsTo(Store::class,"store_id");
    }
}

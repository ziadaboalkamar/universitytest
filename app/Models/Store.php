<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ["logo","address","name"];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}

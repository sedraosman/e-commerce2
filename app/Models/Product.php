<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories;

class Product extends Model
{ use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'brand_id',
        'price',
        'stock',
        'image',
        'description'

    ];
    public function category(){
        return $this ->belongsTo(Category::class);
    }

    public function brand(){
        return $this ->belongsTo(Brand::class);
    }
    //

    protected $casts =
    [
        'price' =>'float',
        'stock' =>'integer',
    ];
}

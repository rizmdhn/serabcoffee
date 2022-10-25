<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_category',
        'product_desc',
        'file_path',
        'harga'

    ];

    public function category_name(){
        return $this->hasOne(Product_category::class, 'id', 'product_category');
    }
}

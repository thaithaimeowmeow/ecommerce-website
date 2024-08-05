<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quanity',
    ];
    //CART  
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    //PRODUCT 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

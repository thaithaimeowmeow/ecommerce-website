<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'paragraph',
        'product_id',
    ];

    //PRODUCT 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

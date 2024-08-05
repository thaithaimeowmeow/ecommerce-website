<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'price',
        'display_price',
        'quanity',
        'cpu',
        'ram',
        'monitor',
        'gpu',
        'storage',
        'os',
        'battery',
        'weight',
    ];
}

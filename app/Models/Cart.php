<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [];
    //USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //ITEMS
    public function cart_items()
    {
        return $this->hasMany(Cart_item::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    //USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //ITEMS
    public function order_items()
    {
        return $this->hasMany(Order_item::class);
    }
}

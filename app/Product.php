<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Cart;

class product extends Model
{
    protected $fillable = [
        'name', 'avatar', 'price', 'SKE', 'stock_quantity'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function order(){
        return $this->belongsToMany(Order::class);
    }
    
    public function cart(){
        return $this->belongsToMany(Cart::class);
    }
}

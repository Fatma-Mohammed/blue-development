<?php

namespace App\Http\Controllers;
use App\product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware();
    }

    public function addProductToCart(Request $request) {
        
        $productToAdd = Product::find(request('product_id'));
        
        if(!Auth::user()->cart) {
            Auth::user()->cart()->create();
        }

        $productInCart = Auth::user()->cart->products->find($productToAdd);
        
        if($productInCart) {
            productInCart
        }

        Auth::user()->cart->products()->attach($productToAdd);
    }

    public function removeProductFromCart() {

        $productToAdd = Product::find(request('product_id'));

        Auth::user()->cart->products()->detach($productToAdd);
    }
}

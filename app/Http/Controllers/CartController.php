<?php

namespace App\Http\Controllers;
use App\product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    /**
     * CartController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addProductToCart(Request $request) {
//        dd(request());

        $productToAdd = Product::find(request('product_id'));

        if(!Auth::user()->cart()) {
            Auth::user()->cart()->create();
        }

        $productInCart = Auth::user()->cart()->products()->where('product_id', '=', request('product_id'))->first();
        //->pivot->quantity;

        if($productInCart) {
//            productInCart
        }

        Auth::user()->cart->products()->attach($productToAdd);
    }

    public function removeProductFromCart() {

        $productToAdd = Product::find(request('product_id'));

        Auth::user()->cart->products()->detach($productToAdd);
    }
}

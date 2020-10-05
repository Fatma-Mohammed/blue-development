<?php

namespace App\Http\Controllers;

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

    public function show(Request $request){

        return view('cart',[
            'products' => Auth::user()->cart->products
        ]);

    }

    public function addProductToCart(Request $request)
    {
        $userCart = Auth::user()->cart;

        // if user doesn't have a cart, create one
        if (!$userCart) {
            Auth::user()->cart()->create();
        }

        $cartProduct = $userCart->products()->find(request('product_id'));

        if ($cartProduct) {

            $productQuantity = $cartProduct->pivot->quantity;

            $userCart->products()->updateExistingPivot(
                request('product_id'),
                ['quantity' => $productQuantity + 1]
            );

        } else {
            $userCart->products()->attach(request('product_id'), ['quantity' => 1]);
        }
        return redirect('home');

    }

    public function removeProductFromCart()
    {
        Auth::user()->cart->products()->detach([request('product_id')]);
    }

    public function updateProductQuantity()
    {
        if (request('quantity') === 0) {
            $this->removeProductFromCart();
        }

        Auth::user()->cart->products()->updateExistingPivot(
            request('product_id'),
            ['quantity' => request('quantity')]
        );
    }
}

<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(request('product')){
            $products = Product::where([['name', 'LIKE', '%' . request('product'). '%']])->get();
        }
        else{
            $products = Product::all();
        }
        
        return view('home',[
            'products' => $products,

        ]);
    }
}

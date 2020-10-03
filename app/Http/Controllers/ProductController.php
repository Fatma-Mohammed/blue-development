<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function create(){

      
        return view('products/create');
   
   }

   public function store(Request $request)
   {

        // $attributes['avatar'] = request('avatar')->store('avatars');
       Product::create([
           'name' => $request->name,
           'avatar' => $request->avatar->store('avatars'),
       ]);
       return redirect()->route("home");
   }
}

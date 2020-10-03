<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Gate;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', [
            'products' => $products,
        ]);
    }
    public function create(){

        if (Gate::allows('isAdmin')) {

            return view('products/create');
    
        } else {
    
            dd('You are not Admin');
    
        }
    
        
   
   }

   public function store(Request $request)
   {

    if (Gate::allows('isAdmin')) {

        Product::create([
            'name' => $request->name,
            'avatar' => $request->avatar->store('avatars'),
        ]);
        return redirect()->route("home");

    } else {

        dd('You are not Admin');

    }
        

   }

   public function destroy(Request $request)
   {
       $productId = $request->product;
       $product = product::find($productId);
       $product->delete();

       return redirect()->route("posts.index");
   }

   public function edit(Request $request)
   {

       $productId = $request->product;
       $product = Product::find($productId);
       return view('products/edit', [
           'product' => $product,

       ]);
   }
   public function update(Request $request)
   {   
            
       $product = $request->only(["name","avatar"]); 
       Product::find($request->product)->update($product);
           
       return redirect()->route('home');
   }
}

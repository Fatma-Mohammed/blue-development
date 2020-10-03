<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function show(Request $request)
    {
        $productId = $request->product;
        $product = Product::find($productId);
        return view('products.show', [
            'product' => $product,

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
            'price' => $request->price
        ]);
        return redirect()->route("products");

    } else {

        dd('You are not Admin');

    }
        

   }

   public function destroy(Request $request)
   {
       $productId = $request->product;
       $product = product::find($productId);
       $product->delete();

       return redirect()->route("products");
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
    $product = $request->only(["name","avatar","price"]);
    
    if($request->avatar){
         $request->avatar->move(public_path('storage/avatars'), $request->avatar->getClientOriginalName());
         $product['avatar'] = 'avatars/' . $request->file('avatar')->getClientOriginalName();
    }
            
        
       Product::find($request->product)->update($product);
           
       return redirect()->route('products');
   }
}

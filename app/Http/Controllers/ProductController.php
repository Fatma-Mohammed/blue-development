<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\brand;
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

        // if (Gate::allows('isAdmin')) {

            return view('products/create',[
                'categories' => Category::all(),
                'brands' => Brand::all()

            ]);
    
        // } else {
    
        //     dd('You are not Admin');
    
        // }

   }

   public function store(Request $request)
   {

    // if (Gate::allows('isAdmin')) {

        $product = Product::create([
            'name' => $request->name,
            'avatar' => $request->avatar->store('avatars'),
            'price' => $request->price,
            'SKE' => $request->SKE,
            'stock_quantity' => $request->stock_quantity
        ]);

        $product->categories()->attach(request('category'));
        $product->brands()->attach(request('brand'));

        return redirect()->route("products");

    // } else {

    //     dd('You are not Admin');

    // }
        

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
           'categories' => Category::all(),
            'brands' => Brand::all()


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

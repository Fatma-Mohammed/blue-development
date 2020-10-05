<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\brand;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
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
        $categories = $product->categories;
        $brands = $product->brands;
        return view('products.show', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands

        ]);
    }
    public function create(){



            return view('products/create',[
                'categories' => Category::all(),
                'brands' => Brand::all()

            ]);
    

   }

   public function store(Request $request)
   {
    
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'avatar' => 'required|image|max:500',
        'price' => 'required|numeric',
        'SKE' => 'required|numeric',
        'stock_quantity' => 'required|numeric'
    ]);

    if ($validator->fails()) {
        return redirect(route('product.create'))
                    ->withErrors($validator)
                    ->withInput();
    }


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
    $product = $request->only(["name","avatar","price",'SKE','stock_quantity','category','brand']);
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'avatar' => 'required|image|max:500',
        'price' => 'required|numeric',
        'SKE' => 'required|numeric',
        'stock_quantity' => 'required|numeric'
    ]);

    if ($validator->fails()) {
        return redirect('/products/'.$request->product.'/edit')
                    ->withErrors($validator)
                    ->withInput();
    }
    if($request->avatar){
         $request->avatar->move(public_path('storage/avatars'), $request->avatar->getClientOriginalName());
         $product['avatar'] = 'avatars/' . $request->file('avatar')->getClientOriginalName();
    }
            
        
       Product::find($request->product)->update($product);
           
       return redirect()->route('products');
   }
}

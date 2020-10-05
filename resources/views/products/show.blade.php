@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8 offset-2 mb-4">
    <div class="card">
      <div class="card-header">
        Product Info
      </div>
      <div class="card-body">
        <h5 class="card-title"><span>
            <b>Name: </b>
          </span>{{$product->name}}</h5>
      </div>
      <img src="/storage/{{$product->avatar}}">
      <h4>Price: ${{$product->price}}</h4>
      <h5>Brands: @foreach($brands as $brand)
        <span> {{$brand->name}} </span>
        @endforeach
      </h5>
      <h5>Categories: @foreach($categories as $cat)
        <span> {{$cat->name}} </span>
        @endforeach
      </h5>
      <h5>Available in stock: {{$product->stock_quantity}}</h5>
      <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
          <div class="ratings-cart">
            @if($product->stock_quantity > 0)

            <form action="{{ route('cart.add', $product->id) }}" method="post" class="cart">
              @csrf
              <input type="hidden" value="{{$product->id}}" name="product_id">
              <input type="submit" value="">
            </form>

            @else
            <div class="cart-out">
              <p style="margin-top:10px">out of stock<p>

            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
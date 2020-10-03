@extends('layouts.app')

@section('content')

<div class='hero-container'>

  <h1>Blue Shop</h1>
  <p>What are you waiting for?</p>
  <div class='hero-btns'>
    <a class='btns btn--outline btn--large' href="#products">
      GET STARTED
    </a>

  </div>
</div>

<div id="products" class="row">
  @foreach($products as $product)
  <div class="card-container col-md-4">
    <div class="single-product-wrapper">
      <!-- Product Image -->
      <div class="product-img img-fluid">


        <a href="{{route('product.show',['product'=>$product->id])}}">
          @if($product->avatar)
          <img src="{{ asset('storage/'.$product->avatar) }}" class="avatar">
          @else
          <img class="avatar" src="https://www.nsenergybusiness.com/wp-content/themes/goodlife-wp-child/assets/img/no_image_available.jpg" />

          @endif
        </a>


      </div>

      <!-- Product Description -->
      <div class="product-description d-flex align-items-center justify-content-between">
        <!-- Product Meta Data -->
        <div class="product-meta-data">


          <div class="line"></div>
          <p class="product-price"> {{$product->price}} <span style="font-size:17px;color:#ffa45c">$<span></span></span></p>
          <div class="product-name">{{$product->name}}</div>

        </div>

         <!-- Cart -->
        
            <div class="ratings-cart text-right">
            @if($product->stock_quantity > 0)
                <div class="cart">
                
                <a href=""><img src='/imgs/bag.png'/></a>
                </div>
                @else
                <div class="cart-out">
                <p style="margin-top:10px">out of stock<p>

                </div>
                @endif
            </div>
          

      </div>
    </div>
  </div>
  @endforeach
</div>


@endsection
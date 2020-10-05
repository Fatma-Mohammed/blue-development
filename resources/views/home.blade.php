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

@if(Auth::user() && !Auth::user()->email_verified_at === '')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-info">
        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

        <div class="card-body">
          @if (session('resent'))
          <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
          </div>
          @endif

          {{ __('Before proceeding, please check your email for a verification link.') }}
          {{ __('If you did not receive the email') }},
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

<div class="row justify-content-center">
  @if(session('message'))
  <div class="alert alert-info">{{session('message')}}</div>
  @endif
</div>

<div id="products" class="row">

  @foreach($products as $product)

  <div class="card-container col-md-4">
    <div class="single-product-wrapper">
      <!-- Product Image -->
      <div class="product-img img-fluid">


        <a href="{{route('product.show',['product'=>$product->id])}}">
          @if($product->avatar)
          <img src="/storage/{{$product->avatar}}" class="avatar">
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
  @endforeach
</div>

@endsection
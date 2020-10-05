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
    </div>
  </div>
</div>

@endsection
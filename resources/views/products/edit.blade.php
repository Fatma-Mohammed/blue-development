@extends('layouts.app')

@section('content')

<div class="container">
  <form method="POST" action="{{route('product.update',['product'=>$product->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$product->name}}">
    </div>

    <div class="form-group">
      <label >Price</label>
      <input type="number" class="form-control" id="exampleInputEmail1" name="price" value="{{$product->price}}">
    </div>

    <div class="row">
      <div class="col-md-6">
        <input type="file" name="avatar" id="avatar">
      </div>
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>


@endsection
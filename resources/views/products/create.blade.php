@extends('layouts.app')

@section('content')

<div class="container">
  <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label >Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name">
    </div>

    <div class="form-group">
      <label >Price</label>
      <input type="number" class="form-control" id="exampleInputEmail1" name="price">
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
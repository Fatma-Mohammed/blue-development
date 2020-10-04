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
      <label>Quantity in stock</label>
      <input type="number" class="form-control" id="exampleInputEmail1" name="stock_quantity" value="{{$product->stock_quantity}}">
      <label>SKE</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="SKE" value="{{$product->SKE}}">
    </div>

    <div class="row">
      <div class="col-md-6">
        <input type="file" name="avatar" id="avatar">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Select categories:  </label>
          <select name='category[]' multiple>
            @foreach($categories as $category)
            <option value="{{$category->id}}" {{in_array($category->id,$product->pluck('id')->toArray()) ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

    <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Select brands:  </label>
          <select name='brand[]' multiple>
            @foreach($brands as $brand)
            <option value="{{$brand->id}}"  id="exampleFormControlSelect1" {{in_array($brand->id,$product->pluck('id')->toArray()) ? 'selected' : ''}}>{{$brand->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>


@endsection
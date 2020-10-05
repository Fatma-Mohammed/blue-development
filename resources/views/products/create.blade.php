@extends('layouts.app')

@section('content')

<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name">
    </div>

    <div class="form-group">
      <label>Price</label>
      <input type="number" class="form-control" id="exampleInputEmail1" name="price">
      <label>Quantity in stock</label>
      <input type="number" class="form-control" id="exampleInputEmail1" name="stock_quantity">
      <label>SKE</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="SKE">
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
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

    <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Select brands:  </label>
          <select name='brand[]' multiple>
            @foreach($brands as $brand)
            <option value="{{$brand->id}}"  id="exampleFormControlSelect1">{{$brand->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>


@endsection
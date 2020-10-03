@extends('layouts.app')

@section('content')

<div class="container">
<form method="POST"  action="{{route('product.store')}}" enctype="multipart/form-data">
@csrf 
<div class="form-group">
    <label for="exampleInputEmail1" >Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
  </div>

  </div>

    <div class="row">
        <div class="col-md-6">
            <input type="file" name="avatar" id="avatar">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-info">Upload</button>
        </div>
    </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>


@endsection
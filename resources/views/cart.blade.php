@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    
      
        
        <div class="container m-5">
          <a href="{{route('product.create')}}" class="btn btn-success mb-5">Create Product</a>
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th colspan="3">Action</th>

              </tr>
            </thead>
            <tbody>
            @if($products)
              @foreach($products as $product)
              <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td><a href="{{route('product.show',['product'=>$product->id])}}" class="btn btn-secondary btn-sm">view</a>
                <td><a href="{{route('product.edit',['product'=>$product->id])}}" class="btn btn-secondary btn-sm">Edit</a></td>
                <td>
                  <form method="POST" action="{{route('product.destroy',['product' => $product->id])}}">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure that you want to delete this product ?')">
                      Delete </button>
                  </form>
                </td>
              </tr>
              @endforeach
              @else
              <h1>Your cart is empty</h1>
              @endif
            </tbody>
          </table>

        </div>


      
    
  </div>
</div>
@endsection
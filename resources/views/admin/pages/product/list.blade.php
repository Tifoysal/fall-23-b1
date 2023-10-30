@extends('admin.master')


@section('content')

<h1>Product List</h1>


<a href="{{route('product.create')}}" class="btn btn-primary">Create New Product</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Brand</th>
      <th scope="col">Product Category</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Stock</th>
      <th scope="col">Product Status</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($products as  $key=>$product)
  <tr>
      <th scope="row">{{$key+1}}</th>
      <!-- <th scope="row">{{$product->id}}</th> -->
      <td>{{$product->name}}</td>
      <td>{{$product->brand_id}}</td>
      <td>{{$product->category_id}}</td>
      <td>image here</td>
      <td>{{$product->price}} .BDT</td>
      <td>{{$product->stock}}</td>
      <td>{{$product->status}}</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a  class="btn btn-danger" href="">Delete</a>
        <a  class="btn btn-primary" href="">Edit</a>
      </td>
    </tr>

  @endforeach
   
   
  </tbody>
</table>
{{ $products->links() }}

@endsection
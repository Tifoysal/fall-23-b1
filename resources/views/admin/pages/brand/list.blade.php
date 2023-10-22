
@extends('admin.master')


@section('content')

<a href="{{route('brand.create')}}" class="btn btn-success">Create new brand</a>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($brands as $brand)
  

    <tr>
      <th scope="row">{{ $brand->id }}</th>
      <td>{{$brand->name}}</td>
      <td>{{$brand->status}}</td>
      <td>
        <a class="btn btn-success" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
        </td>
    </tr>

    @endforeach
    
  </tbody>
</table>
@endsection
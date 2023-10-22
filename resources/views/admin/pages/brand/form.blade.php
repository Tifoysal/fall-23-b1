@extends('admin.master')

@section('content')

<h1>Create new brand</h1>

<form action="{{route('brand.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="">Enter Brand Name</label>
    <input name="brand_name" type="text" class="form-control" id=""  placeholder="Enter brand name">
  </div>

  <div class="form-group">
    <label for="">Upload logo</label>
    <input type="file" class="form-control" id=""  placeholder="logo">
  </div>


  <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
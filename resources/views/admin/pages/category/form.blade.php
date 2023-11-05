@extends('admin.master')

@section('content')

<form action="{{route('category.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="">Enter Category Name:</label>
    <input required type="text" class="form-control" id="" placeholder="Enter name" name="category_name">
  </div>

  <div class="form-group">
  <label for="">Enter Category Description:</label>
   <textarea class="form-control" name="category_description" id="" cols="30" rows="10"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
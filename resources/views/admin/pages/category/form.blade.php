@extends('admin.master')

@section('content')

<form>
  <div class="form-group">
    <label for="">Enter Category Name:</label>
    <input type="text" class="form-control" id="" placeholder="Enter name">
   
  </div>

  <div class="form-group">
  <label for="">Enter Category Description:</label>
   <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
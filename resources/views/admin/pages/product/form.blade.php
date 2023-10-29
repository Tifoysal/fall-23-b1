@extends('admin.master')

@section('content')


<h1>Create new product</h1>



<form action="" method="post">
    @csrf
  <div class="form-group">
    <label for="">Enter Product Name:</label>
    <input type="text" class="form-control" id="" placeholder="Enter name" name="category_name">
  </div>

  <div class="form-group">
    <label for="">Select Brand:</label>
   <select class="form-control" name="" id="">

    @foreach ($brands as $brand)
    <option value="">{{$brand->name}}</option>
    @endforeach

   </select>
  </div>

  <div class="form-group">
    <label for="">Select Category:</label>
   <select class="form-control" name="" id="">

    @foreach ($categories as $cat )
    <option value="">{{$cat->name}}</option>
    @endforeach
   
   </select>
  </div>

  <div class="form-group">
    <label for="">Enter Price: </label>
    <input type="number" class="form-control" placeholder="Enter price">
  </div>

  <div class="form-group">
    <label for="">Enter Stock: </label>
    <input type="number" class="form-control" placeholder="Enter Stock">
  </div>


  <div class="form-group">
    <label for="">Upload Image: </label>
    <input type="file" class="form-control">
  </div>


  <div class="form-group">
  <label for="">Enter Product Description:</label>
   <textarea class="form-control" placeholder="Enter product short description" name="product_description" id="" cols="30" rows="5"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
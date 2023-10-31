@extends('admin.master')

@section('content')


<h1>Create new product</h1>



<form action="{{route('product.store')}}" method="post">
   @csrf
  <div class="form-group">
    <label for="">Enter Product Name:</label>
    <input required type="text" class="form-control" id="" placeholder="Enter name" name="product_name">
    @error('product_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="">Select Brand:</label>
   <select required class="form-control" name="brand_id" id="">

    @foreach ($brands as $brand)
    <option value="{{$brand->id}}">{{$brand->name}}</option>
    @endforeach

   </select>
  </div>

  <div class="form-group">
    <label for="">Select Category:</label>
   <select required class="form-control" name="category_id" id="">

    @foreach ($categories as $cat )
    <option value="{{$cat->id}}">{{$cat->name}}</option>
    @endforeach
   
   </select>
  </div>

  <div class="form-group">
    <label for="">Enter Price: </label>
    <input required type="number" class="form-control" placeholder="Enter price" name="product_price">
    
    @error('product_price')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  </div>

  <div class="form-group">
    <label for="">Enter Stock: </label>
    <input required type="number" class="form-control" placeholder="Enter Stock" name="product_stock">
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
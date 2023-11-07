@extends('admin.master')

@section('content')


<h1>Create new User</h1>





<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">

        @if(session()->has('myError'))
        <p class="alert alert-danger">{{session()->get('myError')}}</p>
        @endif

        @if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
        @endif

   @csrf
  <div class="form-group">
    <label for="">Enter User Name:</label>
    <input required type="text" class="form-control" id="" placeholder="Enter name" name="user_name">
    @error('user_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="">Select Role:</label>
   <select required class="form-control" name="role" id="">
        <!-- <option value="">Admin</option> -->
        <option value="manager">Manager</option>
        <option value="account">Account</option>
   </select>
  </div>




  <div class="form-group">
    <label for="">Enter Email: </label>
    <input required type="email" class="form-control" placeholder="Enter Email" name="user_email">
    
    @error('user_email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  </div>



  <div class="form-group">
    <label for="">Enter Password: </label>
    <input required type="password" class="form-control" placeholder="Enter password" name="user_password">
    
    @error('user_password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  </div>


  <div class="form-group">
    <label for="">Upload Image: </label>
    <input name="user_image" type="file" class="form-control">
  </div>


  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
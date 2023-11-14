@extends('frontend.master')


@section('content')

<form action="{{route('customer.store')}}" method="post">
    @csrf

<div class="form-group">
    <label for="name">Name:</label>
    <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name">
   
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
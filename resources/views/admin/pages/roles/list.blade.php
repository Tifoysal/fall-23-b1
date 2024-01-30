@extends('admin.master')

@section('content')
<h1>Roles List</h1>

<a href="{{route('roles.form')}}" class="btn btn-success">Create New Roles</a>
@include('admin.partials.message');
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

@foreach ($roles as $key=>$role)
<tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$role->name}}</td>
      <td>{{$role->description}}</td>
      <td>{{$role->status}}</td>
      <td>
      <a href="{{route('roles.assign',$role->id)}}" class="btn btn-primary">Assign</a>
        <a href="" class="btn btn-success">View</a>
        <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('roles.delete',$role->id) }}" onclick="return confirm('Are You sure want to delete?')" class="btn btn-danger">Delete</a>
      </td>
    </tr>
@endforeach



  </tbody>
</table>
@endsection

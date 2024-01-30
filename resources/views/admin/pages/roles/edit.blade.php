@extends('admin.master')

@section('content')

<form action="{{route('roles.edit',['id' => $getRecord->id])}}" method="post">
    @csrf
    @include('admin.partials.message')
  <div class="form-group">
    <label for=""> Roles Name:</label>
    <input  type="text" class="form-control" id="" placeholder="Enter name" name="name" value="{{ $getRecord->name }}">
  </div>

  <div class="form-group">
  <label for=""> Roles Description:</label>
   <textarea class="form-control"  name="description"   id="" cols="30" rows="10">{{ $getRecord->description }}</textarea>
  </div>
  <div class="form-group">
    <label for="status">Status </label>
    <select name="status" id="status" class="form-control" required>
        <option value="">Select Status</option>
        <option {{($getRecord->status)== 'active' ? 'selected' :''}} value="active">Active</option>
        <option {{($getRecord->status)== 'inactive' ? 'selected' :''}} value="inactive">Inactive</option>

    </select>

 </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection

@extends('admin.master')

@section('content')

<form action="{{route('roles.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="">Enter Roles Name:</label>
    <input required type="text" class="form-control" id="" placeholder="Enter name" name="name">
  </div>

  <div class="form-group">
  <label for="">Enter Roles Description:</label>
   <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <label for="status">Status </label>
    <select name="status" id="status" class="form-control" required>
        <option value="">Select Status</option>
        <option {{old('status')== 'active' ? 'selected' :''}} value="active">Active</option>
        <option {{old('status')== 'inactive' ? 'selected' :''}} value="inactive">Inactive</option>

    </select>

 </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

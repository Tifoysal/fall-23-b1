@extends('admin.master')

@section('content')
<div class="container">
    <h1>Assign Permission for {{$role->name}}</h1>
    @php 
    $role_permissions=$role->permissions->pluck('permission_id')->toArray();
    @endphp
    

    <!-- 


    $role->permission=['20','21'];
    collection (20,21)
    1,2,3,4,5,6......20,21
     -->
    <div class="row">
        <div class="col">
            <form action="{{route('assign.permission',$role->id)}}" method="post">
               @csrf
            @foreach($all_permission as $permission)
            <div class="form-check">
                <input 
                @if(in_array($permission->id,$role_permissions))
                checked
                @endif
                  name="permissions[]" class="form-check-input" type="checkbox" value="{{$permission->id}}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{$permission->name}}  
                </label> 
            </div>
            @endforeach
            <button class="btn btn-success" type="submit">Submit</button>
            </form>

            
        </div>
    </div>
</div>

@endsection
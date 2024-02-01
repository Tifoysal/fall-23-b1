@extends('admin.master')

@section('content')
<div class="container">
    <h1>Assign Permission for {{$assign->name}}</h1>
    <div class="row">
        <div class="col">
            @foreach($permissions as $permission)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$permission->id}}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{$permission->name}}  
                </label> 
            </div>
            @endforeach

            
        </div>
    </div>
</div>

@endsection
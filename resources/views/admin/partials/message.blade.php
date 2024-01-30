@if(session()->has('myError'))
<p class="alert alert-danger">{{session()->get('myError')}}</p>
@endif

@if(session()->has('message'))
<p class="alert alert-success">{{session()->get('message')}}</p>
@endif

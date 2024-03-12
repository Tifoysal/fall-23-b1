@extends('admin.master')

@section('content')



<button class="btn btn-success" onclick="printContent('printDiv')">Print</button>


<div id="printDiv">

<h1>Customer List</h1>
@include('admin.partials.message');
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $key=>$customer)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$customer->name}}</td>
        <td>
            <img style="border-radius: 60px;" width="7%" src="{{url('/uploads/'.$customer->image)}}" alt="">
        </td>
        <td>{{$customer->email}}</td>
        <td>
            <a class="btn btn-success" href="">View</a>
            <a class="btn btn-warning" href="">Edit</a>
            <a  class="btn btn-danger"href="">Delete</a>
        </td>

    </tr>

    @endforeach





  </tbody>
</table>


</div>



@endsection


@push('yourJsCode')

<script type="text/javascript">

      function printContent(el){
          var restorepage = $('body').html();
          var printcontent = $('#' + el).clone();
          $('body').empty().html(printcontent);
          window.print();
          $('body').html(restorepage);
      }

  </script>
@endpush

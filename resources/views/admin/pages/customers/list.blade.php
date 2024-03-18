@extends('admin.master')

@section('content')



<button class="btn btn-success" onclick="printContent('printDiv')">Print</button>


<div id="printDiv">

<h1>Customer List</h1>
@include('admin.partials.message');

<table class="table" id="customarDataTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
  </tbody>
</table>


</div>



@endsection


@push('yourJsCode')

<script type="text/javascript">
    $(function () {
          var table = $('#customarDataTable').DataTable({
              processing: true,
              serverSide: false,
              ajax: "{{ route('customers.list.datatable') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'email', name: 'email'},
                  {data: 'action', name: 'action'},
              ]
          });
        });
</script>





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

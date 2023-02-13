@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></link>


<div class="pt-5">
<table id="module_table" class="table ">
  <thead>
    <tr>
      <th>ID</th>
      <th>Serial-Number</th>
      <th>Info</th>
      <th>Status</th>
    
    </tr>
  </thead>
</table>
<div>
  <script type="text/javascript">
 $(document).ready(function() {
    $('#module_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "/modules",
        "columns": [
            { "data": "id" },
            { "data": "serial_number" },
            { "data": "info" },
            { "data": "status" }
        ],
    });
});

</script>
@endsection
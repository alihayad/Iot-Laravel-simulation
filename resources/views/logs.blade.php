@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></link>

<div class="pt-5">
<table id="module_table" class="table ">
  <thead>
    <tr>
      <th>Module-ID</th>
      <th>Status</th>
      <th>Info</th>
      <th>Since</th>
      <th>Date</th>
    
    </tr>
  </thead>
</table>
<div>
<script type="text/javascript">
 $(document).ready(function() {
    $('#module_table').DataTable({
        "order": [[4, 'desc']],
        "processing": true,
        "serverSide": true,
        "ajax": "/logs/data",
        "columns": [
            { "data": "module_id" },
            { "data": "status" },
            { "data": "info" },
            { "data": "timePassed" },
            { "data": "created_at" }
        ],
    });
});

</script>
@endsection
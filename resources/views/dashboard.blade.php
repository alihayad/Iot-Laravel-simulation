@extends('layouts.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<div class="container-fluid">
    <h1 class="text-center mt-5">Module Operating Status</h1>
    <div class="row mt-5">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header">
            Current Measured Value
          </div>
          <div class="card-body">
            <h5 class="card-title" id="current-value">0</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header">
            Operating Time
          </div>
          <div class="card-body">
            <h5 class="card-title" id="operatingTime">0</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header">
            Number of Data Sent
          </div>
          <div class="card-body">
            <h5 class="card-title" id="dataSent">0</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-2">
        <div class="card">
          <div class="card-header">
            ID
          </div>
          <div class="card-body">
            <h5 class="card-title" id="moduleId">{{$module->id}}</h5>
          </div>
        </div>
      </div>
      
      <div class="col-sm-2">
        <div class="card">
          <div class="card-header">
            Serial Number
          </div>
          <div class="card-body">
            <h5 class="card-title" id="moduleSerialNumber">{{$module->serial_number}}</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card">
          <div class="card-header">
            Operating Status
          </div>
          <div class="card-body">                      
            <h5 class="card-title" id="operatingStatus">{{$module->status==1?"Active":"Inactive"}}</h5>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            Info
          </div>
          <div class="card-body">
            <h5 class="card-title" >{{$module->info}}</h5>
          </div>
        </div>
      </div>
  <div class="row mt-5">
    
      
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Module Data
          </div>
          <div class="card-body">
            <canvas id="ModuleGraph"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<script> let id = {{ $module->id }};// get the id of the module </script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
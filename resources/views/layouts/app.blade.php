<!DOCTYPE html>
<html lang="en">
<head>
<!-- using vite to compile  js files -->
@vite(['resources/scss/app.scss', 'resources/js/app.js'])   
<!-- //sweetalert2 for notification when a module is down -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">WEBREATH</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">All Modules</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#newModuleModal">Add Module</a>
        </li>
       
      </ul>
      <a class="nav-link" href="{{route('module.logs')}}">Logs ({{$logsUnviewedCount}})</a>
    </div>
  </div>
</nav>
<div class="container">
            @yield('content')
        </div>
   
<!-- Bootsrap Modal -->

<div class="modal fade" id="newModuleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLabel">Add New Module</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="formResult"></div>
      <div class="modal-body">
      <form action="/submit" method="post" class="p-5" id="createModuleForm">
    @csrf
    <div class="form-group">
      <label for="serial_number">Serial Number:</label>
      <input type="text" class="form-control create-module-inputs" id="serial_number" name="serial_number" required>
    </div>
    <div class="form-group">
      <label for="info">Information:</label>
      <textarea class="form-control create-module-inputs" id="info" name="info" rows="3" required></textarea>
    </div>
    <div class="form-group">
      <label for="status">Status:</label>
      <select class="form-control" id="status" name="status">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
    </div>
    
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
</script>
</body>
</html>
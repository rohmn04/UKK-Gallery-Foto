<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
  <script src="assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Gallery foto</title>
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom styles for this template -->
  <link href="assets/css/cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto bg">
      <div>
        <h3 class="float-md-start mb-0">Memories Gallery</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="#">Home</a>
          <a class="nav-link fw-bold py-1 px-0" href="/login">Login</a>
          <a class="nav-link fw-bold py-1 px-0" href="/register">Register</a>
        </nav>
      </div>
    </header>

    <main class="px-3 bg">
      <h1>Foto Gallery</h1>
      <p class="lead">Hubungkan momen - momen berharga anda menjadi sebuah cerita.</p>
      <p class="lead">
        <a href="/register" class="btn btn-lg btn-light fw-bold border-white bg-white">Daftar!</a>
      </p>
    </main>

    <footer class="mt-auto text-white-50">
      <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a><a href="https://twitter.com/mdo" class="text-white"></a>.</p>
    </footer>
  </div>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  
@include('sweetalert::alert')


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Set the options that I want
toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "8000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
$(document).ready(function onDocumentReady() {  
  @if(session()->has('success'))
    toastr.success("{{session('success')}}");
   @endif
   @if(session()->has('error'))
    toastr.error("{{session('error')}}");
   @endif
});
</script>
</body>

</html>
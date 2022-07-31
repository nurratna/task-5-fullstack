<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('title')

  <link rel="manifest" href="{{ asset('manifest.json') }}"> 
  
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

  @yield('css_tambahan')

</head>

<body id="page-top">
  <div id="wrapper">

    @if(!Route::is('check-device'))
    @include('layouts.sidebar')
    @endif
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @if(!Route::is('check-device'))
        @include('layouts.header')
        @endif
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          @yield('breadcrumbs')

          @yield('content')

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="#" target="_blank">Nur Ratna Sari</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>
  <script src="{{asset('assets/vendor/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

  <script>
    $(function () {
        bsCustomFileInput.init();
    });
    
</script>

  @yield('js_tambahan')

</body>

</html>
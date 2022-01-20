<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>companies and employees</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}"/>
  <!-- toastr-->
  <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css') }}">

  <link rel="stylesheet" href="{{ url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css") }}">
  <!-- adminlte-->
  <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0-rc/css/adminlte.min.css') }}">
  <!--all.min.css-->
  <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
  @yield('addCss')
</head>

<body class="hold-transition sidebar-mini layout-fixed dark-mode">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center"></div>

  {{-- header --}}
  <x-header/>
  {{-- navbar --}}
  <x-side-bar/>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          @yield('title')
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @yield('content')
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>
      Copyright &copy; 2021
      <a href="/" class="text-primary">P<strong class="text-danger mx-0 px-0">@</strong>NTAS<small
            class="text-danger">tis</small></a>
    </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js') }}">
</script>
<!-- ChartJS -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0-rc/js/adminlte.min.js') }}"></script>

<script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js') }}"></script>

<script>
  $(function () {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    @if (session('status'))
    Toast.fire({
      icon: 'info',
      title: @json(session('status')),
      background: 'gray'
    })
    @endif

    @if (session()->has('success'))
    Toast.fire({
      icon: 'success',
      title: @json(session('success')),
      background: 'gray'
    })
    @endif

    @if (session()->has('info'))
    Toast.fire({
      icon: 'info',
      title: @json(session('info')),
      background: 'gray'
    })
    @endif

    @if (session()->has('warning'))
    Toast.fire({
      icon: 'warning',
      title: @json(session('warning')),
      background: 'gray'
    })
    @endif

    @if (session()->has('danger'))
    Toast.fire({
      icon: 'error',
      title: @json(session('danger')),
      background: 'gray'
    })
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    Toast.fire({
      icon: 'error',
      title: @json($error),
      background: 'gray'
    })
    @endforeach
    @endif
  });

  if (window.location.search) {
    $(".paginator-prev, .paginator-next").attr("href", (idx, attr) => {
      const page = (new URL(attr)).searchParams.get('page');
      const url = new URL(window.location);
      const newParams = url.searchParams;
      newParams.set("page", page);
      return "?" + newParams.toString();
    })
  }
</script>
@yield('addJs')
</body>

</html>

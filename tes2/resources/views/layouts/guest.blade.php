<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('meta')
  <title>companies and employees</title>

  <link rel="icon" type="image/x-icon" href="{{ asset("logo.png") }}"/>
  <!-- toastr-->
  <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css') }}">
  <!-- adminlte-->
  <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css') }}">
  <!--all.min.css-->
  <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}"
        rel="stylesheet">
  @yield('addCss')
</head>

<body class="hold-transition login-page bg-grad-horizontal">
@yield('content')

<!-- jQuery -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js') }}">
</script>
<!-- ChartJS -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js') }}"></script>

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
      icon: 'success',
      title: @json(session('status'))
    })
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    Toast.fire({
      icon: 'error',
      title: @json($error)
    })
    @endforeach
    @endif
  });
</script>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>
@yield('addJs')
</body>

</html>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html  class="no-js"  lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="apple-touch-icon" href="apple-icon.png"> -->
    <link rel="shortcut icon" href="{{asset('src/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('src/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/vendors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" href="{{asset('src/vendors/chosen/chosen.min.css')}}">

    @yield('css')

    <link rel="stylesheet" href="{{asset('src/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class="bg-dark">




  <div class="sufee-login d-flex align-content-center flex-wrap">
      <div class="container">
          <div class="login-content">
              <div class="login-form">
                      <form method="POST" action="{{ route('login') }}">
                        <div class="form-group">
                            <label>ชื่อผู้ใช้งาน</label>
                              <input id="studentcode" type="studentcode" class="form-control @error('studentcode') is-invalid @enderror" name="studentcode" value="{{ old('studentcode') }}" required  autofocus>
                              @error('studentcode')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('เข้าสู่ระบบ') }}
                        </button>
                    </form>
                </div>


              </div>
          </div>
      </div>



    <!-- Right Panel -->

    <script src="{{asset('src/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('src/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('src/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('src/assets/js/main.js')}}"></script>

    <script src="{{asset('src/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('src/vendors/jquery-validation-unobtrusive/src/jquery.validate.unobtrusive.js')}}"></script>



    <script src="{{asset('src/vendors/chosen/chosen.jquery.min.js')}}"></script>
    <!-- <script src="{{asset('src/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('src/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('src/assets/js/widgets.js')}}"></script>
    <script src="{{asset('src/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('src/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('src/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script> -->

</body>

</html>

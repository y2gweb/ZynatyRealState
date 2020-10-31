<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Zynaty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    @include('auth/Includes/css')

</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('/') }}" class="text-dark"><i class="fa fa-home fa-3x"></i></a>
    </div>
    @yield('content')

    <!-- JAVASCRIPT -->
    @include('auth/Includes/js')
</body>

</html>

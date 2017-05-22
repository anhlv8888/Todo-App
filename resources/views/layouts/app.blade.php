<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ajax Todo App|login</title>
    <!-- goole font -->
    <link href="https://fonts.googleapis.com/css?family=Khula:400,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('plugin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugin/icheck/skins/all.css')}}" rel="stylesheet">
    <link href="{{asset('plugin/bootstrap/css/custom.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @yield('content')
    </div>

    <!-- Scripts -->
 
    <script src="{{asset('plugin/bootstrap/js/jquery.min.js')}}"></script>
    <!-- Include all compiled   (below), or include individual files as needed -->
    <script src="{{asset('plugin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script> src="{{asset('plugin/bootstrap/js/app.js')}}"</script>
    <script> src="{{asset('plugin/icheck/icheck.min.js')}}"</script>
</body>
</html>

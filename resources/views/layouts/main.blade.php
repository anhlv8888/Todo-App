<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ajax Todo App</title>
    <!-- goole font -->
    <link href="https://fonts.googleapis.com/css?family=Khula:400,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('plugin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugin/icheck/skins/all.css')}}" rel="stylesheet">
    <link href="{{asset('plugin/bootstrap/css/custom.css')}}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="#"><strong>Todo</strong> App</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->

<script src="{{asset('plugin/bootstrap/js/jquery.min.js')}}"></script>
<!-- Include all compiled   (below), or include individual files as needed -->
<script src="{{asset('plugin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugin/bootstrap/js/app.js')}}"></script>
<script src="{{asset('plugin/icheck/icheck.min.js')}}"></script>


</body>
</html>
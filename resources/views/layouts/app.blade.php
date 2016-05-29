<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Toledo</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- No Hamburger -->
               <!--  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Toledo
                </a>
            </div>

            <!-- no hamburger -->
            <!-- <div class="collapse navbar-collapse" id="app-navbar-collapse"> -->
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
                @if (!Auth::guest())
                @if (Auth::user()->isAdmin())
                <li><a href="{{ url('/admin') }}">Admin</a></li>
                @endif
                @endif
                <li><a href="{{ url('/help') }}">Help</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/user') }}"><i class="fa fa-btn fa-user"></i>{{ Auth::user()->name }}</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <!-- </div> -->
        </div>
    </nav>
</div>

    <div class="container">
    @for ($i = 0; $i <= count(Request::segments()); $i++)
      <a href="">{{Request::segment($i)}}</a>
      @if($i < count(Request::segments()) & $i > 0)
        <i class="fa fa-angle-right"></i>
      @endif
    @endfor
    </div>

    @if (Session::has('message'))
    <div class="alert alert-info">
      <strong>Info:</strong> {{Session::get('message')}}
      @if (Session::has('action') && Session::has('cta'))
          <a href="{{Session::get('action')}}" class="btn btn-primary">{{Session::get('cta')}}</a>
      @endif
    </div>
    @endif

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StuBu') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="https://bootswatch.com/4/lumen/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('app.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f29fb0b11c.js" crossorigin="anonymous"></script>

</head>
<body id="welcomebody" style="overflow:hidden;">


    <div id="app">
      <nav class="navbar welcome">
            <div class="container" id="welcomecontainer">
                <a id = "welcomebrandname" class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'StuBu') }}
                </a>
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li>
                         <a class="" href="{{ route('login') }}" id="welcomenavitem">{{ __('Login') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div>
        <div class="container welcomelefttext">
            <div class="row">
                <div class="col-md-6" id="welcometextleft">
                    <h2 id="welcomebigtxt">Got a question?</h2>
                    <p id="welcomesmalltxt"><b class="welcomebold">StuBu</b> is a website where Carolinians can ask any question regarding schoolwork. <b class="welcomebold"> StuBu</b> is inspired by the websites, StackOverflow and Quora.</p>
                </div>
                <div class="col-md-6" id="welcomeimgright">
                    <img id="welcomeimage" src="{{asset('images/assets/idea.png')}}">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{asset('/js/main.js')}}"> </script>
</body>
</html>

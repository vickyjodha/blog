<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->
   <!--  <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     @yield('css')
    <!-- Styles -->
     <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/mdb.min.css')}}">
        <!-- <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/style.css')}}"> -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile',Auth::user()->id) }}">
                                        My Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @auth
            <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{route('post.index')}}">Post</a>
                    </li>
                    @if(auth()->user()->isAdmian())
                    <li class="list-group-item">
                        <a href="{{route('user.index')}}">User</a>
                    </li>
                    @endif
                    <li class="list-group-item">
                        <a href="{{route('tag.index')}}">Tag</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('categories.index')}}">Categorie</a>
                    </li>
                       
                   </ul> 
                     <ul class="list-group mt-5">
                    <li class="list-group-item">
                        <a href="{{route('trash-post.index')}}">Trash Post</a>
                    </li>
                   <!--  <li class="list-group-item">
                        <a href="{{route('categories.index')}}">Trash Categorie</a>
                    </li> -->
                       
                   </ul>
                </div>

                <div class="col-md-8">
                    @if(session('sucssucsMsg'))
                   <div class="alert alert-success">
                     {{session('sucssucsMsg')}}
                   </div>
                       @endif
                       @if(session('error'))
                           <div class="alert alert-danger">{{session('error')}}
                             </div>
                       @endif
                       @if($errors->any())
                          @foreach($errors->all() as $error)
                             <div class="alert alert-danger">
                                {{$error}}
                             </div>
                         @endforeach
                       @endif
                      @yield('content')
                </div>
            </div>
        </div>
            @else
             @yield('content')
           @endauth
        </main>
    </div>
    <script type="text/javascript" src="{{asset('public/bootstrap/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/mdb.min.js')}}"></script> 

@yield('script')


</body>
</html>

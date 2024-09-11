<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMT
        
    </title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light sticky-top" id="navbar" 
        style="background: transparent;backdrop-filter: blur(10px);">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/img/logo2.PNG')}}" width="200" height="30" alt="LOGO">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                    @endauth
                @endif
               
                </ul>
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role == 'isMahasiswa')
                                    <a class="dropdown-item" href="{{route('profil')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                        
                                    @endif
                                <form action="{{route('logout', ['id' => Auth::user()->id])}}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{route('login')}}" class="nav-link">MASUK</a>
                            </li>
                            <li>
                                <a href="{{route('register')}}" class="nav-link btn btn-warning login">DAFTAR</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

        @yield('content-pages')

        
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
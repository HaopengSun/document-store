<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document store App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home<span class="sr-only">(current)</span></a>
            </li>

            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('document') }}">Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">{{ auth()->user()->name }}</a>
            </li>
            
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post" class="inline p-0">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
                </form>
            </li>
            @endauth

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @endguest
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
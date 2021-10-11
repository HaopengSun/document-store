<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document store App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">{{__('Home')}}<span class="sr-only">(current)</span></a>
            </li>

            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('documents.index') }}">Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">{{ auth()->user()->name }}</a>
            </li>
            
            <li class="nav-item mt-1">
                <form action="{{ route('logout') }}" method="post" class="inline p-0 mt-2">
                    @csrf
                    <button type="submit" class="btn btn-link">{{__('Logout')}}</button>
                </form>
            </li>
            @endauth

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{__('Register')}}</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{__('Login')}}</a>
            </li>
            @endguest
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
</body>
</html>
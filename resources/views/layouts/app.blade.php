<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document store App</title>
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS only -->
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
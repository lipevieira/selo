<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://selo.dev.com/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/institution/style.css ')}}">
    <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <h1>Indentificação</h1>
        </div>
        <script src="http://selo.dev.com/vendor/adminlte/vendor/jquery/dist/jquery.min.js"></script>
        <script src="http://selo.dev.com/vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js"></script>
        <script src="http://selo.dev.com/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('assets/institution/script.js') }}"></script>
    </body>
</html>

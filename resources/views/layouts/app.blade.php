<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Page</title>

     <!-- Fonts -->
    <link href="{{ asset('fonts/css.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/googlefonts.css') }}" rel="stylesheet">
    <script src="{{ asset('js/fontawesome.js') }}" defer></script>
    <script src="{{ asset('js/solid.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    
    <style>
    body
    {
        background-image: url('img/background.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
</head>
<body>
    

        <main class="py-4">
            @yield('content')
        </main>
   @include('layouts.notification')


</body>
</html>

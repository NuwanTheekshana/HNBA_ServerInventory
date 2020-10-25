<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

     <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <!-- Fonts -->
    <link href="{{ asset('fonts/css.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/googlefonts.css') }}" rel="stylesheet">
    <script src="{{ asset('js/fontawesome.js') }}" defer></script>
    <script src="{{ asset('js/solid.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    
<style>
    body
    {
        background-image: url('img/background2.png');
      
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
</head>
<body>

    @if (Auth::user()->Status != "1")
        <script>
            alert("User Account has been Currently disabled.please contact administrator..!")
            window.location.href="{{ url('/') }}";
        </script>
    @endif
  
    @include('layouts.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    
<script>

$(document).ready(function() {
    $('#find_server_details').DataTable();
} );
$(document).ready(function() {
    $('#all_user_details').DataTable();
} );
$(document).ready(function() {
    $('#vm_data_table').DataTable();
} );
$(document).ready(function() {
    $('#view_vm_data_table').DataTable();
} );

</script>

@include('layouts.notification')

</body>

    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" defer></script>
</html>

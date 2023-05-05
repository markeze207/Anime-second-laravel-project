<!doctype html>
<html lang="en">
<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:5173/resources/css/style.css"">
    <script src="http://127.0.0.1:5173/resources/js/jquery-3.3.1.min.js"></script>
</head>
@yield('content')

@include('includes.footer')
@include('includes.script')
</html>

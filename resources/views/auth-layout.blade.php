<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Athentication</title>
    <meta name="keywords" content="Blog website templates" />
    <meta name="description" content="Author - Personal Blog Wordpress Template">
    <meta name="author" content="Rabie Elkheir">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Core CSS -->
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Owl Carousel Assets -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"

        type="text/css" />
    <!--Google Fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Raleway:400,500,700|Roboto:300,400,500,700,900|Ubuntu:300,300i,400,400i,500,500i,700"
        rel="stylesheet">
    <!-- Main CSS -->
    {{-- <link rel="stylesheet" href="css/style.css" /> --}}
    <!-- Responsive CSS -->
    {{-- <link rel="stylesheet" href="css/responsive.css" /> --}}


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="" href="{{ Vite::asset('resources/css/app.css') }}">

</head>

<body class="@yield('class-body')">

        {{-- @if(session('alert'))
            <div class="alert alert-success">
                {{ session('alert') }}
            </div>
        @endif --}}

        @yield('content')

<script src="{{ Vite::asset('resources/js/app.js') }}"  >
</body>
</html>

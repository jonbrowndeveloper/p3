<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>

    <link rel='stylesheet' href='/css/custom.css'>

    <title>Word Cloud</title>

</head>

<body>

<header>
    <div class='container-fluid'>
         <div class="title m-b-md">
            Word Cloud Builder
         </div>
    </div>
    @include('modules.nav')
</header>

<section id='main'>
    <div class='container-fluid'>
    @yield('content')
    </div>
</section>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

@stack('body')

</body>
</html>
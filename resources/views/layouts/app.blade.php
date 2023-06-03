<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title ?? 'Berbagi Makan' }}</title>

    <!-- CSS FILES -->
    <link href=<?= asset("css/bootstrap.min.css") ?> rel="stylesheet">

    <link href=<?= asset("css/bootstrap-icons.css") ?> rel="stylesheet">

    <link href=<?= asset("css/templatemo-kind-heart-charity.css") ?> rel="stylesheet">
    <!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">

    @include('partials.header')
    
    @include('partials.navbar')

    

    <main>

        @yield('content')

    </main>

    @include('partials.footer')

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
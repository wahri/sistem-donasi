<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title ?? 'Berbagi Makan' }}</title>

    <!-- CSS FILES -->
    {{-- <link href=<?= asset('css/bootstrap.min.css') ?> rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href=<?= asset('css/bootstrap-icons.css') ?> rel="stylesheet">

    <link href=<?= asset('css/templatemo-kind-heart-charity.css') ?> rel="stylesheet">
    <!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

</head>

<body id="section_1">
    @include('partials.header')

    @include('partials.navbar')


    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>

    <main>

        @yield('content')

    </main>

    @include('partials.footer')

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    {{-- <script src="js/click-scroll.js"></script> --}}
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
    <script>
        var myCarousel = document.querySelector('#sponsor-carousel')
        var carousel = new bootstrap.Carousel(myCarousel)
    </script>

</body>

</html>

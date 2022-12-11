<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EPEC | Leading Real Estate Company in Dhaka, Bangladesh</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @stack('seo')

    <!-- Favicon -->
    <link href="{{ asset($favicon->value) }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}/lib/range-slider/jquery.range.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}//lib/modal/jquery.modal.min.css" rel="stylesheet">

    @stack('css')

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/frontend') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @include('frontend.partials.header')


        @yield('content')


        @includeIf('frontend.partials.footer')


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-back-top btn-lg-square back-to-top">
            <i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/frontend') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/lib/range-slider/jquery.range.js"></script>
    <script src="{{ asset('assets/frontend') }}/lib/modal/jquery.modal.min.js"></script>
    @stack('js')
    <!-- Template Javascript -->
    <script src="{{ asset('assets/frontend') }}/js/main.js"></script>


</body>

</html>

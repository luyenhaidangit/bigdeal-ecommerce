<!DOCTYPE html>
<html lang="en">

<head>
    @include('guest.layouts.head')
</head>

<body class="bg-light">
    <!-- loader start -->
    <div class="loader-wrapper">
        <div>
            <img src="{{ asset('guest-resource/images/loader.gif') }}" alt="loader">
        </div>
    </div>    
    <!-- loader end -->

    <!--header start-->
    @include('guest.layouts.header')
    <!--header end-->

    <!--content start-->
    @yield('content')
    <!--content end-->

    @include('guest.layouts.footer')

    <!-- latest jquery -->
    <script src="{{ asset('guest-resource/js/jquery-3.3.1.min.js') }}"></script>

    <!-- slick js -->
    <script src="{{ asset('guest-resource/js/slick.js') }}"></script>

    <!-- popper js -->
    <script src="{{ asset('guest-resource/js/popper.min.js') }}"></script>
    <script src="{{ asset('guest-resource/js/bootstrap-notify.min.js') }}"></script>

    <!-- range sldier -->
    <script src="../assets/js/ion.rangeSlider.js"></script>
    <script src="../assets/js/rangeslidermain.js"></script>

    <!-- menu js -->
    <script src="{{ asset('guest-resource/js/menu.js') }}"></script>

    <!-- timer js -->
    {{-- <script src="{{ asset('guest-resource/js/timer2.js') }}"></script> --}}

    <!-- range sldier -->
    <script src="{{ asset('guest-resource/js/ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('guest-resource/js/rangeslidermain.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('guest-resource/js/bootstrap.js') }}"></script>

    <!-- tool tip js -->
    <script src="{{ asset('guest-resource/js/tippy-popper.min.js') }}"></script>
    <script src="{{ asset('guest-resource/js/tippy-bundle.iife.min.js') }}"></script>

    <!-- father icon -->
    <script src="{{ asset('guest-resource/js/feather.min.js') }}"></script>
    <script src="{{ asset('guest-resource/js/feather-icon.js') }}"></script>

    <!-- Theme js -->
    <script src="{{ asset('guest-resource/js/modal.js') }}"></script>
    <script src="{{ asset('guest-resource/js/script.js') }}"></script>

</body>

</html>

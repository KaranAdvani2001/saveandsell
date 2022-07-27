<!DOCTYPE html>
<html lang="en">
    @include('frontend.include.head')
    <body>
        <!-- Navigation-->
        @include('frontend.include.navbar')
        <!-- Section-->
        @yield('main_content')
        <!-- Footer-->
        @include('frontend.include.footer')
        <!-- Bootstrap core JS-->
        @include('frontend.include.script')
    </body>
</html>

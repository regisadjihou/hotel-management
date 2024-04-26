<!DOCTYPE html>
<html class="no-js" lang="en">

    @include('frontend.includes.head')
    @yield('styles')
<body>

    @include('frontend.includes.header')

    @yield('content')

    @include('frontend.includes.footer')



    <!-- scroll to top -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-double-up"></i>
    </div>
    <!-- /End Scroll to Top -->

    @include('frontend.includes.scripts')
    @yield('scripts')
</body>
</html>

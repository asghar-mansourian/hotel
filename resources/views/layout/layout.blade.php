<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('layout.headerStyle')
    @yield('styles')
</head>
<body>

        @include('layout.header')
        <hr style="    margin-top: 0; margin-bottom: 0;">
        @include('layout.navbar')
{{--@include('layout.mobileMenu')--}}

<div class="site_center">
    @yield('content')
</div>


@include('layout.footer')

@include('layout.footerScript')
@yield('footerCustom')
@stack('scripts')
</body>
</html>

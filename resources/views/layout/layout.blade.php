<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('layout.headerStyle')
    @yield('styles')
</head>
<body>

<div class="title pt-2 mb-5">
    <div class="container">
        @include('layout.header')
        <hr style="margin-top: 15px;">
        @include('layout.navbar')
    </div>
</div>
@include('layout.mobileMenu')

<div class="site_center">
        @yield('content')
</div>


@include('layout.footer')

@include('layout.footerScript')
@yield('footerCustom')
</body>
</html>

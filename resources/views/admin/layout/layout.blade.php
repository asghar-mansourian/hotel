<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    @include('admin.layout.meta')
    @include('admin.layout.favIcon')
    @include('admin.layout.title')
    @include('admin.layout.styleHeader')
    @yield('styleCustom')
</head>


<body class="app sidebar-mini">


@include('admin.layout.switcher')
@include('admin.layout.loader')

<!-- Page -->
<div class="page">
    <div class="page-main">
    @include('admin.layout.side')

    <!-- App-Content -->
        <div class="app-content main-content">
            <div class="side-app">
            @include('admin.layout.nav')

                <div class="page-header">
                    <div class="page-leftheader">
                        @yield('crumb')
                    </div>
                    <div class="page-rightheader">
                        @yield('rightHeader')
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        @yield('main')
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@include('admin.layout.footer')
@include('admin.layout.scriptFooter')
@include('admin.layout.styleFooter')
@yield('scriptCustom')

</body>


</html>

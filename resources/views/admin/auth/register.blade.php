<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Laravel Bootstrap Admin Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="laravel admin dashboard, best laravel admin panel, laravel admin dashboard, php admin panel template, blade template in laravel, laravel dashboard template, laravel template bootstrap, laravel simple admin panel,laravel dashboard template,laravel bootstrap 4 template, best admin panel for laravel,laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel admin template bootstrap 4"/>

    <!-- Title -->
    <title>Admitro - Admin Panel HTML template</title>

    <!--Favicon -->
    <link rel="icon" href="{{url('admin/en/images/brand/favicon.ico')}}" type="image/x-icon"/>

    <!--Bootstrap css -->
    <link href="{{url('admin/en/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{url('admin/en/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('admin/en/css/dark.css')}}" rel="stylesheet" />
    <link href="{{url('admin/en/css/skin-modes.css')}}" rel="stylesheet" />

    <!-- Animate css -->
    <link href="{{url('admin/en/css/animated.css')}}" rel="stylesheet" />

    <!---Icons css-->
    <link href="{{url('admin/en/css/icons.css')}}" rel="stylesheet" />


    <!-- Color Skin css -->
    <link id="theme" href="{{url('admin/en/colors/color1.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body class="h-100vh page-style1">
<div class="page">
    <div class="page-single">
        <div class="p-5">
            <div class="row">
                <div class="col mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="card-group mb-0">
                                <div class="card p-4">
                                    <form action="{{ url('admin/register') }}" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="text-center title-style mb-6">
                                                <h1 class="mb-2">Register</h1>
                                                <hr>
                                                <p class="text-muted">Create New Account</p>
                                            </div>
                                            <div class="btn-list d-flex">
                                                <a href="https://www.google.com/gmail/" class="btn btn-google btn-block"><i class="fa fa-google fa-1x mr-2"></i> Google</a>
                                                <a href="https://twitter.com/" class="btn btn-twitter"><i class="fa fa-twitter fa-1x"></i></a>
                                                <a href="https://www.facebook.com/" class="btn btn-facebook"><i class="fa fa-facebook fa-1x"></i></a>
                                            </div>
                                            <hr class="divider my-6">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-user"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-mail"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enetr Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-lock"></i>
                                                    </div>
                                                </div>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Confirm" name="password_confirmation" required autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" />
                                                    <span class="custom-control-label"><a href="terms.html" class="">Agree the  Terms and policy</a></span>
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn  btn-primary btn-block px-4">Create New Account</button>
                                                </div>
                                            </div>
                                            <div class="text-center pt-4">
                                                <div class="font-weight-normal fs-16">You Already have an account <a class="btn-link font-weight-normal" href="{{route('login')}}">Login Here</a></div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
                                    <div class="text-center justify-content-center page-single-content">
                                        <div class="box">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <img src="{{url('admin/en/images/png/login.png')}}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery js-->
<script src="{{url('admin/en/js/jquery-3.5.1.min.js')}}"></script>

<!-- Bootstrap4 js-->
<script src="{{url('admin/en/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{url('admin/en/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!--Othercharts js-->
<script src="{{url('admin/en/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

<!-- Circle-progress js-->
<script src="{{url('admin/en/js/circle-progress.min.js')}}"></script>

<!-- Jquery-rating js-->
<script src="{{url('admin/en/plugins/rating/jquery.rating-stars.js')}}"></script>
<!-- Custom js-->
<script src="{{url('admin/en/js/custom.js')}}"></script>
</body>

<!-- Mirrored from laravel.spruko.com/admitro/Vertical-IconSidedar-Light/register-3 by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Oct 2020 07:56:00 GMT -->
</html>

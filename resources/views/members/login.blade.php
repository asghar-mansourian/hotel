<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kargo.az</title>
    <link rel="icon" href="{{url('front/image/favicon/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/style.css')}}">
    <link rel="stylesheet" href="{{url('front/css/fontawesome-free-5.15.1-web/css/all.css')}}">
</head>
<body>

<div class="title pt-4 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="font_grey">
                    contact us : +998 50 988 11 25
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 ">
                <div class="menu_first">
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr style="margin-top: 15px;">
        <div class="row pt-3 pb-3" style="padding: 0 15px;">
            <div class="logo">
                <img src="{{url('front/image/logo.svg')}}">
            </div>
            <div class="menu_sec">
                <ul>
                    <li>
                        <a href="#" class="active">Home</a>
                    </li>
                    <li>
                        <a href="#">Pricing</a>
                    </li>
                    <li>
                        <a href="#">How we work</a>
                    </li>
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_panel"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sekine Beylerova<i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdown_panel">
                                <a class="dropdown-item" href="#">Panel səhifəsi</a><br/>
                                <a class="dropdown-item" href="#">Xaricdəki ünvanlarım</a><br/>
                                <a class="dropdown-item" href="#">Sifarişlərim</a><br/>
                                <a class="dropdown-item" href="#">Bağlamalarım</a><br/>
                                <a class="dropdown-item" href="#">AZN Balansım</a><br/>
                                <a class="dropdown-item" href="#">TL Balansım</a><br/>
                                <a class="dropdown-item" href="#">Kuryer</a><br/>
                                <a class="dropdown-item" href="#">Sorğu</a><br/>
                                <a class="dropdown-item" href="#">Tənzimləmələr</a><br/>
                                <a class="dropdown-item" href="#">Hesabdan çıx</a><br/>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="site_center">
    <div class="container">
        <h4>İSTİFADƏÇİ <strong>Login</strong></h4>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="row left-side">
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label for="" style="width: 450px!important;text-align: left">Email:</label>
                    </div>
                    <div class="text-center">

                        <input type="email" name="email" placeholder="email" class="@error('email') is-invalid @enderror w-100 courier_input"
                               value="{{ old('email') }}" style="width: 450px!important;">
                        @error('email')
                        <br>
                        <span class="invalid-feedback" style="color:#a1272b;" role="alert">
                                        <strong>{{ $message }}</strong>
                                                </span>
                        @enderror

                    </div>

                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label for="" style="width: 450px!important;text-align: left">Password:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password" placeholder="password" class="w-100 courier_input"
                               style="width: 450px!important;">
                        @error('password')
                        <br>
                        <span class="invalid-feedback" style="color:#a1272b;" role="alert">
                                        <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">

                        <input type="checkbox" style="vertical-align: middle!important;">
                        <label for="" style="margin-bottom: 10px!important;
    margin-left: 4px!important;">remember me</label>
                    </div>

                </div>
                <div class="col-md-12 button-part mt-5">
                    <div class="text-center">
                        <button type="submit" class="btn-effect">Login</button>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

<div class="footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search text-center">
                    <input type="text" name="" placeholder="Search here...">
                    <button>Search</button>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="logo">
                    <img src="{{url('front/image/logo.svg')}}">
                    <div class="font_grey mt-5">
                        Lorem Ipsum is simply dummy text of the <br/>printing and typesetting industry.<br/>
                        <div class="mt-3"><a href="#" class="font_b8">Kargoaz@gmail.com</a></div>
                    </div>
                    <div class="font_black mt-3"><strong>781-349-6679</strong></div>
                    <div class="menu mt-5 ">
                        <ul class="p-0">
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
                <div class="title_list">Service</div>
                <div class="menu_list mt-5">
                    <ul>
                        <li><a href="#">Zwei flinke</a></li>
                        <li><a href="#">Zwei flinke</a></li>
                        <li><a href="#">Zwei flinke</a></li>
                        <li><a href="#">Zwei flinke</a></li>
                        <li><a href="#">Zwei flinke</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6">
                <div class="title_list">About us</div>
                <div class="menu_list mt-5">
                    <ul>
                        <li><a href="#">Zwei flinke</a></li>
                        <li><a href="#">Zwei flinke</a></li>
                        <li><a href="#">Zwei flinke</a></li>
                        <li><a href="#">Zwei flinke</a></li>
                        <li><a href="#">Zwei flinke</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="title_list">Our address</div>
                <div class="font_grey mt-5">
                    Lorem Ipsum is simply dummy text of the <br/>printing and typesetting industry.<br/>
                </div>
                <div class="map mt-5"></div>
            </div>
        </div>
    </div>
</div>

<div class="footer_yellow text-center">
    <div class="title_list">All rights reserved to kargo.az international INC.</div>
</div>

<script src="{{url('front/js/style_js.js')}}"></script>
<script src="{{url('front/js/jquery.js')}}"></script>
<script src="{{url('front/js/bootstrap.min.js')}}"></script>
<script src="{{url('front/js/bootstrap-select.min.js')}}"></script>
<script src="{{url('front/js/clipboard.min.js')}}"></script>


<script>
    function showStuff(id, text, btn) {
        document.getElementById(id).style.display = 'block';
        document.getElementById(text).style.display = 'none';
        btn.style.display = 'none';
    }
</script>
</body>
</html>

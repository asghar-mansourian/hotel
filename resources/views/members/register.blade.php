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
        <h4>İSTİFADƏÇİ <strong>Register</strong></h4>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="row left-side">
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label  style="width: 450px!important;text-align: left">Name:</label>
                    </div>
                    <div class="text-center">

                        <input type="text" name="name" placeholder="name" class="@error('name') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;" value="{{ old('name') }}">
                        @error('name')
                        <br>
                        <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label  style="width: 450px!important;text-align: left">Email:</label>
                    </div>
                    <div class="text-center">

                        <input type="email" value="{{ old('email') }}" name="email" placeholder="email" class="@error('email') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        @error('email')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label  style="width: 450px!important;text-align: left">Password:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password" placeholder="password" class="@error('password') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        @error('password')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label  style="width: 450px!important;text-align: left">Password Confirmation:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password_confirmation" placeholder="Password Confirmation" class="@error('password') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        <br>
                        @error('password')
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">Serial Number:</label>
                    </div>
                    <div class="text-center">
                        <input type="test" name="serial_number" maxlength="9" placeholder="serial number"
                               class="@error('serial_number') is-invalid @enderror w-100 courier_input"
                               value="{{ old('serial_number') }}" style="width: 450px!important;">
                        <br>
                        @error('serial_number')
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label  style="width: 450px!important;text-align: left">Citizenship:</label>
                    </div>
                    <div class="text-center">
                        <input type="text" value="{{ old('citizenship') }}"  name="citizenship" placeholder="citizenship" class="@error('citizenship') is-invalid @enderror w-100 courier_input"
                        style="width: 450px!important;">
                        @error('citizenship')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">Fin:</label>
                    </div>
                    <div class="text-center">
                        <input type="text" value="{{ old('fin') }}" maxlength="7" name="fin" placeholder="fin"
                               class="@error('fin') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        @error('fin')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label  style="width: 450px!important;text-align: left">phone:</label>
                    </div>
                    <div class="text-center">
                        <input value="{{ old('email') }}" type="text" name="phone" placeholder="phone" class="@error('phone') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;" pattern="^(?:0|\(?\+994\)?\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
                        @error('phone')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">birthday:</label>
                    </div>
                    <div class="text-center">
                        <input value="{{ old('birthdate') }}" autocomplete="birthdate" type="date" name="birthdate"
                               placeholder="birthdate"
                               class="@error('birthdate') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;"
                               pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
                        @error('birthdate')
                        <br>
                        <span class="invalid-feedback" role="alert"
                              style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label  style="width: 450px!important;text-align: left">address:</label>
                    </div>
                    <div class="text-center">
                        <input value="{{ old('address') }}" type="text" name="address" placeholder="address" class="@error('address') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        <br style="">
                        @error('address')
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">gender:</label>
                    </div>
                    <div class="text-center">
                        <select class="@error('gender') is-invalid @enderror form-control courier_input" name="gender"
                                style="width: 450px!important;margin: 0 auto!important;">
                            <option value="2">male</option>
                            <option value="1">female</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback"
                              role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="text-center">

                        <input class="@error('terms') is-invalid @enderror" type="checkbox" name="terms" required
                               style="vertical-align: middle!important;">
                        <label style="margin-bottom: 10px!important;
    margin-left: 4px!important;">Agree the Terms and policy</label>
                        @error('terms')
                        <span class="invalid-feedback"
                              role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12 button-part mt-5">
                    <div class="text-center">
                        <button type="submit" class="btn-effect">Register</button>
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

@extends('layout.layout')
@section('title')
    Kargo | Home
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/index.css')}}">
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="z-index: 1">
                    <div class="black pt-5"><span class="yellow mr-3">Kargo</span>{{__('website.transport')}}</div>
                    <div class="italic">{{__('website.subtitle1')}}<br>{{__('website.subtitle2')}}
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="img_slider">
                        <img src="{{url('front/image/airplane_p.png')}}" class="w-100">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="bacg_img">
                        <div class="pricing_wi border_sh">
                            <div class="row pt-5 pb-5">
                                <div class="col-md-12 mb-4 font_grey"> {{__('website.shipping')}} {{__('website.fee')}} {{__('website.calculator')}}</div>
                                <div class="col-md-4 col-sm-6 col-xs-6 mt-3 mb-3">
                                    <div class="col-md-4 p-0">
                                        <div class="text_bold">Ölkə</div>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <div class="pricing_box_cou">
                                            <select>
                                                <option>Türkiye</option>
                                                <option>Chin</option>
                                                <option>ABŞ</option>
                                                <option>Almania</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 mt-3 mb-3">
                                    <div class="col-md-4 p-0">
                                        <div class="text_bold">Bölgə</div>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <div class="pricing_box_cou">
                                            <select>
                                                <option>Bakı</option>
                                                <option>Gəncə</option>
                                                <option>Sumqayıt</option>
                                                <option>Zaqatala</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 mt-3 mb-3">
                                    <div class="col-md-4 p-0">
                                        <div class="text_bold">Bağlama sayı</div>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <input type="number" name="" class="pricing_imput w-100">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 mt-3 mb-3">
                                    <div class="col-md-4 p-0">
                                        <div class="text_bold">Çəki</div>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <input type="number" name="" class="pricing_imput w-100">
                                        <div class="pricing_box">
                                            <select>
                                                <option>kq</option>
                                                <option>qram</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 mt-3 mb-3">
                                    <div class="col-md-4 p-0">
                                        <div class="text_bold">En</div>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <input type="number" name="" class="pricing_imput w-100">
                                        <div class="pricing_box">
                                            <select>
                                                <option>sm</option>
                                                <option>m</option>
                                                <option>dm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 mt-3 mb-3">
                                    <div class="col-md-4 p-0">
                                        <div class="text_bold">Uzunluq</div>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <input type="number" name="" class="pricing_imput w-100">
                                        <div class="pricing_box">
                                            <select>
                                                <option>sm</option>
                                                <option>m</option>
                                                <option>dm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 mt-3 mb-3">
                                    <div class="col-md-4 p-0">
                                        <div class="text_bold">Hündürlük</div>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <input type="number" name="" class="pricing_imput w-100">
                                        <div class="pricing_box">
                                            <select>
                                                <option>sm</option>
                                                <option>m</option>
                                                <option>dm</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing_price_fff">
                            <div class="pricing_price_yellow">
                                <button id="calculate" class="btn-effect border-btn">Hesabla</button>
                            </div>
                            <div class="pricing_price mt-3">
                                <div class="all">
                                    Cəmi : <i class="fas fa-dollar-sign"></i> 3
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="index_cont">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="border_c">
                                    <img src="{{url('front/image/headphones.svg')}}">
                                    <h4><strong>Call cente</strong></h4>
                                    <div class="mb-2">Give us a free call</div>
                                    <div>+1 55-676-1020</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="border_c">
                                    <img src="{{url('front/image/clock.svg')}}">
                                    <h4><strong>Working Hours</strong></h4>
                                    <div class="mb-2">Give us a free call</div>
                                    <div>+1 55-676-1020</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="border_c">
                                    <img src="{{url('front/image/map.svg')}}">
                                    <h4><strong>Our Location</strong></h4>
                                    <div class="mb-2">Give us a free call</div>
                                    <div>+1 55-676-1020</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="border_c">
                                    <img src="{{url('front/image/headphones.svg')}}">
                                    <h4><strong>Get Detailed Quote</strong></h4>
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" id="brit_moon" data-toggle="dropdown"
                                             aria-haspopup="true" aria-expanded="false">
                                            Service<i class="fas fa-chevron-down ml-2"></i>
                                        </div>
                                        <div class="dropdown-menu w-100 p-4" aria-labelledby="brit_moon">
                                            <div class="dropdown-item">I didn't know what is this</div>
                                            <div class="dropdown-item active_span">I didn't know what is this</div>
                                            <div class="dropdown-item">I didn't know what is this</div>
                                            <div class="dropdown-item">I didn't know what is this</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map mb-5">
            <div class="how_work">
                <div class="how_work_text">How <span class="yellow">kargo.az</span> works?</div>
            </div>
            <div class="container how_work_list">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="how_work_col m_right_20">
                            <div class="how_work_img">
                                <span class="how_work_span">Qediyattdan Gech</span>
                                <img src="{{url('front/image/checkList.svg')}}">
                            </div>
                            The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="how_work_col m_left_20">
                            <div class="how_work_img">
                                <span class="how_work_span">Sifarishi biza yola</span>
                                <img src="{{url('front/image/boxList.svg')}}">
                            </div>
                            The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="how_work_col m_right_20">
                            <div class="how_work_img">
                                <span class="how_work_span">Baglamani elda Et</span>
                                <img src="{{url('front/image/ship.svg')}}">
                            </div>
                            <div style="clear: both;"></div>
                            The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="how_work_col m_left_20">
                            <div class="how_work_img">
                                <span class="how_work_span">Cargo Storage</span>
                                <img src="{{url('front/image/homeBox.svg')}}">
                            </div>
                            The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz
                        </div>
                    </div>
                </div>
            </div>
            <div class="air"><img src="{{url('front/image/indexAir.svg')}}" class="w-100"></div>
        </div>
        <div class="counter" id="counter">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="cou_date">
                            <span class="counter-value" data-count="40">40</span>.000 <i
                                class="fas fa-plus"></i><span></span>
                        </div>
                        <div class="yellow counter_text">user</div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="cou_date">
                            <span class="counter-value" data-count="15">15</span>.000.000 <i
                                class="fas fa-plus"></i><span></span>
                        </div>
                        <div class="yellow counter_text">user</div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="cou_date">
                            <span class="counter-value" data-count="23">23</span>.000 <i
                                class="fas fa-plus"></i><span></span>
                        </div>
                        <div class="yellow counter_text">user</div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <span class="counter-value cou_date" data-count="66">66</span>
                        <div class="yellow counter_text">user</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="skills">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="skills_text">
                            <span class="yellow cou_date font_40">Kargo.az</span> skills and expertise
                        </div>
                        <div class="skills_italy">
                            But I must explain to you how all this mistaken idea of denouncing pleasure and praising
                            pain was born and I will give you a complete account of the system, and expound the actual
                            teachings of the great explorer of the truth, the master-builder of human happiness. No one
                            rejects, dislikes, or avoids pleasure itself, because it is pleasure<span
                                id="dots">...</span><span id="more">enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span>
                            <div class="skills_input">
                                <button onclick="myFunction()" id="myBtn">Read more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4"><img src="{{url('front/image/loader.svg')}}"
                                                        class="w-100 loader_img"></div>
                </div>
            </div>
        </div>
        <div class="latest_dots">
            <img src="{{url('front/image/dots.svg')}}">
        </div>
        <div class="latest_new">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="mob_p-4 latest_new_title">
                            <strong>Latest <br>news and events</strong>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 mt-5 mb-5 padding_25">
                        <div class="border_sh padding_15" style="background: #fff;">
                            <div class="row">
                                <div class="col-md-7 p-0">
                                    <div class="blog_mage">
                                        <div class="blog_img_he"><img src="{{url('/front/image/blog/blog.jpg')}}"
                                                                      class="w-100"></div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mob_p-4">
                                        <h4><strong>News title</strong></h4>
                                        <p class="font_grey mb-3">Hanie Ghorbani <i
                                                class="far fa-comment ml-3 mr-1"></i> 3</p>
                                        <div class="line_he mt-2 mb-2">
                                            But I must explain to you how all this mistaken idea of denouncing pleasure
                                        </div>
                                        <div class="blog_a mt-4 mb-3">
                                            <a href="index.html"> Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="latest_dots2">
                            <img src="{{url('front/image/dots.svg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site_center mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 height_380 mt-5 mb-5">
                        <div class="border_sh p-0">
                            <div class="blog_mage">
                                <div class="blog_img"><img src="{{url('/front/image/blog/blog3.jpg')}}" class="w-100">
                                </div>
                                <div class="blog_history">AUG 15, 2020</div>
                            </div>
                            <div class="mob_p-25">
                                <h4><strong>News title</strong></h4>
                                <p class="font_grey mb-3">Hanie Ghorbani <i class="far fa-comment ml-3 mr-1"></i> 3</p>
                                <div class="line_he mt-2 mb-2">
                                    But I must explain to you how all this mistaken idea of denouncing pleasure
                                </div>
                                <div class="blog_a mt-4 mb-3">
                                    <a href="index.html"> Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 height_380 mt-5 mb-5">
                        <div class="border_sh p-0">
                            <div class="blog_mage">
                                <div class="blog_img"><img src="{{url('/front/image/blog/blog.jpg')}}" class="w-100">
                                </div>
                                <div class="blog_history">AUG 15, 2020</div>
                            </div>
                            <div class="mob_p-25">
                                <h4><strong>News title</strong></h4>
                                <p class="font_grey mb-3">Hanie Ghorbani <i class="far fa-comment ml-3 mr-1"></i> 3</p>
                                <div class="line_he mt-2 mb-2">
                                    But I must explain to you how all this mistaken idea of denouncing pleasure
                                </div>
                                <div class="blog_a mt-4 mb-3">
                                    <a href="index.html"> Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 height_380 mt-5 mb-5">
                        <div class="newsletter">
                            <div class="news_black">
                                <div class="news_img">
                                    <img src="{{url('front/image/newsletter.svg')}}" class="">
                                </div>
                                <div class="cou_date">Newsletter</div>
                                <div class="news_grey news_input">subscribe to our newsletter to receive latest news
                                </div>
                                <div class="news_input">
                                    <input type="text" name="newsletter" placeholder="Email" class="w-100">
                                </div>
                                <div class="newsletter_read mt-4 mb-3">
                                    <a href="#">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider_quotes">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-4 quote">
                        <strong class="quote-title">Trusted by international <br>companies</strong>
                        <div class="quote_border"></div>
                        <div class="quote_italy">
                            testimony from our great <br> client worldwide company
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-8" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class=""><img
                                        class="img-responsive "
                                        src="https://zozav.com/wp-content/uploads/2018/02/business-man-1385050_600-300x300.jpg"
                                        alt="">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="1" class=""><img class="img-responsive"
                                                                                                  src="https://media-exp1.licdn.com/dms/image/C5603AQHCyuUrUHBXwA/profile-displayphoto-shrink_100_100/0?e=2159024400&amp;v=beta&amp;t=vCFNfEeSBSU5B-WOSrvAP9QAUAb5NR7fSkG0Kvz0C7g"
                                                                                                  alt="">
                                </li>
                                <li data-target="#quote-carousel" data-slide-to="2" class="active"><img
                                        class="img-responsive"
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg"
                                        alt="">
                                </li>
                            </ol>
                            <div class="carousel-inner text-center">
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4><strong>John Travoli</strong></h4>
                                                <div class="news_grey">CEO RahatMarket</div>
                                                <div class="yellow_border"></div>
                                                <div class="carousel_text">But I must explain to you how all this
                                                    mistaken idea of denouncing pleasure and praising pain was born and
                                                    I will give you a complete account of the system, and expound the
                                                    actual teachings of the great explorer of the truth, the
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="item active left">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4><strong>John Travoli</strong></h4>
                                                <div class="news_grey">CEO RahatMarket</div>
                                                <div class="yellow_border"></div>
                                                <div class="carousel_text">But I must explain to you how all this
                                                    mistaken idea of denouncing pleasure and praising pain was born and
                                                    I will give you a complete account of the system, and expound the
                                                    actual teachings of the great explorer of the truth, the
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="item next left">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4><strong>John Travoli</strong></h4>
                                                <div class="news_grey">CEO RahatMarket</div>
                                                <div class="yellow_border"></div>
                                                <div class="carousel_text">But I must explain to you how all this
                                                    mistaken idea of denouncing pleasure and praising pain was born and
                                                    I will give you a complete account of the system, and expound the
                                                    actual teachings of the great explorer of the truth, the
                                                </div>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i
                                    class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i
                                    class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="partner">
            <div class="container">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">


                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                             style="transform: translate3d(-2012px, 0px, 0px); transition: all 0.25s ease 0s; width: 4025px;">
                            <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://i2.wp.com/naxosgrandevista.com/wp-content/uploads/2019/10/logo-light-grey.png?fit=700%2C300&amp;ssl=1"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://www.psyjukebox.com/labels/label119/images/flyer.png"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img src="https://iguanamedia.org/images/logos/nmcGry.png"
                                                                   alt=""></a></div>
                            </div>
                            <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://socialmediaweek.org/conference/files/2016/04/voxmedia-logo-horiz.png"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://henrikdamthomsen.com/wp-content/uploads/2014/08/wordpress_logo_white.png"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://images.squarespace-cdn.com/content/v1/5c80744a94d71ab0d0755ae5/1597237780592-M1S8686ORI5OZODQVPSD/ke17ZwdGBToddI8pDm48kMX3kvVuZF0k0qXuePz5b31Zw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpxJZM6kmh3pZ0wlO5hEh2gNWvjG9u7FN0ikQLI8MIVi1iyM8CW3unfJTJlcD8_7AHU/CEW-Logo-Frame-grey.png"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://i2.wp.com/naxosgrandevista.com/wp-content/uploads/2019/10/logo-light-grey.png?fit=700%2C300&amp;ssl=1"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item active" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://www.psyjukebox.com/labels/label119/images/flyer.png"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item active" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img src="https://iguanamedia.org/images/logos/nmcGry.png"
                                                                   alt=""></a></div>
                            </div>
                            <div class="owl-item active" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://socialmediaweek.org/conference/files/2016/04/voxmedia-logo-horiz.png"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item cloned active" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://henrikdamthomsen.com/wp-content/uploads/2014/08/wordpress_logo_white.png"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://images.squarespace-cdn.com/content/v1/5c80744a94d71ab0d0755ae5/1597237780592-M1S8686ORI5OZODQVPSD/ke17ZwdGBToddI8pDm48kMX3kvVuZF0k0qXuePz5b31Zw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpxJZM6kmh3pZ0wlO5hEh2gNWvjG9u7FN0ikQLI8MIVi1iyM8CW3unfJTJlcD8_7AHU/CEW-Logo-Frame-grey.png"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://i2.wp.com/naxosgrandevista.com/wp-content/uploads/2019/10/logo-light-grey.png?fit=700%2C300&amp;ssl=1"
                                            alt=""></a></div>
                            </div>
                            <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                <div class="item"><a href="#"><img
                                            src="https://www.psyjukebox.com/labels/label119/images/flyer.png"
                                            alt=""></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span>
                        </button>
                        <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span>
                        </button>
                    </div>
                    <div class="owl-dots">
                        <button role="button" class="owl-dot active"><span></span></button>
                        <button role="button" class="owl-dot"><span></span></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footerCustom')
    <script src="{{url('front/js/owl.carousel.min.js')}}"></script>

    <script>
        function showStuff(id, text, btn) {
            document.getElementById(id).style.display = 'block';
            document.getElementById(text).style.display = 'none';
            btn.style.display = 'none';
        }
    </script>
    <!-- counter  -->
    <script>
        var a = 0;
        $(window).scroll(function () {

            var oTop = $('#counter').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.counter-value').each(function () {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },
                        {
                            duration: 3000,
                            easing: 'swing',
                            step: function () {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function () {
                                $this.text(this.countNum);
                                //alert('finished');
                            }

                        });
                });
                a = 1;
            }
        });
    </script>


    <!-- skills -->
    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            // nav:true,
            autoplay: 800,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection

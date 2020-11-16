@extends('layout.layout')
@section('title')
    Kargo | {{__('website.home')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/owl.theme.default.min.css')}}">
@endsection
@section('content')
    <section>
        <div class="index_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-5" style="z-index: 1">
                        <div class="index_black pt-5">{{__('website.transport')}}</div>
                        <div class="font_grey">{{__('website.subtitle1')}}<br>{{__('website.subtitle2')}}</div>
                    </div>
                    <div class="col-md-7">
                        <div class="img_slider">
                            <img src="./front/image/blog/blog.png" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="col-md-7">
                            <div class="bacg_img">
                                <div class="pricing_wi border_sh">
                                    <div class="row">
                                        <div class="col-md-12 mb-4 font_pink"><strong>{{__('website.calculator')}}</strong></div>
                                        <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                            <div class="pricing_box_cou">
                                                <select>
                                                    <option>{{__('website.home_page.country')}}</option>
                                                    <option>Türkiye</option>
                                                    <option>Chin</option>
                                                    <option>ABŞ</option>
                                                    <option>Almania</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                            <div class="pricing_box_cou">
                                                <select>
                                                    <option>{{__('website.home_page.region')}}</option>
                                                    <option>Bakı</option>
                                                    <option>Gəncə</option>
                                                    <option>Sumqayıt</option>
                                                    <option>Zaqatala</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                            <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.binding_number')}}">
                                        </div>
                                        <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                            <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.weight')}}">
                                            <div class="pricing_box">
                                                <select>
                                                    <option>{{__('website.home_page.weights.kg')}}</option>
                                                    <option>{{__('website.home_page.weights.gram')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                            <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.home_page.en')}}">
                                            <div class="pricing_box">
                                                <select>
                                                    <option>{{__('website.home_page.sm')}}</option>
                                                    <option>{{__('website.home_page.m')}}</option>
                                                    <option>{{__('website.home_page.dm')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                            <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.length')}}">
                                            <div class="pricing_box">
                                                <select>
                                                    <option>{{__('website.home_page.sm')}}</option>
                                                    <option>{{__('website.home_page.m')}}</option>
                                                    <option>{{__('website.home_page.dm')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                            <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.height')}}">
                                            <div class="pricing_box">
                                                <select>
                                                    <option>{{__('website.home_page.sm')}}</option>
                                                    <option>{{__('website.home_page.m')}}</option>
                                                    <option>{{__('website.home_page.dm')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 mt-4"></div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 mt-3 mb-3 pricing_price_blue">
                                            <button id="calculate" class="btn-effect border-btn">{{__('website.calculate')}}</button>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 mt-3 mb-3 pricing_price text-right">
                                            <div class="all">
                                                {{__('website.total')}} : <strong class="ml-3"><i class="fas fa-dollar-sign"></i> 3</strong>
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
        <div class="site_center">
            <div class="container">
                <div class="row">
                    <div class="black pt-5 text-center">{{__('website.how')}} shtormex {{__('website.works')}}?
                        <div class="hr" style="margin-right: auto; margin-left: auto;"></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="index_cont">
                            <div class="index_cont_img"><img src="./front/image/product_select.png" class="w-100"></div>
                            <h5><strong>{{__('website.register')}}</strong></h5>
                            <div class="mb-2">{{__('website.registeron')}}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="index_cont">
                            <div class="index_cont_img"><img src="./front/image/how_work_box.png" class="w-100"></div>
                            <h5><strong>{{__('website.sendvote')}}</strong></h5>
                            <div class="mb-2">{{__('website.sendvoteshopping')}}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="index_cont">
                            <div class="index_cont_img"><img src="./front/image/ship.png" class="w-100"></div>
                            <h5><strong>{{__('website.getpackage')}}</strong></h5>
                            <div class="mb-2">{{__('website.getpackageloc')}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row city">
                    <div class="col-md-12 black">{{__('website.tariffs_by_countries')}}
                        <div class="hr"></div>
                    </div>
                    @foreach($countries as $country)
                        <div class="col-md-6">
                            <div class="@if($loop->first) city_pink @else city_blue @endif">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 city_title">
                                        <img src="{{url("images/{$country->flag}")}}" width="40" class="mr-4"> <strong>{{$country->name}}</strong>
                                    </div>
                                    @foreach($country->priceCalculators as $priceCalculator)
                                        <div class="col-md-12 col-sm-12 mb-5 p-0">

                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="city_grey">{{$country->name}}</div>
                                                <div class="lit_pink">{{$priceCalculator->from }} - {{$priceCalculator->to }} {{$priceCalculator->unit->title}}</div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                                @if($priceCalculator->discount)
                                                    <div class="city_money">
                                                        <del style="color: pink">{{$priceCalculator->currency}} {{$country->currency}}</del>
                                                        {{$priceCalculator->currency -  (($priceCalculator->discount / 100) * $priceCalculator->currency)  }} {{$country->currency}}</div>
                                                @else
                                                    <div class="city_money">
                                                        {{$priceCalculator->currency}} {{$country->currency}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="video">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="video_bord">
                                <img src="./front/image/blog/blog.png" class="w-100">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="video_text">
                                <h3><strong>{{__('website.follow_video_instructions')}}</strong></h3>
                                <div class="font_pink">{{__('website.follow_video_instructions_new_style')}}</div>
                                {{__('website.follow_video_instructions_online_shopping')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site_center mt-5">
                <div class="container">
                    <div class="row">
                        <div class="black pt-5 text-center">{{__('website.newsletter')}}
                            <div class="hr" style="margin-right: auto; margin-left: auto;"></div>
                        </div>
                        @foreach($blogs as $blog)
                            <div class="col-md-4 col-sm-6 height_380 mt-5 mb-5">
                                <div class="p-0">
                                    <div class="blog_mage">
                                        <div class="blog_img"><img src="{{url('images/' . $blog->picture)}}" class="w-100"></div>
                                    </div>
                                    <div class="mob_p-4">
                                        <div class="top mt-3"><span class="top_span">Top</span></div>
                                        <h4><strong>{{$blog->title}}</strong></h4>
                                        <p class="font_grey mb-3">{{$blog->author->name}}<i class="far fa-comment ml-3 mr-1"></i> 3</p>
                                        <div class="line_he mt-2 mb-2">
                                            {{\App\lib\Helpers::getContent($blog->content, 45)}}
                                        </div>
                                        <div class="blog_a mt-4 mb-3">
                                            <a href="{{url('/blog/' . $blog->slug)}}"> {{__('website.readmore')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="partner">
                <div class="container">
                    <div class="black pt-5 text-center">{{__('website.customers')}}
                        <div class="hr" style="margin-right: auto; margin-left: auto;"></div>
                    </div>
                    <div class="owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-2300px, 0px, 0px); transition: all 0.25s ease 0s; width: 4025px;">
                                <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://i2.wp.com/naxosgrandevista.com/wp-content/uploads/2019/10/logo-light-grey.png?fit=700%2C300&amp;ssl=1" alt=""></a></div>
                                </div>
                                <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://www.psyjukebox.com/labels/label119/images/flyer.png" alt=""></a></div>
                                </div>
                                <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://iguanamedia.org/images/logos/nmcGry.png" alt=""></a></div>
                                </div>
                                <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://socialmediaweek.org/conference/files/2016/04/voxmedia-logo-horiz.png" alt=""></a></div>
                                </div>
                                <div class="owl-item" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://henrikdamthomsen.com/wp-content/uploads/2014/08/wordpress_logo_white.png" alt=""></a></div>
                                </div>
                                <div class="owl-item" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img
                                                src="https://images.squarespace-cdn.com/content/v1/5c80744a94d71ab0d0755ae5/1597237780592-M1S8686ORI5OZODQVPSD/ke17ZwdGBToddI8pDm48kMX3kvVuZF0k0qXuePz5b31Zw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpxJZM6kmh3pZ0wlO5hEh2gNWvjG9u7FN0ikQLI8MIVi1iyM8CW3unfJTJlcD8_7AHU/CEW-Logo-Frame-grey.png"
                                                alt=""></a></div>
                                </div>
                                <div class="owl-item" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://i2.wp.com/naxosgrandevista.com/wp-content/uploads/2019/10/logo-light-grey.png?fit=700%2C300&amp;ssl=1" alt=""></a></div>
                                </div>
                                <div class="owl-item" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://www.psyjukebox.com/labels/label119/images/flyer.png" alt=""></a></div>
                                </div>
                                <div class="owl-item active" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://iguanamedia.org/images/logos/nmcGry.png" alt=""></a></div>
                                </div>
                                <div class="owl-item active" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://socialmediaweek.org/conference/files/2016/04/voxmedia-logo-horiz.png" alt=""></a></div>
                                </div>
                                <div class="owl-item cloned active" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://henrikdamthomsen.com/wp-content/uploads/2014/08/wordpress_logo_white.png" alt=""></a></div>
                                </div>
                                <div class="owl-item cloned active" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img
                                                src="https://images.squarespace-cdn.com/content/v1/5c80744a94d71ab0d0755ae5/1597237780592-M1S8686ORI5OZODQVPSD/ke17ZwdGBToddI8pDm48kMX3kvVuZF0k0qXuePz5b31Zw-zPPgdn4jUwVcJE1ZvWQUxwkmyExglNqGp0IvTJZUJFbgE-7XRK3dMEBRBhUpxJZM6kmh3pZ0wlO5hEh2gNWvjG9u7FN0ikQLI8MIVi1iyM8CW3unfJTJlcD8_7AHU/CEW-Logo-Frame-grey.png"
                                                alt=""></a></div>
                                </div>
                                <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://i2.wp.com/naxosgrandevista.com/wp-content/uploads/2019/10/logo-light-grey.png?fit=700%2C300&amp;ssl=1" alt=""></a></div>
                                </div>
                                <div class="owl-item cloned" style="width: 277.5px; margin-right: 10px;">
                                    <div class="item"><a href="#"><img src="https://www.psyjukebox.com/labels/label119/images/flyer.png" alt=""></a></div>
                                </div>
                            </div>
                        </div>
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

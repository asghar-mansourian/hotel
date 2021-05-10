@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.home')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/index_page.css')}}">

    <style>
    </style>
@endsection
@section('content')
    <div class="contact index_contact">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-6 col-sm-3 col-xs-3 slider_text" style="">
                    <h1 class="color_fff" >
                        {{__('website.kargo')}} {{__('website.transport')}}
                    </h1>
                    <p>{{__('website.contactInformation1')}}</p>
{{--                    <p>{{__('website.contactInformation2')}}</p>--}}
{{--                    <p>{{__('website.contactInformation3')}}</p>--}}
{{--                    <p>{{__('website.contactInformation4')}}</p>--}}
                </div>
                <div class="col-md-12" style="padding: 0;margin: 0;">

                    <div class="img_slider">
                        <div class="slider" style="border-radius: 30px!important">
                            @foreach($sliders as $slider)
                                <div><img src="{{url('slider/images/' . $slider->picture)}}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
<div style="clear: both"></div>
    <br>
    <section>
        <div class="index_page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="index_cont">
                            <div class="row how_work_title_row">
                                <div class="col-12 text-center">
                                    <div class="col-md-4 col-sm-3"></div>
                                    <div class="col-md-4 col-sm-6 col-xs-12 text-center how_work_title">
                                        <p class="how_work_title_text">
                                            {{__('website.how_we_work')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row how_text">
                                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                                    <div class="how_a">
                                        <img src="{{url('/front/image/index_user.png')}}">
                                        <br>
                                        <br>
                                        <img class="how_work_step_a" src="{{url('/front/image/index_a.png')}}">
                                        <p class="how_work_text">{{__('website.how_work_a')}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4  col-sm-4 col-xs-4  text-center">
                                    <div class="how_b">
                                        <img src="{{url('/front/image/index_airplan.png')}}">
                                        <br>
                                        <br>
                                        <img class="how_work_step_b" src="{{url('/front/image/index_b.png')}}">
                                        <p class="how_work_text_b">{{__('website.how_work_b')}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4  col-sm-4 col-xs-4  text-center">
                                    <div class="how_c">
                                        <img src="{{url('/front/image/index_machin.png')}}">
                                        <br>
                                        <br>
                                        <img class="how_work_step_c" src="{{url('/front/image/index_c.png')}}">
                                        <p class="how_work_text">{{__('website.how_work_c')}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding: 0">
                                    <img style="width: 100%" src="{{url('/front/image/how_line.png')}}">
                                </div>
{{--                                <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                                    <div class="border_c">--}}
{{--                                    <img src="{{url('front/image/headphones.svg')}}">--}}
{{--                                    <h4><strong>{{__('website.call_center')}}</strong></h4>--}}
{{--                                    <div class="mb-2">{{__('website.call_center_description')}}</div>--}}
{{--                                    <div>{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                                    <div class="border_c">--}}
{{--                                    <img src="{{url('front/image/clock.svg')}}">--}}
{{--                                    <h4><strong>{{__('website.working_hours')}}</strong></h4>--}}
{{--                                    <div class="mb-2">{{__('website.working_hours_description')}}</div>--}}
{{--                                    <div>{{__('website.working_hourses')}}</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-sm-6 col-xs-12">--}}
{{--                                    <div class="border_c">--}}
{{--                                    <img src="{{url('front/image/map.svg')}}">--}}
{{--                                    <h4><strong>{{__('website.ouraddress')}}</strong></h4>--}}
{{--                                    <div class="mb-2">{{__('website.subtitle1')}}</div>--}}
{{--                                    <div>{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row  text-right">
                    <div class="col-md-12 col-xs-12">
                        <img class="index_back_right" src="{{url('/front/image/index_back_right.png')}}">
                    </div>
                </div>
                <div class="row movie_parent">
                    <div class="col-md-8 col-sm-8 col-xs-8 text-center">
                        <img class="movie_image" style="margin-right: 70px;" src="{{url('/front/image/movie_play.png')}}">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-8 text-center arrow_back_index">
                        <p class="arrow_left_text">{{__('website.home_arrow_left')}}</p>
                        <img class="index_arrow" src="{{url('/front/image/arrow_left.png')}}">
                    </div>
                </div>
            </div>
            <div class="partner">
                <div class="container-fluid">
                    <div class="row customer_title_row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="col-md-3 col-sm-3"></div>
                            <div class="col-md-6 col-sm-6 text-center customer_title">
                                <p class="how_work_title_text">
                                    {{__('website.customers')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <img class="customer_index_slide_back" src="{{url('/front/image/customer_slide_back.png')}}">
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div id="customerCarousel" class="owl-carousel owl-theme">
                                @foreach($customers as $customer)
                                    @if($loop->iteration==0 or $loop->iteration%2 == 1)
                                        <div class="item">
                                    @endif
                                            <div class="partner_item text-center">
                                                <a href="{{$customer->link}}" target="_blank"><img
                                                        src="{{asset('images/customers/'.$customer->image->file_name)}}"
                                                        alt="{{$customer->name}}"></a>
                                            </div>
                                            <br>
                                    @if($loop->last or($loop->iteration !=0 and $loop->iteration%2 == 0))
                                         </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center all_customer_div"><a class="">
                                <img src="{{url('/front/image/all_customer.png')}}">
                                <strong class="all_customer_button">{{__('website.see_customers')}}</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="partner_text">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="col-md-6 col-sm-6 text-center customer_title">
                                <p class="how_work_title_text">
                                    {{__('website.customer_reviews')}}
                                </p>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12" style="padding: 0">
                            <img src="{{url('/front/image/customer_review_hr.png')}}" width="100%">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="owl-carousel owl-theme">
                        @foreach($customerReviews as $customerReview)
                            <div class="item" style="background-color: #fff!important;">
                                <div class="col-md-4 col-sm-4">
                                    <div class="partner_text_img">
                                        <img src="{{url('images/customers/'.$customerReview->image->file_name)}}"
                                             alt="">
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h5 class="color_blue">{{$customerReview->name}}</h5>
                                    {{$customerReview->description}}
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
        <div style="height: 60px;width: 100%"></div>
    </section>
@endsection

@section('footerCustom')
    <script src="{{url('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('front/js/home/counter.js')}}"></script>
    <link rel="stylesheet" href="{{url('front/plugin/bxslider/jquery.bxslider.css')}}">
    <script src="{{url('front/plugin/bxslider/jquery.bxslider.min.js')}}"></script>

    <script>
        function showStuff(id, text, btn) {
            document.getElementById(id).style.display = 'block';
            document.getElementById(text).style.display = 'none';
            btn.style.display = 'none';
        }
    </script>

   <!--  skills -->
    <script>
        document.getElementById("defaultOpen").click();
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
        $('.blog .owl-carousel').owlCarousel({
            loop: false,
            margin: 10,
            dots: true,
            autoplay: true,
            loop: true,
            autoplayTimeout: 9000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        })
        $('.partner .owl-carousel').owlCarousel({
            loop: false,
            // margin: 10,
            dots: true,
            // autoplay: true,
            autoplayTimeout: 3000,
            nav: true,
                navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],
            responsive: {
                0: {
                    items: 2,
                },
                481: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1000: {
                    items: 4,
                }
            }
        });
        $('.partner_text .owl-carousel').owlCarousel({
            loop: false,
            margin: 30,
            dots: true,
            // autoplay: true,
            loop: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            },

        });
        $(document).ready(function () {
            $('div .img_slider').css('display', 'block')

            $('.slider').bxSlider({
                auto: true,
                pager: false, // disables pager
            });
        })

        $('.all_customer_button').on('click',function(){
            window.location.href='{{url('/customers')}}'
        })
    </script>
@endsection

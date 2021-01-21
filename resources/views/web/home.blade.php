@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.home')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/owl.theme.default.min.css')}}">

    <style>
        .bx-wrapper {
            border-radius: 30px;
            border: 0 !important;
        }
        /*contact {*!*/
        /*    height: 456px;*/
        /*    background-repeat: round;*/
        /*}*/
        @media only screen and (max-width: 1200px) {
            #calculator2 {
                display: block!important;
            }
            .calculator1{
                display: none!important;
            }
        }
        @media only screen and (max-width: 800px) {
            #calculator2 {
                margin-top: -20%;
            }
        }
        @media only screen and (max-width: 600px) {
            #calculator2 {
                margin-top: -40%;
            }
        }
        @media only screen and (max-width: 340px) {
            #calculator2 {
                margin-top: -90%;
            }
        }
        @media only screen and (max-width: 1550px) {
            .contact {
                background-image:url("");
            }
        }
        @media only screen and (min-width: 1200px) {
            #calculator2 {
                display: none!important;
            }
            .calculator1{
                display: block!important;
            }
        }
        .bx-viewport {
            height: 100% !important;
        }

        .bx-wrapper {
            border-radius: 0 !important;
            max-height: 400px !important;

        }
        .pricing_box_cou input{
            width: 284px!important;
        }
        @media only screen and (max-width: 767px) {
            .bx-wrapper {
                max-height: 200px !important;

            }
            .pricing_box_cou input{
                width: 100%!important;
            }
            .font-pinks{
                display: none;
            }
            .site_center{
                margin-top: 50px!important;
            }
        }
        .bx-wrapper img, .img_slider img {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="contact index_contact" style="padding: 0;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 calculator1" style="position: absolute;z-index: 5000;top: 20px;   left: 200px;
    width: 400px;">
                    <h1 class="color_fff">
                        {{__('website.kargo')}} {{__('website.transport')}}
                    </h1>
                    <p>{{__('website.contactInformation1')}}</p>
                    <p>{{__('website.contactInformation2')}}</p>
                    <p>{{__('website.contactInformation3')}}</p>
                    <p>{{__('website.contactInformation4')}}</p>
                    {{--                    <div class="mt-5">--}}
                    {{--                        <a href="#" class="index_contact_order">{{__('website.order')}}</a>--}}
                    {{--                    </div>--}}
                </div>

                <div class="col-md-6 calculator1"  style="top: 20px;position: absolute;z-index: 5000;right: 47px;">
                    <div class="contact_border"
                         style="height: 351px!important;width: 650px;background: linear-gradient(50deg,#2AF598,#08AEEA)">
                        @include('web.partials.pricing')
                    </div>
                </div>
                <div class="col-md-12" style="padding: 0;margin: 0;">

                    <div class="img_slider" style="display: none">
                        <div class="slider" style="border-radius: 30px!important;">
                            @foreach($sliders as $slider)
                                <div><img src="{{url('slider/images/' . $slider->picture)}}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="col-md-12" style="display: none" id="calculator2">
        <div class="contact_border"
             style="height: 351px!important;background: linear-gradient(50deg,#2AF598,#08AEEA)">
            @include('web.partials.pricing')
        </div>
    </div>
    <section>
        <div class="index_page">
            <!--<div class="container">-->
            <!--    <div class="row">-->
            <!--        <div class="col-md-12 mt-5">-->
            <!--            <div class="index_cont">-->
            <!--                <div class="row">-->
            <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
            <!--                        <div class="border_c">-->
        <!--                            <img src="{{url('front/image/headphones.svg')}}">-->
        <!--                            <h4><strong>{{__('website.call_center')}}</strong></h4>-->
        <!--                            <div class="mb-2">{{__('website.call_center_description')}}</div>-->
        <!--                            <div>{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
            <!--                        <div class="border_c">-->
        <!--                            <img src="{{url('front/image/clock.svg')}}">-->
        <!--                            <h4><strong>{{__('website.working_hours')}}</strong></h4>-->
        <!--                            <div class="mb-2">{{__('website.working_hours_description')}}</div>-->
        <!--                            <div>{{__('website.working_hourses')}}</div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="col-md-4 col-sm-6 col-xs-12">-->
            <!--                        <div class="border_c">-->
        <!--                            <img src="{{url('front/image/map.svg')}}">-->
        <!--                            <h4><strong>{{__('website.ouraddress')}}</strong></h4>-->
        <!--                            <div class="mb-2">{{__('website.subtitle1')}}</div>-->
        <!--                            <div>{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->


        <!--<div  class="how_work_text">{{__('website.how')}} <span class="yellow">{{__('website.kargo_az')}}</span>-->
        <!--    {{__('website.works')}}?-->
            <!--</div>-->
            <!--<div class="map mb-5">-->
            <!--    <div class="how_work">-->
            <!--        <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"-->
        <!--                src="{!! \App\Setting::getValue(\App\Setting::FIELD_CONTACT_URL_MAP) !!}"></iframe>-->
            <!--        <a href="https://www.maps.ie/route-planner.htm"></a>-->
            <!--    </div>-->
            <!--    <div class="container how_work_list" style="margin-top: -100px">-->
            <!--        <div class="row">-->
            <!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
            <!--                <div class="how_work_col m_right_20">-->
            <!--                    <div class="how_work_img">-->
        <!--                        <span class="how_work_span">{{__('website.It_is_too_late')}}</span>-->
        <!--                        <img src="{{url('front/image/checkList.svg')}}">-->
            <!--                    </div>-->
        <!--                    {{__('website.It_is_too_late_description')}}-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
            <!--                <div class="how_work_col m_left_20">-->
            <!--                    <div class="how_work_img">-->
        <!--                        <span class="how_work_span">{{__('website.sendvote')}}</span>-->
        <!--                        <img src="{{url('front/image/boxList.svg')}}">-->
            <!--                    </div>-->
        <!--                    {{__('website.sendvoteshopping')}}-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
            <!--                <div class="how_work_col m_right_20">-->
            <!--                    <div class="how_work_img">-->
        <!--                        <span class="how_work_span">{{__('website.getpackage')}}</span>-->
        <!--                        <img src="{{url('front/image/ship.svg')}}">-->
            <!--                    </div>-->
            <!--                    <div style="clear: both;"></div>-->
        <!--                    {{__('website.getpackageloc')}}-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
            <!--                <div class="how_work_col m_left_20">-->
            <!--                    <div class="how_work_img">-->
        <!--                        <span class="how_work_span">{{__('website.cargostorage')}}</span>-->
        <!--                        <img src="{{url('front/image/homeBox.svg')}}">-->
            <!--                    </div>-->
        <!--                    {{__('website.cargo_storage_description')}}-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
        <!--    <div class="air"><img src="{{url('front/image/indexAir.svg')}}" class="w-100"></div>-->
            <!--</div>-->
            <!--<div class="latest_dots">-->
        <!--    <img src="{{url('front/image/dots.svg')}}">-->
            <!--</div>-->
            <div class="container">
                <div class="row">
                    <div class="pricing">
                        <div class="col-md-12 mt-5">
                            <div class="col-md-4 p-0"><h3>{{__('website.tariffs_by_countries')}}</h3>
                                <span><hr class="blue_hr" style=""></span>
                            </div>
                            <div class="col-md-8 p-0">
                                <div class="tab">
                                    @foreach($countries as $country)
                                        <button class="tablinks" onclick="openCity(event, 'country-{{$country->id}}')" id="defaultOpen"><img src="{{url("images/{$country->flag}")}}" >
                                            <span class="dis_no">{{app()->getLocale()=='en'?$country->name:$country->name_ru}}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 mt-5 mb-5">
                                @foreach($countries as $country)
                                    <div id="country-{{$country->id}}" class="tabcontent">
                                        <div class="row">
                                            <table>
                                                <tr>
                                                    <th scope="col">{{__('website.weight')}}</th>
                                                    <th scope="col">{{__('website.solid_product_type')}}</th>
                                                    <th scope="col">{{__('website.liquid_product_type')}}</th>
                                                </tr>
                                                @foreach($country->priceCalculators as $priceCalculator)
                                                    <tr>
                                                        <th scope="row">{{$priceCalculator->from }}
                                                            - {{$priceCalculator->to }} {{$priceCalculator->unit->title}} {{$priceCalculator->des ?? ""}}
                                                        </th>
                                                        <td>{{$priceCalculator->liquid_currency}}$</td>
                                                        <td>{{$priceCalculator->currency}}$</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="counter cou_date_col" id="counter">
                <div class="container p-0 mt-5">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <a href="https://www.youtube.com/embed/tgbNymZ7vqY" target="_blank">
                                <div class="video_mage">
                                    <div class="blog_img">
                                        <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div style="clear:both"></div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="cou_date_box">
                                <div class="yellow counter_text">{{__('website.home_page_counter_text1')}}</div>
                                <div class="cou_date">
                                    <span class="counter-value"
                                          data-count="{{__('website.home_page_data_count1')}}"></span> <i
                                        class="fas fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="cou_date_box">
                                <div class="yellow counter_text">{{__('website.home_page_counter_text2')}}</div>
                                <div class="cou_date">
                                    <span class="counter-value"
                                          data-count="{{__('website.home_page_data_count2')}}"></span> <i
                                        class="fas fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="cou_date_box">
                                <div class="yellow counter_text">{{__('website.home_page_counter_text3')}}</div>
                                <div class="cou_date">
                                    <span class="counter-value"
                                          data-count="{{__('website.home_page_data_count3')}}"></span> <i
                                        class="fas fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog">
                <div class="container">
                    <div class="black pt-5"><h3>{{__('website.newsevents')}}</h3>
                        <span><hr class="blue_hr" style=""></span>
                    </div>
                    <div class="owl-carousel owl-theme">
                        @foreach($blogs as $blog)
                            <div class="item">
                                <div class="blog_mage col-md-5 col-sm-5">
                                    <div class="blog_img" style=":before background: none"><img
                                            src="{{url('images/'.$blog->picture)}}" class="w-100"></div>
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <h4><strong>{{$blog->title}}</strong></h4>
                                    <p class="font_grey mb-3">{{$blog->author->name}} <i
                                            class="far fa-comment ml-3 mr-1"></i> 3</p>
                                    <div class="line_he mt-2 mb-2">
                                        {{\App\lib\Helpers::getContent($blog->content, 45)}}
                                    </div>
                                    <div class="blog_a mt-4 mb-3">
                                        <a href="{{url('/blog/' . $blog->slug)}}"> {{__('website.readmore')}}<i
                                                class="fas fa-chevron-right ml-3"></i></a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="partner_text">
                <div class="container">
                    <div class="black pt-5"><h3>{{__('website.customer_reviews')}}</h3>
                        <span><hr class="blue_hr" style=""></span>
                    </div>
                    <div class="owl-carousel owl-theme">
                        @foreach($customerReviews as $customerReview)
                            <div class="item">
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
            <div class="partner">
                <div class="container">
                    <a href="/customers">
                        <div class="black pt-5"><h3>{{__('website.customers')}}</h3>
                            <span><hr class="blue_hr" style=""></span>
                        </div>
                    </a>
                    <div class="owl-carousel owl-theme">
                        @foreach($customers as $customer)
                            <div class="item">
                                <a href="{{$customer->link}}" target="_blank"><img
                                        src="{{asset('images/customers/'.$customer->image->file_name)}}"
                                        alt="{{$customer->name}}"></a>
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
    <script>
        function showStuff(id, text, btn) {
            document.getElementById(id).style.display = 'block';
            document.getElementById(text).style.display = 'none';
            btn.style.display = 'none';
        }
    </script>

    <!-- skills -->
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
    </script>
    <script type="text/javascript">
        $('.partner .owl-carousel').owlCarousel({
            loop: false,
            // margin: 10,
            dots: true,
            autoplay: true,
            loop: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 2
                },
                481: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }
        })
    </script>
    <script type="text/javascript">
        $('.partner_text .owl-carousel').owlCarousel({
            loop: false,
            margin: 30,
            dots: true,
            autoplay: true,
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
            }
        })
    </script>

    <link rel="stylesheet" href="{{url('front/plugin/bxslider/jquery.bxslider.css')}}">
    <script src="{{url('front/plugin/bxslider/jquery.bxslider.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('div .img_slider').css('display', 'block')

            $('.slider').bxSlider({
                auto: true,
            });
        })
    </script>
@endsection

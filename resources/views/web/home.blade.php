@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.home')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('front/css/index_page.css?v=1.0.5')}}">

    <style>
    </style>
@endsection
@section('content')
    <div class="contact index_contact">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-6 col-sm-3 col-xs-3 slider_text" style="">
                    <h1>
                        {{__('website.kargo')}} {{__('website.transport')}}
                    </h1>
                    <p>{{__('website.contactInformation1')}}</p>
{{--                    <p>{{__('website.contactInformation2')}}</p>--}}
{{--                    <p>{{__('website.contactInformation3')}}</p>--}}
{{--                    <p>{{__('website.contactInformation4')}}</p>--}}
                    <a href="{{url('/projects')}}" class="banner_show">{{__('website.show_all')}}</a>
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
    <div class="container tm-features-section">
        <div class="row tm-features-row">
            <section class="col-md-6 col-sm-12 tm-feature-block">
                <header class="tm-feature-header">
                    <i class="fas fa-5x fa-anchor tm-feature-icon"></i>
                        <h3 class="tm-feature-h">{{__('website.after_slider_header1')}}</h3>
                </header>
                <p>
                    {{__('website.after_slider_message1_p1')}}
                </p>
                <p>
                    {{__('website.after_slider_message1_p2')}}
                </p>
            </section>
            <section class="col-md-6 col-sm-12 tm-feature-block">
                <header class="tm-feature-header">
                    <i class="fas fa-5x fa-atom tm-feature-icon"></i>
                    <h3 class="tm-feature-h">{{__('website.after_slider_header2')}}</h3>
                </header>
                <p>
                    {{__('website.after_slider_message2_p1')}}

                </p>
                <p>
                    {{__('website.after_slider_message2_p2')}}
                </p>
            </section>
        </div>
    </div>

    <div style="clear: both"></div>
    <br>
    <section>
        <div class="index_page">
            <br>
            <div class="container" id="projects">
                <div class="row">
                    <div class="col-12 mt-4 mb-4">
                        <div class="h7 text-center color_blue"><strong>{{__('website.project')}}</strong> </div>
                        <h6 class="text-center color_gold"><strong>{{__('website.project_description')}}</strong> </h6>
                    </div>
                </div>
                <div class="row">
                    @foreach($projects as $project)
                        @if($loop->iteration ==9)
                            @break
                        @endif
                        <div class="col-lg-3 col-sm-6 col-md-4">
                            <a href="{{url('/project/'.$project->id)}}" style="cursor: pointer">
                                <div class="tm-activity-block">
                                    <div class="tm-activity-img w-100-container">
                                        <img src='{{url("images/$project->indicator_picture")}}' alt="Image" class="tm-activity-img w-100" />
                                    </div>
                                    <div class="tm-activity-block-text">
                                        <h6 class="color_gold">{{$project->title}}</h6>
                                        <div class="color_fff"><i class="fas fa-map-marker-alt color_gold mr-2"></i>{{$project->address}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                            <span id="dots"></span>
                            <div id="more">
                                <div class="row">
                                    @foreach($projects as $project)
                                        @if($loop->iteration >8)
                                            <div class="col-lg-3 col-sm-6 col-md-4">
                                                <a href="{{url('/project/'.$project->id)}}" style="cursor: pointer">
                                                    <div class="tm-activity-block">
                                                        <div class="tm-activity-img w-100-container">
                                                            <img src='{{url("images/$project->indicator_picture")}}' alt="Image" class="tm-activity-img w-100" />
                                                        </div>
                                                        <div class="tm-activity-block-text">
                                                            <h6 class="color_gold">{{$project->title}}</h6>
                                                            <div class="color_fff"><i class="fas fa-map-marker-alt color_gold mr-2"></i>{{$project->address}}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                            @endforeach

                                </div>
                        </div>

                </div>
                @if($projects->count()>8)
                    <div class="skills_input text-center"><button onclick="myFunction()" id="myBtn">{{__('website.readmore')}}</button></div>
                @endif
                {{--                <div class="row text-center">--}}
{{--                    <div class="col-md-12 skills_input text-center"><button onclick="myFunction()" id="myBtn">Read more</button></div>--}}
{{--                </div>--}}
            </div>
            <br>
            <!-- Blog -->
            <div style="background: #202c3b">
                <section class="container tm-contact-section blog_list">
                    <div class="row">

                        <div class="col-12 mb-4">
                            <div class="h7 text-center color_gold"><strong>{{__('website.newsletter')}}</strong> </div>
                        </div>
                        <div class="col-md-12 tm-contact-left">
                            <div id="blog_owl" class="owl-carousel owl-theme">

                                @foreach($blogs as $blog)
                                    <div class="item">
                                        <div class="blog">
                                            <a href="{{url('/blog/' . $blog->slug)}}">
                                                <div class="blog_img">
                                                    <img src="{{url('images/' . $blog->picture)}}" class="w-100">
                                                </div>
                                                <h5 class="blog_text"><strong>{{$blog->title}}</strong></h5>
                                                <div class="blog_date">{{$blog->created_at}}</div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <div class="map">
                    <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="{!! \App\Setting::getValue(\App\Setting::FIELD_CONTACT_URL_MAP) !!}"></iframe>
                    <a href="https://www.maps.ie/route-planner.htm"></a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="iframeModal">
            <div class="modal-dialog">
                <div class="modal-content bmd-modalContent">

                    <div class="modal-body">

                        <div class="close-button">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe id="iframe" class="embed-responsive-item" src="{{\App\Setting::getValue(\App\Setting::FIELD_HOME_URL_VIDEO)}}" frameborder="0"></iframe>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </section>
@endsection

@section('footerCustom')
    <script src="{{url('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('front/js/home/counter.js')}}"></script>

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


        $('#blog_owl').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            autoplay: 800,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:3
                }
            }
        })
    </script>


    <script>
        /**
         * detect IE
         * returns version of IE or false, if browser is not Internet Explorer
         */
        function detectIE() {
            var ua = window.navigator.userAgent;

            var msie = ua.indexOf("MSIE ");
            if (msie > 0) {
                // IE 10 or older => return version number
                return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
            }

            var trident = ua.indexOf("Trident/");
            if (trident > 0) {
                // IE 11 => return version number
                var rv = ua.indexOf("rv:");
                return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
            }

            // var edge = ua.indexOf('Edge/');
            // if (edge > 0) {
            //     // Edge (IE 12+) => return version number
            //     return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
            // }

            // other browser
            return false;
        }

        function setVideoHeight() {
            const videoRatio = 1920 / 1080;
            const minVideoWidth = 400 * videoRatio;
            let secWidth = 0,
                secHeight = 0;

            secWidth = videoSec.width();
            secHeight = videoSec.height();

            secHeight = secWidth / 2.13;

            if (secHeight > 600) {
                secHeight = 600;
            } else if (secHeight < 400) {
                secHeight = 400;
            }

            if (secWidth > minVideoWidth) {
                $("video").width(secWidth);
            } else {
                $("video").width(minVideoWidth);
            }

            videoSec.height(secHeight);
        }

        // Parallax function
        // https://codepen.io/roborich/pen/wpAsm
        var background_image_parallax = function($object, multiplier) {
            multiplier = typeof multiplier !== "undefined" ? multiplier : 0.5;
            multiplier = 1 - multiplier;
            var $doc = $(document);
            $object.css({ "background-attatchment": "fixed" });
            $(window).scroll(function() {
                var from_top = $doc.scrollTop(),
                    bg_css = "center " + multiplier * from_top + "px";
                $object.css({ "background-position": bg_css });
            });
        };

        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $(".scrolltop:hidden")
                    .stop(true, true)
                    .fadeIn();
            } else {
                $(".scrolltop")
                    .stop(true, true)
                    .fadeOut();
            }

            // Make sticky header
            if ($(this).scrollTop() > 158) {
                $(".tm-nav-section").addClass("sticky");
            } else {
                $(".tm-nav-section").removeClass("sticky");
            }
        });

        let videoSec;

        $(function() {
            if (detectIE()) {
                alert(
                    "Please use the latest version of Edge, Chrome, or Firefox for best browsing experience."
                );
            }

            const mainNav = $("#tmMainNav");
            mainNav.singlePageNav({
                filter: ":not(.external)",
                offset: $(".tm-nav-section").outerHeight(),
                updateHash: true,
                beforeStart: function() {
                    mainNav.removeClass("show");
                }
            });

            videoSec = $("#tmVideoSection");

            // Adjust height of video when window is resized
            $(window).resize(function() {
                setVideoHeight();
            });

            setVideoHeight();

            $(window).on("load scroll resize", function() {
                var scrolled = $(this).scrollTop();
                var vidHeight = $("#hero-vid").height();
                var offset = vidHeight * 0.6;
                var scrollSpeed = 0.25;
                var windowWidth = window.innerWidth;

                if (windowWidth < 768) {
                    scrollSpeed = 0.1;
                    offset = vidHeight * 0.5;
                }

                $("#hero-vid").css(
                    "transform",
                    "translate3d(-50%, " + -(offset + scrolled * scrollSpeed) + "px, 0)"
                ); // parallax (25% scroll rate)
            });

            // Parallax image background
            background_image_parallax($(".tm-parallax"), 0.4);

            // Back to top
            $(".scroll").click(function() {
                $("html,body").animate(
                    { scrollTop: $("#home").offset().top },
                    "1000"
                );
                return false;
            });
        });
    </script>

        <link rel="stylesheet" href="{{url('front/plugin/bxslider/jquery.bxslider.css')}}">
            <script src="{{url('front/plugin/bxslider/jquery.bxslider.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('div .img_slider').css('display', 'block')

            $('.slider').bxSlider({
                auto: true,
                pager: false, // disables pager
            });
        })

        $('.all_customer_button').on('click',function(){
            window.location.href='{{url('/customers')}}'
        });
    </script>
@endsection

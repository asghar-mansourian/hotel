@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{ __('website.howtitle') }}
@endsection
@section('styles')
{{--    <link rel="stylesheet" href="{{url('front/css/index.css')}}">--}}
    <link rel="stylesheet" href="{{url('front/css/how_page.css?v=1.0.0.2')}}">

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: unset!important;padding-right: unset ">
                <img style="width: 100%" src="{{url('/front/image/index.png')}}">
                <h1 class="image_top_text">{{__('website.how_image_text_1')}}
                    {{__('website.how_image_text_2')}}</h1>
            </div>
        </div>
        <div class="pricing">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-4 col-sm-12">
                    <h1 class="how_work_title mt-0">{{__('website.how_we_work_page')}}</h1>
                    <span></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 right_back_image text-right">
                    <img src="{{url('/front/image/how/how_right_back.png')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 left_back_image">
                    <img src="{{url('/front/image/how/how_left_back.png')}}">
                </div>
            </div>
            <br>
            <div class="row message">
                <div class="col-md-1 d-xl-none">
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12" style="margin-left:80px;background-image: url('/front/image/how_page_line.png');background-position-y: ">
                    <hr>
                    <div class="col-md-12 col-sm-12 col-xs-12 how_message">
                        <div class="col-md-2 col-sm-12 col-xs-12 text-center">
                            <img src="{{url('/front/image/how/how_step_one.png')}}">
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <p class="how_title">{{__('website.how_work_step_1_title')}}</p>
                            <p class="inline" >
                            {{__('website.how_work_step_1_message')}}
                        </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 how_message">
                        <div class="col-md-2 col-sm-12 col-xs-12 text-center">
                            <img src="{{url('/front/image/how/how_step_two.png')}}">
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <p class="how_title">
                                {{__('website.how_work_step_2_title')}}
                            </p>
                            <p class="inline">
                                {{__('website.how_work_step_2_message')}}
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 how_message">
                        <div class="col-md-2 col-sm-12 col-xs-12 text-center">
                            <img src="{{url('/front/image/how/how_step_3.png')}}">
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <p  class="how_title" >
                                {{__('website.how_work_step_3_title')}}
                            </p>
                            <p  class="inline" >
                                {{__('website.how_work_step_3_message')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="row">--}}
{{--                <div class="skills">--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class="skills_italy">--}}
{{--                                @foreach($howWorks as $howWork)--}}
{{--                                    @if($loop->iteration == 5)--}}
{{--                                        <span id="dots"></span><span id="more">--}}
{{--                                            @endif--}}
{{--                                            <div class="col-md-6 col-sm-6 mt-5">--}}
{{--                                                <h4 class="color_dark_blue">--}}
{{--                                                    {{$howWork->title}}?--}}
{{--                                                </h4>--}}
{{--                                                <p>--}}
{{--                                                    {!! $howWork->description !!}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}

{{--                                        @endforeach--}}

{{--                                            @if(count($howWorks) >4)--}}
{{--                                                </span>--}}
{{--                                        <div class="col-md-12 mb-5 skills_input text-center"><button onclick="myFunction()" id="myBtn"><i class="fas fa-chevron-down"></i></button></div>--}}
{{--                                    @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
@section('footerCustom')
    <script src="{{url('front/js/how/how.js')}}"></script>
    <script>
        function showStuff(id, text, btn) {
            document.getElementById(id).style.display = 'block';
            document.getElementById(text).style.display = 'none';
            btn.style.display = 'none';
        }
    </script>
    <!-- faq menu js  -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel_faq = this.nextElementSibling;
                if (panel_faq.style.maxHeight) {
                    panel_faq.style.maxHeight = null;
                    panel_faq.style.margin = null;
                    panel_faq.style.padding = null;
                    panel_faq.style.border = null;
                } else {
                    panel_faq.style.maxHeight = panel_faq.scrollHeight + "10px";
                    panel_faq.style.margin = "20px 0";
                    panel_faq.style.padding = "15px";
                    panel_faq.style.border = "1px solid #eee";
                }
            });
        }
    </script>

@endsection

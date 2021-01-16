@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{ __('website.howtitle') }}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('front/css/index.css')}}">

    {{--    <link rel="stylesheet" href="{{url('front/css/pricing.css')}}">--}}
@endsection
@section('content')
    <div class="container">
        <div class="pricing">
            <div class="mt-5 p-0 text-center">
                <h1 class="green_blue mt-0">{{__('website.howwework')}}</h1>
                <span><hr class="blue_hr"  style="margin-left: auto; margin-right: auto;"/></span>
            </div>
            <div class="row">
                <div class="skills">
                    <div class="container">
                        <div class="row">
                            <div class="skills_italy">
                                @foreach($howWorks as $howWork)
                                    @if($loop->iteration == 5)
                                        <span id="dots"></span><span id="more">
                                            @endif
                                            <div class="col-md-6 col-sm-6 mt-5">
                                                <h4 class="color_dark_blue">
                                                    {{$howWork->title}}?
                                                </h4>
                                                <p>
                                                    {!! $howWork->description !!}
                                                </p>
                                            </div>

                                        @endforeach

                                            @if(count($howWorks) >4)
                                                </span>
                                        <div class="col-md-12 mb-5 skills_input text-center"><button onclick="myFunction()" id="myBtn"><i class="fas fa-chevron-down"></i></button></div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

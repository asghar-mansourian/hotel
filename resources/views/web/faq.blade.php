@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.faq')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('/front/css/faq.css?v=1.0.2')}}">
    @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: unset!important;padding-right: unset ">
                <img style="width: 100%" src="{{url('/front/image/fag_index.png')}}">
                <h1 class="image_top_text">{{__('website.pricing_image_text')}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
{{--            <div class="col-md-12">--}}

{{--                <div class="row">--}}

{{--                    <div class="col-md-7 col-sm-7">--}}
{{--                        <div class="black pt-5"><span class="yellow mr-3"></span>{{__('website.faq')}}</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-12 faq">
                @foreach($faqs as $faq)
                    <button class="accordion"><h1>{{$faq->title}}</h1></button>
                    <div class="panel_faq">
                        <p>{!! $faq->content !!}</p>
                    </div>

                @endforeach
            </div>
            <div class="col-md-12 back_left_image text-right">
                <img src="{{url('/front/image/pricing_back.png')}}">
            </div>
            <div class="col-md-12 back_right_image text-left">
                <img src="{{url('/front/image/how/how_left_back.png')}}">
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')
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

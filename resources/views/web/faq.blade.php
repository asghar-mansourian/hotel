@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.faq')}}
@endsection
@section('styles')
{{--    <link rel="stylesheet" href="{{url('/front/css/faq.css?v=1.0.2')}}">--}}
    @endsection
@section('content')
    <div class="tm-parallax" style="background-position: center 840px;">
        <header class="tm-parallax-header">
            <h2 class="">{{__('website.faq')}}</h2>
        </header>
    </div>
    <!-- FAQ -->
    <div class="site_center faq">
        <div class="container mt-4 mb-5">
            <div class="row mt-3">
                @foreach($faqs as $faq)
                <button class="accordion">{{$faq->title}}</button>
                <div class="panel">
                    <p>{!! $faq->content !!}</p>
                </div>
                @endforeach
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

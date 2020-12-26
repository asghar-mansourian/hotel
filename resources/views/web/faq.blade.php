@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.faq')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">

                    <div class="col-md-7 col-sm-7">
                        <div class="black pt-5"><span class="yellow mr-3"></span>{{__('website.faq')}}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 faq">
                @foreach($faqs as $faq)
                    <button class="accordion">{{$faq->title}}</button>
                    <div class="panel_faq">
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

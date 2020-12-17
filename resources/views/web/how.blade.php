@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{ __('website.howtitle') }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 col-sm-7">
                        <div class="black pt-5">{{__('website.how')}}<span class="yellow ml-3 mr-3">kargo</span>{{__('website.works')}} ?</div>
                        <div class="italic">{{__('website.subtitle2')}}<br/>{{__('website.subtitle1')}}
                        </div>
                        <div class="col-md-12 mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="how_work_list">
                                        <div class="how_work_page text-center">
                                            <img src="{{url('front/image/product_select.png')}}">
                                            <h4><strong>{{__('website.register')}}</strong></h4>
                                            <div class="yellow_border"></div>
                                            <div class="how_work_page_text">
                                                {{__('website.registeron')}}
                                            </div>
                                        </div>
                                        <div class="how_work_num" style="margin-top: -1px!important;">1</div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="how_work_list">
                                        <div class="how_work_page text-center">
                                            <img src="{{url('front/image/how_work_box.png')}}">
                                            <h4><strong>{{__('website.sendvote')}}</strong></h4>
                                            <div class="yellow_border"></div>
                                            <div class="how_work_page_text">
                                                {{__('website.sendvoteshopping')}}
                                            </div>
                                        </div>
                                        <div class="how_work_num" style="margin-top: -15px!important;">2</div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="how_work_list">
                                        <div class="how_work_page text-center">
                                            <img src="{{url('/front/image/ship.png')}}">
                                            <h4><strong>{{__('website.getpackage')}}</strong></h4>
                                            <div class="yellow_border"></div>
                                            <div class="how_work_page_text">
                                                {{__('website.getpackageloc')}}
                                            </div>
                                        </div>
                                        <div class="how_work_num" style="margin-top: 7px!important;">3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

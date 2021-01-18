<div style="clear:both"></div>
<div class="footer" style="margin-top: 30px;">
    <div class="footer_sky">
        <div class="container" style="margin-bottom: 25px;">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-5">
                    <div class="logo">
                        <img src="{{url('front/image/favicon/Untitled-1-05.svg')}}">
                        <div class="font_grey mt-5" style="    color: #fff;">
                            {{__('website.footer_bottom_left')}}
                            <div class="mt-3">
                                <a href="#" class="font_black blue"><strong style="color: #fff">{{\App\Setting::getValue(\App\Setting::FIELD_EMAIL)}}</strong></a>
                            </div>
                        </div>
                        <div class="font_black blue mt-3">
                            <strong style="color: #fff">{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</strong></div>
                        <div class="menu mt-5 ">
                            <ul class="p-0">
                                <li>
                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_FACEBOOK)}}"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_GOOGLE_PLUS)}}"><i
                                            class="fab fa-google-plus-g"></i></a>
                                </li>
                                <li>
                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_INSTAGRAM)}}"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_WHATSUP)}}"><i
                                            class="fab fa-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_TELEGRAM)}}"><i
                                            class="fab fa-telegram"></i></a>
                                </li>
                            </ul>
                            <a  href="{{\App\Setting::getValue(\App\Setting::FIELD_LINK_GOOGLE_PLAY)}}">
                                <img src="{{url('./front/image/android.png')}}" alt="" style="margin-top: 20px;    width: 45%;">
                            </a>

                            <a href="{{\App\Setting::getValue(\App\Setting::FIELD_LINK_APP_STORE)}}">
                                <img src="{{url('./front/image/apple.png')}}" alt="" style="margin-top: 20px;      width: 45%;">
                            </a>
                        </div>

                    </div>
                    <div class="" style="margin-top: 20px!important;">

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 p-0">
                        <div class="title_list">{{__('website.service')}}</div>
                        <div class="menu_list mt-5">
                            {{--                                     <span>--}}
                            {{--                         {{\App\Setting::getValue(\App\Setting::FIELD_SERVICE)}}--}}
                            {{--                     </span>--}}
                            <a href="{{url('/faq')}}"> {{__('website.faq')}} </a>
                            <br>
                            <a style="line-height: 43px;" href="{{url('/how-we-work')}}">{{__('website.howwework')}} </a>
                            <br>
                            <a href="{{url('/pricing')}}">{{__('website.pricing')}}</a>
                            <br>
                            <a style="line-height: 43px;" href="{{url('/blog')}}">{{__('website.blog')}}</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 p-0">
                        <div class="title_list">{{__('website.aboutus')}}</div>
                        <div class="menu_list mt-5">
                            {{--                                    <span>--}}
                            {{--                        {{\App\Setting::getValue(\App\Setting::FIELD_ABOUT_US)}}--}}
                            {{--                    </span>--}}
                            <a href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
                            <br>
                            <a style="line-height: 43px;" href="{{url('pages/3')}}">{{__('website.aboutus')}}</a>
                            <br>
                            <a href="{{url('pages/1')}}">{{__('website.rules')}}</a>
                            <br>
                            <a style="line-height: 43px;" href="{{url('/customers')}}">{{__('website.customers')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-5">
                    <div class="title_list">{{__('website.ouraddress')}}</div>
                    <div class="font_grey mt-5" style="    color: #fff;">
                        {{__('website.subtitle1')}}<br>{{__('website.subtitle2')}}<br>
                        <br>
                        <div class="contact_map">
                            <div style="width: 100%">
                                <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                        src="{!! \App\Setting::getValue(\App\Setting::FIELD_CONTACT_URL_MAP) !!}"></iframe>
                                <a href="https://www.maps.ie/route-planner.htm"></a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .footer_sky:before {
        z-index: 0 !important;
    }
</style>

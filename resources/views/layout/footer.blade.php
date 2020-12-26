<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="logo">
                    <img src="{{url('front/image/logo.svg')}}">
                    <div class="font_grey mt-5" style="    color: #151f59;">
                        {{__('website.footer_bottom_left')}}
                        <div class="mt-3"><a href="#" class="font_black blue"><strong>{{\App\Setting::getValue(\App\Setting::FIELD_EMAIL)}}</strong></a></div>
                    </div>
                    <div class="font_black blue mt-3"><strong>{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</strong></div>
                    <div class="menu mt-5 ">
                        <ul class="p-0">
                            <li>
                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_FACEBOOK)}}"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_GOOGLE_PLUS)}}"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_INSTAGRAM)}}"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_WHATSUP)}}"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            <li>
                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_TELEGRAM)}}"><i class="fab fa-telegram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="title_list">{{__('website.service')}}</div>
                <div class="menu_list mt-5">
                    {{-- <span>
                         {{\App\Setting::getValue(\App\Setting::FIELD_SERVICE)}}
                     </span>--}}
                    <a href="{{url('/faq')}}"> {{__('website.faq')}} </a>
                    <br>
                    <a style="line-height: 43px;" href="{{url('/how-we-work')}}">{{__('website.howwework')}} </a>
                    <br>
                    <a href="{{url('/pricing')}}">{{__('website.pricing')}}</a>
                    <br>
                    <a style="line-height: 43px;" href="{{url('/blog')}}">{{__('website.blog')}}</a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="title_list">{{__('website.aboutus')}}</div>
                <div class="menu_list mt-5">
                    {{--<span>
                        {{\App\Setting::getValue(\App\Setting::FIELD_ABOUT_US)}}
                    </span>--}}
                    <a href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
                    <br>
                    <a style="line-height: 43px;" href="{{url('pages/3')}}">{{__('website.aboutus')}}</a>
                    <br>
                    <a href="{{url('pages/1')}}">{{__('website.rules')}}</a>
                    <br>
                    <a style="line-height: 43px;" href="{{url('/customers')}}">{{__('website.customers')}}</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="title_list">{{__('website.ouraddress')}}</div>
                <div class="font_grey mt-5" style="    color: #151f59;">
                    {{__('website.subtitle1')}}<br>{{__('website.subtitle2')}}<br>
                </div>
                <div class="mt-5">
                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_LINK_GOOGLE_PLAY)}}">
                        <img src="{{url('./front/image/android.png')}}" alt="" style="    width: 45%;">
                    </a>
                    <br>
                    <br>
                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_LINK_APP_STORE)}}">
                        <img src="{{url('./front/image/apple.png')}}" alt="" style="    width: 45%;">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer_yellow text-left" style="padding: 0!important;height: 50px!important;">
    <a href="https://medyaturk.az/" style="font-size: 14px;height: 50px;display: block;position: relative">
        <span style="    position: absolute;
    bottom: 0;
    left: 0;
    background-color: #151f59;
    color: white;
    padding: 0 10px;"></span>
    </a>
</div>

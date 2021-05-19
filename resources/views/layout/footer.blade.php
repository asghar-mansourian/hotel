<div style="background: #202c3b; color: #fff">
    <div class="container footer_one">
        <div class="row p-4">
            <div class="col-md-3 col-sm-12">
                <div class="footer_img text-center">
                    <a href="{{url('/')}}"> <img src="{{url('/front/image/logo.png')}}" alt="Image" class="w-100"></a>
                </div>
                <div class="sosyal">
                    <div class="s_li"><a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_LINKEDIN_IN)}}"><i class="fab fa-linkedin-in"></i></a></a></div>
                    <div class="s_li"><a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_FACEBOOK)}}"><i class="fab fa-facebook-f"></i></a></div>
                    <div class="s_li"><a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_INSTAGRAM)}}"><i class="fab fa-instagram"></i></a></div>
                    <div class="s_li"><a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_YOUTUBE)}}"><i class="fab fa-youtube"></i></a></div>
                </div>
                <div class="f_number">
                    <i class="fas fa-headset mr-3"></i>{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}
                </div>

            </div>
            <div class="col-md-6 col-sm-6 p-0">
                <div class="row">
                    <div class="col-md-4 pr-0">
                        <div class="h7"><strong>{{__('website.footer_menu')}}</strong></div>
                        <div><a href="{{url('/projects')}}">{{__('website.projects')}}</a></div>
                        <div><a href="{{url('/rooms')}}">{{__('website.room')}}</a></div>
                        <div><a href="{{url('/pages/6')}}">{{__('website.inspirations')}}</a></div>
                        <div><a  href="{{url('/about-us')}}">{{__('website.aboutus')}}</a></div>
                        <div><a href="{{url('/pages/4')}}">{{__('website.policies')}}</a></div>
                    </div>
                    <div class="col-md-4 pr-0">
                        <div class="h7"><strong>{{__('website.account')}}</strong></div>
                        <div>{{__('website.my_account')}}</div>
                        <div>{{__('website.checkout')}}</div>
                        <div>{{__('website.my_cart')}}</div>
                        <div>{{__('website.my_catalog')}}</div>
                    </div>
                    <div class="col-md-4 pr-0">
                        <div class="h7"><strong>{{__('website.stat_connect')}}}</strong></div>
                        <div><a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_FACEBOOK)}}">{{__('website.face_book')}}</a></div>
                        <div><a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_INSTAGRAM)}}">{{__('website.instagram')}}</a></div>
                        <div><a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_TWITtER)}}">{{__('website.twitter')}}</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="h7"><strong>{{__('website.stay_update')}}</strong></div>
                <div class="email_send">
                    <input type="text" name="" placeholder="Enter your email">
                    <button><i class="fas fa-paper-plane"></i></button>
                </div>
                <div><i class="fas fa-map-marker-alt mr-3"></i>{{__('website.subtitle1')}}</div>
                <div><i class="fas fa-phone mr-3"></i>{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</div>
                <div>{{__('website.footer_web_Address')}}</div>
            </div>
        </div>
    </div>
</div>
<div style="background: #17202b; color: #fff">
    <footer class="container tm-footer pt-3 pb-3">
        <div class="text-center">
            {{__('website.footer_all_reserved')}}
        </div>
    </footer>
</div>


{{--<div style="clear:both"></div>--}}
{{--<div class="footer" style="margin-top: 30px;background-image: url('{{url('/front/image/footer_back.png')}}');background-size: 100% 100%">--}}
{{--    <div class="footer_sky">--}}
{{--        <div class="container" style="margin-bottom: 25px;">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-5">--}}
{{--                    <div class="logo">--}}
{{--                        <img src="{{url('front/image/favicon/Untitled-1-05.svg')}}">--}}
{{--                        <div class="font_grey mt-5" style="    color: #fff;">--}}
{{--                            <div class="font_black blue mt-3">--}}
{{--                                <strong style="color: #fff"><i class="fa fa-phone-alt" style="color: #fff"></i> {{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</strong></div>--}}

{{--                            <div class="mt-3">--}}
{{--                                <a href="#" class="font_black blue"><strong style="color: #fff">--}}
{{--                                        @ {{\App\Setting::getValue(\App\Setting::FIELD_EMAIL)}}</strong></a>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="" style="margin-top: 20px!important;">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mt-5">--}}
{{--                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6 p-0">--}}
{{--                        <div class="title_list">{{__('website.service')}}</div>--}}
{{--                        <div class="menu_list">--}}
{{--                            --}}{{--                                     <span>--}}
{{--                            --}}{{--                         {{\App\Setting::getValue(\App\Setting::FIELD_SERVICE)}}--}}
{{--                            --}}{{--                     </span>--}}
{{--                            <a href="{{url('/faq')}}"> {{__('website.faq')}} </a>--}}
{{--                            <a style="line-height: 43px;" href="{{url('/customers')}}">{{__('website.customers')}}</a>--}}
{{--                            <br>--}}
{{--                            <a style="line-height: 43px;" href="{{url('/how-we-work')}}">{{__('website.howwework')}} </a>--}}
{{--                            <br>--}}
{{--                            <a href="{{url('/pricing')}}">{{__('website.pricing')}}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 p-0">--}}
{{--                        <div class="title_list">{{__('website.aboutus')}}</div>--}}
{{--                        <div class="menu_list mt-5">--}}
{{--                            --}}{{----}}{{--                                    <span>--}}
{{--                            --}}{{----}}{{--                        {{\App\Setting::getValue(\App\Setting::FIELD_ABOUT_US)}}--}}
{{--                            --}}{{----}}{{--                    </span>--}}
{{--                            <a href="{{url('/contact-us')}}">{{__('website.contact')}}</a>--}}
{{--                            <br>--}}
{{--                            <a style="line-height: 43px;" href="{{url('pages/3')}}">{{__('website.aboutus')}}</a>--}}
{{--                            <br>--}}
{{--                            <a href="{{url('pages/1')}}">{{__('website.rules')}}</a>--}}
{{--                            <br>--}}
{{--                            <a style="line-height: 43px;" href="{{url('/customers')}}">{{__('website.customers')}}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">--}}
{{--                    <div class="title_list">{{__('website.ouraddress')}}</div>--}}
{{--                    <div class="font_grey" style="    color: #fff;">--}}
{{--                        <br>--}}
{{--                        {{__('website.subtitle1')}}<br>{{__('website.subtitle2')}}<br>--}}
{{--                        <div class="menu">--}}
{{--                            <ul class="p-0">--}}
{{--                                <li>--}}
{{--                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_TELEGRAM)}}">--}}
{{--                                        <img src="{{url('/front/image/telegram.png')}}">--}}

{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_FACEBOOK)}}">--}}
{{--                                        <img src="{{url('/front/image/facebook.png')}}">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_INSTAGRAM)}}">--}}
{{--                                        <img src="{{url('/front/image/instagram.png')}}">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_VIBER)}}">--}}
{{--                                        <img src="{{url('/front/image/viber.png')}}">--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_WHATSUP)}}">--}}
{{--                                        <img src="{{url('/front/image/whatsapp.png')}}">--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_YOUTUBE)}}">--}}
{{--                                        <img src="{{url('/front/image/youtube.png')}}">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <div style="display: inline-block">--}}
{{--                                <a  href="{{\App\Setting::getValue(\App\Setting::FIELD_LINK_GOOGLE_PLAY)}}">--}}
{{--                                    <img src="{{url('./front/image/footer_visa.png')}}" alt="" style="margin-top: 20px;width: 15%;">--}}
{{--                                </a>--}}

{{--                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_LINK_APP_STORE)}}">--}}
{{--                                    <img src="{{url('./front/image/MasterCard.png')}}" alt="" style="margin-top: 20px;width: 15%">--}}
{{--                                </a>--}}
{{--                                <a  href="{{\App\Setting::getValue(\App\Setting::FIELD_LINK_GOOGLE_PLAY)}}">--}}
{{--                                    <img src="{{url('./front/image/android.png')}}" alt="" style="margin-top: 20px;    width: 30%;">--}}
{{--                                </a>--}}

{{--                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_LINK_APP_STORE)}}">--}}
{{--                                    <img src="{{url('./front/image/AppStore.png')}}" alt="" style="margin-top: 20px;      width: 30%;">--}}
{{--                                </a>--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                        --}}{{--                        <div class="contact_map">--}}
{{--                            <div style="width: 100%">--}}
{{--                                <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"--}}
{{--                                        src="{!! \App\Setting::getValue(\App\Setting::FIELD_CONTACT_URL_MAP) !!}"></iframe>--}}
{{--                                <a href="https://www.maps.ie/route-planner.htm"></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12 text-center">--}}
{{--            <a style="font-size: 25px;--}}
{{--            font-family:'AvantGardeGothicC';--}}
{{--            color: rgb(255, 255, 255);--}}
{{--            line-height: 1.333;--}}
{{--            text-align: left;">{{__('website.footer_copy_write')}}</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<style>--}}
{{--    .footer_sky:before {--}}
{{--        z-index: 0 !important;--}}
{{--    }--}}
{{--</style>--}}

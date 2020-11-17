<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="logo">
                    <img src="./front/image/logo.svg">
                    <div class="font_grey mt-5">
                        {{__('website.subtitle1')}}<br>{{__('website.subtitle2')}}<br>
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
                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_LINKEDIN_IN)}}"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_PINTEREST)}}"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="title_list">{{__('website.service')}}</div>
                <div class="menu_list mt-5">
                   <span>
                       {{\App\Setting::getValue(\App\Setting::FIELD_SERVICE)}}
                   </span>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="title_list">{{__('website.aboutus')}}</div>
                <div class="menu_list mt-5">
                    <span>
                        {{\App\Setting::getValue(\App\Setting::FIELD_ABOUT_US)}}
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="title_list">{{__('website.ouraddress')}}</div>
                <div class="font_grey mt-5">
                    {{__('website.subtitle1')}}<br>{{__('website.subtitle2')}}<br>
                </div>
                <div class="mt-5">
                    <button style="text-align: left; border-radius: 5px;margin-bottom: 10px; width: 215px;     height: 48px;"
                            onclick="window.open('{{\App\Setting::getValue(\App\Setting::FIELD_LINK_GOOGLE_PLAY)}}', '_blank');">
                        <img src="{{url('./front/image/android.svg')}}" style="width: 28px">
                        <span>{{__('website.google_play')}}</span>
                    </button>
                    <br>
                    <button style="text-align: left; border-radius: 5px; width: 215px;    height: 48px;"
                            onclick="window.open('{{\App\Setting::getValue(\App\Setting::FIELD_LINK_APP_STORE)}}', '_blank');">
                        <img src="{{url('./front/image/apple.svg')}}" style="width: 28px">
                        <span>{{__('website.app_store')}}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer_yellow text-center">
    <div class="title_list">{{__('website.copyright')}}</div>
</div>

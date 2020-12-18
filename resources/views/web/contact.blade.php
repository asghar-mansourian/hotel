@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.contactus')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="black pt-5">{{__('website.contact')}}<span class="yellow ml-3"></span></div>
                        <div class="italic">{{__('website.subtitle1')}}<br/>{{__('website.subtitle2')}}</div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="img_slider_con">
                            <img src="{{url('front/image/contact_mes.svg')}}" class="img_slider_faq">
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="contac_bacg">
                                    <div class="contact_map">
                                        <div style="width: 100%">
                                            <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                                    src="{!! \App\Setting::getValue(\App\Setting::FIELD_CONTACT_URL_MAP) !!}"></iframe>
                                            <a href="https://www.maps.ie/route-planner.htm"></a></div>
                                    </div>
                                    <div class="contact_about">
                                        {{__('website.subtitle1')}} <br/>
                                        {{__('website.subtitle2')}}
                                        <div class="contact_bold">{{\App\Setting::getValue(\App\Setting::FIELD_EMAIL)}}</div>
                                        <div class="contact_bold">{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</div>
                                    </div>
                                    <div class="sosyal_list">
                                        <ul class="p-0">
                                            <li>
                                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_FACEBOOK)}}"><i class="fab fa-facebook-f" style="color: #fff !important;"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_GOOGLE_PLUS)}}"><i class="fab fa-google-plus-g" style="color: #fff !important;"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_INSTAGRAM)}}"><i class="fab fa-instagram" style="color: #fff !important;"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_LINKEDIN_IN)}}"><i class="fab fa-linkedin-in" style="color: #fff !important;"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{\App\Setting::getValue(\App\Setting::FIELD_SOCIAL_PINTEREST)}}"><i class="fab fa-pinterest-p" style="color: #fff !important;"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="contact_name">
                                    <div class="contac_title">{{__('website.contactus')}}</div>
                                    <div class="col-12" style="padding: 1px 16px;">
                                        @include('layout.error')
                                    </div>
                                    <form action="{{url('/contact-us')}}" method="post">
                                        @csrf
                                        <div class="contact_input mb-4 mt-4"><input type="text" name="name" placeholder="{{__('website.contact_name')}}" required></div>
                                        <div class="contact_input mb-4 mt-4"><input type="text" name="email" placeholder="{{__('website.contact_email')}}" required></div>
                                        <div class="contact_texta mb-4 mt-4"><textarea placeholder="{{__('website.contact_message')}}" name="message" required></textarea></div>
                                        <div class="contact_send mb-4 mt-4">
                                            <button type="submit">{{__('website.send')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

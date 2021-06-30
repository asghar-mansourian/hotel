@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.contactus')}}
@endsection
@section('styles')
{{--    <link rel="stylesheet" href="{{url('front/css/blog.css')}}">--}}
{{--    <link rel="stylesheet" href="{{url('front/css/index.css')}}">--}}

{{--    <link rel="stylesheet" href="{{url('front/css/pricing.css')}}">--}}
{{--    <link rel="stylesheet" href="{{url('front/css/contact.css?v=1.0.0')}}">--}}
@endsection
@section('content')
    <div class="tm-parallax" style="background-position: center 840px;">
{{--        <header class="tm-parallax-header">--}}
{{--            <h2 class="">{{__('website.contact')}}</h2>--}}
{{--        </header>--}}
    </div>
    <!-- Contact -->
    <div class="site_center contact">
        <div class="container mt-4 mb-5">
            <div class="row mt-3">
                <div class="col-lg-4 col-md-4 contact_left">
                    <h5 class="color_blue"><strong>{{__('website.contact_information_title')}}</strong></h5>
                    <div class="con_mt">
                        <ul>
                            <li>
                                <div class="con_icon">
                                    <span class="con_fac"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <div class="con_desc">{{__('website.contactInformation1')}}</div>
                            </li>
                            <li>
                                <div class="con_icon">
                                    <span class="con_fac"><i class="fas fa-phone-volume"></i></span>
                                </div>
                                <div class="con_desc"><p> {{\App\Setting::getValue(\App\Setting::FIELD_MOBILE)}}</p></div>
                            </li>
                            <li>
                                <div class="con_icon">
                                    <span class="con_fac"><i class="fas fa-phone-volume"></i></span>
                                </div>
                                <div class="con_desc"><p> {{\App\Setting::getValue(\App\Setting::FIELD_MOBILE_TWO)}}</p></div>
                            </li>
                            <li>
                                <div class="con_icon">
                                    <span class="con_fac"><i class="fas fa-envelope-open-text"></i></span>
                                </div>
                                <div class="con_desc">
                                    <p><a href="#">{{\App\Setting::getValue(\App\Setting::FIELD_EMAIL)}}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="con_icon">
                                    <span class="con_fac"><i class="far fa-clock"></i></span>
                                </div>
                                <div class="con_desc"><p>{{__('website.contactInformation2')}}</p></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{url('/contact-us')}}" method="post" class="col-lg-8 col-md-8 contact_right">
                    <h5 class="color_blue"><strong>{{__('website.contactus')}}</strong></h5>
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mt-4">@include('layout.error')</div>

                            <div class="col-md-12 col-sm-12 col-xs-12 mt-4">
                                <div class="input-icons">
                                    <input  name="email" class="input-field pl-3" type="email" required placeholder="{{__('website.email')}}">
                                </div>
                            </div>
                                <div class="col-md-6 mt-4">
                                    <div class="input-icons">
                                        <input  name="name" class="input-field pl-3" type="text" required placeholder="{{__('website.name_family')}}">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="input-icons select_input">
                                        {{--                                <select class="" name="area_code">--}}
                                        {{--                                    <option value="055">055</option>--}}
                                        {{--                                    <option value="050">050</option>--}}
                                        {{--                                    <option value="070">070</option>--}}
                                        {{--                                </select>--}}
                                        <input name="telephone" class="input-field pl-3" type="text" required placeholder="{{__('website.mobile')}}">
                                    </div>
                                </div>


                        <div class="col-md-12 mt-4">
                            <textarea name="message" required placeholder="{{__('website.message')}}"></textarea>
                        </div>
                    </div>
                        <div class="col-md-12 mt-3">
                            <div class="button_yellow text-center">
                                <button type="submit" class="btnn">{{__('website.send')}}</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    <div class="map">
        <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="{!! \App\Setting::getValue(\App\Setting::FIELD_CONTACT_URL_MAP) !!}"></iframe>
    </div>
@endsection

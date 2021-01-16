@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.contactus')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('front/css/blog.css')}}">
    <link rel="stylesheet" href="{{url('front/css/index.css')}}">

    <link rel="stylesheet" href="{{url('front/css/pricing.css')}}">
    <link rel="stylesheet" href="{{url('front/css/contact.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="pricing">
                <div class="col-md-12 mt-5">
                    <div class="col-md-12 p-0 text-center">
                        <span class="black"> {{__('website.contact')}}</span>
                        <span><hr class="blue_hr"  style="margin-left: auto; margin-right: auto;"/></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <p>{{__('website.information')}}</p>
                        <p>{{__('website.contactInformation1')}}</p>
                        <p>{{__('website.contactInformation2')}}</p>
                        <p>{{__('website.contactInformation3')}}</p>
                        <p>{{__('website.warehouseInformation')}}</p>
                        <p class="contact_i"><i class="fas fa-map-marker-alt"></i>{{__('website.contactInformation4')}}</p>
                        <p class="contact_i"><i class="far fa-envelope"></i> {{\App\Setting::getValue(\App\Setting::FIELD_EMAIL)}}</p>
                        <p class="contact_i"><i class="fas fa-phone-alt"></i> {{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</p>
                    </div>
                    <div class="col-md-6">
                        <div class="contact_border">
                            <div class="color_fff text-center mb-5">{{__('website.contactus')}}</div>
                            <div class="col-12" style="padding: 1px 16px;">
                                @include('layout.error')
                            </div>
                            <form action="{{url('/contact-us')}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <input type="text" name="name" placeholder="{{__('website.contact_name')}}" class="mb-4 w-100" required>
                                    <input type="email" name="email" placeholder="{{__('website.contact_email')}}" class="mb-4 w-100" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" placeholder="{{__('website.contact_message')}}" class="mb-4 w-100" required></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button>{{__('website.send')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="contact_map">
            <div style="width: 100%">
                <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="{!! \App\Setting::getValue(\App\Setting::FIELD_CONTACT_URL_MAP) !!}"></iframe>
                <a href="https://www.maps.ie/route-planner.htm"></a></div>
        </div>
    </div>
    <br style="margin-top: 5px;">
@endsection

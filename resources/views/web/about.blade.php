@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.about')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('/front/css/about.css')}}">
    @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: unset!important;padding-right: unset ">
                <img style="width: 100%" src="{{url('/front/image/about_index.png')}}">
                <h1 class="image_top_text">{{__('website.pricing_image_text')}}</h1>
            </div>
        </div>
    </div>
    <div class="container about">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h4 class="color_001 mt-0 mb-4">
                    <strong>
                    @php
                        $locale = app()->getLocale();
                        $content = app()->getLocale() !== 'en' ? "content_{$locale} as content" : 'content';
                        $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';
                     $agency = Illuminate\Support\Facades\DB::table('pages')->where('id' , 3)->select([$content , $title])->first()
                    @endphp
                    {{$agency->title}}
{{--                    @if(app()->getLocale() == 'en')--}}
{{--                        {!! \App\Setting::getValue(\App\Setting::FIELD_ABOUT_US) !!}--}}
{{--                    @elseif(app()->getLocale() == 'ru')--}}
{{--                        {!! \App\Setting::getValue(\App\Setting::FIELD_ABOUT_US_RU) !!}--}}
{{--                    @elseif(app()->getLocale() == 'az')--}}
{{--                        {!! \App\Setting::getValue(\App\Setting::FIELD_ABOUT_US_AZ) !!}--}}
{{--                    @endif--}}
{{--                        {{__('website.aboutus_text_title')}}--}}

                    </strong>
                </h4>
{{--                <p>--}}
                <p>
                    {!! $agency ? $agency->content: '' !!}
                </p>
{{--                </p>--}}
{{--                {{__('website.aboutus_text_a1')}}--}}
{{--                <br/><br/>--}}
{{--                {{__('website.aboutus_text_a2')}}<br/>--}}

{{--                <i class="fas fa-genderless mr-4" style="font-size: 10px;"></i>{{__('website.aboutus_text_a3')}}<br/>--}}
{{--                <i class="fas fa-genderless mr-4" style="font-size: 10px;"></i>{{__('website.aboutus_text_a4')}}<br/>--}}
{{--                <i class="fas fa-genderless mr-4" style="font-size: 10px;"></i>{{__('website.aboutus_text_a5')}}<br/>--}}
{{--                <i class="fas fa-genderless mr-4" style="font-size: 10px;"></i>{{__('website.aboutus_text_a6')}}<br/>--}}
{{--                <i class="fas fa-genderless mr-4" style="font-size: 10px;"></i>{{__('website.aboutus_text_a7')}}<br/>--}}
            </div>
{{--            <div class="col-md-6 col-sm-6 about_image text-center">--}}
{{--                <img src="https://kargo.az/slider/images/Slider111-1813.png" alt="">--}}
{{--            </div>--}}
        </div>
        <div class="col-md-12 back_left_image text-right">
            <img src="{{url('/front/image/pricing_back.png')}}">
        </div>
        <div class="col-md-12 back_right_image text-left">
            <img src="{{url('/front/image/how/how_left_back.png')}}">
        </div>
    </div>

        @endsection

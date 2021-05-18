@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.about')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('/front/css/about.css')}}">
    @endsection
@section('content')
    <div class="tm-parallax" style="background-position: center 840px;">
        <header class="tm-parallax-header">
            <h2 class="">{{__('website.about')}}</h2>
        </header>
    </div>
    <!-- HAQQINDA -->
    <div class="site_center color_blue">
        <div class="container mt-4 mb-5">
            <div class="row mt-3">
                @php
                    $locale = app()->getLocale();
                    $content = app()->getLocale() !== 'en' ? "content_{$locale} as content" : 'content';
                    $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';
                 $about = Illuminate\Support\Facades\DB::table('pages')->where('id' , 3)->select([$content , $title])->first()
                @endphp
                <h3 class="color_blue mb-4"><strong>{{$about->title}}</strong></h3>
                <p>{!! $about->content !!}</p>
            </div>
        </div>
    </div>
@endsection

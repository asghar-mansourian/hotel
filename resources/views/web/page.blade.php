@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{$page->title}}
@endsection
@section('content')
    <div class="tm-parallax" style="background-position: center 840px;">
        <header class="tm-parallax-header">
            <h2 class="">{{$page->title}}</h2>
        </header>
    </div>
    <!-- Keyfiyyət -->
    <div class="site_center quality">
        <div class="container mt-4 mb-5">
            <div class="row mt-3">
                <h1 class="color_blue">{{$page->title}}</h1>
            </div>
            <div class="row mt-3">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <p class="color_blue">{!! $page->content !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

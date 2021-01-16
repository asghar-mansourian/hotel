@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.customers')}}
@endsection
@section('styles')
    <style>
        .blog_img img {
            height: 200px;
            object-fit: scale-down;
            border-radius: 30px;
            border: 1px solid #888;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="z-index: 1">
                <div class="black pt-5"><span class="yellow mr-3">{{__('website.kargo')}}</span>{{__('website.customers')}}</div>
                <div class="italic">{{__('website.subtitle2')}}<br/>{{__('website.subtitle1')}}</div>
            </div>
            <div class="col-md-6">
                <div class="img_slider">
                    <img src="{{url('front/image/shop_img.png')}}" class="w-100">
                </div>
            </div>
            @foreach($customers as $customer)
                <div class="col-md-3 col-sm-4 col-xs-6 mt-4 mb-4">
                    <div class="shops">
                        <a href="{{$customer->link}}" target="_blank">
                            <img src="{{asset('images/customers/'.$customer->image->file_name)}}" alt="{{$customer->name}}" style="    width: 245px;">
                        </a>
                    </div>
                </div>
            @endforeach
            @foreach($customers as $customer)
                <div class="col-md-3 col-sm-4 col-xs-6 mt-4 mb-4">
                    <div class="shops">
                        <a href="{{$customer->link}}" target="_blank">
                            <img src="{{asset('images/customers/'.$customer->image->file_name)}}" alt="{{$customer->name}}" style="    width: 245px;">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('members.layout')

@section('title')
    Kargo | {{__('member.orders')}}
@endsection
@section('styles')
    <style>
        .copy {
            background: rgb(128, 128, 128);
            position: relative;
            border: none;
            font-size: 1rem;
            color: #FFFFFF;
            text-align: center;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            text-decoration: none;
            overflow: hidden;
            cursor: pointer;
        }
        .copy:after {
            content: "";
            background: rgb(255 255 255);
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px!important;
            margin-top: -120%;
            opacity: 0;
            transition: all 0.8s
        }

        .copy:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }
    </style>
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="tab">

                    @foreach($countries as $country)
                        <button class="tablinks  @if($loop->first) active @endif"
                                onclick="openCity(event,   {{ '\'' . $country->name . '\'' }} )"><img
                                src="{{url("images/$country->flag")}}" style="width: 25px;height: 25px;"><span
                                class="dis_no"> {{$country->name}}</span></button>
                    @endforeach
                    {{--                    <button class="tablinks" onclick="openCity(event, 'amerika')"><img src="../image/order-Us.png"><span--}}
                    {{--                            class="dis_no">Amerika</span></button>--}}
                </div>
                <div class="border_bar">
                    @foreach($countries as $country)
                        <div id="{{$country->name}}" class="tabcontent @if($loop->first) active @endif"
                             style="@if($loop->first) display: block; @endif">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <!-- Small button groups (default and split) -->

                                    <div id="scrol_price" class="mt-5">
                                        <div id="scrol_price_content" style="padding: 31px 88px 60px;">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    @foreach($details as $detail)
                                                        @if ($country->id == $detail->country_id)
                                                            <div class="col-md-6">
                                                                <div style="margin-bottom:10px;">
                                                                    <span
                                                                        style="font-size: 17px;font-weight: 800;">{{$detail->name}}</span>
                                                                    <div>
                                                                        <p class="contents" style="display: contents">{{ $detail->value }}</p>
                                                                        @if ($detail->can_copy == '1')
                                                                            <button data-copy="{{$detail->id}}" class="copy btn btn-xs btn-danger btn-outline-dark" ><i class="fa fa-clone" aria-hidden="true"></i> {{__('member.copy')}}</button>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

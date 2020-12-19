@extends('members.layout')

@section('title')
    {{__('member.site_name')}}| {{__('member.orders')}}
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
                    @php
                        $ctn = \Illuminate\Support\Facades\DB::table('country_details')->groupBy('country_id')->get();
                    @endphp
                    @foreach($countries as $country)
                        @foreach($ctn as $c)
                            @if($c->country_id == $country->id)
                                <button class="tablinks  @if($loop->first) active @endif"
                                        onclick="openCity(event,   {{ '\'' . $country->name . '\'' }} )"><img
                                        src="{{url("images/$country->flag")}}" style="width: 25px;height: 25px;"><span
                                        class="dis_no"> {{$country->name}}</span></button>
                            @endif
                        @endforeach

                    @endforeach
                    {{--                    <button class="tablinks" onclick="openCity(event, 'amerika')"><img src="../image/order-Us.png"><span--}}
                    {{--                            class="dis_no">Amerika</span></button>--}}
                </div>
                <div class="border_bar">
                    @foreach($countries as $country)
                        <div id="{{$country->name}}" class="tabcontent @if($loop->first) active @endif"
                             style="display: block!important;">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <!-- Small button groups (default and split) -->

                                    <div id="scrol_price" class="mt-5">
                                        <div id="scrol_price_content" style="">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    @foreach($details as $detail)
                                                        @if ($country->id == $detail->country_id)

                                                            <div class="col-md-6 btn-detail-custom">
                                                                <div style="margin-bottom:10px;">
                                                                    <span
                                                                        style="    width: 100%;
    font-size: 12px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.33;
    letter-spacing: normal;
    text-align: left;
    color: #999999;
    margin-bottom: 11px;">{{$detail->name}} </span>
                                                                    <div style="background-color: #f5f5f5;
    border-radius: 6px;
    margin-top: 10px;">
                                                                        <p class="contents" style="display: contents;    height: 44px;
    border-radius: 8px;
    /* border: solid 1px #ddd; */
    background-color: #fbfbfb;
    width: 100%;
    font-size: 15px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.33;
    letter-spacing: normal;
    text-align: left;
    color: #2c2c51;
    display: flex;
    -webkit-display: flex;
    -moz-display: flex;
    -ms-display: flex;
    -o-display: flex;
    align-items: center;
    -webkit-align-items: center;
    -moz-align-items: center;
    -ms-align-items: center;
    -o-align-items: center;
    padding: 0 15px;
}">{{ $detail->value }}
                                                                            @if ($detail->can_copy == '1')
                                                                            <button data-copy="{{$detail->id}}" class=" ml-auto btn-copy-custom" style="visibility:hidden;border: none">
                                                                                <i class="fa fa-clone" aria-hidden="true"></i>
                                                                            </button>
                                                                            @endif
                                                                        </p>


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
    <style>
        .btn-detail-custom:hover .btn-copy-custom{
            visibility: visible!important;
            transition: all 0.2s!important;
        }
    </style>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

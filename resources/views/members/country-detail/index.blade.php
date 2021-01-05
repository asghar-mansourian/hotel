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
            margin-left: -20px !important;
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
                        use Illuminate\Support\Facades\DB;$ctn = DB::table('country_details')->groupBy('country_id')->get()
                    @endphp
                    @foreach($countries as $country)
                        @foreach($ctn as $c)
                            @if($c->country_id == $country->id)
                                <button class="tablinks  @if($loop->first) active @endif"
                                        onclick="openCity(event,   {{ '\'' . $country->name . '\'' }} )"><img
                                        src="{{url("images/$country->flag")}}" style="width: 25px;height: 25px;"><span
                                        class="dis_no"> {{__('member.detail_country_'.$country->id)}}</span></button>
                            @endif
                        @endforeach

                    @endforeach
                    {{--                    <button class="tablinks" onclick="openCity(event, 'amerika')"><img src="../image/order-Us.png"><span--}}
                    {{--                            class="dis_no">Amerika</span></button>--}}
                </div>
                <div class="border_bar">
                    @foreach($countries as $country)
                        @foreach($ctn as $c)

                            <div id="{{$country->name}}" class="tabcontent @if($c->country_id == $country->id) active @endif"
                                 style="@if($c->country_id == $country->id) display:block; @endif">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <!-- Small button groups (default and split) -->

                                        <div id="scrol_price" class="mt-5">
                                            <div id="scrol_price_content" style="">
                                                <div class="container-fluid">
                                                    @foreach($details as $detail)
                                                        @if ($country->id == $detail->country_id)
                                                            @if($loop->index % 2 == 0)
                                                                <div class="row" style="@if(!$loop->first) margin-top: 25px; @endif">
                                                                    @endif
                                                                    <div class="col-md-6 btn-detail-custom">
                                                                        <div style="margin-bottom:10px;">
                                                                    <span
                                                                        style="    width: 100%;
    font-size: 16px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.33;
    letter-spacing: normal;
    text-align: left;
    color: #333333;
    margin-bottom: 11px;"><b>{{$detail->name}}</b> </span>
                                                                            <div style=" border-radius: 6px; margin-top: 10px;">
                                                                                @php
                                                                                    $detail->value = str_replace('%code%',auth()->user()->code,$detail->value);
                                                                                    $detail->value = str_replace('%name%',auth()->user()->name . ' ' . auth()->user()->family,$detail->value);
                                                                                @endphp
                                                                                <p class="contents" style="-webkit-tap-highlight-color: rgba(0,0,0,0); line-height: 1.42857143; list-style: none; font-size: 16px; font-family: Calibri, sans-serif; box-sizing: border-box; margin: 0 0 10px; color: grey; margin-top: 5px;
}">{{ $detail->value }}
                                                                                    @if ($detail->can_copy == '1')
                                                                                        {{-- <button data-copy="{{$detail->id}}" class=" ml-auto btn-copy-custom" style="visibility:hidden;border: none">
                                                                                             <i class="fa fa-clone" aria-hidden="true"></i>
                                                                                         </button>--}}
                                                                                        <button class="btn btn-copy-custom" data-ingnor-text="{{__('member.copy')}}" data-copy="{{$detail->id}}"
                                                                                                style="padding: 0px; background-color: rgb(128, 128, 128); color: white;height: 22px">
                                                                                            <i class="fa fa-copy"></i> {{__('member.copy')}}
                                                                                        </button>
                                                                                    @endif
                                                                                </p>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    @if($loop->index % 2)
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @break
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <style>
        .btn-detail-custom:hover .btn-copy-custom {
            visibility: visible !important;
            transition: all 0.2s !important;
        }
    </style>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

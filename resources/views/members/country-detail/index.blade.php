@extends('members.layout')

@section('title')
    Kargo | Orders
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
                                                                    <p>{{ $detail->value }}</p>
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

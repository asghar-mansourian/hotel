@extends('members.layout')

@section('title')
    Kargo | Orders
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">
        <div class="row">
            <div class="hide-alert">
                @include('admin.components.error');
            </div>
            <div class="col-md-12">
                <div class="tab">

                    @foreach($countries as $country)
                        <button class="tablinks  @if($loop->first) active @endif"
                                onclick="openCity(event,   {{ '\'' . $country->name . '\'' }} )"><img
                                src="{{url("images/$country->flag")}}" style="width: 25px;height: 25px;"><span
                                class="dis_no"> {{$country->name}}</span></button>
                    @endforeach
                </div>
                <div class="border_bar">
                    @foreach($countries as $country)
                        <div id="{{$country->name}}" class="tabcontent @if($loop->first) active @endif"
                             style="@if($loop->first) display: block; @endif">
                            <div class="row">
                                <div class="col-md-12 mt-5 ">
                                    <!-- Small button groups (default and split) -->
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{__('member.filter')}}
                                        </button>
                                        <div class="dropdown-menu p-2" style="width: 300px;">

                                            <a href="{{url('/orders')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.all')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=0')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.ordered')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=1')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.warehoseabroad')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=2')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.onway')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=3')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">

                                                {{__('member.custominspection')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=4')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.inwarehose')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=5')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.courierdelivery')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=6')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.return')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=7')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;" src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.complete')}}
                                            </a>
                                        </div>
                                    </div>

                                    <div id="scrol_price" class="mt-5">
                                        <div id="scrol_price_content">

                                            <div class="filterDiv_ul">
                                                <ul>
                                                    <li style="width: 8%;">{{__('member.id')}}</li>
                                                    <li style="width: 12%;">{{__('member.orderid')}}</li>
                                                    <li style="width: 8%;">{{__('member.link')}}</li>
                                                    <li style="width: 8%;">{{__('member.price')}}</li>
                                                    <li style="width: 12%;">{{__('member.hascargo')}}</li>
                                                    <li style="width: 8%;">{{__('member.cargo')}}</li>
                                                    <li style="width: 8%;">{{__('member.quantity')}}</li>
                                                    <li style="width: 12%;">{{__('member.description')}}</li>
                                                    <li style="width: 8%;">{{__('member.total')}}</li>
                                                    <li style="width: 16%;">{{__('member.specification')}}</li>
                                                </ul>
                                            </div>
                                            @php

                                                $active_orders = $orders->with(['order.country' => function ($query) use ($country) {
                                                    $query
                                                       ->where('id', $country->id);
                                                    }])->get();
                                            @endphp
                                            @foreach($active_orders as $order)

                                                @if($order->order->country != null)
                                                    <div class="filterDiv income">
                                                        <ul>
                                                            <li style="width: 8%;">{{$order->id}}</li>
                                                            <li style="width: 8%;">{{$order->created_at}}</li>
                                                            <li style="width: 12%;">{{$order->order_id}}</li>
                                                            <li style="width: 8%;"><a
                                                                    href="{{'https://' . $order->link}}"
                                                                    class="btn btn-info btn-sm">{{__('member.show')}}</a>
                                                            </li>
                                                            <li style="width: 12%;">{{$order->price}}</li>
                                                            <li style="width: 8%;">{{$order->has_cargo}}</li>
                                                            <li style="width: 8%;">{{$order->cargo}}</li>
                                                            <li style="width: 8%;">{{$order->quantity}}</li>
                                                            <li style="width: 12%;">{{$order->description}}</li>
                                                            <li style="width: 8%;">{{$order->total}}</li>
                                                            <li style="width: 16%;">{{$order->specification}}</li>
                                                        </ul>
                                                    </div>
                                                @endif

                                            @endforeach

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

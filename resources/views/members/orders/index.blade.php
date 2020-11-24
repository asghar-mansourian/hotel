@extends('members.layout')

@section('title')
    Kargo | Orders
@endsection

@section('styles')

    <style>
        .filterDiv_ul ul li {
            width: 15.99%;
        }

        .filterDiv ul li {
            width: 15.99%;
        }

        /*    start order tracking popup style*/
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .card .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 11%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step.deactive:before {
            background: #ddd !important;
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            border: 2px solid #ee5435;
        }

        .track .step.deactive .icon {
            border: 2px solid gainsboro;
        }

        .track .step.active .icon span {
            background-color: #ee5435 !important;
        }

        .track .step.deactive .icon span {
            background-color: inherit !important;
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 800;
            color: #e44a4a
        }

        .track .step.deactive .text {
            font-weight: 400;
            color: #333
        }

        .track .text {
            display: block;
            margin-top: 7px;
            font-size: 1rem;
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }
    </style>
@endsection
@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">
        <div class="row">
            <div class="hide-alert">
                @include('admin.components.error')
            </div>


            @foreach($countries as $country)

                @foreach($country->orders as $invoice)
                    {{--start order status popup--}}
                    <div id="orderstatus-{{$invoice->id}}" class="modal fade bd-example-modal-lg" tabindex="-1"
                         role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <article class="card">
                                            <div class="card-body">
                                                <article class="card">
                                                    <div class="card-body row">
                                                        <div class="col">
                                                            <strong>order</strong><br>{{$invoice->order_track}}</div>
                                                        <div class="col"><strong>date</strong>
                                                            <br>{{$invoice->order_date}}</div>
                                                        <div class="col"><strong>user</strong>
                                                            <br>{{$invoice->user->name}}</div>
                                                        <div class="col"><strong>status</strong>
                                                            <br>{{\App\Invoice::STATUS_ALL[$invoice->status]}}</div>
                                                    </div>
                                                </article>
                                                @php
                                                    $num= 10000;
                                                @endphp
                                                <div class="track">
                                                    @foreach(\App\Order::STATUS_ALL as $k=>$status )
                                                        @php
                                                            $invoice->status === $k ? $num=$loop->index : '';
                                                        @endphp
                                                        <div
                                                            class="step {{$loop->index <= $num ? 'active' : 'deactive'}}">
                                                        <span class="icon">
                                                             <span
                                                                 style="background: url(/front/image/ordertracking/{{$status}}.png) no-repeat center ;display: block;width: 100%;height: 100%; border-radius: 50%;"></span>
                                                        </span>
                                                            <span class="text"> {{$status}}</span>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--            end popup--}}
                @endforeach

            @endforeach
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
                                        <button class="btn btn-warning btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{__('member.filter')}}
                                        </button>
                                        <div class="dropdown-menu p-2" style="width: 300px;">

                                            <a href="{{url('/orders')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.all')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=0')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.ordered')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=1')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.warehoseabroad')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=2')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.onway')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=3')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">

                                                {{__('member.custominspection')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=4')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.inwarehose')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=5')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.courierdelivery')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=6')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.return')}}
                                            </a>
                                            <br>
                                            <a href="{{url('/orders?type=7')}}" style="font-size: 14px; padding: 10px;">
                                                <img style="width: 15px;height: 15px;"
                                                     src="{{url('front/image/my_order/note.svg')}}">
                                                {{__('member.complete')}}
                                            </a>
                                        </div>
                                    </div>

                                    <div id="scrol_price" class="mt-5">
                                        <div id="scrol_price_content">

                                            <div class="filterDiv_ul">
                                                <ul>
                                                    <li>{{__('member.id')}}</li>
                                                    <li>{{__('member.country')}}</li>
                                                    <li>{{__('member.total')}}</li>
                                                    <li>{{__('member.status')}}</li>
                                                    {{--                                                    <li style="width: 12%;">{{__('member.hascargo')}}</li>--}}
                                                    {{--                                                    <li style="width: 8%;">{{__('member.cargo')}}</li>--}}
                                                    {{--                                                    <li style="width: 8%;">{{__('member.quantity')}}</li>--}}
                                                    {{--                                                    <li style="width: 12%;">{{__('member.description')}}</li>--}}
                                                    <li>{{__('member.date')}}</li>
                                                    <li style="width: 16.6%">{{__('member.option')}}</li>
                                                    {{--                                                    <li style="width: 16%;">{{__('member.specification')}}</li>--}}
                                                </ul>
                                            </div>
                                            @php
                                                $active_orders=$orders->where('country_id', $country->id)->get();
                                            @endphp
                                            @foreach($active_orders as $order)
                                                @if($order->country != null)
                                                    <div class="filterDiv income">
                                                        <ul>
                                                            <li>{{$order->id}}</li>
                                                            <li>{{$order->country->name}}</li>
                                                            <li>{{$order->order_items_count}}</li>
                                                            <li>{{$order->status}}</li>
                                                            <li>{{$order->created_at}}</li>
                                                            <li style="width: 16.6%">
                                                                <input type="button" value="status"
                                                                       data-invoice="{{$order->id}}"
                                                                       class="status btn btn-primary">
                                                            </li>
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

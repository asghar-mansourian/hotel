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
                    <button class="tablinks  active" onclick="openCity(event, 'turkey')"><img
                            src="{{url('front/image/my_order/note.svg')}}" style="width: 25px;height: 25px;"><span class="dis_no"> All</span></button>
{{--                    <button class="tablinks" onclick="openCity(event, 'amerika')"><img src="../image/order-Us.png"><span--}}
{{--                            class="dis_no">Amerika</span></button>--}}
                </div>
                <div class="border_bar">
                    <div id="turkey" class="tabcontent active" style="display: block;">
                        <div class="row">
                            <div class="col-md-12 mt-5 ">
                                <div id="scrol_price" class="mt-5">
                                    <div id="scrol_price_content">
                                        <div class="filterDiv_ul">
                                            <ul>
                                                <li style="width: 10%;">order id</li>
                                                <li style="width: 10%;">link</li>
                                                <li style="width: 10%;">price</li>
                                                <li style="width: 12%;">has cargo</li>
                                                <li style="width: 10%;">cargo</li>
                                                <li style="width: 10%;">quantity</li>
                                                <li style="width: 12%;">description</li>
                                                <li style="width: 10%;">total</li>
                                                <li style="width: 16%;">specification</li>
                                            </ul>
                                        </div>
                                        @foreach($orders as $order)
                                            <div class="filterDiv income">
                                                <ul>
                                                    <li style="width: 10%;">{{$order->created_at}}</li>
                                                    <li style="width: 10%;">{{$order->order_id}}</li>
                                                    <li style="width: 10%;" ><a href="{{'https://' . $order->link}}" class="btn btn-info btn-sm">show</a></li>
                                                    <li style="width: 12%;">{{$order->price}}</li>
                                                    <li style="width: 10%;">{{$order->has_cargo}}</li>
                                                    <li style="width: 10%;">{{$order->cargo}}</li>
                                                    <li style="width: 10%;">{{$order->quantity}}</li>
                                                    <li style="width: 12%;">{{$order->description}}</li>
                                                    <li style="width: 10%;">{{$order->total}}</li>
                                                    <li style="width: 16%;">{{$order->specification}}</li>
                                                </ul>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div id="amerika" class="tabcontent active" style="display: block;">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12 mt-5 ">--}}
{{--                                --}}{{--                                <div class="dropdown_dr">--}}
{{--                                --}}{{--                                    <div class="dropdown myBtnContainer">--}}
{{--                                --}}{{--                                        <button class="btn btn-secondary dropdown-toggle" type="button"--}}
{{--                                --}}{{--                                                id="dropdown_hamisi" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                --}}{{--                                                aria-expanded="true">--}}
{{--                                --}}{{--                                            Hamısı<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>--}}
{{--                                --}}{{--                                        </button>--}}
{{--                                --}}{{--                                        <div class="dropdown-menu" aria-labelledby="dropdown_hamisi">--}}
{{--                                --}}{{--                                            <button class="dropdown-item w-100 active" onclick="filterSelection('all')">--}}
{{--                                --}}{{--                                                Hamısı--}}
{{--                                --}}{{--                                            </button>--}}
{{--                                --}}{{--                                            <br>--}}
{{--                                --}}{{--                                            <button class="dropdown-item w-100"--}}
{{--                                --}}{{--                                                    onclick="filterSelection('expenditure')"> Məxaric--}}
{{--                                --}}{{--                                            </button>--}}
{{--                                --}}{{--                                            <br>--}}
{{--                                --}}{{--                                            <button class="dropdown-item w-100" onclick="filterSelection('income')">--}}
{{--                                --}}{{--                                                Mədaxil--}}
{{--                                --}}{{--                                            </button>--}}
{{--                                --}}{{--                                            <br>--}}
{{--                                --}}{{--                                        </div>--}}
{{--                                --}}{{--                                    </div>--}}
{{--                                --}}{{--                                </div>--}}
{{--                                <div id="scrol_price" class="mt-5">--}}
{{--                                    <div id="scrol_price_content">--}}
{{--                                        <div class="filterDiv_ul">--}}
{{--                                            <ul>--}}
{{--                                                <li style="width: 10%;">order ssid</li>--}}
{{--                                                <li style="width: 10%;">link</li>--}}
{{--                                                <li style="width: 10%;">price</li>--}}
{{--                                                <li style="width: 12%;">has cargo</li>--}}
{{--                                                <li style="width: 10%;">cargo</li>--}}
{{--                                                <li style="width: 10%;">quantity</li>--}}
{{--                                                <li style="width: 12%;">description</li>--}}
{{--                                                <li style="width: 10%;">total</li>--}}
{{--                                                <li style="width: 16%;">specification</li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        @foreach($orders as $order)--}}
{{--                                            <div class="filterDiv income">--}}
{{--                                                <ul>--}}
{{--                                                    <li style="width: 10%;">{{$order->created_at}}</li>--}}
{{--                                                    <li style="width: 10%;">{{$order->order_id}}</li>--}}
{{--                                                    <li style="width: 10%;" ><a href="{{'https://' . $order->link}}" class="btn btn-info btn-sm">show</a></li>--}}
{{--                                                    <li style="width: 12%;">{{$order->price}}</li>--}}
{{--                                                    <li style="width: 10%;">{{$order->has_cargo}}</li>--}}
{{--                                                    <li style="width: 10%;">{{$order->cargo}}</li>--}}
{{--                                                    <li style="width: 10%;">{{$order->quantity}}</li>--}}
{{--                                                    <li style="width: 12%;">{{$order->description}}</li>--}}
{{--                                                    <li style="width: 10%;">{{$order->total}}</li>--}}
{{--                                                    <li style="width: 16%;">{{$order->specification}}</li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

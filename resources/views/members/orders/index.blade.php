@extends('members.layout')

@section('title')
    {{__('member.site_name')}}| {{__('member.orders')}}
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

        /*    end order tracking*/
        .items.modal .modal-dialog {
            top: 150px;
        }
        @media screen and (min-width: 1200px) {
            .edit-modal{
                width: 1150px;
                margin-left: -120px;
            }
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
                                                            <strong>{{__('member.orders')}}</strong><br>{{$invoice->order_track}}</div>
                                                        <div class="col"><strong>{{__('member.date')}}</strong>
                                                            <br>{{$invoice->order_date}}</div>
                                                        <div class="col"><strong>{{__('member.user')}}</strong>
                                                            <br>{{auth()->user()->name . ' ' . auth()->user()->family}}</div>
                                                        <div class="col"><strong>{{__('member.status')}}</strong>
                                                            <br>{{\App\Invoice::STATUS_ALL[$invoice->status]}}</div>
                                                    </div>
                                                </article>
                                                @php
                                                    $num= 10000
                                                @endphp
                                                <div class="track">
                                                    @foreach(\App\Order::STATUS_ALL as $k=>$status )
                                                        @php
                                                            if ($status == 'fill_in_box' || $status == 'on_way' || $status == 'customs_inspection' || $status == 'cancel')
                                                               {
                                                                   continue;
                                                               }

                                                               $invoice->status === $k ? $num=$loop->index : ''
                                                        @endphp
                                                        <div
                                                            class="step {{$invoice->status >= $k ? 'active' : 'deactive'}}">
                                                        <span class="icon">
                                                             <span
                                                                 style="background: url(/front/image/ordertracking/{{$status}}.png) no-repeat center ;display: block;width: 100%;height: 100%; border-radius: 50%;"></span>
                                                        </span>
                                                            @php
                                                                $status_trans =  \Illuminate\Support\Str::of($status)->studly()->lower()
                                                            @endphp

                                                            @if('in_warehouse' === $status)
                                                                <span class="text"> {{__('member.inwarehose')}}</span>
                                                            @elseif('warehouse_abroad' === $status)
                                                                <span class="text"> {{__('member.warehoseabroad')}}</span>
                                                            @else
                                                                <span class="text"> {{__("member.{$status_trans}")}}</span>
                                                            @endif
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
                    {{--start order status popup--}}
                    @foreach($invoice->orderItems as $ordersItem)
                        <div id="orderItemStatus-{{$ordersItem->id}}" class="modal fade bd-example-modal-lg" tabindex="-1"
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
                                                                <strong>{{__('member.items')}}</strong><br>{{$ordersItem->order_track}}</div>
                                                            <div class="col"><strong>{{__('member.date')}}</strong>
                                                                <br>{{$ordersItem->created_at}}</div>
                                                            <div class="col"><strong>{{__('member.weight')}}</strong>
                                                                <br>{{$ordersItem->weight}}</div>
                                                            <div class="col"><strong>{{__('member.weight_price')}}</strong>
                                                                <br>{{$ordersItem->weight_price}}
                                                                @if($ordersItem->order->payment->balance_type == 'usd')
                                                                    $
                                                                @else
                                                                    ₺
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </article>
                                                    @php
                                                        $num= 10000
                                                    @endphp
                                                    <div class="track">
                                                        @if($ordersItem->status != \App\OrderItem::STATUS_CANCEL)
                                                            @foreach(\App\OrderItem::STATUS_ALL as $k=>$status )
                                                                @php
                                                                    if ($status == 'fill_in_box' || $status == 'on_way' || $status == 'customs_inspection' || $status == 'cancel')
                                                                   {
                                                                       continue;
                                                                   }
                                                                       $ordersItem->status === $k ? $num=$loop->index : ''
                                                                @endphp
                                                                <div
                                                                    class="step {{$ordersItem->status >= $k  ? 'active' : 'deactive'}}">
                                                        <span class="icon">
                                                             <span
                                                                 style="background: url(/front/image/ordertracking/{{$status}}.png) no-repeat center ;display: block;width: 100%;height: 100%; border-radius: 50%;"></span>
                                                        </span>
                                                                    @php
                                                                        $status_trans =  \Illuminate\Support\Str::of($status)->studly()->lower()
                                                                    @endphp

                                                                    @if('in_warehouse' === $status)
                                                                        <span class="text"> {{__('member.inwarehose')}}</span>
                                                                    @elseif('warehouse_abroad' === $status)
                                                                        <span class="text"> {{__('member.warehoseabroad')}}</span>
                                                                    @else
                                                                        <span class="text"> {{__("member.{$status_trans}")}}</span>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <h4 class="text-danger" style="margin-left: 294px;">{{__('member.cancel_ordered')}}</h4>
                                                        @endif
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--            end popup--}}
                    {{--start order status popup--}}
                    <div id="items-{{$invoice->id}}" class="modal items fade bd-example-modal-lg" tabindex="-1"
                         role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content edit-modal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>{{__('member.id')}}</th>
                                                    <th>{{__('member.link')}}</th>
                                                    <th>{{__('member.status')}}</th>
                                                    <th>{{__('member.price')}}</th>
                                                    <th>{{__('member.cargo')}}</th>
                                                    <th>{{__('member.quantity')}}</th>
                                                    <th>{{__('member.description')}}</th>
                                                    <th>{{__('member.color')}}</th>
                                                    <th>{{__('member.total')}}</th>
                                                    <th>{{__('member.specification')}}</th>
                                                    <th>{{__('member.cancel_reason_order')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($invoice->orderItems as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td><a target="_blank" href="{{$item->link}}">{{str_limit($item->link, 30)}}</a></td>
                                                        <td>
                                                            <input type="button" value="{{__('member.status')}}"
                                                                   data-orderItem="{{$item->id}}"
                                                                   class="orderItemStatus btn btn-primary" style="width: 80px;
    height: 31px;
    font-size: 12px;
    font-weight: bold;">
                                                        </td>
                                                        <td>{{$item->price}} ₺</td>
                                                        <td>{{$item->cargo}}</td>
                                                        <td>{{$item->quantity}}</td>
                                                        <td>{{$item->description}}</td>
                                                        <td>{{$item->color}}</td>
                                                        <td>{{$item->total}} ₺</td>
                                                        <td>{{$item->specification}}</td>
                                                        @if($item->cancelReasonOrder)
                                                        <td style="color:red">
                                                            @php
                                                                $description = app()->getLocale() !== 'en' ? "description_".app()->getLocale() : 'description';
                                                            @endphp
                                                            {{
                                                                 $item->cancelReasonOrder ? $item->cancelReasonOrder->{$description} : '-'
                                                            }}
                                                        </td>
                                                        @else
                                                            <td>
                                                                @php
                                                                    $description = app()->getLocale() !== 'en' ? "description_".app()->getLocale() : 'description';
                                                                @endphp
                                                                {{
                                                                     $item->cancelReasonOrder ? $item->cancelReasonOrder->{$description} : '-'
                                                                }}
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

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
                                class="dis_no"> {{__('member.order_country_'.$country->id)}}</span></button>
                    @endforeach
                </div>
                <div class="border_bar">
                    @foreach($countries as $country)
                        <div id="{{$country->name}}" class="tabcontent @if($loop->first) active @endif"
                             style="@if($loop->first) display: block; @endif">
                            <div class="row">
                                <div class="col-md-12 mt-5 ">
                                    <!-- Small button groups (default and split) -->
                                    {{--       <div class="btn-group">
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
                                                       {{__('member.purchased')}}
                                                   </a>
                                                   <br>
                                                   <a href="{{url('/orders?type=2')}}" style="font-size: 14px; padding: 10px;">
                                                       <img style="width: 15px;height: 15px;"
                                                            src="{{url('front/image/my_order/note.svg')}}">
                                                       {{__('member.warehoseabroad')}}
                                                   </a>
                                                   <br>
                                                   <a href="{{url('/orders?type=6')}}" style="font-size: 14px; padding: 10px;">
                                                       <img style="width: 15px;height: 15px;"
                                                            src="{{url('front/image/my_order/note.svg')}}">
                                                       {{__('member.inwarehose')}}
                                                   </a>
                                                   <br>
                                                   <a href="{{url('/orders?type=7')}}" style="font-size: 14px; padding: 10px;">
                                                       <img style="width: 15px;height: 15px;"
                                                            src="{{url('front/image/my_order/note.svg')}}">
                                                       {{__('member.courierdelivery')}}
                                                   </a>
                                                   <br>
                                                   <a href="{{url('/orders?type=8')}}" style="font-size: 14px; padding: 10px;">
                                                       <img style="width: 15px;height: 15px;"
                                                            src="{{url('front/image/my_order/note.svg')}}">
                                                       {{__('member.complete')}}
                                                   </a>
                                               </div>
                                           </div>--}}

                                    <div id="scrol_price" class="mt-5" style="height: 555px">
                                        <div id="scrol_price_content">

                                            <div class="filterDiv_ul">
                                                <ul>
                                                    <li>{{__('member.id')}}</li>
                                                    <li>{{__('member.total')}}</li>
                                                    <li>{{__('member.status_payment')}}</li>
                                                    <li style="width: 27%!important">{{__('member.date')}}</li>
                                                    <li style="width: 24.9%;">{{__('member.option')}}</li>
                                                </ul>
                                            </div>
                                            @php
                                                $active_orders=$orders->where('user_id', auth()->user()->id)->where('country_id', $country->id)->orderBy('id', 'desc')->get()
                                            @endphp
                                            @foreach($active_orders as $order)
                                                @if($order->country != null)
                                                    <div class="filterDiv income">
                                                        <ul>
                                                            <li>{{$order->id}}</li>
                                                            <li>{{$order->total}} ₺</li>
                                                            @isset($order->payment->status)
                                                                <li>{!! $order->payment->status ?  '<span class="green">'.__('member.paid_success').'</span>' : '<span>'.__('member.paid_failed').'</span>' !!}</li>
                                                            @else
                                                                <li>{!! '<span class="danger">'.__('member.paid_failed').'</span>' !!}</li>
                                                            @endisset
                                                            <li style="width: 27%!important;">{{$order->created_at}}</li>
                                                            <li style="width: 21.6%; text-align: right; padding-right: 23px;">
                                                                <input type="button" value="{{__('member.items')}}"
                                                                       data-items="{{$order->id}}"
                                                                       class="items btn btn-dark" style=" /*width: 80px;*/
                                                                       height: 31px;
                                                                       font-size: 12px;
    font-weight: bold;"
                                                                >
                                                            </li>
                                                            {{--   <li style="width: 10%;margin-left: 15px;">
                                                                   <input type="button" value="{{__('member.status')}}"
                                                                          data-invoice="{{$order->id}}"
                                                                          class="status btn btn-primary" style="width: 80px;
       height: 31px;
       font-size: 12px;
       font-weight: bold;">
                                                               </li>--}}

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

@push('scripts')
    <script>
        $(".orderItemStatus").click(function (e) {
            $(".modal").modal('hide');
            var orderItem = $(this).attr('data-orderItem');
            $("#orderItemStatus-" + orderItem).modal('toggle');
        });
    </script>
@endpush

@extends('members.layout')
@section('title')
    Kargo | Invoices
@endsection

@section('styles')

    <style>
        .filterDiv_ul ul li {
            width: 19.99%;
        }

        .filterDiv ul li {
            width: 19.99%;
        }

        nav li {
            float: none !important;
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
            <div class="col-md-12">
                <div class="tab">
                    @foreach($countries as $country)
                        <button class="tablinks
                        @if(request()->query('country') == $country->id) active @endif
                        @if(is_null(request()->query('country')) && $loop->first) active @endif"
                                onclick="openCity(event, 'country-{{$country->id}}')">
                            <img src="{{url("images/{$country->flag}")}}" width="20" alt="flag">
                            <span class="dis_no"> {{$country->name}}</span>
                        </button>
                    @endforeach
                </div>
                <div class="border_bar">
                    @foreach($countries as $country)
                        <div id="country-{{$country->id}}" class="tabcontent" style="
                        @if(request()->query('country') == $country->id) display: block;  @endif
                        @if(is_null(request()->query('country')) && $loop->first) display: block;  @endif">
                            <div class="row">
                                <div class="col-md-12 mt-5" style="margin-top: 0 !important;">
                                    <div class="tab">
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}")}}">
                                            <img src="./front/image/my_order/note.svg">
                                            <span class="dis_no"> {{__('member.all')}}</span><span class="num">
                                                ({{$country->invoices->count()}})
                                            </span>
                                        </a>
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_ORDERED)}}">
                                            <img src="./front/image/my_order/cargo.svg">
                                            <span class="dis_no"> {{__('member.ordered')}}</span><span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_ORDERED)->count()}})
                                            </span>
                                        </a>
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_WAREHOUSE_ABROAD)}}"><img src="./front/image/my_order/discount.svg">
                                            <span class="dis_no">{{$country->name}}  {{__('member.anbar')}}</span><span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_WAREHOUSE_ABROAD)->count()}})
                                            </span>
                                        </a>
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_ON_WAY)}}"><img src="./front/image/my_order/place.svg">
                                            <span class="dis_no">{{__('member.Heisway')}}</span><span
                                                class="num"> ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_ON_WAY)->count()}})
                                            </span>
                                        </a>
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_CUSTOMS_INSPECTION)}}"><img src="./front/image/my_order/bag.svg">
                                            <span class="dis_no">{{__('member.Customsinspection')}}</span><span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_CUSTOMS_INSPECTION)->count()}})
                                            </span></a>
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_IN_WAREHOUSE)}}"><img src="./front/image/my_order/wallet.svg">
                                            <span class="dis_no"> {{__('member.warehouse')}}</span><span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_IN_WAREHOUSE)->count()}})
                                            </span>
                                        </a>
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_COURIER_DELIVERY)}}"><img src="./front/image/my_order/phone.svg">
                                            <span class="dis_no">{{__('member.courierdelivery')}}</span>
                                            <span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_COURIER_DELIVERY)->count()}})
                                            </span>
                                        </a>
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_RETURN)}}"><img src="./front/image/my_order/trash.svg">
                                            <span class="dis_no">{{__('member.return')}}</span>
                                            <span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_RETURN)->count()}})
                                            </span>
                                        </a>
                                        <a class="tablinks width_30" href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_COMPLETE)}}"><img src="./front/image/my_order/bill.svg">
                                            <span class="dis_no">{{__('member.complete')}}</span>
                                            <span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_COMPLETE)->count()}})
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div id="scrol_price" style="margin-top: 155px !important; height: 553px" class="mt-5">
                                    <div id="scrol_price_content">
                                        <div class="filterDiv_ul">
                                            <ul>
                                                <li>{{__('member.order№')}}</li>
                                                <li>{{__('member.orderdate')}}</li>
                                                <li>{{__('member.shop')}}</li>
                                                <li>{{__('member.status')}}</li>
                                                <li>{{__('member.action')}}</li>
                                            </ul>
                                        </div>
                                        @foreach($country->invoices->filterViaStatus(request()->query('status')) as $invoice)
                                            <div class="filterDiv income">
                                                <ul>
                                                    <li class="green">{{str_repeat('0',6) . $invoice->id}}</li>
                                                    <li>{{$invoice->created_at}}</li>
                                                    <li>{{$invoice->shop}}</li>
                                                    <li class="green bold">{{\App\lib\Invoice::getStatusViaKey($invoice->status)}}</li>
                                                    {{--                                                    <li>--}}
                                                    {{--                                                        --}}{{--<input type="button" value="Sifarişi izlə" class="btn btn-info">--}}
                                                    {{--                                                        <form action="{{route('invoices.destroy', ['invoice' => $invoice->id])}}" method="post">--}}
                                                    {{--                                                            @csrf--}}
                                                    {{--                                                            @method('DELETE')--}}
                                                    {{--                                                            <input type="submit" value="sil" class="btn btn-danger">--}}
                                                    {{--                                                        </form>--}}
                                                    {{--                                                    </li>--}}
                                                </ul>
                                            </div>
                                        @endforeach
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

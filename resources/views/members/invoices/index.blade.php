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
            <div class="col-md-12">
                <div class="tab">
                    @foreach($countries as $country)
                        <button class="tablinks @if($loop->first) active @endif"
                                onclick="openCity(event, 'country-{{$country->id}}')">
                            <img src="{{url("images/{$country->flag}")}}" width="20" alt="flag">
                            <span class="dis_no"> {{$country->name}}</span>
                        </button>
                    @endforeach
                </div>
                <div class="border_bar">
                    @foreach($countries as $country)
                        <div id="country-{{$country->id}}" class="tabcontent" style="@if($loop->first) display: block; @endif">
                            <div class="row">
                                <div class="col-md-12 mt-5 ">
                                    <div class="tab">
                                        <button class="tablinks width_30" onclick="openCity(event, 'note')"><img src="./front/image/my_order/note.svg">
                                            <span class="dis_no"> Hamısı</span><span class="num"> ({{$country->invoices->count()}})</span>
                                        </button>
                                        <button class="tablinks width_30" onclick="openCity(event, 'cargo')"><img src="./front/image/my_order/cargo.svg">
                                            <span class="dis_no"> Yolda</span><span class="num"> ({{$country->invoices->count()}})</span>
                                        </button>
                                        <button class="tablinks width_30" onclick="openCity(event, 'discount')"><img sr="./front/image/my_order/discount.svg">
                                            <span class="dis_no"> Bakıda</span><span class="num"> (4)</span>
                                        </button>
                                        <button class="tablinks width_30" onclick="openCity(event, 'place')"><img src="./front/image/my_order/place.svg"><span class="dis_no"> Turkiye anbarinda</span><span
                                                class="num"> (3)</span>
                                        </button>
                                        <button class="tablinks width_30" onclick="openCity(event, 'bag')"><img src="./front/image/my_order/bag.svg"><span class="dis_no">Səbət</span><span class="num"> (1)</span></button>
                                        <button class="tablinks width_30" onclick="openCity(event, 'wallet')"><img src="./front/image/my_order/wallet.svg"><span class="dis_no">Ödənildi</span><span class="num"> (5)</span>
                                        </button>
                                        <button class="tablinks width_30" onclick="openCity(event, 'phone')"><img src="./front/image/my_order/phone.svg"><span class="dis_no">Sifariş edildi</span><span
                                                class="num"> (12)</span>
                                        </button>
                                        <button class="tablinks width_30" onclick="openCity(event, 'trash')"><img src="./front/image/my_order/trash.svg"><span class="dis_no">Silindi</span><span class="num"> (12)</span>
                                        </button>
                                        <button class="tablinks width_30" onclick="openCity(event, 'bill')"><img src="./front/image/my_order/bill.svg"><span class="dis_no">İadə</span><span class="num"> (2)</span>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div id="scrol_price" style="margin-top: 113px !important;" class="mt-5">
                                    <div id="scrol_price_content">
                                        <div class="filterDiv_ul">
                                            <ul>
                                                <li>Sifariş №</li>
                                                <li>Sifariş tarixi</li>
                                                <li>Mağaza</li>
                                                <li>Status</li>
                                                <li>Action</li>
                                            </ul>
                                        </div>
                                        @foreach($country->invoices as $invoice)
                                            <div class="filterDiv income">
                                                <ul>
                                                    <li class="green">{{str_repeat('0',6) . $invoice->id}}</li>
                                                    <li>{{$invoice->created_at}}</li>
                                                    <li>{{$invoice->shop}}</li>
                                                    <li class="green bold">{{\App\lib\Invoice::getStatusViaKey($invoice->status)}}</li>
                                                    <li>
                                                        {{--                                                    <input type="button" value="Sifarişi izlə" class="btn btn-info">--}}
                                                        <input type="button" value="sil" class="btn btn-danger">
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{ $invoices->links() }}

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

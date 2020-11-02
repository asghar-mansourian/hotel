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
                    <button class="tablinks  active" onclick="openCity(event, 'turkey')"><img src="../image/order-TR.png"><span class="dis_no"> Türkiyə</span></button>
                    <button class="tablinks" onclick="openCity(event, 'amerika')"><img src="../image/order-Us.png"><span class="dis_no">Amerika</span></button>
                </div>
                <div class="border_bar">
                    <div id="turkey" class="tabcontent active" style="display: block;">
                        <div class="row">
                            <div class="col-md-12 mt-5 ">
                                <div class="dropdown_dr">
                                    <div class="dropdown myBtnContainer">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_hamisi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Hamısı<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdown_hamisi">
                                            <button class="dropdown-item w-100 active" onclick="filterSelection('all')"> Hamısı</button>
                                            <br>
                                            <button class="dropdown-item w-100" onclick="filterSelection('expenditure')"> Məxaric</button>
                                            <br>
                                            <button class="dropdown-item w-100" onclick="filterSelection('income')"> Mədaxil</button>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div id="scrol_price" class="mt-5">
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
                                        @foreach($invoices as $invoice)
                                            <div class="filterDiv income">
                                                <ul>
                                                    <li class="green">{{str_repeat('0',6) . $invoice->id}}</li>
                                                    <li>{{$invoice->created_at}}</li>
                                                    <li>{{$invoice->shop}}</li>
                                                    <li class="green bold">{{\App\lib\Invoice::getStatusViaKey($invoice->status)}}</li>
                                                    <li>
                                                        <input type="button" value="status" class="btn btn-info">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

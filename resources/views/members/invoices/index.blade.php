@extends('members.layout')

@section('title')
    Kargo | Invoices
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
                                                <li>Tarixi</li>
                                                <li>Məbləğ</li>
                                                <li>Əməliyyat</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv income">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="green">40 ₺</li>
                                                <li>Balans artırılması</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv expenditure">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="red">- 33.77 ₺</li>
                                                <li>Sifariş Ödənişi</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv income">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="green">40 $</li>
                                                <li>Balans artırılması</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv expenditure">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="red">-33.9 $</li>
                                                <li>Sifariş Ödənişi</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv income">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="green">50 ₺</li>
                                                <li>Balans artırılması</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv expenditure">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="red">- 43.77 ₺</li>
                                                <li>Sifariş Ödənişi</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv income">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="green">50 $</li>
                                                <li>Balans artırılması</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv expenditure">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="red">-43.9 $</li>
                                                <li>Sifariş Ödənişi</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv income">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="green">40 ₺</li>
                                                <li>Balans artırılması</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv expenditure">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="red">- 33.77 ₺</li>
                                                <li>Sifariş Ödənişi</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv income">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="green">40 $</li>
                                                <li>Balans artırılması</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv expenditure">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="red">-33.9 $</li>
                                                <li>Sifariş Ödənişi</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv income">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="green">50 ₺</li>
                                                <li>Balans artırılması</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv expenditure">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="red">- 43.77 ₺</li>
                                                <li>Sifariş Ödənişi</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv income">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="green">50 $</li>
                                                <li>Balans artırılması</li>
                                            </ul>
                                        </div>
                                        <div class="filterDiv expenditure">
                                            <ul>
                                                <li>22.09.2020 22:28</li>
                                                <li class="red">-43.9 $</li>
                                                <li>Sifariş Ödənişi</li>
                                            </ul>
                                        </div>
                                    </div>
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

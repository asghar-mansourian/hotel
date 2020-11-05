@extends('members.layout')

@section('title')
    Kargo | Setting
@endsection

@section('main')
    @include('members.partials.code')
    <div class="mt-5">
        <div class="row relative">
            <div class="col-md-5 col-sm-5 col-xs-12 balance-block balance_azn">
                <div class="balance">
                    <picture>
                        <img src="{{url('front/image/balans.png')}}" alt="balans" class="img-responsive">
                    </picture>
                    <div class="balance-count">
                        <span>My balance</span> <br/>
                        <span class="count">0.00<sup>₼</sup></span>
                    </div>
                    <div class="balance-date">Son əlavə tarixi</div>
                    <div class="balance-text">
                        Increase your balance to pay for delivery to Azerbaijan and order an online courier
                        you can.
                        <p><b>THE INCREASED BALANCE IS NOT RETURNED.</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12 right-side">
                <div class="border_sh">
                    <h5><strong>BALANCE INCREASE FOR PAYMENT</strong></h5>
                    <div class="payment">
                        <form action="{{url('payment/verify')}}" method="post">
                            @csrf
                            <input type="number" name="" value="" id="balance_val" required="" placeholder="USD"
                                   name="new_amount">
                            <input type="number" name="balance" id="new_balance_val" required="" placeholder="AZN"
                                   name="new_amount_azn"
                                   readonly="">
                            <button type="submit" class="payment_button">The balance increases</button>
                        </form>
                    </div>
                    <div class="visa-logo">
                        <span class="font_grey">min: 1 USD - max: 50 USD</span>
                        <img src="{{url('front/image/visa-logo-master.png')}}" alt="visa-logo-master">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5 ">
            <div class="row border_sh">
                <div class="col-md-10 col-sm-9 pl-0 pr-0">
                    <div class="title_list mb-4"> Milli Ön üzərindən balansınızı artırın</div>
                    <div class="million">
                        <strong>
                            <div class="million_num">Hesab Nömrəsi:</div>
                            <div class="million_nn">000000</div>
                        </strong>
                    </div>
                    <p>MilliÖN terminalına yaxınlaşırsınız, "Çatdırılma xidməti" bölməsinə daxil olub, "kargo.az"
                        bölməsinə keçid edirsiniz. Daşınma və kuryer xidmət haqqını ödəyə bilmək üçün "kargo.az AZN"
                        xanasını seçirsiniz. Açılan xanada yuxarıdakı hesab nömrənizi yığaraq "davam et" düyməsini
                        sıxırsınız. Çatdırılma və kuryer xidməti üçün lazım olan məbləği daxil edib
                        təsdiqləyirsiniz. Əməliyyatı bitirdikdən sonra məbləğ dərhal kargo.az saytındakı şəxsi
                        kabinetdəki balansınızda görünəcək.</p>
                    <p>Qeyd: Çatdırılma balansı ilə Türkiyədən alış-veriş etmək mümkün deyil! AZN balansından TRY
                        balansına pul transferi mümkün deyil!</p>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-3 pr-0">
                    <img src="{{url('front/image/terminal.png')}}" class="million_img">
                </div>

            </div>
        </div>
        <div class="col-md-12 mt-5 border_sh">
            <div class="dropdown_dr">
                <div class="dropdown myBtnContainer">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_hamisi"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Hamısı<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown_hamisi">
                        <button class="dropdown-item w-100 active" onclick="filterSelection('all')"> Hamısı</button>
                        <br>
                        <button class="dropdown-item w-100" onclick="filterSelection('expenditure')"> Məxaric
                        </button>
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
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection



@extends('members.layout')

@section('title')
    Kargo | Dashboard
@endsection

@section('main')
    @include('members.code')
    <div class="mt-5">
        <div class="row relative">
            <div class="balance-block col-md-8 col-sm-7 col-xs-12">
                <div class="balance">
                    <picture>
                        <img src="{{url('front/image/balans.png')}}" alt="balans" class="img-responsive">
                    </picture>
                    <div class="balance-count">
                        <span>Balansım</span> <br/>
                        <span class="count">0.00<sup>₼</sup></span>
                    </div>
                    <div class="balance-date">Son əlavə tarixi</div>
                    <div class="balance-text">
                        Azərbaycana çatdırılma haqqının ödənilməsi və online kuryer sifarişi üçün balansınızı artıra bilərsiniz.
                        <p><b> ARTIRILAN BALANS GERİ QAYTARILMIR.</b></p>
                    </div>
                    <a href="#/azn_balance" class=""><a data-v-27fd2a5d="" href="#" class="border-btn btn-effect">Balansı artır</a></a>

                </div>
            </div>
            <div class="col-md-4 col-sm-5 col-xs-12 right-side">
                <div class="border_sh right_time">
                    <div class="tooltip"><span class="fa-fw select-all fas m-0 mr-0"></span>
                        <span class="tooltiptext">
									  Bu, Sizin Kargo.az vasitəsilə son 30 gündə ölkəyə gətirdiyiniz bağlamaların məhsul dəyəri və çatdırılma haqqı üçün ödədiyiniz məbləğdir. Qeyd edək ki, qanunvericiliyə görə 30 gün ərzində şəxsi istifadə üçün gətirilmiş poçt yüklərinin dəyəri və bunun üçün ödənmiş çatdırılma haqqı toplam 300 dolları keçdikdə gömrük rüsumu tətbiq edilir.</span>
                    </div>
                    <div style="clear: both;"></div>
                    <td class="post">
                        <div class="text-center">
                            <a href="#" onclick="showStuff('answer1', 'text1', this); return false;"><img src="{{url('front/image/wallet1.png')}}" width="150"></a>
                        </div>
                        <span id="answer1" style="display: none;">
											<h4 class="text-center mt-0"><strong>Son 30 gün</strong></h4>
											<div class="timer">
											  <svg class="rotate" viewbox="0 0 250 250">
											    <path id="loader" transform="translate(125, 125)"/>
											  </svg>
											  <div class="dots">
											    <span class="time deg0"></span>
											    <span class="time deg45"></span>
											    <span class="time deg90"></span>
											    <span class="time deg135"></span>
											  </div>
											</div>
											<div class="spin-div relative">
												<span id="procent">0.00</span>
											</div>
											<div style="clear: both;"></div>
											<div class="text-center procent_dolar"><h4 class="mb-0"><strong>0.00 <sup>$</sup></strong></h4></div>
										</span>
                        <span id="text1"></span>
                    </td>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5 border_sh">
            <div class="dropdown_dr">
                <div class="dropdown myBtnContainer">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_hamisi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Hamısı<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown_hamisi">
                        <button class="dropdown-item w-100 active" onclick="filterSelection('all')"> Hamısı</button><br>
                        <button class="dropdown-item w-100" onclick="filterSelection('expenditure')"> Məxaric</button><br>
                        <button class="dropdown-item w-100" onclick="filterSelection('income')"> Mədaxil</button><br>
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
    <li class="active_li">
        <a href="{{url('/home')}}"><i class="fas fa-th-large"></i><span class="use_dis_no">Dashboard</span></a>
    </li>
    <li class="">
        <a href="#"><i class="fas fa-search-location"></i><span class="use_dis_no">Xaricdəki ünvanlarım</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-shopping-basket"></i><span class="use_dis_no">Sifarişlərim</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">Bağlamalarım</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-donate"></i><span class="use_dis_no">AZN Balansım</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-donate"></i><span class="use_dis_no">TL Balansım</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">Kuryer</span></a>
    </li>
    <li>
        <a href="#"><i class="far fa-question-circle" style="font-size: 16px;"></i><span class="use_dis_no">Sorğu</span></a>
    </li>
    <li class="">
        <a href="{{url('/setting')}}"><i class="fas fa-cogs"></i><span class="use_dis_no">Setting</span></a>
    </li>
    <li>
        <a href="{{url('/logout')}}"><i class="fas fa-power-off"></i><span class="use_dis_no">Log Out</span></a>
    </li>
@endsection

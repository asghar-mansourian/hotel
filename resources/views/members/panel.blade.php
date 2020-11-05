@extends('members.layout')

@section('title')
    Kargo | Dashboard
@endsection

@section('main')
    @include('members.partials.top_panel')

    <div class="mt-5">
        <div class="row relative">
            <div class="balance-block col-md-8 col-sm-7 col-xs-12">
                <div class="balance">
                    <picture>
                        <img src="{{url('front/image/balans.png')}}" alt="balans" class="img-responsive">
                    </picture>
                    <div class="balance-count">
                        <span>Balansım</span> <br/>
                        <span class="count">{{$wallet}}<sup>₼</sup></span>
                    </div>
                    <div class="balance-date">Son əlavə tarixi</div>
                    <div class="balance-text">
                        Azərbaycana çatdırılma haqqının ödənilməsi və online kuryer sifarişi üçün balansınızı artıra
                        bilərsiniz.
                        <p><b> ARTIRILAN BALANS GERİ QAYTARILMIR.</b></p>
                    </div>
                    <a href="#/azn_balance" class=""><a data-v-27fd2a5d="" href="#" class="border-btn btn-effect">Balansı
                            artır</a></a>

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
                            <a href="#" onclick="showStuff('answer1', 'text1', this); return false;"><img
                                    src="{{url('front/image/wallet1.png')}}" width="150"></a>
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
											<div class="text-center procent_dolar"><h4
                                                    class="mb-0"><strong>0.00 <sup>$</sup></strong></h4></div>
										</span>
                        <span id="text1"></span>
                    </td>
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
                            <li style="width: 20%;">type</li>
                            <li style="width: 20%;">price</li>
                            <li style="width: 20%;">refid</li>
                            <li style="width: 20%;">status</li>
                            <li style="width: 20%;">date</li>
                        </ul>
                    </div>
                    @foreach($payments as $payment)
                        <div class="filterDiv income">
                            <ul>
                                <li style="width: 20%;">{{$payment->type}}</li>
                                <li style="width: 20%;" class="green">{{$payment->price}}</li>
                                <li style="width: 20%;">{{$payment->refid}}</li>
                                <li style="width: 20%;">{{$payment->status}}</li>
                                <li style="width: 20%;">{{$payment->created_at}}</li>
                            </ul>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
@endsection
@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

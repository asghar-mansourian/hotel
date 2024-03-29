@extends('members.layout')

@section('title')
    {{__('member.site_name')}}| {{__('member.tlBalance')}}
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">
        <div class="row relative">
            <div class="col-md-5 col-sm-5 col-xs-12 balance-block balance_azn">
                <div class="balance">
                    <picture>
                        <img src="{{url('front/image/balans-mob.png')}}" alt="balans" class="img-responsive w-100">
                        </picture>
                        <div class="balance-count">
                            <span>{{__('member.mybalance')}}</span> <br/>
                            <span class="count">0.00<sup>₼</sup></span>
                        </div>
                        <div class="balance-date">{{__('member.lastaddeddate')}}</div>
                        <div class="balance-text">
                            {{__('member.deliveryonlinecourier')}}
                            <p><b>{{__('member.increasenotreturned')}}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 right-side">
                    <div class="row border_sh m-0">
                        <div class="col-md-10 col-sm-9 pl-0 pr-0">
                            <div class="title_list mb-4">{{__('member.balanceincreasesdesc')}}</div>
                            <div class="million">
                                <strong><div class="million_num">{{__('member.accountnumber')}} </div><div class="million_nn">000000</div> </strong>
                            </div>
                            <p>
                                {{__('member.accountnumberdesc1')}}
                            </p>
                            <p>{{__('member.accountnumberdesc2')}}</p>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-3 pr-0">
                            <img src="{{url('front/image/terminal.png')}}" class="million_img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5 border_sh">
                <div class="dropdown_dr">
                    <div class="dropdown myBtnContainer">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_hamisi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            {{__('member.all')}}<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown_hamisi">
                            <button class="dropdown-item w-100 active" onclick="filterSelection('all')"> {{__('member.all')}}</button><br>
                            <button class="dropdown-item w-100" onclick="filterSelection('expenditure')"> {{__('member.expenditure')}}</button><br>
                            <button class="dropdown-item w-100" onclick="filterSelection('income')"> {{__('member.income')}}</button><br>
                        </div>
                    </div>
                </div>
                <div id="scrol_price" class="mt-5">
                    <div id="scrol_price_content">
                        <div class="filterDiv_ul">
                            <ul>
                                <li>{{__('member.date')}}</li>
                                <li>{{__('member.amount')}}</li>
                                <li>{{__('member.operation')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv income">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="green">40 ₺</li>
                                <li>{{__('member.increasebalance')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv expenditure">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="red">- 33.77 ₺</li>
                                <li>{{__('member.orderpayment')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv income">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="green">40 $</li>
                                <li>{{__('member.increasebalance')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv expenditure">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="red">-33.9 $</li>
                                <li>{{__('member.orderpayment')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv income">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="green">50 ₺</li>
                                <li>{{__('member.increasebalance')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv expenditure">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="red">- 43.77 ₺</li>
                                <li>{{__('member.orderpayment')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv income">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="green">50 $</li>
                                <li>{{__('member.increasebalance')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv expenditure">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="red">-43.9 $</li>
                                <li>{{__('member.orderpayment')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv income">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="green">40 ₺</li>
                                <li>{{__('member.increasebalance')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv expenditure">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="red">- 33.77 ₺</li>
                                <li>{{__('member.orderpayment')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv income">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="green">40 $</li>
                                <li>{{__('member.increasebalance')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv expenditure">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="red">-33.9 $</li>
                                <li>{{__('member.orderpayment')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv income">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="green">50 ₺</li>
                                <li>{{__('member.increasebalance')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv expenditure">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="red">- 43.77 ₺</li>
                                <li>{{__('member.orderpayment')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv income">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="green">50 $</li>
                                <li>{{__('member.increasebalance')}}</li>
                            </ul>
                        </div>
                        <div class="filterDiv expenditure">
                            <ul>
                                <li>22.09.2020 22:28</li>
                                <li class="red">-43.9 $</li>
                                <li>{{__('member.orderpayment')}}</li>
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

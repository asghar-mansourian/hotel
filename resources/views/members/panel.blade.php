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
                        <span>{{__('member.mybalance')}}</span> <br/>
                        <span class="count">{{$wallet}}<sup>₼</sup></span>
                    </div>
                    <div class="balance-date">{{__('member.lastaddeddate')}}</div>
                    <div class="balance-text">
                        {{__('member.deliveryonlinecourier')}}
                        <p><b>{{__('member.increasenotreturned')}}</b></p>
                    </div>
                    <a href="{{url('az-balance')}}" class=""><a data-v-27fd2a5d="" href="{{url('az-balance')}}" class="border-btn btn-effect">{{__('member.balanceincreases')}}</a></a>

                </div>
            </div>
            <div class="col-md-4 col-sm-5 col-xs-12 right-side" style="visibility: hidden">
                <div class="border_sh right_time" style="visibility: hidden">
                    <div class="tooltip"><span class="fa-fw select-all fas m-0 mr-0" style="visibility: hidden"></span>
                        <span class="tooltiptext">
									  {{__('member.amountyoupaiddelivery')}}</span>
                    </div>
                    <div style="clear: both;"></div>
                    <td class="post">
                        <div class="text-center">
                            <a href="#" onclick="showStuff('answer1', 'text1', this); return false;"><img
                                    src="{{url('front/image/wallet1.png')}}" width="150"></a>
                        </div>

                    </td>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5 border_sh">
            <div class="dropdown_dr">
                <div class="dropdown myBtnContainer">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_hamisi"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        {{__('member.all')}}<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown_hamisi">
                        <button class="dropdown-item w-100 active" onclick="filterSelection('all')"> {{__('member.all')}}</button>
                        <br>
                        <button class="dropdown-item w-100" onclick="filterSelection('expenditure')"> {{__('member.expenditure')}}</button>
                        <br>
                        <button class="dropdown-item w-100" onclick="filterSelection('income')"> {{__('member.expenditure')}}</button>
                        <br>
                    </div>
                </div>
            </div>
            <div id="scrol_price" class="mt-5">
                <div id="scrol_price_content">
                    <div class="filterDiv_ul">
                        <ul>
                            <li style="width: 20%;">{{__('member.type')}}</li>
                            <li style="width: 20%;">{{__('member.price')}}</li>
                            <li style="width: 20%;">{{__('member.refid')}}</li>
                            <li style="width: 20%;">{{__('member.status')}}</li>
                            <li style="width: 20%;">{{__('member.date')}}</li>
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

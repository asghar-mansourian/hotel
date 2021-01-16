@extends('members.layout')

@section('title')
    {{__('member.site_name')}}| {{__('member.dashboard')}}
@endsection

@section('main')
    @include('members.partials.top_panel')

    <div class="mt-5">
        <div class="row relative" style="height: 190px!important;">
            <div class="balance-block col-md-6 col-sm-7 col-xs-12">
                <div class="balance">
                    <picture>
                        <img src="{{url('front/image/balans.png')}}" alt="balans" class="img-responsive" style="height: 185px!important;">
                    </picture>
                    <div class="balance-count">
                        <span>{{__('member.mybalance')}}</span> <br/>
                        <span class="count">{{$wallet}}<sup>₺</sup></span>
                    </div>
                    <div class="balance-date">
                        <a href="{{url('az-balance')}}" class="btn-balance-home"><a style="top: 30px!important;
    right: 5px!important;min-height: 62px" data-v-27fd2a5d="" href="{{url('az-balance')}}" class="border-btn btn-effect">{{__('member.balanceincreases')}}</a></a>
                    </div>
                    <div class="balance-text" style="    position: absolute;
    bottom: 6px;
    font-size: 13px;
    left: 30px;
    width: 222px;
    line-height: 1.7;">
                        <p><b>{{__('member.balance1')}}</b></p>
                    </div>


                </div>
            </div>

            <div class="col-md-6 col-sm-5 col-xs-12 right-side" style="">
                <div class="balance">
                    <picture>
                        <img src="{{url('front/image/balans.png')}}" alt="balans" style="height: 185px!important" class="img-responsive">
                    </picture>
                    <div class="balance-count">
                        <span>{{__('member.mybalance')}}</span> <br/>
                        <span class="count">
                            @if(auth()->user()->usd_balance < 0)
                                <span style="color: red">-{{\App\lib\Helpers::formatPrice(auth()->user()->usd_balance)}}<sup>$</sup></span>
                            @else
                                {{\App\lib\Helpers::formatPrice(auth()->user()->usd_balance)}}<sup>$</sup>
                            @endif
                            </span>
                    </div>
                    <div class="balance-date">
                        <a href="{{url('tl-balance')}}" class="btn-balance-home"><a data-v-27fd2a5d="" style="top: 30px!important;
    right: 5px!important;min-height: 62px" href="{{url('tl-balance')}}" class="border-btn btn-effect">{{__('member.balanceincreases')}}</a></a>
                    </div>
                    <div class="balance-text" style="    position: absolute;
    bottom: 6px;
    font-size: 13px;
    left: 30px;
    width: 222px;
    line-height: 1.7;">
                        <p><b>{{__('member.balance2')}}</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5 border_sh">
            <div class="dropdown_dr">
                <div class="dropdown myBtnContainer">
                    @include('members.partials.filter_payment')
                </div>
            </div>
            <div id="scrol_price" class="mt-5">
                <div id="scrol_price_content">
                    <div class="filterDiv_ul">
                        <ul>
                            <li style="width: 25%;">{{__('member.type')}}</li>
                            <li style="width: 25%;">{{__('member.price')}}</li>
                            <li style="width: 25%;">{{__('member.status')}}</li>
                            <li style="width: 25%;">{{__('member.date')}}</li>
                        </ul>
                    </div>
                    @foreach($payments as $payment)
                        <div class="filterDiv income" style="display: block">
                            <ul>
                                <li style="width: 25%;">
                                    @if($payment->type == "cash")
                                        {{__('member.cash')}}
                                    @else
                                        {{__('member.online')}}
                                    @endif
                                </li>
                                @if($payment->modelable_type)
                                    <li style="width: 25%;" class="red">-{{$payment->price . ' ' . ' '  }} @if($payment->balance_type == "tl")  ₺ @else $ @endif</li>
                                @else
                                    <li style="width: 25%;" class="green">+{{$payment->price . ' '  }} @if($payment->balance_type == "tl")  ₺ @else $ @endif</li>
                                @endif
                                <li style="width: 25%;">{!! $payment->status ?  '<span class="green">'.__('member.paid_success').'</span>' : '<span>'.__('member.paid_failed').'</span>' !!}</li>
                                <li style="width: 25%;">{{$payment->created_at}}</li>
                            </ul>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <style>

            @media only screen and (max-width: 1200px) {
                .btn-balance-home {
                    width: 130px !important;
                    display: block !important;
                    min-height: 120px !important;
                }

                .border_sh {
                    margin-top: 277px !important;
                }
            }
        </style>
@endsection
@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

@extends('members.layout')

@section('title')
    {{__('member.site_name')}}| {{__('member.aznbalance')}}
@endsection

@section('main')
    @include('members.partials.code')
    <div class="mt-5">
        <div class="row relative">
            @include('admin.components.error')
            <div class="col-md-5 col-sm-5 col-xs-12 balance-block balance_azn">
                <div class="balance">
                    <picture>
                        <img src="{{url('front/image/balans.png')}}" alt="balans" class="img-responsive">
                    </picture>
                    <div class="balance-count">
                        <span>{{__('member.mybalance')}}</span> <br/>
                        <span class="count">{{Auth::user()->balance}}<sup>₺</sup></span>
                    </div>
                    <div class="balance-date">{{__('member.balance3')}}</div>
                    <div class="balance-text">
                        {{__('member.balance4')}}
                        <p><b>{{__('member.balance5')}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12 right-side">
                <div class="border_sh">
                    <h5><strong>{{__('member.balance6')}}</strong></h5>
                    <div class="payment">
                        <form action="{{url('/payment/gate')}}" method="post">
                            @csrf
{{--                            <input type="number" min="1" max="50" id="balance_val" required="" placeholder="USD" name="amount">--}}
                            <input type="number" min="1" id="new_balance_val" style="width: 50%" required="" placeholder="TL" name="amount_tl">
                            <button type="submit" class="payment_button ">{{__('member.balance')}}</button>
                        </form>
                    </div>
                    <div class="visa-logo">
                        <span  style="visibility: hidden" class="font_grey">{{__('member.min')}}: 1 USD - {{__('member.max')}}: 50 USD</span>
                        <img src="{{url('front/image/visa-logo-master.png')}}" alt="visa-logo-master">
                    </div>
                </div>
            </div>
        </div>
        {{--        <div class="col-md-12 mt-5 ">--}}
        {{--            <div class="row border_sh">--}}
        {{--                <div class="col-md-10 col-sm-9 pl-0 pr-0">--}}
        {{--                    <div class="title_list mb-4">{{__('member.balanceincreasesdesc')}}</div>--}}
        {{--                    <div class="million">--}}
        {{--                        <strong>--}}
        {{--                            <div class="million_num">{{__('member.accountnumber')}}:</div>--}}
        {{--                            <div class="million_nn">000000</div>--}}
        {{--                        </strong>--}}
        {{--                    </div>--}}
        {{--                    <p>{{__('member.accountnumberdesc1')}}</p>--}}
        {{--                    <p>{{__('member.accountnumberdesc2')}}</p>--}}
        {{--                </div>--}}
        {{--                <div class="col-md-2 col-sm-3 col-xs-3 pr-0">--}}
        {{--                    <img src="{{url('front/image/terminal.png')}}" class="million_img">--}}
        {{--                </div>--}}

        {{--            </div>--}}
        {{--        </div>--}}
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
                                    <li style="width: 25%;" class="red">-{{$payment->price . ' '  }} @if($payment->balance_type == "tl")  ₺ @else $ @endif</li>
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
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection
@section('footerCustom')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        $(document).ready(function () {


            $('#balance_val').on('change', function (e) {

                e.preventDefault();
                var context = $(this);

                context.closest('form').find('button[type="submit"]').attr('disabled', true)
                var form = $("#balance_val").val();
                var formData = new FormData()
                formData.append('to', 'try');
                formData.append('from', 'usd');
                formData.append('currency', form);
                var error = function (response) {
                    var jsonResponse = JSON.parse(response.responseText);
                    console.log(jsonResponse.errors);
                    $(jsonResponse.errors).each(function (index, value) {
                        $('#' + jsonResponse.keys[index]).addClass('has-danger');
                        $('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                    })
                }
                var success = function (response) {

                    $('#new_balance_val').attr('value', response);
                };
                var after = function () {
                    // $('div.block2').unblock();
                }
                var before = function () {
                    $('.form-control').removeClass('has-danger');
                    $('.help-block').each(function () {
                        $(this).remove();
                    });
                }
                var option = {
                    data: formData,
                    url: '/getCurrencyCalculator',
                    type: "POST",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                };
                $.ajaxSetup(option);
                $.ajax({
                    beforeSend: function () {
                        before()
                    },
                    success: function (response) {
                        success(response)
                        context.closest('form').find('button[type="submit"]').removeAttr('disabled')
                    },
                    error: function (response) {
                        error(response)
                    },
                    complete: function () {
                        after()
                    }
                });
            });

        });

    </script>
    <script>
        // $('input[name="amount"]').blur(function () {
        //     $('input[name="amount_azn"]').val(
        //         $(this).val()
        //     )
        // });
    </script>
@endsection



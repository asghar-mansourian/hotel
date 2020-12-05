@extends('members.layout')

@section('title')
    {{__('member.site_name')}}| {{__('member.tlBalance')}}
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
                        <span>{{__('member.mybalance')}}</span> <br/>
                        <span class="count">0.00<sup>₼</sup></span>
                    </div>
                    <div class="balance-date">{{__('member.lastaddeddate')}}</div>
                    <div class="balance-text">
                        {{__('member.lastaddeddatedesc')}}
                        <p><b>{{__('member.lastaddeddatedesc1')}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12 right-side">
                <div class="border_sh">
                    <h5><strong>{{__('member.balanceincreasepayment')}}</strong></h5>
                    <div class="payment">
                        <form action="{{url('/payment/gate')}}" method="post">
                            @csrf
{{--                            <input type="number" id="balance_val" required="" placeholder="USD" name="amount">--}}
                            <input min="1" type="number" id="new_balance_val" style="width: 50%" required="" placeholder="USD" name="amount_usd" >
                            <button type="submit" class="payment_button">{{__('member.balanceincreases')}}</button>
                        </form>
                    </div>
                    <div class="visa-logo">
                        <span style="visibility: hidden" class="font_grey">{{__('membaer.min')}}: 1 USD - {{__('member.max')}}: 50 USD</span>
                        <img src="{{url('front/image/visa-logo-master.png')}}" alt="visa-logo-master">
                    </div>
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
                        <div class="filterDiv income" style="display: block">
                            <ul>
                                <li style="width: 20%;">{{$payment->type}}</li>
                                @if($payment->modelable_type)
                                    <li style="width: 20%;" class="red">-{{$payment->price}}</li>
                                @else
                                    <li style="width: 20%;" class="green">+{{$payment->price}}</li>
                                @endif
                                <li style="width: 20%;">{{is_null($payment->refid) ? 0 : $payment->refid}}</li>
                                <li style="width: 20%;">{!! $payment->status ?  '<span class="green">'.__('member.paid_success').'</span>' : '<span>'.__('member.paid_failed').'</span>' !!}</li>
                                <li style="width: 20%;">{{$payment->created_at}}</li>
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

                var form = $("#balance_val").val();
                var data = {'to': 'try', 'from': 'usd', 'currency': form};
                console.log(data)
                var error = function (response) {
                    var jsonResponse = JSON.parse(response.responseText);
                    console.log(jsonResponse.errors);
                    $(jsonResponse.errors).each(function (index, value) {
                        $('#' + jsonResponse.keys[index]).addClass('has-danger');
                        $('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                    })
                }
                var success = function (response) {
                    // var url = '/setting';
                    //
                    // window.location.replace(url);
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
                    data: data,
                    url: '/getCurrencyCalculator',
                    type: "POST",
                    dataType: "JSON",

                    cache: false,
                };
                $.ajaxSetup(option);
                $.ajax({
                    beforeSend: function () {
                        before()
                    },
                    success: function (response) {
                        success(response)
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



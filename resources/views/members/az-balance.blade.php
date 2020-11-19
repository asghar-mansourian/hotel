@extends('members.layout')

@section('title')
    Kargo | AZN Balance
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
                            <input type="number" id="balance_val" required="" placeholder="USD" name="amount">
                            <input type="number" id="new_balance_val" required="" placeholder="TRY" name="amount_azn" readonly="">
                            <button type="submit" class="payment_button">{{__('member.balanceincreases')}}</button>
                        </form>
                    </div>
                    <div class="visa-logo">
                        <span class="font_grey">{{__('member.min')}}: 1 USD - {{__('member.max')}}: 50 USD</span>
                        <img src="{{url('front/image/visa-logo-master.png')}}" alt="visa-logo-master">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5 ">
            <div class="row border_sh">
                <div class="col-md-10 col-sm-9 pl-0 pr-0">
                    <div class="title_list mb-4">{{__('member.balanceincreasesdesc')}}</div>
                    <div class="million">
                        <strong>
                            <div class="million_num">{{__('member.accountnumber')}}:</div>
                            <div class="million_nn">000000</div>
                        </strong>
                    </div>
                    <p>{{__('member.accountnumberdesc1')}}</p>
                    <p>{{__('member.accountnumberdesc2')}}</p>
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
                        {{__('member.all')}}<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown_hamisi">
                        <button class="dropdown-item w-100 active" onclick="filterSelection('all')"> {{__('member.all')}}</button>
                        <br>
                        <button class="dropdown-item w-100" onclick="filterSelection('expenditure')"> {{__('member.expenditure')}}
                        </button>
                        <br>
                        <button class="dropdown-item w-100" onclick="filterSelection('income')"> {{__('member.income')}}</button>
                        <br>
                    </div>
                </div>
            </div>
            <div id="scrol_price" class="mt-5">
                <div id="scrol_price_content">
                    <div class="filterDiv_ul">
                        <ul>
                            <li>{{__('member.history')}}</li>
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
@section('footerCustom')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        $(document).ready(function () {


            $('#balance_val').on('change', function (e) {

                e.preventDefault();

                var form = $("#balance_val").val();
                var data = {'to': 'azn', 'from': 'usd', 'currency': form};
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
                    console.log(response);
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



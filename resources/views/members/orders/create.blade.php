@extends('layout.layout')
@php
    use App\lib\Helpers;
    $taxOrder = Helpers::getTaxOrder()
@endphp
@section('title')
    {{__('member.site_name')}}| {{__('member.orders')}}
@endsection
@section('content')
    <input type="hidden" id="factor-number-header" value="2">
    <div class="container">
        <div class="row">
            @include('admin.components.error')
            @include('members.partials.validation_errors')
        </div>
        <div class="row">
            <input type="hidden" id="validTextPrice" value="{{__('member.validPriceCalculator')}}">
            <input type="hidden" id="crawlerLinkError" value="{{__('member.crawlerLinkError')}}">
            <div class="col-md-12 col-sm-12 col-xs-12 invoice_buttons">
                @include('members.partials.buttons')
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="mt-5">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="tab">
                                @foreach($countries as $country)
                                    <button class="tablinks
                                    @if(request()->query('country') == $country->id) active @endif
                                    @if(is_null(request()->query('country')) && $loop->first) active @endif"
                                            onclick="window.location.href = '{{url("/orders/create?country={$country->id}")}}'">
                                        <img src="{{url("images/{$country->flag}")}}" width="20" alt="flag">
                                        <span class="dis_no">{{$country->name}}</span>
                                    </button>
                                @endforeach
                            </div>
                            <div class="border_bar">
                                @foreach($countries as $country)
                                    <form action="{{route('basketStore')}}" method="POST" id="country-{{$country->id}}"
                                          class="tabcontent" style="
                                    @if(request()->query('country') == $country->id) display: block;  @endif
                                    @if(is_null(request()->query('country')) && $loop->first) display: block;  @endif">
                                        @csrf
                                        <input type="hidden" name="country_id" value="{{$country->id}}">

                                        <div class="row container-order" style="padding: 20px;">
                                            <div class="col-md-12  mb-4" style="    display: flex;
    justify-content: space-between;">

                                                <div class="">
                                                    <span  class="" style="font-weight:bold;background-color: #15b2ec;color: white;border-radius: 50px;padding: 4px;">
                                                                #1
                                                    </span>
                                                    <span style="margin-left: 10px;color: black;font-weight: bold">{{__('member.aboutproduct')}}</span>
                                                </div>
                                                <button style="border: none;color: #fd475d" type="button"
                                                        class=" btn-remove-container-order">
                                                    <i class="fas fa-trash-alt ml-3"></i>
                                                    {{__('member.deletelink')}}
                                                </button>
                                            </div>
                                            <div class="col-md-8 col-xs-6">
                                                <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.productLink')}}</label>
                                                <input type="url" name="link[]"
                                                       placeholder="{{__('member.productLink')}} *"
                                                       class="w-100 courier_input" oninput="crawler(this)" required>
                                                <span class="linkText" style="color: red!important;"></span>
                                            </div>
                                            <div class="col-md-4 col-xs-6 mb-4 courier_dr" style="padding-right: 0">
                                                <label for="" style="margin-bottom: 10px;font-size: 12px;font-weight: bold;">{{__('member.number')}}</label>

                                                <input type="number" min="1" name="quantity[]"
                                                       placeholder="{{__('member.number')}} *"
                                                       class="w-100 courier_input" required="">
                                            </div>
                                            <br>
                                            <div class="col-md-12 mt-3 col-sm-12 p-0">


                                                <div class="col-md-4 col-sm-5 mb-4" style="padding-right: 0">
                                                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.price')}}</label>
                                                    <input type="text" onkeyup="return numberValidation(this)"
                                                           name="price[]" pattern="[0-9]+(\.[0-9]{1,2})?%?"
                                                           placeholder="{{__('member.price')}}({{$country->currency}}) *"
                                                           class="w-100 courier_input" required>
                                                    <span id="numberText"></span>
                                                </div>
                                                <div class="col-md-1 text-center" style="padding-right: 0;margin-top: 30px;">

                                                    <span style="font-weight:bold;color:#15b2ec!important;font-size: 26px; ">+</span>
                                                </div>
                                                <div class="col-md-2" style="padding-right: 0">
                                                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.comission')}}</label>
                                                    <input style="font-weight:bold;color:#15b2ec!important;border: 1px solid #15b2ec!important" type="text"
                                                           value="5%"
                                                           placeholder="5%"
                                                           class="w-100 courier_input" disabled >
                                                    <span id="numberText"></span>
                                                </div>
                                                <div class="col-md-1 text-center" style="padding-right: 0;margin-top: 30px;">

                                                    <span style="font-weight:bold;color:#15b2ec!important;font-size: 26px; ">=</span>
                                                </div>
                                                <div class="col-md-4  mb-4 courier_dr " style="padding-right: 0;">
                                                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.total')}}</label>
                                                    <input type="text" name="total[]" class=" w-100 courier_input"
                                                           readonly style="background: rgba(0,0,0,.03)"
                                                           placeholder="{{__('member.total')}}(+{{$taxOrder}}%)" >
                                                </div>
                                                <div class="col-md-12 mb-4 mt-3 " style="padding-right: 0;">
                                                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.description')}}</label>
                                                    <textarea class="courier_textare mt-0 h-auto" rows="4" cols="0"
                                                              name="description[]"
                                                              placeholder="{{__('member.productDetails')}}"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 p-0">
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr" style="padding-right: 0">
                                                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.color')}}</label>

                                                    <input type="text" name="color[]"
                                                           placeholder="{{__('member.color')}} *"
                                                           class="w-100 courier_input" required="">
                                                </div>
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr" style="padding-right: 0">
                                                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.measure')}}</label>

                                                    <input type="text" name="specification[]"
                                                           placeholder="{{__('member.measure')}} *"
                                                           class="w-100 courier_input" required="">
                                                </div>

                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" data-country-id="{{$country->id}}"
                                                        class=" mr-4 btn-add-container-order"
                                                        style="width: auto;border: none;color: #00c99c!important;">
                                                    <i class="fas fa-plus ml-3"></i>
                                                    {{__('member.addanewlink')}}
                                                    </button>

                                            </div>
                                        </div>
                                        <input type="submit" class="hidden btn-submit-form">
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">

                <div class="border_sh mt-5">
                    <h4 class="text-center" style="display: none"><strong>{{__('member.order_title')}}</strong></h4>
                    <div class="danger" style="display: none">
                        <input type="radio" id="kart" checked name="payment_type"
                               value="{{\App\Order::PAYMENT_TYPE_ONLINE}}">
                        <label for="kart">
                            <span class="exp">{{__('member.paymentcard')}}</span> <br> <span class="description">( {{__('member.paymentcarddesc')}} )
                        </span></label><br>
                        <div style="clear: both;"></div>
                        <input type="radio" id="balance" name="payment_type" value="{{\App\Order::PAYMENT_TYPE_CASH}}">
                        <label for="balance">
                            <span class="exp">{{__('member.paymenttlbalance')}}</span> <br>
                            <span class="description">( {{__('member.paymenttlbalancedsc')}} <br><b>{{__('member.yourtlbalance')}}: {{auth()->user()->balance}}TL</b> )
                            </span></label><br>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="price_kal mt-5">
                        <span class="text-left float-left">{{__('member.total')}}: </span>
                        <span class="text-right">
                          <h3><strong id="total-price-orders">0 TL</strong></h3>
                      </span>
                    </div>
                    {{--  <div class="mt-5">
                          <h5><strong>{{__('member.deliveryoffice')}} *</strong></h5>
                          <select class="@error('branch_id') is-invalid @enderror w-100 courier_input "
                                  name="branch_id">

                              @foreach($branches as $branch)
                                  <option value="{{$branch->id}}" @if(auth()->user()->branch_id == $branch->id) selected @endif>{{$branch->title}}</option>
                              @endforeach
                          </select>
                      </div>--}}
                    <div class="mt-5">
                        <button id="btn-save-order" type="button"
                                class="order_button w-100 ml-0">{{__('member.makepayment')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')
    <style>
        input {
            box-shadow: 0 0 0 0 !important;
            border-radius: 7px !important;
        }

        textarea {
            box-shadow: 0 0 0 0 !important;
            border-radius: 7px !important;
        }
    </style>
    <script type="text/x-handlebars-template" id="template-order">
        <div class="row container-order" style="padding: 20px;">
            <div class="col-md-12  mb-4" style="    display: flex;
    justify-content: space-between;">

                <div class="">
                                                    <span  class="factor-result-num" style="font-weight:bold;background-color: #15b2ec;color: white;border-radius: 50px;padding: 4px;">

                                                    </span>
                    <span style="margin-left: 10px;color: black;font-weight: bold"> About Product</span>
                </div>
                <button style="border: none;color: #fd475d" type="button"
                        class=" btn-remove-container-order">
                    <i class="fas fa-trash-alt ml-3"></i>
                    {{__('member.deletelink')}}
                </button>
            </div>
            <div class="col-md-8 col-xs-6">
                <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.productLink')}}</label>
                <input type="url" name="link[]"
                       placeholder="{{__('member.productLink')}} *"
                       class="w-100 courier_input" oninput="crawler(this)" required>
                <span class="linkText" style="color: red!important;"></span>
            </div>
            <div class="col-md-4 col-xs-6 mb-4 courier_dr" style="padding-right: 0">
                <label for="" style="margin-bottom: 10px;font-size: 12px;font-weight: bold;">{{__('member.number')}}</label>

                <input type="number" min="1" name="quantity[]"
                       placeholder="{{__('member.number')}} *"
                       class="w-100 courier_input" required="">
            </div>
            <br>
            <div class="col-md-12 mt-3 col-sm-12 p-0">


                <div class="col-md-4 col-sm-5 mb-4" style="padding-right: 0">
                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.price')}}</label>
                    <input type="text" onkeyup="return numberValidation(this)"
                           name="price[]" pattern="[0-9]+(\.[0-9]{1,2})?%?"
                           placeholder="{{__('member.price')}}({{$country->currency}}) *"
                           class="w-100 courier_input" required>
                    <span id="numberText"></span>
                </div>
                <div class="col-md-1 text-center" style="padding-right: 0;margin-top: 30px;">

                    <span style="font-weight:bold;color:#15b2ec!important;font-size: 26px; ">+</span>
                </div>
                <div class="col-md-2" style="padding-right: 0">
                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.comission')}}</label>
                    <input style="font-weight:bold;color:#15b2ec!important;border: 1px solid #15b2ec!important" type="text"
                           value="5%"
                           placeholder="5%"
                           class="w-100 courier_input" disabled >
                    <span id="numberText"></span>
                </div>
                <div class="col-md-1 text-center" style="padding-right: 0;margin-top: 30px;">

                    <span style="font-weight:bold;color:#15b2ec!important;font-size: 26px; ">=</span>
                </div>
                <div class="col-md-4  mb-4 courier_dr " style="padding-right: 0;">
                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.total')}}</label>
                    <input type="text" name="total[]" class=" w-100 courier_input"
                           readonly style="background: rgba(0,0,0,.03)"
                           placeholder="{{__('member.total')}}(+{{$taxOrder}}%)" >
                </div>
                <div class="col-md-12 mb-4 mt-3 " style="padding-right: 0;">
                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.description')}}</label>
                    <textarea class="courier_textare mt-0 h-auto" rows="4" cols="0"
                              name="description[]"
                              placeholder="{{__('member.productDetails')}}"></textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 p-0">
                <div class="col-md-6 col-xs-6 mb-4 courier_dr" style="padding-right: 0">
                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.color')}}</label>

                    <input type="text" name="color[]"
                           placeholder="{{__('member.color')}} *"
                           class="w-100 courier_input" required="">
                </div>
                <div class="col-md-6 col-xs-6 mb-4 courier_dr" style="padding-right: 0">
                    <label style="margin-bottom: 10px;font-size: 12px;font-weight: bold;" for="">{{__('member.measure')}}</label>

                    <input type="text" name="specification[]"
                           placeholder="{{__('member.measure')}} *"
                           class="w-100 courier_input" required="">
                </div>

            </div>
            <div class="col-md-12 text-right">
                <button type="button" data-country-id="{{$country->id}}"
                        class=" mr-4 btn-add-container-order"
                        style="width: auto;border: none;color: #00c99c!important;">
                    <i class="fas fa-plus ml-3"></i>
                    {{__('member.addanewlink')}}
                </button>

            </div>
        </div>


    </script>

    <script>
        @if(request()->query('country'))
        var countryId = {{request()->query('country')}}
        @else
        var countryId = $('input[name="country_id"]').val();
        @endif
        var taxOrder = {{$taxOrder}};
    </script>
    <script src="/front/js/orders/create.js?v=1.0.1"></script>
    <script>
        function crawler(input) {
            var link = input.value;
            var textCrawel = $("#crawlerLinkError").val();
            var price = $(input).closest('div').parent().find('[name="price[]"]');
            if (link != '') {
                $.ajax({
                    url: '{{route('crawler')}}',
                    data: {
                        '_token': '{{csrf_token()}}',
                        link: link
                    },
                    method: 'POST',
                    success: function (response) {
                        $("#btn-save-order").fadeIn();
                        $(input).next().html("");
                        price.val(response.price);
                        $(price).trigger('blur');
                    },
                    error: function (error) {
                        if (error.status == 500) {
                            $(input).next().html(textCrawel);
                            $("#btn-save-order").fadeOut();
                            price.val('');
                            $(price).trigger('blur');
                        } else {
                            $(input).next().html(textCrawel);
                            $("#btn-save-order").fadeOut();
                            price.val('');
                            $(price).trigger('blur');
                        }
                    }
                })
            }
        }

        function numberValidation(num) {
            var textValid = $("#validTextPrice").val();
            var value = num.value;
            var myStr = value.search(",");

            if (myStr != -1) {
                value = value.replace(",", ".");
                num.value = value;
            } else {
                var valid = (num.value.match(/^-?\d*(\.\d+)?$/));
                if (valid == null) {
                    $(num).next().html(textValid);
                    $("#btn-save-order").fadeOut();

                } else {
                    $(num).next().html("");
                    $("#btn-save-order").fadeIn();
                }
            }

        }

        function getFactorNumber(factor){
            let nums =  $('#factor-number-header').val();
            alert(nums);
        }
    </script>
    <style>
        #numberText {
            color: red;
        }
    </style>
@endsection

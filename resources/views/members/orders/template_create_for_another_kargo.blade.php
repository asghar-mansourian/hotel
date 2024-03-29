@extends('layout.layout')
@php
    use App\lib\Helpers;
    $taxOrder = Helpers::getTaxOrder()
@endphp
@section('title')
    {{__('member.site_name')}}| {{__('member.orders')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.components.error')
            @include('members.partials.validation_errors')
        </div>
        <div class="row">
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
                                    <form action="{{route('orders.store')}}" method="POST" id="country-{{$country->id}}" class="tabcontent" style="
                                    @if(request()->query('country') == $country->id) display: block;  @endif
                                    @if(is_null(request()->query('country')) && $loop->first) display: block;  @endif">
                                        @csrf
                                        <input type="hidden" name="country_id" value="{{$country->id}}">

                                        <div class="row container-order">

                                            <div class="col-md-7 col-sm-7 mb-4">
                                                <input type="url" name="link[]" placeholder="{{__('member.productLink')}} *" class="w-100 courier_input" required>
                                            </div>

                                            <div class="col-md-5 col-sm-5 mb-4">
                                                <input type="text" name="price[]" pattern="[0-9]+(\.[0-9]{1,2})?%?" placeholder="{{__('member.price')}}({{$country->currency}}) *" class="w-100 courier_input" required>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-sm-5 mb-4">
                                                <h5><strong>{{__('member.cargointurkey')}} *</strong></h5>
                                                <select class="courier_input w-100" name="has_cargo[]">
                                                    <option selected value="{{\App\OrderItem::HAS_CARGO_FALSE}}">{{__('member.no')}} !</option>
                                                    <option value="{{\App\OrderItem::HAS_CARGO_TRUE}}">{{__('member.yes')}} !</option>
                                                </select>
                                            </div>

                                            <div class="col-md-8 col-sm-8 p-0">
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr hidden ">
                                                    <h5><strong>{{__('member.amountofcargo')}} *</strong></h5>
                                                    <input type="text" name="cargo[]" placeholder="{{__('member.amountofcargo')}}" class="w-100 courier_input">
                                                </div>
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                                                    <h5><strong>{{__('member.total')}}(+{{$taxOrder}}%)</strong></h5>
                                                    <input type="text" name="total[]" class="w-100 courier_input" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 p-0">
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                                                    <h5><strong>{{__('member.number')}} *</strong></h5>
                                                    <input type="number" min="1" value="1" name="quantity[]" placeholder="{{__('member.number')}} *" class="w-100 courier_input" required="">
                                                </div>
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                                                    <h5><strong>{{__('member.measure')}} *</strong></h5>
                                                    <input type="text" name="specification[]" placeholder="{{__('member.measure')}} *" class="w-100 courier_input" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-0">
                                                <textarea class="courier_textare" name="description[]" placeholder="{{__('member.productDetails')}}"></textarea>
                                            </div>

                                            <div class="col-md-12 text-right">
                                                <button type="button" data-country-id="{{$country->id}}" class="courier_button mr-4 btn-add-container-order" style="width: auto;">{{__('member.addanewlink')}}<i
                                                        class="fas fa-plus ml-3"></i></button>

                                                <button type="button" class="invoice_button btn-remove-container-order">{{__('member.deletelink')}}<i class="fas fa-trash-alt ml-3"></i></button>
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
                    <h4 class="text-center"><strong>{{__('member.order_title')}}</strong></h4>
                    <div class="danger">
                        <input type="radio" id="kart" checked name="payment_type" value="{{\App\Order::PAYMENT_TYPE_ONLINE}}">
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
                        <button id="btn-save-order" type="button" class="order_button w-100 ml-0">{{__('member.makepayment')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')
    <script type="text/x-handlebars-template" id="template-order">
        <div class="row container-order">
            <br>
            <hr>
            <br>
            <div class="col-md-7 col-sm-7 mb-4">
                <input type="url" name="link[]" placeholder="{{__('member.productLink')}} *"  class="w-100 courier_input" required>
            </div>

            <div class="col-md-5 col-sm-5 mb-4">
                <input type="text" name="price[]" pattern="[0-9]+(\.[0-9]{1,2})?%?" placeholder="{{__('member.price')}} *" class="w-100 courier_input" required>
            </div>

            <div class="col-md-4 col-sm-4 col-sm-5 mb-4">
                <h5><strong>{{__('member.cargointurkey')}} *</strong></h5>
                <select class="courier_input w-100" name="has_cargo[]">
                    <option selected value="{{\App\OrderItem::HAS_CARGO_FALSE}}">{{__('member.no')}} !</option>
                    <option value="{{\App\OrderItem::HAS_CARGO_TRUE}}">{{__('member.yes')}} !</option>
                </select>
            </div>

            <div class="col-md-8 col-sm-8 p-0">
                <div class="col-md-6 col-xs-6 mb-4 courier_dr hidden ">
                    <h5><strong>{{__('member.theamountcargo')}} *</strong></h5>
                    <input type="text" placeholder="{{__('member.theamountcargo')}}" pattern="[0-9]+(\.[0-9]{1,2})?%?" name="cargo[]" class="w-100 courier_input">
                </div>
                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                    <h5><strong>{{__('member.total')}}(+{{$taxOrder}}%)</strong></h5>
                    <input type="text" name="total[]" class="w-100 courier_input" readonly>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 p-0">
                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                    <h5><strong>{{__('member.number')}} *</strong></h5>
                    <input type="number" value="1" name="quantity[]" placeholder="{{__('member.number')}} *" class="w-100 courier_input" required="">
                </div>
                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                    <h5><strong>{{__('member.measure')}} *</strong></h5>
                    <input type="text" name="specification[]" placeholder="{{__('member.measure')}} *" class="w-100 courier_input" required="">
                </div>
            </div>

            <div class="col-md-12 mt-0">
                <textarea class="courier_textare" name="description[]" placeholder="{{__('member.productDetails')}}"></textarea>
            </div>

            <div class="col-md-12 text-right">
                <button type="button" class="courier_button mr-4 btn-add-container-order" style="width: auto;">{{__('member.addanewlink')}}<i class="fas fa-plus ml-3"></i></button>
                <button type="button" class="invoice_button btn-remove-container-order">{{__('member.deletelink')}}<i class="fas fa-trash-alt ml-3"></i></button>
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
@endsection

@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{ __('website.calculator') }}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('/front/css/calculator.css')}}">
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="bacg_img" style="margin-top: 0">
                    <div class="pricing_wi border_sh">
                        @include('web.partials.pricing')
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-5">
                <div class="title_list mb-4">{{__('member.exchangeratecalculator')}}</div>
                <form class="convert-currency" method="post" action="{{url('/getCurrencyCalculator')}}">
                    <div class="float-left">
                        <input type="number" name="currency" id="calculate-currency-number" required value="1">
                    </div>
                    <select name="from" aria-labelledby="dropdown_baglama" style="width: 100px;margin-left: 10px; box-shadow: 0 0 black !important;">
                        {{--                <option class="">{{__('member.select')}}</option>--}}
                        <option class="dropdown-item" value="UAH">UAH</option>
                        <option class="dropdown-item" selected value="USD">USD</option>
                        <option class="dropdown-item" value="TRY">TRY</option>
                    </select>
                    <div style="clear: both;"></div>
                    <div class="mt-4"></div>
                    <div class="float-left">
                        <input class="result_cal" type="text" readonly>
                    </div>
                    <select name="to" class=" " aria-labelledby="dropdown_baglama"
                            style=" width: 100px;margin-left: 10px;
    box-shadow: 0 0 black !important;">
                        {{--                <option class="">{{__('member.select')}}</option>--}}
                        <option class="dropdown-item" selected value="UAH">UAH</option>
                        <option class="dropdown-item" value="USD">USD</option>
                        <option class="dropdown-item" value="TRY">TRY</option>
                    </select>
                    <div style="clear: both;"></div>

                    <div class="col-md-12 button-part mt-4 p-0" style="display: none">
                        <button type="submit" class="btn-effect w-100 ">{{__('member.calculate')}}</button>
                    </div>
                </form>

                <div class="font_grey mt-4">{{__('member.calculateexchange')}}</div>
            </div>

            <div class="col-md-5">
                <h3><strong>{{__('website.how_calculate')}}</strong></h3>
                <div class="mt-4 font_13">
                    {{__('website.how_calculate_description')}}
                </div>
                <div class="font_pink mt-4"><h4><strong>{{__('website.note')}}:</strong></h4> </div>
                <div class="mt4 font_13">{{__('website.not_description')}}</div>
                <div class="font_pink mt-5"><h4><strong>{{__('website.information')}}</strong></h4> </div>
                <div class="mt-4 font_13">{{__('website.company_information_description1')}}.</div>
                <div class="mt-4 font_13">{{__('website.company_information_description2')}}</div>
            </div>
        </div>
    </div>
@endsection

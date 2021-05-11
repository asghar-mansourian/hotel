@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{ __('website.pricing') }}
@endsection
@section('styles')
<link rel="stylesheet" href="{{url('/front/css/pricing.css?v=1.0.0')}}" >
    @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: unset!important;padding-right: unset ">
                <img style="width: 100%" src="{{url('/front/image/pricing_index.png')}}">
                <h1 class="image_top_text">{{__('website.pricing_image_text')}}</h1>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 type_row">
                <div class="col-md-3 .d-none .d-lg-block .d-sm-block"></div>
                <div class="col-md-9 text-left">
                        <div class="col-md-12 col-xs-12 col-sm-12 type_row">
                            <div class="col-md-3 product_type_back">
                                <button class="tablinks active" onclick="openCity(event, 'solid_product')" id="defaultOpen">
                                <span>{{__('website.solid_product_type')}}</sapan>
                                </button>
                            </div>
                            <div class="col-md-3 product_type_back">
                                <button class="tablinks" onclick="openCity(event, 'liquid_product')">
                                <span>{{__('website.liquid_product_type')}}</sapan>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="pricing">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
{{--                    <div class="col-md-4 p-0">--}}
{{--                        <h3>{{__('website.tariffs_by_countries')}}</h3>--}}
{{--                        <span><hr class="blue_hr" style=""></span>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8 p-0">--}}
{{--                        <div class="tab">--}}
{{--                            @foreach($countries as $country)--}}
{{--                                <button class="tablinks" onclick="openCity(event, 'country-{{$country->id}}')" id="defaultOpen"><img src="{{url("images/{$country->flag}")}}" >--}}
{{--                                    <span class="dis_no">{{app()->getLocale()=='en'?$country->name:$country->name_ru}}</span>--}}
{{--                                </button>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-9 col-sm-12">
                        <div id="solid_product" class="tabcontent">
                             @foreach($countries as $country)

                                <div class="row">
                                    <table>
                                        <tr class="first_row">
                                            <th scope="col">{{__('website.weight')}}</th>
                                            <th scope="col"  style="text-align: center">
                                                <img src="{{url("/images/$country->flag")}}">
                                            </th>
                                        </tr>
                                        @foreach($country->priceCalculators as $priceCalculator)
                                            <tr>
                                                <th scope="row">{{$priceCalculator->from }}
                                                    - {{$priceCalculator->to }} {{$priceCalculator->unit->title}} {{$priceCalculator->des ?? ""}}
                                                </th>
{{--                                                <td>{{$priceCalculator->liquid_currency}}$</td>--}}
                                                <td>{{$priceCalculator->currency}}$</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <br>
                                </div>
                        @endforeach
                        </div>
                        <div id="liquid_product" class="tabcontent">
                           @foreach($countries as $country)
                                <div class="row">
                                    <table>
                                        <tr class="first_row">
                                            <th scope="col">{{__('website.weight')}}</th>
                                            <th scope="col" style="text-align: center">
                                                <img src="{{url("/images/$country->flag")}}">
                                            </th>
                                        </tr>
                                        @foreach($country->priceCalculators as $priceCalculator)
                                            <tr>
                                                <th scope="row">{{$priceCalculator->from }}
                                                    - {{$priceCalculator->to }} {{$priceCalculator->unit->title}} {{$priceCalculator->des ?? ""}}
                                                </th>
                                                <td>{{$priceCalculator->liquid_currency}}$</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <br>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-md-9 col-sm-12 text-left bottom_table">
                        <p> {{__('website.offers')}} <a href="#" class="color_blue">{{\App\Setting::getValue(\App\Setting::FIELD_EMAIL)}}</a> {{__('website.offers2')}}.</p>
{{--                        <p>{{__('website.company_information_description1')}}</p>--}}
{{--                        <p>{{__('website.company_information_description2')}}</p>--}}
                    </div>
                    <div class="col-md-12 back_image text-right">
                        <img src="{{url('/front/image/pricing_back.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById("defaultOpen").click();
    </script>
@endpush

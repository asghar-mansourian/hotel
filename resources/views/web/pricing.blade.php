@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{ __('website.pricing') }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="pricing">
                <div class="col-md-12 mt-5">
                    <div class="col-md-4 p-0"><h3>{{__('website.tariffs_by_countries')}}</h3>
                        <span><hr class="blue_hr" style=""></span>
                    </div>
                    <div class="col-md-8 p-0">
                        <div class="tab">
                            @foreach($countries as $country)
                                <button class="tablinks" onclick="openCity(event, 'country-{{$country->id}}')" id="defaultOpen"><img src="{{url("images/{$country->flag}")}}" >
                                    <span class="dis_no">{{app()->getLocale()=='en'?$country->name:$country->name_ru}}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 mb-5">
                        @foreach($countries as $country)
                            <div id="country-{{$country->id}}" class="tabcontent">
                                <div class="row">
                                    <table>
                                        <tr>
                                            <th scope="col">{{__('website.weight')}}</th>
                                            <th scope="col">{{__('website.solid_product_type')}}</th>
                                            <th scope="col">{{__('website.liquid_product_type')}}</th>
                                        </tr>
                                        @foreach($country->priceCalculators as $priceCalculator)
                                            <tr>
                                                <th scope="row">{{$priceCalculator->from }}
                                                    - {{$priceCalculator->to }} {{$priceCalculator->unit->title}} {{$priceCalculator->des ?? ""}}
                                                </th>
                                                <td>{{$priceCalculator->liquid_currency}}$</td>
                                                <td>{{$priceCalculator->currency}}$</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 mt-5 mb-5">
                        <p> {{__('website.offers')}} <a href="#" class="color_blue">{{\App\Setting::getValue(\App\Setting::FIELD_EMAIL)}}</a> {{__('website.offers2')}}.</p>
                        <p>{{__('website.company_information_description1')}}</p>
                        <p>{{__('website.company_information_description2')}}</p>
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

@extends('layout.layout')
@section('title')
    Kargo | Contact Us
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

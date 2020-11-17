@extends('layout.layout')
@section('title')
    Kargo | Contact Us
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="bacg_img">
                    <div class="pricing_wi border_sh">
                        <div class="row">
                            <div class="col-md-12 mb-4 font_pink"><strong>{{__('website.calculator')}}</strong>	</div>
                            <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                <div class="pricing_box_cou">
                                    <select>
                                        <option>{{__('website.country')}}</option>
                                        <option>Türkiye</option>
                                        <option>Chin</option>
                                        <option>ABŞ</option>
                                        <option>Almania</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                <div class="pricing_box_cou">
                                    <select>
                                        <option>{{__('website.city')}}</option>
                                        <option>Bakı</option>
                                        <option>Gəncə</option>
                                        <option>Sumqayıt</option>
                                        <option>Zaqatala</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.invoices_number')}}">
                            </div>
                            <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.weight')}}">
                                <div class="pricing_box">
                                    <select>
                                        <option>kq</option>
                                        <option>qram</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                <input type="number" name="" class="pricing_imput w-100" placeholder="En">
                                <div class="pricing_box">
                                    <select>
                                        <option>sm</option>
                                        <option>m</option>
                                        <option>dm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.length')}}">
                                <div class="pricing_box">
                                    <select>
                                        <option>sm</option>
                                        <option>m</option>
                                        <option>dm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 mt-3 mb-3">
                                <input type="number" name="" class="pricing_imput w-100" placeholder="{{__('website.height')}}">
                                <div class="pricing_box">
                                    <select>
                                        <option>sm</option>
                                        <option>m</option>
                                        <option>dm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mt-4"></div>
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-3 mb-3 pricing_price_blue">
                                <button id="calculate" class="btn-effect border-btn">{{__('website.calculate')}}</button>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 mt-3 mb-3 pricing_price text-right" >
                                <div class="all">
                                    {{__('member.total')}} : <strong class="ml-3"><i class="fas fa-dollar-sign"></i> 3</strong>
                                </div>
                            </div>
                        </div>
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

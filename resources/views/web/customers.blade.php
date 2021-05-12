@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.customers')}}
@endsection
@section('styles')
    {{--    <link rel="stylesheet" href="{{url('front/css/index.css')}}">--}}
    <link rel="stylesheet" href="{{url('front/css/customer.css')}}">

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: unset!important;padding-right: unset ">
                <img style="width: 100%" src="{{url('/front/image/customer_index.png')}}">
                <h1 class="image_top_text">{{__('website.customer')}}</h1>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 country_back">
                <div class="col-md-3 .d-none .d-lg-block .d-sm-block"></div>
                <div class="col-md-9">
                    @foreach($countries as $country)
                        <div class="col-md-3 col-xs-12 xl-sm-6 customer_country">
                            <a class="country-button" data-countryId="{{$country->id}}">
                                <img src="{{url("/images/$country->flag")}}">
                                <span>{{app()->getLocale()=='en'?$country->name:$country->name_ru}}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="site_center">
        <div class="container-fluid">
            <div class="row" style="padding-left: 60px;padding-right: 80px;">
                <div class="col-md-12 mt-5">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="mob_768">
                                <div class="shop_title">
{{--                                    <h4>{{__('website.categories')}}</h4>--}}
                                </div>
                                <div class="shopping_cat">
{{--                                    <label class="label">--}}
{{--                                        <input class="categories" type="checkbox" name="categories" checked="checked" value="all">--}}
{{--                                        <span class="checkmark"></span>--}}
{{--                                        {{__('website.all_categories')}}--}}

{{--                                    </label>--}}
{{--                                    <br>--}}
                                    @foreach($customerGroups as $customerGroup)
                                        <label class="label">
                                            <input class="categories" type="checkbox" style="display: none" name="categories" value="{{$customerGroup->id}}">
                                            <img src="{{url('/images/'.$customerGroup->image)}}">
                                            <span class="checkmark"></span>
                                            {{$customerGroup->name}}
                                        </label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="shop_search">
                                {{--                                <div class="button_yel_searc">--}}
                                {{--                                    <div class="button_yel">--}}
                                {{--                                        <img src="{{url('temp/front/image/')}}/turkey.svg">Turkey--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                {{--    <div class="shop_search_in">
                                     <input type="text" id="search" placeholder="{{__('website.customer_search_placeholder')}}">
                                     <button id="search-button"><i class="fas fa-search mr-2"></i><span class="disp_no">{{__('website.search')}}</span> </button>
                                 </div>--}}
                            </div>
                            <div style="clear:both;"></div>
{{--                            <div class="mob_767">--}}
{{--                                <div class="shop_title">--}}
{{--                                    <h4>Kateqoriyalar</h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div style="clear:both;"></div>
                            <div  id="customer">
                                <div id="customers">
                                    <div class="row">
                                        @foreach($customers as $customer)
                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <div class="img_border">
                                                    <a href="{{$customer->link}}"><img src="@if($customer->image){{url('images/customers/'.$customer->image->file_name)}}@endif" alt="{{$customer->name}}" ></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="shop_list w-100">
                                        {{--                                <div class="shop_div"><a href="#"><i class="fas fa-chevron-left" style="color: #3A4C6F"></i></a></div>--}}
                                        {{--                                <div class="shop_div"><a href="#" class="active">1</a></div>--}}
                                        {{--                                <div class="shop_div"><a href="#">2</a></div>--}}
                                        {{--                                <div class="shop_div"><a href="#">3</a></div>--}}
                                        {{--                                <div class="shop_div"><a href="#"><i class="fas fa-chevron-right" style="color: #3A4C6F"></i></a></div>--}}
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    cu
    <script src="{{url('/front/js/customers.js')}}"></script>
@endpush

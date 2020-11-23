@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.showinvoices')}}
@endsection

@section('styleCustom')
    {{--    <link rel="stylesheet" href="{{url('admin/fa/plugins/dropify/dist/css/dropify.min.css')}}">--}}
    <style>
        .has-danger {
            border: 1px solid #d9534f !important;
        }
    </style>
@endsection

@section('main')
    <form class="form" method="post" id="mainForm">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                id
                            @endslot

                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter Id...
                            @endslot
                            @slot('value')
                                {{$courier->id}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>user id</span>
                                <a href="{{url('admin/users/edit/' .$courier->user_id )}}"
                                   class="ml-3 btn btn-info btn-sm">show</a>
                            @endslot

                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter Id...
                            @endslot
                            @slot('value')
                                {{$courier->user_id}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>stock id</span>
                                <a href="{{url('admin/stocks/edit/' .$courier->stock_id )}}"
                                   class="ml-3 btn btn-info btn-sm">show</a>
                            @endslot

                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter Id...
                            @endslot
                            @slot('value')
                                {{$courier->user_id}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                district
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$courier->district}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                city
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$courier->city}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                street
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$courier->street}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                home
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$courier->home}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                phone
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$courier->phone}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                    address
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$courier->address}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                    @endslot


                    @slot('header')
                        <h2 class="card-title">Courier</h2>
                    @endslot
                @endcomponent
                @foreach($courierItems as $courierItem)
                    @component('admin.components.panel')
                        @slot('items')
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    courier item id
                                @endslot

                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    Please Enter Id...
                                @endslot
                                @slot('value')
                                    {{$courierItem->id}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent
                                @component('admin.components.form.inputLabel')
                                    @slot('label')
                                        <span>product id</span>
                                        @php
                                            $type = \Illuminate\Support\Str::of($courierItem->productable_type)->substr(4)->lower();
                                        @endphp
                                        <a href="{{url('admin/'.$type.'s/show/' .$courierItem->productable_id )}}"
                                           class="ml-3 btn btn-info btn-sm">show</a>
                                    @endslot

                                    @slot('type')
                                        text
                                    @endslot
                                    @slot('placeholder')
                                        Please Enter Id...
                                    @endslot
                                    @slot('value')
                                        {{$courier->user_id}}
                                    @endslot
                                    @slot('attr')
                                        disabled
                                    @endslot
                                @endcomponent

                        @endslot


                        @slot('header')
                            <h2 class="card-title">Main Information</h2>
                        @endslot
                    @endcomponent
                @endforeach

            </div>
            <div class="col-12 col-lg-4">
                @component('admin.components.panel')


                    @slot('header')
                        <h2 class="card-title">Back To Invoices</h2>
                    @endslot
                    @slot('items')

                        <a href="{{url('admin/couriers')}}"
                           class="btn btn-danger btn-block ">{{__('custom.other.back')}}</a>

                    @endslot
                @endcomponent


            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')
    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/countries/
        @endslot
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>Show Invoice</li>
        @endslot
    @endcomponent
@endsection

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
                                {{$invoice->id}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>user id</span>
                                    <a href="" class="ml-3 btn btn-info btn-sm">show</a>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->user_id}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    country
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->country->name}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    Shop
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->shop}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    Product Type
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->product_type}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    Quantity
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->quantity}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    Price
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->price}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    Order Track
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->order_track}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    Order Date
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->order_date}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>Order File</span>
                                    <a href="{{url('admin/files/' . $invoice->order_file) }}" class="ml-3 btn btn-info btn-sm">Download</a>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    Please Click To Download File
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    Description
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$invoice->description}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent



                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>status</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    @switch($invoice->status)
                                        @case('0')
                                        ORDERED
                                        @break
                                        @case('1')
                                        WAREHOUSE ABROAD
                                        @break
                                        @case('2')
                                        ON WAY
                                        @break
                                        @case('3')
                                        CUSTOMS INSPECTION
                                        @break
                                        @case('4')
                                        IN WAREHOUSE
                                        @break
                                        @case('5')
                                        COURIER DELIVERY
                                        @break
                                        @case('6')
                                        RETURN
                                        @break
                                        @case('7')
                                        COMPLETE
                                        @break
                                    @endswitch
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent
                            {{--                        @component('admin.components.form.textLabel')--}}
                        {{--                            @slot('label')--}}
                        {{--                                message--}}
                        {{--                            @endslot--}}



                        {{--                            @slot('value')--}}
                        {{--                                {{$contact->email}}--}}
                        {{--                            @endslot--}}
                        {{--                            @slot('attr')--}}
                        {{--                                disabled--}}
                        {{--                            @endslot--}}
                        {{--                        @endcomponent--}}
                    @endslot


                    @slot('header')
                        <h2 class="card-title">Main Information</h2>
                    @endslot
                @endcomponent

            </div>
            <div class="col-12 col-lg-4">
                @component('admin.components.panel')


                    @slot('header')
                        <h2 class="card-title">Back To Invoices</h2>
                    @endslot
                    @slot('items')

                        <a href="{{url('admin/invoices')}}"
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

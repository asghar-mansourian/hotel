@extends('admin.layout.layout')

@section('title')
    Dashboard | Show Order
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
                                {{$order->id}}
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
                                {{$order->user_id}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent


                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>Country</span>

                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$order->country->name}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent


                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>region</span>

                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$order->branch->region->name}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>branch</span>

                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$order->branch->title}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>Total Price</span>

                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$order->total}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>Payment Type</span>

                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$order->payment_type}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent


                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>Status</span>

                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$order->status}}
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
                        <h2 class="card-title">Back To Orders</h2>
                    @endslot
                    @slot('items')

                        <a href="{{url('admin/orders')}}"
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
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>Add Country</li>
        @endslot
    @endcomponent
@endsection

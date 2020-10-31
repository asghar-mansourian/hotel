@extends('admin.layout.layout')

@section('title')
    Dashboard | Show Payment
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
                                {{$payment->id}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>user id</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$payment->user_id}}
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
                                    {{$payment->type}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>description</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$payment->description}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>price</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$payment->price}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>discount</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$payment->discount}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>authority</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$payment->authority}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>refid</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$payment->refid}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>refid</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$payment->ip}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>extra</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$payment->extra}}
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
                                    {{$payment->status}}
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
                        <h2 class="card-title">Back To Payments</h2>
                    @endslot
                    @slot('items')

                        <a href="{{url('admin/payments')}}"
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
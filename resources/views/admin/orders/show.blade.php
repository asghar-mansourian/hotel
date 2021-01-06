@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}}  | {{__('admin.showorders')}}
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
            <div class="col-12">
                @include('admin.components.error')
            </div>
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.id')}}
                            @endslot

                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleaseenterid')}}
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
                                <span>{{__('admin.userid')}}</span>
                                <a href="{{url('admin/users/edit/' . $order->user_id)}}"
                                   class="ml-3 btn btn-info btn-sm">{{__('admin.show')}}</a>
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
                                <span>{{__('admin.country')}}</span>

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
                                <span>{{__('admin.region')}}</span>

                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                    @if($order->branch != null)
                                        {{$order->branch->region->name}}
                                    @endif

                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>{{__('admin.branch')}}</span>

                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                @if($order->branch != null)
                                    {{$order->branch->title}}
                                @endif
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>{{__('admin.totalprice')}}</span>

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
                                <span>{{__('admin.paymenttype')}}</span>

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
                                <span>{{__('admin.status')}}</span>

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
                        <h2 class="card-title">{{__('admin.maininformation')}}</h2>
                    @endslot
                @endcomponent

            </div>
            <div class="col-12 col-lg-4">
                @component('admin.components.panel')


                    @slot('header')
                        <h2 class="card-title">{{__('admin.backtoorders')}}</h2>
                    @endslot
                    @slot('items')

                        <a href="{{url('admin/orders')}}"
                           class="btn btn-danger btn-block ">{{__('admin.back')}}</a>

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
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i> {{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>{{__('admin.showorders')}}</li>
        @endslot
    @endcomponent
@endsection

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
                                <span>order id</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$order->order_id}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Link</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$order->link}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Has Cargo</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$order->has_cargo}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Cargo</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$order->cargo}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Quantity</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$order->quantity}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Description</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$order->description}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Total</span>
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
                                    <span>status</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    @switch($order->status)
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
                        <h2 class="card-title">Back To Order Items</h2>
                    @endslot
                    @slot('items')

                        <a href="{{url('admin/order-items')}}"
                           class="btn btn-danger btn-block ">{{__('custom.other.back')}}</a>

                        @if(request()->get('status') == 1)
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . 2 )}}"
                               class="btn btn-primary btn-block ">Warehouse Abroad</a>
                        @elseif(request()->get('status') == 6)
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . \App\Order::STATUS_COURIER_DELIVERY )}}"
                               class="btn btn-primary btn-block ">Given to Courier</a>
                        @elseif(request()->get('status') == 7)
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . \App\Order::STATUS_COMPLETE )}}"
                               class="btn btn-primary btn-block ">Customer Deliverables</a>
                        @else
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . 1 )}}"
                               class="btn btn-primary btn-block ">Purchased</a>
                        @endif
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

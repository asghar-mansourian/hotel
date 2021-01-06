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
    <div class="form" id="mainForm">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="col-12">
                    @include('admin.components.error')
                </div>
                @component('admin.components.panel')
                    @slot('items')
                        @if(request()->get('status') == 2)
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    @isset($order->orderBarcode->barcode)
                                        <a href="{{url('/admin/print-factor/'.$order->orderBarcode->barcode . '/1')}}" class="ml-3 btn btn-info btn-sm" target="_blank">Print 1</a>
                                        <a href="{{url('/admin/print-factor/'.$order->orderBarcode->barcode . '/2')}}" class="ml-3 btn btn-info btn-sm" target="_blank">Print 2</a>
                                    @endisset
                                </div>
                            </div>
                            <div action="" method="post">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        <span>Weight</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control " id="weight" name="weight" type="text" placeholder="Enter weight order" value="{{$order->weight}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        <span>Weight Price</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control " type="text" id="weight-price" disabled value="{{$order->weight_price}} $">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        <span>Overseas Warehouse Rack Number</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" id="overseas-warehouse-number" value="{{$order->overseas_warehouse_number}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        <span>Domestic Warehouse Rack Number</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" id="domestic-warehouse-number" value="{{$order->domestic_warehouse_number}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <button class="ml-3 btn btn-success btn-md" id="btn-save">Save</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endif
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

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 form-label my-auto">
                                <span>Link</span>
                            </label>
                            <div class="col-md-9">
                                <input class="form-control " name="" type="text" placeholder="" value="{{$order->link}}" onclick="window.open('{{$order->link}}')" id="">
                            </div>
                        </div>
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
                                <span>Color</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$order->color}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Size</span>
                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$order->specification}}
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
                                    <span>Price</span>
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$order->price}}
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
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . 9 )}}"
                               class="btn btn-warning btn-block ">Cancel The Order</a>
                            <br>
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . 2 )}}"
                               class="btn btn-primary btn-block ">Warehouse Abroad</a>
                        @elseif(request()->get('status') == 6)
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . \App\Order::STATUS_COURIER_DELIVERY )}}"
                               class="btn btn-primary btn-block ">Given to Courier</a>
                        @elseif(request()->get('status') == 7)
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . \App\Order::STATUS_COMPLETE )}}"
                               class="btn btn-primary btn-block ">Customer Deliverables</a>
                        @elseif(request()->get('status') != 1 && request()->get('status') != 2 && request()->get('status') != 9)
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . 9 )}}"
                               class="btn btn-warning btn-block ">Cancel The Order</a>
                            <br>
                            <a href="{{url('admin/orders/status/' . $order->id . '/' . 1 )}}"
                               class="btn btn-primary btn-block ">Purchased</a>

                        @endif
                    @endslot

                @endcomponent


            </div>

        </div>
    </div>

@endsection
@section('scriptCustom')
    @component('admin.components.script.weightOrderScript')
        @slot('url')
            {{url('/admin/order-items/update/' . $order->id)}}
        @endslot
    @endcomponent

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

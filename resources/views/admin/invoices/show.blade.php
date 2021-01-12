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
    <div class="form">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="col-12">
                    @include('admin.components.error')
                </div>
                @component('admin.components.panel')
                    @slot('items')
                        @if(request()->get('status') == \App\Order::STATUS_WAREHOUSE_ABROAD)
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    @isset($invoice->orderBarcode->barcode)
                                        <a href="{{url('/admin/print-factor/'.$invoice->orderBarcode->barcode . '/1')}}" class="ml-3 btn btn-info btn-sm" target="_blank">{{__('admin.print1')}}</a>
                                        <a href="{{url('/admin/print-factor/'.$invoice->orderBarcode->barcode . '/2')}}" class="ml-3 btn btn-info btn-sm" target="_blank">{{__('admin.print2')}}</a>
                                    @endisset
                                </div>
                            </div>
                            <div action="" method="post">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        <span>Weight</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control " id="weight" name="weight" type="text" placeholder="Enter weight order" value="{{$invoice->weight}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        <span>Weight Price</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control " type="text" id="weight-price" disabled value="{{$invoice->weight_price}}  $">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        <span>Overseas Warehouse Rack Number</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" id="overseas-warehouse-number" value="{{$invoice->overseas_warehouse_number}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        <span>Domestic Warehouse Rack Number</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" id="domestic-warehouse-number" value="{{$invoice->domestic_warehouse_number}}">
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
                                <a href="{{route('invoices.show_file',$invoice->id)}}" class="ml-3 btn btn-info btn-sm">Download</a>
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

                        @if(request()->get('status') == 1)
                            {{--<a href="{{url('admin/invoices/status/' . $invoice->id . '/' . 9 )}}"
                               class="btn btn-warning btn-block ">Cancel The Invoice</a>
                            <br>--}}
                            <a href="{{url('admin/invoices/status/' . $invoice->id . '/' . 2 )}}"
                               class="btn btn-primary btn-block ">Warehouse Abroad</a></a>
                        @elseif(request()->get('status') == 6)
                            <a href="{{url('admin/invoices/status/' . $invoice->id . '/' . \App\Order::STATUS_COURIER_DELIVERY )}}"
                               class="btn btn-primary btn-block ">Given to Courier</a>
                        @elseif(request()->get('status') == 7)
                            <a href="{{url('admin/invoices/status/' . $invoice->id . '/' . \App\Order::STATUS_COMPLETE )}}"
                               class="btn btn-primary btn-block ">Customer Deliverables</a>
                        @elseif(request()->get('status') != 2 && request()->get('status') != 9  && request()->get('status') != 8)
                                {{-- <a href="{{url('admin/invoices/status/' . $invoice->id . '/' . 9 )}}"
                                    class="btn btn-warning btn-block ">Cancel The Invoice</a>
                                 <br>--}}
                            <a href="{{url('admin/invoices/status/' . $invoice->id . '/' . 2 )}}"
                               class="btn btn-primary btn-block ">Warehouse Abroad</a>
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
            {{url('/admin/invoices/update/' . $invoice->id)}}
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
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>Show Invoice</li>
        @endslot
    @endcomponent
@endsection

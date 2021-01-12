@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} |  {{__('admin.addblog')}}
@endsection

@section('styleCustom')
    <link rel="stylesheet" href="{{url('admin/fa/plugins/dropify/dist/css/dropify.min.css')}}">
    <style>
        .has-danger {
            border: 1px solid #d9534f !important;
        }
    </style>
@endsection

@section('main')
    <form class="form" method="post" id="mainForm" enctype="multipart/form-data" action="{{url('admin/admin-invoices/store')}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.name')}}
                            @endslot
                            @slot('name')
                                shop
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleasename')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.product_type')}}
                            @endslot
                            @slot('name')
                                    product_type
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleaseproduct_type')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.quantity')}}
                            @endslot
                            @slot('name')
                                    quantity
                            @endslot
                            @slot('type')
                                number
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleasequantity')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.price')}}
                            @endslot
                            @slot('name')
                                    price
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleaseprice')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.order_track')}}
                            @endslot
                            @slot('name')
                                    order_track
                            @endslot
                            @slot('type')
                                number
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleaseorder_track')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.order_date')}}
                            @endslot
                            @slot('name')
                                    order_date
                            @endslot
                            @slot('type')
                                date
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleaseorder_date')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.order_date')}}
                                @endslot
                                @slot('name')
                                    order_file
                                @endslot
                                @slot('type')
                                        file
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.pleaseorder_file')}}
                                @endslot
                                @slot('value')
                                @endslot
                        @endcomponent
                        @component('admin.components.form.optionLabel')
                                @slot('label')
                                    select user
                                @endslot
                                @slot('name')
                                    user_id
                                @endslot
                                @slot('items')
                                    <option value="" selected>Please select user...</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        @component('admin.components.form.optionLabel')
                                @slot('label')
                                    country
                                @endslot
                                @slot('name')
                                    country_id
                                @endslot
                                @slot('items')
                                    <option value="" selected>Please select Country...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                    @endforeach
                                @endslot
                        @endcomponent

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 form-label my-auto">
                                {{__('admin.content')}}
                            </label>
                            <div class="col-md-9">

                            <textarea class="form-control" name="description" id="description" placeholder="" cols="30" rows="10">
                            </textarea>
                            </div>
                        </div>
                    @endslot


                    @slot('header')
                        <h2 class="card-title">{{__('admin.maininformation')}}</h2>
                    @endslot
                @endcomponent

            </div>
            <div class="col-12 col-lg-4">
                @component('admin.components.panel')


                    @slot('header')
                        <h2 class="card-title">{{__('admin.saveinformation')}}</h2>
                    @endslot
                    @slot('items')
                        @component('admin.components.form.submit')
                            @slot('class')
                                btn-block btn-info
                            @endslot
                            @slot('title')
                                Save
                            @endslot
                        @endcomponent

                    @endslot
                @endcomponent


            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')

    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/admin-invoices/
        @endslot
    @endcomponent


    @component('admin.components.form.pictureScript')

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.addInvoice')}}</li>
        @endslot
    @endcomponent
@endsection

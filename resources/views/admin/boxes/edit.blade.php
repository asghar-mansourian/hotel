@extends('admin.layout.layout')

@section('title')
    Dashboard | Edit box
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
    <div class="row" id="container-box">
        <div class="col-12 col-lg-6">
            @component('admin.components.panel')
                @slot('items')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-md-2 form-label my-auto">
                            Barcode
                        </label>
                        <div class="col-md-6">
                            <input type="hidden" id="box-id" value="{{$box->id}}">
                            <input class="form-control " type="text" placeholder="Enter Barcode" id="barcode">
                        </div>
                        <div class="col-md-4">
                            <button class="btn  waves-effect btn-block btn-info" @click="addOrderToBox">Add Order</button>
                        </div>
                    </div>
                @endslot

                @slot('header')
                    <h2 class="card-title">{{__('admin.maininformation')}}</h2>
                @endslot
            @endcomponent

        </div>
        <div class="col-12 col-lg-6">
            @component('admin.components.panel')


                @slot('header')
                    <h2 class="card-title">List Box</h2>
                @endslot
                @slot('items')
                    <table class="table table-striped card-table table-vcenter text-nowrap table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center">
                                Order Id
                                <div class="" style="display: none!important;">

                                    <a class="sort" style="" href="#" data-sort-field="id" data-sort-type="desc">
                                        <i class="fa fa-arrow-down" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                    </a>
                                    <a class="sort" style="" href="#" data-sort-field="id" data-sort-type="asc">
                                        <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                    </a>
                                </div>
                            </th>
                            <th style="text-align: center">
                                Box ID
                                <div class="" style="display: none!important;">

                                    <a class="sort" style="" href="#" data-sort-field="statue" data-sort-type="desc">
                                        <i class="fa fa-arrow-down" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                    </a>
                                    <a class="sort" style="" href="#" data-sort-field="statue" data-sort-type="asc">
                                        <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                    </a>
                                </div>
                            </th>
                            <th style="text-align: center">
                                Barcode
                                <div class="" style="display: none!important;">

                                    <a class="sort" style="" href="#" data-sort-field="id" data-sort-type="desc">
                                        <i class="fa fa-arrow-down" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                    </a>
                                    <a class="sort" style="" href="#" data-sort-field="id" data-sort-type="asc">
                                        <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                    </a>
                                </div>
                            </th>
                            <th style="text-align: center">
                                Action
                                <div class="" style="display: none!important;">

                                    <a class="sort" style="" href="#" data-sort-field="statue" data-sort-type="desc">
                                        <i class="fa fa-arrow-down" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                    </a>
                                    <a class="sort" style="" href="#" data-sort-field="statue" data-sort-type="asc">
                                        <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                    </a>
                                </div>
                            </th>

                        </tr>
                        </thead>
                        <tbody class="mytbody">
                        <tr v-for="item in items">
                            <td class="text-center" v-html="item.orderable_id"></td>
                            <td class="text-center" v-html="item.box_id"></td>
                            <td class="text-center" v-html="item.orderable.order_barcode.barcode"></td>
                            <td class="text-center">
                                <button style="border: none;color: #fd475d" type="button" @click="removeItemBox(item.id, item.box_id)"
                                        class=" btn-remove-container-order">
                                    <i class="fas fa-trash-alt ml-3"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endslot
            @endcomponent
        </div>

    </div>

@endsection
@section('scriptCustom')

    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/customers/
        @endslot
    @endcomponent

    @component('admin.components.form.boxScript')

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.addblog')}}</li>
        @endslot
    @endcomponent
@endsection

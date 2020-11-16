@extends('admin.layout.layout')

@section('title')
    Dashboard | Add Country
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
    <form class="form" method="post" id="mainForm" enctype="multipart/form-data" action="{{url('admin/countries/details/store')}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">

                @component('admin.components.panel')
                    @slot('id')
                        fields
                    @endslot
                    @slot('items')

                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                country
                            @endslot
                            @slot('name')
                                country_id
                            @endslot
                            @slot('items')
                                <option value="" selected>Please Enter Country...</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                @endforeach
                            @endslot

                        @endcomponent

                        @component('admin.components.plus')

                        @endcomponent

                    @endslot


                    @slot('header')
                        <h2 class="card-title">Main Information</h2>
                    @endslot
                @endcomponent

            </div>
            <div class="col-12 col-lg-4">
                @component('admin.components.panel')
                    @slot('header')
                        <h2 class="card-title">Save Information</h2>
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
    @component('admin.components.script.detailFormScript')
        @slot('detailFormUrlValue')
            ../../../admin/countries/details/
        @endslot
    @endcomponent
    @component('admin.components.script.append')
        @slot('id')
            fields
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

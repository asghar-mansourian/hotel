@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.addregion')}}
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
    <form class="form" method="post" id="mainForm" action="{{url('admin/regions/store')}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Name
                            @endslot
                            @slot('name')
                                name
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter Name...
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    Name Ru
                                @endslot
                                @slot('name')
                                    name_ru
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    Please Enter Name Ru...
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Description
                            @endslot
                            @slot('name')
                                description
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter Description...
                            @endslot
                            @slot('value')
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
                                <option value="" selected>Please Enter Country...</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                @endforeach
                            @endslot
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
    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/regions/
        @endslot
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>Add Region</li>
        @endslot
    @endcomponent
@endsection

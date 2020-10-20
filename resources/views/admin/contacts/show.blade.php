@extends('admin.layout.layout')

@section('title')
    Dashboard | Show Country
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
    <form class="form" method="post" id="mainForm" >
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
                                {{$contact->name}}
                            @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                        @endcomponent

                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    email
                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                    {{$contact->email}}
                                @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                            @endcomponent

                            @component('admin.components.form.textLabel')
                                @slot('label')
                                    message
                                @endslot



                                @slot('value')
                                    {{$contact->email}}
                                @endslot
                                @slot('attr')
                                    disabled
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
                        <h2 class="card-title">Back To Contact</h2>
                    @endslot
                    @slot('items')

                            <a href="{{url('admin/contacts')}}" class="btn btn-danger btn-block ">{{__('custom.other.back')}}</a>

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

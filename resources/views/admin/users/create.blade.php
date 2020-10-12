@extends('admin.layout.layout')

@section('title')
    Dashboard | Add User
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
    <form class="form" method="post" id="mainForm" action="{{url('admin/users/store')}}">
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
                                Family
                            @endslot
                            @slot('name')
                                family
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                    Please Enter Family...
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Email
                            @endslot
                            @slot('name')
                                email
                            @endslot
                            @slot('type')
                                email
                            @endslot
                            @slot('placeholder')
                                Please Enter Email...
                            @endslot
                        @endcomponent
                    @endslot
                    @slot('header')
                        <h2 class="card-title">Main Information</h2>
                    @endslot
                @endcomponent
                @component('admin.components.panel')
                    @slot('header')
                        <h2 class="card-title">Password</h2>
                    @endslot
                    @slot('items')
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Password
                            @endslot
                            @slot('name')
                                password
                            @endslot
                            @slot('type')
                                password
                            @endslot
                            @slot('placeholder')
                                Please Enter Password
                            @endslot

                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Password Confirm
                            @endslot
                            @slot('name')
                                password_confirmation
                            @endslot
                            @slot('type')
                                password
                            @endslot
                            @slot('placeholder')
                                Please Enter Password Confirmation
                            @endslot

                        @endcomponent
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
                @component('admin.components.panel')
                    @slot('header')
                        <h2 class="card-title">Picture</h2>
                    @endslot
                    @slot('items')
                        @component('admin.components.form.picture')
                        @endcomponent
                    @endslot
                @endcomponent
                @component('admin.components.panel')
                    @slot('header')
                        <h2 class="card-title">Status</h2>

                    @endslot
                    @slot('items')
                        @component('admin.components.form.option')
                            @slot('name')
                                status
                            @endslot
                            @slot('items')
                                <option value="" selected>Please Enter Status...</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            @endslot
                        @endcomponent
                    @endslot
                @endcomponent
            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')
    @component('admin.components.form.blockUi')
    @endcomponent
    @component('admin.components.form.pictureScript')
    @endcomponent
    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/users/
        @endslot
    @endcomponent

@endsection



@section('crumb')
    @component('admin.components.crumb')
        @slot('title')
            {{trans('admin.panel.title')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</li>
            <li class="breadcrumb-item active"><i class="fe fe-user mr-2 fs-14"></i>Add User</li>
        @endslot
    @endcomponent
@endsection

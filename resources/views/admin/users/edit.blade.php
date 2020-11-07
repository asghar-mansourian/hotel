@extends('admin.layout.layout')

@section('title')
    Dashboard | Edit User
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
    <form class="form" method="post" id="mainForm" action="{{url('admin/users/update/' . $user->id)}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                name
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
                                {{$user->name}}
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                family
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
                            @slot('value')
                                {{$user->family}}
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                email
                            @endslot

                            @slot('type')
                                email
                            @endslot
                            @slot('placeholder')
                                Please Enter Email...
                            @endslot
                            @slot('value')
                                {{$user->email}}
                            @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                        @endcomponent

                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                gender
                            @endslot
                            @slot('name')
                                gender
                            @endslot
                            @slot('items')
                                <option value="" selected>Please Enter Gender...</option>
                                <option value="1" @if($user->gender == 1) selected @endif>Male</option>
                                <option value="0" @if($user->gender == 0) selected @endif>Female</option>
                            @endslot

                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Phone
                            @endslot

                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter Phone...
                            @endslot
                            @slot('value')
                                {{$user->phone}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Address
                            @endslot
                            @slot('name')
                                address
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter Address...
                            @endslot
                            @slot('value')
                                {{$user->address}}
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Fin
                            @endslot
                            @slot('name')
                                fin
                            @endslot
                            @slot('type')
                                number
                            @endslot
                            @slot('placeholder')
                                Please Enter Fin...
                            @endslot
                            @slot('value')
                                {{$user->fin}}
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Citizenship
                            @endslot
                            @slot('name')
                                citizenship
                            @endslot
                            @slot('type')
                                number
                            @endslot
                            @slot('placeholder')
                                Please Enter Citizenship...
                            @endslot
                            @slot('value')
                                {{$user->citizenship}}
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                Serial Number
                            @endslot

                            @slot('type')
                                number
                            @endslot
                            @slot('placeholder')
                                Please Enter Serial Number...
                            @endslot
                            @slot('value')
                                {{$user->serial_number}}
                            @endslot
                                @slot('attr')
                                    disabled
                                @endslot
                        @endcomponent
                        @component('admin.components.form.birthLabel')
                            @slot('label')
                                BirthDay
                            @endslot
                            @slot('name')
                                birthdate
                            @endslot
                            @slot('placeholder')
                                Please Enter Serial Number...
                            @endslot
                            @slot('value')
                                {{$user->birthdate}}
                            @endslot
                        @endcomponent

                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                Region
                            @endslot
                            @slot('name')
                                region_id
                            @endslot
                            @slot('items')
                                <option value="" selected>Please Enter Region...</option>
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach

                            @endslot
                        @endcomponent
                    @endslot
                    @slot('header')
                        <h2 class="card-title">Main Information</h2>
                    @endslot
                @endcomponent
{{--                @component('admin.components.panel')--}}
{{--                    @slot('header')--}}
{{--                        <h2 class="card-title">Password</h2>--}}
{{--                    @endslot--}}
{{--                    @slot('items')--}}
{{--                        @component('admin.components.form.inputLabel')--}}
{{--                            @slot('label')--}}
{{--                                password--}}
{{--                            @endslot--}}
{{--                            @slot('name')--}}
{{--                                password--}}
{{--                            @endslot--}}
{{--                            @slot('type')--}}
{{--                                password--}}
{{--                            @endslot--}}
{{--                            @slot('placeholder')--}}
{{--                                Please Enter Password--}}
{{--                            @endslot--}}
{{--                            @slot('value')--}}
{{--                                {{$user->password}}--}}
{{--                            @endslot--}}

{{--                        @endcomponent--}}

{{--                        @component('admin.components.form.inputLabel')--}}
{{--                            @slot('label')--}}
{{--                                Password Confirm--}}
{{--                            @endslot--}}
{{--                            @slot('name')--}}
{{--                                password_confirmation--}}
{{--                            @endslot--}}
{{--                            @slot('type')--}}
{{--                                password--}}
{{--                            @endslot--}}
{{--                            @slot('placeholder')--}}
{{--                                Please Enter Password Confirmation--}}
{{--                            @endslot--}}
{{--                            @slot('value')--}}
{{--                                {{$user->password}}--}}
{{--                            @endslot--}}

{{--                        @endcomponent--}}
{{--                    @endslot--}}
{{--                @endcomponent--}}
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
                        <h2 class="card-title">Status</h2>
                    @endslot
                    @slot('items')
                        @component('admin.components.form.option')
                            @slot('name')
                                status
                            @endslot
                            @slot('items')
                                <option value="" selected>Please Enter Status...</option>
                                <option value="1" @if($user->status == '1') selected @endif>Active</option>
                                <option value="0" @if($user->status == '0') selected @endif>Deactive</option>
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
            ../../../admin/users
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
            <li class="breadcrumb-item active"><i class="fe fe-user mr-2 fs-14"></i>Edit User</li>
        @endslot
    @endcomponent
@endsection



@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.showuser')}}
@endsection

@section('styleCustom')
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
                            @slot('value')
                                {{$user->id}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent



                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Status</span>

                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$user->name}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Family</span>

                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$user->family}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Birthdate</span>

                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$user->birthdate}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                <span>Gender</span>

                            @endslot

                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                @if($user->gender == 1)
                                    Male
                                @else
                                    Female
                                @endif
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                        @endcomponent


                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    <span>Phone</span>

                                @endslot

                                @slot('type')
                                    text
                                @endslot

                                @slot('value')
                                        {{$user->phone}}
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
                        <h2 class="card-title">Back To Users</h2>
                    @endslot
                    @slot('items')

                        <a href="{{url('admin/users')}}"
                           class="btn btn-danger btn-block ">{{__('custom.other.back')}}</a>

                    @endslot
                @endcomponent


            </div>

        </div>
    </form>

@endsection


@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/users')}}"><i class="fe fe-user mr-2 fs-14"></i>Users</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-user mr-2 fs-14"></i>Show User</li>
        @endslot
    @endcomponent
@endsection

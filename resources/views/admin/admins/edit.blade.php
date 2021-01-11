@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}}  | {{__('admin.edit_admin')}}
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
    <form class="form" method="post" id="mainForm" action="{{url('admin/admins/update/' . $Admin->id)}}">
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
                                name
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.name')}}
                            @endslot
                            @slot('value')
                                {{$Admin->name}}
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.family')}}
                            @endslot
                            @slot('name')
                                family
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.family')}}
                            @endslot
                            @slot('value')
                                {{$Admin->family}}
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.email')}}
                            @endslot
                            @slot('name')
                                email
                            @endslot
                            @slot('type')
                                email
                            @endslot
                            @slot('placeholder')
                                {{__('admin.email')}}
                            @endslot
                            @slot('value')
                                {{$Admin->email}}
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.password')}}
                            @endslot
                            @slot('name')
                                password
                            @endslot
                            @slot('type')
                                password
                            @endslot
                            @slot('placeholder')
                                {{__('admin.password')}}
                            @endslot
                            @slot('value')

                            @endslot
                        @endcomponent

                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                {{__('admin.status')}}
                            @endslot
                            @slot('name')
                                status
                            @endslot
                            @slot('items')
                                <option value="" selected>{{__('admin.pleasestatus')}}</option>
                                <option value="1" @if($Admin->status == 1) selected @endif>{{__('admin.active')}}</option>
                                <option value="0" @if($Admin->status == 0) selected @endif>{{__('admin.deactive')}}</option>

                            @endslot
                        @endcomponent
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
                                {{__('admin.save')}}
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
            ../../../admin/admins/
        @endslot
    @endcomponent

@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.edit_admin')}}</li>
        @endslot
    @endcomponent
@endsection

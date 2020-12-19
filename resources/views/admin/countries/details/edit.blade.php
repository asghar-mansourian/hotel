@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}}  | {{__('admin.editcountrydetails')}}
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
    <form class="form" method="post" id="mainForm" action="{{url('admin/countries/details/update/' . $country_details->id)}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')

                        @slot('id')
                            fields
                        @endslot
                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                {{__('admin.country')}}
                            @endslot
                            @slot('name')
                                country_id
                            @endslot
                            @slot('items')
                                <option value="" selected>{{__('admin.pleaseentercountry')}}</option>
                                @foreach($countries as $country)
                                    <option
                                        value="{{$country->id}}" {{$country_details->country_id == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                @endforeach
                            @endslot

                        @endcomponent
                        @component('admin.components.form.key-value')
                            @slot('name')
                                {{ $country_details->name }}
                            @endslot
                            @slot('value')
                                {{ $country_details->value }}
                            @endslot
                            @slot('copy')
                                {{ $country_details->can_copy }}
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
            ../../../countries/details
        @endslot
    @endcomponent

@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>{{__('admin.editcountrydetails')}}</li>
        @endslot
    @endcomponent
@endsection

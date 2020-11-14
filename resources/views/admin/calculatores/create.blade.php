@extends('admin.layout.layout')

@section('title')
    Dashboard | Add Region
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
    <form class="form" method="post" id="mainForm" action="{{url('admin/calculatores/store')}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.currency')}}
                            @endslot
                            @slot('name')
                                currency
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleasecurrency')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.discount')}}
                            @endslot
                            @slot('name')
                                discount
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleasediscount')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.from')}}
                            @endslot
                            @slot('name')
                                from
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleaseenterfrom')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.to')}}
                            @endslot
                            @slot('name')
                                to
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleaseenterto')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent

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
                                    <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                @endforeach
                            @endslot
                        @endcomponent

                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                {{__('admin.unit')}}
                            @endslot
                            @slot('name')
                                unit_id
                            @endslot
                            @slot('items')
                                <option value="" selected>{{__('admin.pleaseenterunit')}}</option>
                                @foreach($units as $unit)
                                    <option value="{{$unit->id}}" selected>{{$unit->title}}</option>
                                @endforeach
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
            ../../../admin/calculatores/
        @endslot
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>{{__('admin.addregion')}}</li>
        @endslot
    @endcomponent
@endsection

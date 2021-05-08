@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} |  {{__('admin.editslider')}}
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
    <form class="form" method="post" id="mainForm" enctype="multipart/form-data"
          action="{{url('admin/sliders/update/' . $slider->id)}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        @component('admin.components.form.input')

                            @slot('name')
                                picture
                            @endslot
                            @slot('type')
                                hidden
                            @endslot

                            @slot('value')
                                {{$slider->picture}}
                            @endslot
                        @endcomponent
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                    {{__('admin.title')}}
                            @endslot
                            @slot('name')
                                title
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleasetitle')}}
                            @endslot
                            @slot('value')
                                {{$slider->title}}
                            @endslot
                        @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.order_by')}}
                                @endslot
                                @slot('name')
                                    order_by
                                @endslot
                                @slot('type')
                                    number
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.pleaseorder')}}
                                @endslot
                                @slot('value')
                                        {{$slider->order_by}}
                                @endslot
                            @endcomponent
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.picture')}}
                                </label>
                                <div class="col-md-9">

                                    <input type="file" name="new_picture" id="picture" class="dropify" data-max-file-size="2000K"
                                           data-allowed-file-extensions="jpg png" data-default-file="{{url('/slider/images/'.$slider->picture)}}">
                                </div>
                            </div>
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
                        <a href="{{url('admin/sliders')}}" class="btn btn-danger btn-block ">{{__('admin.cancel')}}</a>
                    @endslot
                @endcomponent


            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')

    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/sliders/
        @endslot
    @endcomponent



    @component('admin.components.form.pictureScript')

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.editslider')}}</li>
        @endslot
    @endcomponent
@endsection

@extends('admin.layout.layout')

@section('title')
    Dashboard | Add blog
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
          action="{{url('admin/projects/store')}}">
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
                                {{__('admin.pleasename')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.name_ru')}}
                            @endslot
                            @slot('name')
                                name_ru
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleasename_ru')}}
                            @endslot
                            @slot('value')
                            @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.name_az')}}
                            @endslot
                            @slot('name')
                                name_az
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.pleasename_az')}}
                            @endslot
                            @slot('value')
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
                                    {{__('admin.title')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.title_ru')}}
                                @endslot
                                @slot('name')
                                    title_ru
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.title_ru')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.title_az')}}
                                @endslot
                                @slot('name')
                                    title_az
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.title_az')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.min_address')}}
                                @endslot
                                @slot('name')
                                        min_address
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.min_address')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.min_address_ru')}}
                                @endslot
                                @slot('name')
                                        min_address_ru
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.min_address_ru')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.min_address_az')}}
                                @endslot
                                @slot('name')
                                        min_address_az
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.min_address_az')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.walk')}}
                                @endslot
                                @slot('name')
                                        walk
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.walk')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.walk_ru')}}
                                @endslot
                                @slot('name')
                                        walk_ru
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.walk_ru')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.walk_az')}}
                                @endslot
                                @slot('name')
                                        walk_az
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.walk_az')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.empty_room')}}
                                @endslot
                                @slot('name')
                                        empty_room
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.empty_room')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.empty_room_ru')}}
                                @endslot
                                @slot('name')
                                    empty_room_ru
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.empty_room_ru')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.empty_room_az')}}
                                @endslot
                                @slot('name')
                                    empty_room_az
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.empty_room_az')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.description')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="description"
                                      id="description" placeholder="" cols="30" rows="10">

                            </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.description_ru')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="description_ru"
                                      id="description_ru" placeholder="" cols="30" rows="10">

                            </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.description_az')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="description_az"
                                      id="description_az" placeholder="" cols="30" rows="10">

                            </textarea>
                                </div>
                            </div>
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.telephone')}}
                                @endslot
                                @slot('name')
                                    telephone
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.telephone')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.mobile')}}
                                @endslot
                                @slot('name')
                                    mobile
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.mobile')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.address')}}
                                @endslot
                                @slot('name')
                                    address
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.address')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.address_ru')}}
                                @endslot
                                @slot('name')
                                    address_ru
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.address_ru')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.address_az')}}
                                @endslot
                                @slot('name')
                                    address_az
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.address_az')}}
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
                                    <option value="" selected>{{__('admin.status')}}</option>
                                    <option value="1">{{__('admin.finished')}}</option>
                                    <option value="0">{{__('admin.unfinished')}}</option>

                                @endslot
                            @endcomponent
                            @component('admin.components.form.inputLabel')
                                @slot('label')
                                    {{__('admin.google_map_address')}}
                                @endslot
                                @slot('name')
                                        google_map_address
                                @endslot
                                @slot('type')
                                    text
                                @endslot
                                @slot('placeholder')
                                    {{__('admin.google_map_address')}}
                                @endslot
                                @slot('value')
                                @endslot
                            @endcomponent
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.indicator_picture')}}
                                </label>
                                <div class="col-md-9">

                                    <input type="file" name="indicator_picture" id="indicator_picture" class="dropify"
                                           data-allowed-file-extensions="jpg png" data-default-file="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.up_indicator_picture')}}
                                </label>
                                <div class="col-md-9">

                                    <input type="file" name="up_indicator_picture" id="up_indicator_picture" class="dropify"
                                           data-allowed-file-extensions="jpg png" data-default-file="">
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
            ../../../admin/projects/
        @endslot
    @endcomponent

    @component('admin.components.ckeditor')
        @slot('ids')
            description,description_ru,description_az
        @endslot
    @endcomponent

    @component('admin.components.form.pictureScript')

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.add_project')}}
            </li>
        @endslot
    @endcomponent
@endsection

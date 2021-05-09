@extends('admin.layout.layout')

@section('title')
    Dashboard | Add customer reviews
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
    <form class="form" method="post" id="mainForm" enctype="multipart/form-data" action="{{url('admin/customer_reviews/store')}}">
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
                            <div class="form-group row">
                                <label for="description" class="col-md-3 form-label my-auto">
                                    {{__('admin.description')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="description"
                                      id="description" placeholder="{{__('admin.pleaseEnterDescription')}}" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-3 form-label my-auto">
                                    {{__('admin.descriptionRu')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="description_ru"
                                      id="description_ru" placeholder="{{__('admin.pleaseEnterDescriptionRu')}}" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 form-label my-auto">
                                picture
                            </label>
                            <div class="col-md-9">

                                <input type="file" name="picture" id="picture" class="dropify"
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
            ../../../admin/customer_reviews/
        @endslot
    @endcomponent

{{--    @component('admin.components.ckeditor')--}}

{{--    @endcomponent--}}

    @component('admin.components.form.pictureScript')

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.add_customer_reviews')}}</li>
        @endslot
    @endcomponent
@endsection
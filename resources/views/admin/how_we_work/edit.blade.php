@extends('admin.layout.layout')

@section('title')
    Dashboard | Edit How Work
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
          action="{{url('admin/how_we_work/update/' . $howWork->id)}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
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
                            {{$howWork->title}}
                        @endslot
                    @endcomponent
                    @component('admin.components.form.inputLabel')
                        @slot('label')
                            {{__('admin.TABLETITLE_RU')}}
                        @endslot
                        @slot('name')
                            title_ru
                        @endslot
                        @slot('type')
                            text
                        @endslot
                        @slot('placeholder')
                            {{__('admin.please_title_ru')}}
                        @endslot
                        @slot('value')
                            {{$howWork->title_ru}}
                        @endslot
                    @endcomponent
                    <div class="form-group row">
                        <label for="description" class="col-md-3 form-label my-auto">
                            {{__('admin.description')}}
                        </label>
                        <div class="col-md-9">

                            <textarea class="form-control" name="description"
                                      id="description" placeholder="{{__('admin.pleaseEnterDescription')}}"  cols="30" rows="10">
                                {{$howWork->description}}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_ru" class="col-md-3 form-label my-auto">
                            {{__('admin.descriptionRu')}}
                        </label>
                        <div class="col-md-9">

                            <textarea class="form-control" name="description_ru"
                                      id="description_ru" placeholder="{{__('admin.pleaseEnterDescriptionRu')}}" cols="30" rows="10">
                                {{$howWork->description_ru}}
                            </textarea>
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
                            <a href="{{url('admin/how_we_work/')}}" class="btn btn-danger btn-block ">{{__('custom.other.cancel')}}</a>
                    @endslot
                @endcomponent


            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')

    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/how_we_work/
        @endslot
    @endcomponent

    @component('admin.components.ckeditor')
        @slot('ids')
            description,description_ru
        @endslot
    @endcomponent

    @component('admin.components.form.pictureScript')

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.editHowWork')}}</li>
        @endslot
    @endcomponent
@endsection

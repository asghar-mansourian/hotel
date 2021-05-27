@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}}  | {{__('admin.editpage')}}
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
    <form class="form" method="post" id="mainForm" action="{{url('admin/pages/update/' . $page->id)}}">
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
                                {{$page->title}}
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
                                {{__('admin.pleasetitle_ru')}}
                            @endslot
                            @slot('value')
                                {{$page->title_ru}}
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
                                    {{__('admin.pleasetitle_ru')}}
                                @endslot
                                @slot('value')
                                    {{$page->title_az}}
                                @endslot
                            @endcomponent


                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 form-label my-auto">
                                {{__('admin.content')}}
                            </label>
                            <div class="col-md-9">
                                    <textarea class="form-control" id="content" name="content" id="contents" placeholder="" cols="30" rows="10">
                                        {!! $page->content !!}
                                    </textarea>
                            </div>

                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 form-label my-auto">
                                {{__('admin.content_ru')}}
                            </label>
                            <div class="col-md-9">

                            <textarea class="form-control" name="contentru"
                                      id="contentru" placeholder="" cols="30" rows="10">
 {!! $page->content_ru !!}
                            </textarea>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.content_az')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="contentaz"
                                      id="contentaz" placeholder="" cols="30" rows="10">
 {!! $page->content_az !!}
                            </textarea>
                                </div>
                            </div>
                        {{--              <div class="form-group row">
                                          <label for="example-text-input" class="col-md-3 form-label my-auto">
                                              {{__('admin.content_az')}}
                                          </label>
                                          <div class="col-md-9">

                                      <textarea class="form-control" name="contentaz"
                                                id="contentaz" placeholder="" cols="30" rows="10">
           {!! $page->content_az !!}
                                      </textarea>
                                          </div>
                                      </div>--}}

                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                {{__('admin.status')}}
                            @endslot
                            @slot('name')
                                status
                            @endslot
                            @slot('items')
                                <option value="" selected>{{__('admin.pleasestatus')}}</option>
                                <option value="0" @if($page->status == 0) selected @endif>{{__('admin.active')}}</option>
                                <option value="1" @if($page->status == 1) selected @endif>{{__('admin.deactive')}}</option>

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
            ../../../admin/pages/
        @endslot
    @endcomponent

    @component('admin.components.ckeditor')
        @slot('ids')
            content,contentru,contentaz
        @endslot
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.editpage')}}</li>
        @endslot
    @endcomponent
@endsection

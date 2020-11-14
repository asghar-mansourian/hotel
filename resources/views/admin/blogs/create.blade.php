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
    <form class="form" method="post" id="mainForm" enctype="multipart/form-data" action="{{url('admin/blogs/store')}}">
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
                            @endslot
                        @endcomponent

                        @component('admin.components.form.textLabel')
                            @slot('label')
                                {{__('admin.content')}}
                            @endslot
                            @slot('name')
                                content
                            @endslot

                            @slot('placeholder')
                                {{__('admin.pleasecontent')}}
                            @endslot
                            @slot('value')
                            @endslot
                            @slot('id')
                                {{__('admin.ckeditor')}}
                            @endslot

                        @endcomponent
                            @component('admin.components.form.pictureLabel')
                                @slot('label')
                                {{__('admin.picture')}}
                                @endslot
                                @slot('name')
                                picture
                            @endslot

                        @endcomponent
                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                {{__('admin.author')}}
                            @endslot
                            @slot('name')
                                author_id
                            @endslot
                            @slot('items')
                                <option value="" selected> {{__('admin.pleaseauthor')}}</option>
                                @foreach($authores as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
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
                                <option value="0">{{__('admin.active')}}</option>
                                <option value="1">{{__('admin.deactive')}}</option>

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

    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/blogs/
        @endslot
    @endcomponent

    @component('admin.components.ckeditor')

    @endcomponent

    @component('admin.components.form.pictureScript')

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.addblog')}}</li>
        @endslot
    @endcomponent
@endsection

@extends('admin.layout.layout')

@section('title')
    Dashboard | Add Page
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
                                title
                            @endslot
                            @slot('name')
                                title
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                Please Enter title...
                            @endslot
                            @slot('value')
                                {{$page->title}}
                            @endslot
                        @endcomponent

                        @component('admin.components.form.textLabel')
                            @slot('label')
                                Content
                            @endslot
                            @slot('name')
                                content
                            @endslot

                            @slot('placeholder')
                                Please Enter Content...
                            @endslot
                            @slot('value')
                                    {!! $page->title !!}
                            @endslot
                            @slot('id')
                                ckeditor
                            @endslot

                        @endcomponent

                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                status
                            @endslot
                            @slot('name')
                                status
                            @endslot
                            @slot('items')
                                <option value="" selected>Please Select Status...</option>
                                <option value="0" @if($page->status == 0) selected @endif>active</option>
                                <option value="1" @if($page->status == 1) selected @endif>deactive</option>

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
                        <h2 class="card-title">Save Information</h2>
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
            ../../../admin/pages/
        @endslot
    @endcomponent

    @component('admin.components.ckeditor')

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>Edit Page</li>
        @endslot
    @endcomponent
@endsection

@extends('admin.layout.layout')

@section('title')
    Dashboard | Edit Media
@endsection

@section('main')
    <form class="form" method="post" id="mainForm" enctype="multipart/form-data"
          action="{{url('admin/medias/update/' . $media->id)}}">
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
                                    {{$media->name}}
                                @endslot
                        @endcomponent

                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.url')}}
                            @endslot
                            @slot('name')
                                url
                            @endslot
                            @slot('type')
                                text
                            @endslot
                            @slot('placeholder')
                                {{__('admin.url')}}
                            @endslot
                            @slot('value')
                                    {{$media->url}}
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
                            <a href="{{url('admin/medias/')}}" class="btn btn-danger btn-block ">{{__('custom.other.cancel')}}</a>
                    @endslot
                @endcomponent


            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')

    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/medias/
        @endslot
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.medias-edit')}}</li>
        @endslot
    @endcomponent
@endsection

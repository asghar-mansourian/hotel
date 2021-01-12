@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.editnotification')}}
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
    <form class="form" method="post" id="mainForm" action="{{url('admin/notifications/update/' . $notification->id)}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        @component('admin.components.form.inputLabel')
                            @slot('label')
                                {{__('admin.key')}}
                            @endslot
                            @slot('attr')
                                disabled
                            @endslot
                            @slot('name')
                                key
                            @endslot
                            @slot('type')
                                text
                            @endslot

                            @slot('value')
                                {{$notification->key}}
                            @endslot

                        @endcomponent

                        @foreach(\App\lib\Helpers::getLocales() as $locale)
                            <h5 class="text-success text-center">SMS</h5>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    Content {{\Illuminate\Support\Str::upper($locale->locale)}}
                                </label>
                                <div class="col-md-9">

                                    <textarea class="form-control" name="content_{{\Illuminate\Support\Str::lower($locale->locale)}}[]" cols="30"
                                              rows="5">{{$notification->notificationMessages->count() ? $notification->notificationMessages->where('lang', $locale->locale)->where('type', \App\NotificationMessage::SMS_TYPE)->first()->content: ''}}</textarea>
                                </div>
                            </div>
                            <h5 class="text-success text-center">Email</h5>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    Title {{\Illuminate\Support\Str::upper($locale->locale)}}
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="title_{{\Illuminate\Support\Str::lower($locale->locale)}}[]" type="text"
                                           value="{{$notification->notificationMessages->count() ? $notification->notificationMessages->where('lang', $locale->locale)->where('type', \App\NotificationMessage::EMAIL_TYPE)->first()->title: ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    Content {{\Illuminate\Support\Str::upper($locale->locale)}}
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="content_{{\Illuminate\Support\Str::lower($locale->locale)}}[]" id="content_{{\Illuminate\Support\Str::lower($locale->locale)}}" placeholder=""
                                              cols="30"
                                              rows="10">{{$notification->notificationMessages->count() ? $notification->notificationMessages->where('lang', $locale->locale)->where('type', \App\NotificationMessage::EMAIL_TYPE)->first()->content: ''}}</textarea>
                                </div>
                            </div>
                            <h5 class="text-success text-center">Mobile Notification</h5>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    Title {{\Illuminate\Support\Str::upper($locale->locale)}}
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="title_{{\Illuminate\Support\Str::lower($locale->locale)}}[]"
                                           value="{{$notification->notificationMessages->count() ? $notification->notificationMessages->where('lang', $locale->locale)->where('type', \App\NotificationMessage::FIREBASE_TYPE)->first()->title: ''}}"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    Content {{\Illuminate\Support\Str::upper($locale->locale)}}
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="content_{{\Illuminate\Support\Str::lower($locale->locale)}}[]" id="content_{{\Illuminate\Support\Str::lower($locale->locale)}}" placeholder=""
                                              cols="30"
                                              rows="10">{{$notification->notificationMessages->count() ? $notification->notificationMessages->where('lang', $locale->locale)->where('type', \App\NotificationMessage::FIREBASE_TYPE)->first()->content: ''}}</textarea>
                                </div>
                            </div>
                            <hr>
                            <hr>
                        @endforeach

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

    @php
        $content = ''
    @endphp

    @foreach(\App\lib\Helpers::getLocales() as $locale)
        @if($loop->last)
            @php
                $content .= 'content_'.trim($locale->locale);
            @endphp
        @else
            @php
                $content .= 'content_'.trim($locale->locale).',';
            @endphp
        @endif
    @endforeach
@endsection
@section('scriptCustom')
    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/notifications/
        @endslot
    @endcomponent

    @component('admin.components.ckeditor')
        @slot('ids')
            {{$content}}
        @endslot
    @endcomponent

@endsection

@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>{{__('admin.editnotification')}}</li>
        @endslot
    @endcomponent
@endsection

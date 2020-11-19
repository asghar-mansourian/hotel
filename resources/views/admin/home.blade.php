@extends('admin.layout.layout')

@section('title')
    {{trans('admin.hometitle')}}

@endsection

@section('main')
    @component('admin.components.card')
        @slot('title')
            Dashboard
        @endslot
        @slot('body')
            <h4>welcome {{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</h4>
        @endslot

    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')
        @slot('title')
            {{__('admin.dashboard')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item active"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
        @endslot
    @endcomponent
@endsection


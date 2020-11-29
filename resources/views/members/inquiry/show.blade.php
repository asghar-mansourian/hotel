@extends('members.layout')

@section('title')
    {{__('member.site_name')}}| {{__('member.tlBalance')}}
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">

        <div class="border_sh courier_out">
            <div class="row">
                <div class="hide-alert">
                    @include('admin.components.error')
                </div>
            </div>
            <div class="row">
                @include('members.inquiry.inquiry-child',['inquiry'=>$inquiry])
            </div>

        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

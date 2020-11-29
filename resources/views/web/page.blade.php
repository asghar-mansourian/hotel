@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{$page->title}}
@endsection
@section('content')
    <div class="container">
        <h4>{{$page->title}}</h4>
        <div class="row">
            {!! $page->content !!}
        </div>
    </div>
@endsection

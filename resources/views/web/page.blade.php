@extends('layout.layout')
@section('title')
    Kargo | {{$page->title}}
@endsection
@section('content')
    <div class="container">
        <h4>{{$page->title}}</h4>
        <div class="row">
            {!! $page->content !!}
        </div>
    </div>
@endsection

@extends('layout.layout')
@section('title')
    Kargo | {{__('website.customers')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            {!! $page->content !!}
        </div>
    </div>
@endsection

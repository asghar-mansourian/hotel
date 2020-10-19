@extends('layout.layout')
@section('content')

    <div class="container">
        <div class="row">
            @include('members.side')
            <div class="col-md-9 col-sm-10 col-xs-9">
                @yield('main')
            </div>
        </div>
    </div>
@endsection

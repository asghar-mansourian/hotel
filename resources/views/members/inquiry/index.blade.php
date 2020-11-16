@extends('members.layout')

@section('title')
    Kargo | Tl Balance
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
            <table class="table table-striped card-table table-vcenter text-nowrap table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{__('member.id')}}</th>
                    <td>{{__('member.user')}}</td>
                    <th>{{__('member.message')}}</th>
                    <th>{{__('member.date')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inquirys as $inquiry)
                    <tr>
                        <td>{{$inquiry->id}}</td>
                        <td>{{$inquiry->user ->name}}</td>
                        <td><a href="{{route('inquiry_show',$inquiry->id)}}">{{$inquiry->inquirys->last()->message}}
                                @if($inquiry->inquirys()->where('seen','not-seen')->where('user_id','!=',auth()->user()->id)->count())
                                    <span class="badge badge-success side-badge">
                                    {{$inquiry->inquirys()->where('seen','not-seen')->where('user_id','!=',auth()->user()->id)->count()}}
                                </span>
                                @endif
                            </a>
                        </td>
                        @if($inquiry->inquirys()->where('seen','not-seen')->count())
                        <td>{{$inquiry->inquirys()->where('seen','not-seen')->latest()->first()->created_at}}</td>
                        @else
                           <td>{{$inquiry->created_at}}</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                @include('members.partials.validation_errors')
                <form method="post" action="{{route('inquiry_store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 col-sm-12">
                        <h5><strong>{{__('member.title')}} *</strong></h5>
                        <div class="courier_dr">
                            <input type="text" name="title" placeholder="{{__('member.title')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="file" class="courier_file w-100">
                    </div>
                    <div class="col-md-12">
                        <textarea class="courier_textare" name="message" value="Qeyd" placeholder="{{__('member.message')}}"></textarea>
                        <button class="btn courier_button">{{__('member.send')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

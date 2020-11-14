@extends('members.layout')

@section('title')
    Kargo | Tl Balance
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">
        <div class="border_sh courier_out">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h5><strong>{{__('member.title')}} *</strong></h5>
                    <div class="courier_dr">
                        <div class="dropdown">
                            <div class="dropdown-toggle" id="courier_out" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('member.select')}} <i class="fas fa-chevron-down ml-2"></i>
                            </div>
                            <div class="dropdown-menu w-100 p-4" aria-labelledby="courier_out">
                                <div class="dropdown-item active_span">{{__('member.lateorder')}}</div>
                                <div class="dropdown-item">{{__('member.packagedoesnotbelongtome')}}</div>
                                <div class="dropdown-item">{{__('member.courier')}}</div>
                                <div class="dropdown-item">{{__('member.complaintsandsuggestions')}}</div>
                                <div class="dropdown-item">{{__('member.other')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="file" name="" class="courier_file w-100">
                </div>
                <div class="col-md-12">
                    <textarea class="courier_textare" value="Qeyd" placeholder="{{__('member.message')}}"></textarea>
                    <button class="btn courier_button">{{__('member.send')}}</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

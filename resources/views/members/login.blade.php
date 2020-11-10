@extends('layout.layout')

@section('content')
    <div class="col-md-12 text-center">
        <div class="black pt-5"><span class="yellow mr-3">Kargo</span>{{__('member.login')}}</div>
        {{--        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>--}}
    </div>
    <div class="container">

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="row left-side">
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label for="" style="width: 450px!important;text-align: left">{{__('member.email')}}:</label>
                    </div>
                    <div class="text-center">

                        <input type="email" name="email" placeholder="email"
                               class="@error('email') is-invalid @enderror w-100 courier_input"
                               value="{{ old('email') }}" style="width: 450px!important;">
                        @error('email')
                        <br>
                        <span class="invalid-feedback" style="color:#a1272b;" role="alert">
                                        <strong>{{ $message }}</strong>
                                                </span>
                        @enderror

                    </div>

                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label for="" style="width: 450px!important;text-align: left">{{__('member.password')}}:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password" placeholder="password" class="w-100 courier_input"
                               style="width: 450px!important;">
                        @error('password')
                        <br>
                        <span class="invalid-feedback" style="color:#a1272b;" role="alert">
                                        <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">

                        <input type="checkbox" style="vertical-align: middle!important;">
                        <label for="" style="margin-bottom: 10px!important;
    margin-left: 4px!important;">{{__('member.rememberme')}}</label>
                    </div>

                </div>
                <div class="col-md-12 button-part mt-5">
                    <div class="text-center">
                        <button type="submit" class="btn-effect">{{__('member.login')}}</button>
                    </div>
                </div>

            </div>
        </form>

    </div>
@endsection

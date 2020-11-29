@extends('layout.layout')

@section('content')
    <div class="col-md-12 text-center">
        <div class="black pt-5"><span class="yellow mr-3"></span>{{__('member.resetPassword')}}</div>
        {{--        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>--}}
    </div>
    <div class="container">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ request()->get('email') }}">
            <div class="row left-side">
                <div class="col-md-12 mt-4 text-center">
                    @error('email')
                    <br>
                    <span class="invalid-feedback" style="color:#a1272b;" role="alert">
                                        <strong>{{ $message }}</strong>
                                                </span>
                    @enderror
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label for="" style="width: 450px!important;text-align: left">{{__('member.password')}}:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password" placeholder="{{__('member.password')}}" class="w-100 courier_input"
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
                        <label for="" style="width: 450px!important;text-align: left">{{__('member.passwordconfirmation')}}:</label>
                    </div>
                    <div class="text-center">
                        <input id="password-confirm" style="width: 450px!important;" type="password" placeholder="{{__('member.passwordconfirmation')}}" class="w-100 courier_input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('member.resetPassword') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@extends('layout.layout')

@section('content')
    <div class="container">
        <div style="margin: 0 auto;text-align: center;">
            <div class="error">
                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
            </div>
            <form action="{{ route('login') }}" method="post" id="frm-mobile-verification">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$user_id}}">
                <div style="margin-bottom: 15px" class="form-heading">{{__('member.mobileCodeVerification')}}</div>

                <div style="margin-bottom: 15px" class="form-row">
                    <input require name="sms_code" type="number" id="mobile" class="form-input"
                           placeholder="{{__('member.enterVerificationCode')}}">
                </div>

                <input type="submit" class="btnSubmit" value="{{__('member.verify')}}">
                <input id="resend_sms" type="button" class="btnSubmit" value="{{__('member.resendVerificationCode')}}">
            </form>
        </div>
    </div>
@endsection

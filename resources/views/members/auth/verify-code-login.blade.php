@extends('layout.layout')

@section('content')
    <div class="container">
        <div style="margin: 0 auto;text-align: center;">
            <div class="error">
                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif
            </div>
{{--            <form action="" method="post" id="frm-mobile-verification">--}}
{{--                @csrf--}}
                <div id="msg"></div>
                <div style="margin-bottom: 15px" class="form-heading">{{__('member.enterVerificationCode')}}</div>

                <div style="margin-bottom: 15px" class="form-row">
                    <input required name="sms_code" type="number" id="mobile" class="form-input"
                           placeholder="{{__('member.mobileCodeVerification')}}">
                </div>

                <input id="send_sms" type="button" class="btnSubmit" value="{{__('member.verify')}}">
                <input id="resend_sms" type="button" class="btnSubmit" value="{{__('member.resendVerificationCode')}}">
{{--            </form>--}}
        </div>
    </div>
@endsection

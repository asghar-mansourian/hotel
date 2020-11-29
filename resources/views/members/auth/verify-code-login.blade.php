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
                <div style="margin-bottom: 15px" class="form-heading">Mobile Code Verification</div>

                <div style="margin-bottom: 15px" class="form-row">
                    <input require name="sms_code" type="number" id="mobile" class="form-input"
                           placeholder="Enter the code">
                </div>

                <input type="submit" class="btnSubmit" value="Verify">
                <input id="resend_sms" type="button" class="btnSubmit" value="Resend code">
            </form>
        </div>
    </div>
@endsection

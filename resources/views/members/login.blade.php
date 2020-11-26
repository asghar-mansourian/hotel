@extends('layout.layout')

@section('content')
    @section('styles')
        <style>
            .loader {
                display:    none;
                position:   fixed;
                z-index:    9999999;
                top:        0;
                left:       0;
                height:     100%;
                width:      100%;
                background: rgba( 255, 255, 255, .8 )
                url('http://i.stack.imgur.com/FhHRx.gif')
                50% 50%
                no-repeat;
            }

            /* When the body has the loading class, we turn
               the scrollbar off with overflow:hidden */
            .loading .loader {
                overflow: hidden;
            }

            /* Anytime the body has the loading class, our
               modal element will be visible */
            .loading .loader {
                display: block;
            }
        </style>
    @endsection
    <div class="col-md-12 text-center">
        <div class="black pt-5"><span class="yellow mr-3"></span>{{__('member.login')}}</div>
        {{--        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>--}}
    </div>
    <div class="container">
        <div class="loader"><!-- Place at bottom of page --></div>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="row left-side">
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label for="" style="width: 450px!important;text-align: left">{{__('member.email')}}:</label>
                    </div>
                    <div class="text-center">

                        <input type="email" name="email"
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
                        <input type="password" name="password" class="w-100 courier_input"
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
                        <a href="/register" class="mr-3">
                            <strong>{{__('website.register')}}</strong>
                        </a>
                        <button type="submit" class="btn-effect">{{__('member.login')}}</button>
                    </div>
                </div>
                <br>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <a data-toggle="modal" data-target="#forgotPass" style="margin-bottom: 10px!important;margin-left: 4px!important;cursor: pointer">{{__('member.forgotPassword')}}</a>
                    </div>
                </div>

            </div>
        </form>

    </div>
    <div id="forgotPass" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{__('member.forgotPassword')}}</h4>
                </div>
                <form action="" method="post" id="forgotForm">
                    <div class="modal-body">
                        <p>{{__('member.forgotPassword')}}.</p>
                        <input type="email" id="forgotEmail" placeholder="{{__('member.email')}}" class="w-100 courier_input" style="width: 450px!important;">
                        <br>
                        <span class="invalid-feedback" style="color:#a1272b" role="alert">
                                        <strong id="errorEmail"></strong>
                                                </span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('member.submit')}}</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('member.close')}}</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
    @push('scripts')
        <script>
            $('#forgotForm').on('submit',function(event){
                event.preventDefault();
                $body = $("body");
                $body.addClass("loading");
                $.ajax({
                    url:'{{route('password.email')}}',
                    type:'post',
                    data:{
                        '_token':'{{csrf_token()}}',
                        'email':$('#forgotEmail').val()
                    },
                    dataType:'json',
                    success:function(success){
                        $body.removeClass("loading");
                        alert('{{__('member.resetPasswordSuccess')}}');
                        $('#forgotPass').modal('hide');
                    },
                    error:function(error){
                        $body.removeClass("loading");
                        $('#errorEmail').html('{{__('member.userNotFound')}}');
                    }
                })
            });
        </script>
    @endpush
@endsection

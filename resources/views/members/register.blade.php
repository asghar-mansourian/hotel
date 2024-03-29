@extends('layout.layout')

@section('content')
    <style>
        .form-field {
            position: relative;
            text-align: center;
            margin-top: 10px;
        }

        .form-input + .form-label {
            transition: transform 0.2s;
            display: inline-block;
        }

        .form-input:focus + .form-label {
            transform: scale(0.8) translateY(-24px);
        }

        .form-label {
            position: absolute;

            font-size: 15px;
            background-color: white;
            margin-left: 10px;
            margin-top: 5px;
            width: auto;
            left: 2%;
            top: 2px;
        }

        .form-input {
            width: 500px;
        }
    </style>
    <div class="container">
        <div class="col-md-12 text-center">
            @include('members.partials.validation_errors')
            <div class="black pt-5"><span class="yellow mr-3"></span>{{__('website.register')}}</div>
            {{--        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>--}}
        </div>
        <form action="{{ route('register') }}" method="post">


            @csrf

            <div class="row left-side">


                <div class="col-md-6 mt-2">


                        <fieldset class="form-field">

                            <input type="text" name="name"
                                   class="@error('name') is-invalid @enderror w-100 form-input courier_input "
                                   style=""
                                  id="name" value="{{ old('name') }}" required>
                            <label class="form-label" for="name">{{__('member.name')}} *</label>
                            {{--  @error('name')
                              <br>
                              <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                              @enderror--}}
                        </fieldset>

                </div>
                <div class="col-md-6 mt-2">


                    <fieldset class="form-field">

                        <input type="text" name="family"
                               class="@error('family') is-invalid @enderror w-100 form-input courier_input "
                               style=""
                               id="family" value="{{ old('family') }}" required>
                        <label class="form-label" for="family">{{__('member.family')}} *</label>
                        {{--@error('family')
                        <br>
                        <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror--}}
                    </fieldset>

                </div>
                <div class="col-md-6 mt-2">


                    <fieldset class="form-field">

                        <input type="email" name="email"
                               class="@error('email') is-invalid @enderror w-100 form-input courier_input "
                               style=""
                              id="email" value="{{ old('email') }}" required>
                        <label class="form-label" for="email">{{__('member.email')}} *</label>
                        {{--@error('email')
                        <br>
                        <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror--}}
                    </fieldset>

                </div>

                <div class="col-md-6 mt-2">


                    <fieldset class="form-field">

                        <input type="password" name="password"
                               class="@error('password') is-invalid @enderror w-100 form-input courier_input "
                               style=""
                               id="password" value="{{ old('password') }}" required>
                        <label class="form-label" for="password">{{__('member.password')}} *</label>
                        {{--@error('password')
                        <br>
                        <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror--}}
                    </fieldset>

                </div>

                <div class="col-md-6 mt-2">


                    <fieldset class="form-field">

                        <input type="password" name="password_confirmation"
                               id="confirm-password" class="@error('password') is-invalid @enderror w-100 form-input courier_input "
                               style=""
                               value="{{ old('password') }}" required>
                        <label class="form-label" for="confirm-password">{{__('member.passwordconfirmation')}} *</label>
                        {{--    @error('password')
                            <br>
                            <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror--}}
                    </fieldset>

                </div>

                <div class="col-md-6 mt-2">


                    <fieldset class="form-field">

                        <select class="form-input" name="country_id" onchange="getRegion(this.value)" aria-labelledby="dropdown_baglama"
                                style=" width: 100%;   -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0px 1px 6px rgb(204 204 207)!important;">
                            <option class="dropdown-item" value="null">{{__('member.please_select_country')}}</option>
                            @foreach($countries as $country)
                                @if($country->id != 3)
                                <option class="dropdown-item" {{ old('country_id') == $country->id ? "selected" : "" }} value="{{$country->id}}">{{$country->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        {{-- @error('country_id')
                         <span class="invalid-feedback"
                               role="alert" style="color: #b7474b"><strong>{{ $message }}</strong></span>
                         @enderror--}}
                    </fieldset>

                </div>

                <div class="col-md-6 mt-2">


                    <fieldset class="form-field">

                        <select class="form-input" name="region_id" id="region" aria-labelledby="dropdown_baglama"
                                style="    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0px 1px 6px rgb(204 204 207)!important;width: 100%">
                            <option value="">{{__('member.please_select_region')}}</option>
                        </select>
                        {{-- @error('region_id')
                         <span class="invalid-feedback"
                               role="alert" style="color: #b7474b"><strong>{{ $message }}</strong></span>
                         @enderror--}}
                    </fieldset>

                </div>

                <div class="col-md-6 mt-2">


                    <fieldset class="form-field">

                        <input type="text" name="address"
                               class="@error('address') is-invalid @enderror w-100 form-input courier_input "
                               style=""
                               value="{{ old('address') }}" id="address" required>
                        <label class="form-label" for="address">{{__('member.address')}} *</label>
                        {{-- @error('address')
                         <br>
                         <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                         @enderror--}}
                    </fieldset>

                </div>

                <div class="col-md-6 mt-2">
                    <fieldset class="form-field">

                        <input type="text" name="fin"
                               id="fin" class="@error('fin') is-invalid @enderror w-100 form-input courier_input "
                               style=""
                               value="{{ old('fin') }}" required>
                        <label class="form-label" for="fin">{{__('member.fin')}} *</label>
                        {{--@error('fin')
                        <br>
                        <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror--}}
                    </fieldset>

                </div>

                <div class="col-md-6 mt-2">

                        <div class="input-group form-input mt-4" style="width: 100%;">
                            <span class="input-group-addon">+38</span>
                            <input value="{{ old('phone') }}" type="text" name="phone"
                                   class="@error('phone') is-invalid @enderror form-control w-100 courier_input "
                                   placeholder="{{__('member.phone')}}" style="">
                            {{--   @error('phone')
                               <br>
                               <span class="invalid-feedback"
                                     role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                               @enderror--}}
                        </div>

                </div>


                <div class="col-md-12 mt-2">
                    <div class="text-center">

                        <input data-target="#polices"  class="@error('terms') is-invalid @enderror"
                               id="terms" type="checkbox" name="terms" required
                               style="vertical-align: middle!important;">
                        <label data-target="#polices" data-toggle="modal"
                               style="margin-bottom: 0!important;cursor: pointer; margin-left: 4px!important;vertical-align: middle!important">{{__('member.Agreepolicy')}}</label>
                        {{--  @error('terms')
                          <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span>
                          @enderror--}}
                    </div>

                </div>
                <div class="col-md-12 button-part mt-5">
                    <div class="text-center">
                        <button type="submit" class="btn-effect">{{__('member.register')}}</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <div id="polices" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{__('member.polices')}}</h4>
                </div>
                <div class="modal-body">
                    <p>
                        @php
                            $locale = app()->getLocale();

$content = app()->getLocale() !== 'en' ? "content_{$locale} as content" : 'content';
$title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';
                        $agency = \Illuminate\Support\Facades\DB::table('pages')->where('id' , 4)->select([$content , $title])->first();
                        @endphp
                        {!! $agency->content !!}
                    </p>
                    <br>
                </div>
                <div class="modal-footer">
                    <button onclick="check(true)" data-dismiss="modal"
                            class="btn btn-primary">{{__('member.Agreepolicy')}}</button>
                    <button onclick="check(false)" class="btn btn-default"
                            data-dismiss="modal">{{__('member.notAcceptPolices')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

            $('.form-input').on('focusin' , function () {
                    $(this).next().css({"-webkit-transform":"scale(0.8) translate(0,-24px)"});
            })

            $('.form-input').each(function (key , item) {
                if (item.value != ""){
                    $(this).next().css({"-webkit-transform":"scale(0.8) translate(0,-24px)"});
                }
            })

            $('.form-input').on('focusout' , function () {
                if (this.value != ""){
                    $(this).next().css({"-webkit-transform":"scale(0.8) translate(0,-24px)"});
                }
                else{
                    $(this).next().css({"-webkit-transform":"scale(1) translate(0,2px)"});
                }
            })

            function check(type) {
            if (type)
                $("#terms").prop("checked", true);
            else
                $("#terms").prop("checked", false);

        }

        function getRegion(country_id) {
            if (country_id != 'null') {
                var lang = '{{app()->getLocale()}}';
                console.log(lang);
                $.ajax({
                    url: '/api/v1/regions?country_id=' + country_id,
                    success: function (response) {
                        regions = response.data;
                        var html = '';
                        for (var i = 0; i < regions.length; i++) {
                            if (lang == 'en')
                                html = html + '<option value="' + regions[i].id + '">' + regions[i].name + '</option>';
                            else {
                                html = html + '<option value="' + regions[i].id + '">' + regions[i].name_ru + '</option>';
                            }
                        }
                        $('#region').empty();
                        $("#region").append(html);
                    }
                });
            } else {
                $("#region").empty();
            }

        }

        window.addEventListener('load',function (){
            var country_id = '{{old('country_id')}}';
            if(country_id){
                var old_region_id = '{{old('region_id')}}';
                var lang = '{{app()->getLocale()}}';
                $.ajax({
                    url: '/api/v1/regions?country_id=' + country_id,
                    success: function (response) {
                        var selected = '';
                        regions = response.data;
                        var html = '';
                        for (var i = 0; i < regions.length; i++) {
                            if(old_region_id == regions[i].id)
                                selected = 'selected';
                            else
                                selected = '';
                            if (lang == 'en')
                                html = html + '<option '+ selected +' value="' + regions[i].id + '">' + regions[i].name + '</option>';
                            else {
                                html = html + '<option '+ selected +' value="' + regions[i].id + '">' + regions[i].name_ru + '</option>';
                            }
                        }
                        $('#region').empty();
                        $("#region").append(html);
                    }
                });
            } else {
                $("#region").empty();
            }
        })
    </script>
@endpush

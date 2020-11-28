@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="col-md-12 text-center">
            <div class="black pt-5"><span class="yellow mr-3"></span>{{__('website.register')}}</div>
            {{--        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>--}}
        </div>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="row left-side">
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.name')}}:</label>
                    </div>
                    <div class="text-center">

                        <input type="text" name="name"
                               class="@error('name') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;" value="{{ old('name') }}">
                        @error('name')
                        <br>
                        <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.family')}}:</label>
                    </div>
                    <div class="text-center">

                        <input type="text" name="family"
                               class="@error('family') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;" value="{{ old('family') }}">
                        @error('family')
                        <br>
                        <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.email')}}:</label>
                    </div>
                    <div class="text-center">

                        <input type="email" value="{{ old('email') }}" name="email"
                               class="@error('email') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        @error('email')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.password')}}:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password"
                               class="@error('password') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        @error('password')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.passwordconfirmation')}}:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password_confirmation"
                               class="@error('password') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        <br>
                        @error('password')
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.country')}}:</label>
                    </div>
                    <div class="text-center">
                        <select name="country_id" onchange="getRegion(this.value)" aria-labelledby="dropdown_baglama"
                                style="    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0px 1px 6px rgb(204 204 207)!important;width: 450px!important">
                            <option class="dropdown-item" value="null">{{__('member.please_select_country')}}</option>
                            @foreach($countries as $country)
                                <option class="dropdown-item" value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.region')}}:</label>
                    </div>
                    <div class="text-center">
                        <select name="region_id" id="region" aria-labelledby="dropdown_baglama"
                                style="    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0px 1px 6px rgb(204 204 207)!important;width: 450px!important">
                        </select>
                        @error('region_id')
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.address')}}:</label>
                    </div>
                    <div class="text-center">
                        <input value="{{ old('address') }}" type="text" name="address"
                               class="@error('address') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        <br style="">
                        @error('address')
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.fin')}}:</label>
                    </div>
                    <div class="text-center">
                        <input type="text" value="{{ old('fin') }}" name="fin"
                               class="@error('fin') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        @error('fin')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">{{__('member.phone')}}:</label>
                    </div>
                    <div class="text-center">
                        <input value="{{ old('phone') }}" type="text" name="phone"
                               class="@error('phone') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        @error('phone')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">

                        <input class="@error('terms') is-invalid @enderror" type="checkbox" name="terms" required
                               style="vertical-align: middle!important;">
                        <label style="margin-bottom: 10px!important;
    margin-left: 4px!important;">{{__('member.Agreepolicy')}}</label>
                        @error('terms')
                        <span class="invalid-feedback"
                              role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
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
@endsection
@push('scripts')
    <script>
        function getRegion(country_id){
            if(country_id != 'null'){
                $.ajax({
                    url:'/api/v1/regions?country_id='+country_id,
                    success:function(response){
                        regions = response.data;
                        var html='';
                        for(var i=0;i<regions.length;i++){
                            html = html + '<option value="'+regions[i].id+'">'+regions[i].name+ '</option>';
                        }
                        $('#region').empty();
                        $("#region").append(html);
                    }
                });
            }
            else{
                $("#region").empty();
            }

        }
    </script>
@endpush

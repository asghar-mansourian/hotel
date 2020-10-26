@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="col-md-12 text-center">
            <div class="black pt-5"><span class="yellow mr-3">Kargo</span>Login</div>
            {{--        <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>--}}
        </div>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="row left-side">
                <div class="col-md-12 mt-2">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">Name:</label>
                    </div>
                    <div class="text-center">

                        <input type="text" name="name" placeholder="name"
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
                        <label style="width: 450px!important;text-align: left">Family:</label>
                    </div>
                    <div class="text-center">

                        <input type="text" name="family" placeholder="family"
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
                        <label style="width: 450px!important;text-align: left">Email:</label>
                    </div>
                    <div class="text-center">

                        <input type="email" value="{{ old('email') }}" name="email" placeholder="email"
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
                        <label style="width: 450px!important;text-align: left">Password:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password" placeholder="password"
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
                        <label style="width: 450px!important;text-align: left">Password Confirmation:</label>
                    </div>
                    <div class="text-center">
                        <input type="password" name="password_confirmation" placeholder="Password Confirmation"
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
                        <label style="width: 450px!important;text-align: left">Serial Number:</label>
                    </div>
                    <div class="text-center">
                        <input type="text" name="serial_number" maxlength="9" placeholder="serial number"
                               class="@error('serial_number') is-invalid @enderror w-100 courier_input"
                               value="{{ old('serial_number') }}" style="width: 450px!important;">
                        <br>
                        @error('serial_number')
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">Citizenship:</label>
                    </div>
                    <div class="text-center">
                        <input type="text" value="{{ old('citizenship') }}" name="citizenship" placeholder="citizenship"
                               class="@error('citizenship') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;">
                        @error('citizenship')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">Fin:</label>
                    </div>
                    <div class="text-center">
                        <input type="text" value="{{ old('fin') }}" maxlength="7" name="fin" placeholder="fin"
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
                        <label style="width: 450px!important;text-align: left">phone:</label>
                    </div>
                    <div class="text-center">
                        <input value="{{ old('email') }}" type="text" name="phone" placeholder="phone"
                               class="@error('phone') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;"
                               pattern="^(?:0|\(?\+994\)?\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
                        @error('phone')
                        <br>
                        <span class="invalid-feedback"
                              role="alert" style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">birthday:</label>
                    </div>
                    <div class="text-center">
                        <input value="{{ old('birthdate') }}" autocomplete="birthdate" type="date" name="birthdate"
                               placeholder="birthdate"
                               class="@error('birthdate') is-invalid @enderror w-100 courier_input"
                               style="width: 450px!important;"
                               pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
                        @error('birthdate')
                        <br>
                        <span class="invalid-feedback" role="alert"
                              style="color: #b7474b "><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="text-center">
                        <label style="width: 450px!important;text-align: left">address:</label>
                    </div>
                    <div class="text-center">
                        <input value="{{ old('address') }}" type="text" name="address" placeholder="address"
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
                        <label style="width: 450px!important;text-align: left">gender:</label>
                    </div>
                    <div class="text-center">
                        <select class="@error('gender') is-invalid @enderror form-control courier_input" name="gender"
                                style="width: 450px!important;margin: 0 auto!important;">
                            <option value="2">male</option>
                            <option value="1">female</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback"
                              role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="text-center">

                        <input class="@error('terms') is-invalid @enderror" type="checkbox" name="terms" required
                               style="vertical-align: middle!important;">
                        <label style="margin-bottom: 10px!important;
    margin-left: 4px!important;">Agree the Terms and policy</label>
                        @error('terms')
                        <span class="invalid-feedback"
                              role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12 button-part mt-5">
                    <div class="text-center">
                        <button type="submit" class="btn-effect">Register</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection

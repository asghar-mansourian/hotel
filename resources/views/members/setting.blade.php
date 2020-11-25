@extends('members.layout')

@section('title')
    Kargo | Setting
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="row">
        <div class="mt-5">
            <div class="col-12" style="padding: 1px 16px;">
                <div class="hide-alert">
                    @include('layout.error')
                </div>
            </div>
            <div class="col-md-12">
                <div class="tab">
                    <button class="tablinks active " onclick="openCity(event, 'profil_text')">
                        <i class="fas fa-user-shield mr-0"></i> <span class="use_dis_no">{{__('member.profileinformation')}}</span>
                    </button>
                    <button class="tablinks" onclick="openCity(event, 'parol')">
                        <i class="fas fa-user-lock mr-0"></i><span class="use_dis_no">{{__('member.password')}}</span>
                    </button>
                    <button class="tablinks" onclick="openCity(event, 'cv_text')">
                        <i class="fas fa-address-card mr-0"></i><span class="use_dis_no">{{__('member.other')}}</span>
                    </button>
                </div>
                <div class="border_bar">
                    <div id="profil_text" class="tabcontent" style="display: block">
                        <form method="post" action="{{url('setting/changeProfileInformation')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>{{__('member.name')}}</strong></h5>
                                    <input type="text" name="name" placeholder="Name *" value="{{$user->name}}"
                                           class="w-100 courier_input" readonly="readonly">
                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>{{__('member.family')}}</strong></h5>
                                    <input type="text" name="family" placeholder="Family *" value="{{$user->family}}"
                                           class="w-100 courier_input" readonly="readonly">
                                </div>
                                <div class="col-md-5 col-sm-5 mb-4">
                                    <h5><strong>{{__('member.deliveryoffice')}} *</strong></h5>

                                    <select name="branch_id" class=" w-100 " aria-labelledby="dropdown_baglama"
                                            style="    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0px 1px 6px rgb(204 204 207)!important;">
                                        @foreach($branches as $branch)

                                            <option value="{{$branch->id}}" @if($branch->id == $user->branch_id) selected @endif>{{$branch->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-7 col-sm-7 mb-4">
                                    <h5><strong>{{__('member.birthdate')}} </strong></h5>
                                    <input type="date" name="birthdate" placeholder="Birthdate *"
                                           value="{{$user->birthdate}}" class="w-100 courier_input">

                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>{{__('member.email')}} *</strong></h5>
                                    <input type="text" name="email" placeholder="{{__('member.email')}} *" value="{{$user->email}}"
                                           readonly class="w-100 courier_input">
                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>{{__('member.phone')}} *</strong></h5>
                                    <input type="text" name="phone" placeholder="{{__('member.phone')}} *" class="w-100 courier_input"
                                            value="{{$user->phone}}">
                                </div>
                                <div class="col-md-12 button-part mt-4">
                                    <button type="submit" class="btn-effect">{{__('member.save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="parol" class="tabcontent">
                        <form action="{{url('/setting/changePassword')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12 mb-4 p-0">
                                    <div class="col-md-6 col-sm-6 mb-4">
                                        <h5><strong>{{__('member.currentpassword')}}</strong></h5>
                                        <input type="password" name="current_password" placeholder="{{__('member.currentpassword')}}*"
                                               class="w-100 courier_input" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-4 p-0">
                                    <div class="col-md-6 col-sm-6 mb-4">
                                        <h5><strong>{{__('member.enternewpassword')}}</strong></h5>
                                        <input type="password" name="password" placeholder="{{__('member.enternewpassword')}} *"
                                               class="w-100 courier_input" required="">
                                        <input type="password" name="password_confirmation"
                                               placeholder="{{__('member.enterconfirmpassword')}} *" class="w-100 mt-4 courier_input"
                                               required="">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
                                        <h5><strong>{{__('member.carefuladdingnewpassword')}}</strong></h5>
                                        {{__('member.usecharacterspassword')}}<br/><br/>
                                        <i class="far fa-circle mr-3 ml-3" style="font-size: 8px;"></i>
                                        {{__('member.capitallettersyourpassword')}}<br/>
                                        <i class="far fa-circle mr-3 ml-3" style="font-size: 8px;"></i>
                                        {{__('member.usenumberinpassword')}}<br/>
                                        <i class="far fa-circle mr-3 ml-3" style="font-size: 8px;"></i>
                                        {{__('member.usecharacterspassword')}}<br/>
                                    </div>
                                </div>
                                <div class="col-md-12 button-part mt-5">
                                    <button type="submit" class="btn-effect">{{__('member.save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="cv_text" class="tabcontent">
                        <form action="{{url('/setting/changeOther')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>{{__('member.serialNumber')}} * </strong></h5>
                                    <input type="text" name="serial_number" readonly placeholder="{{__('member.serialNumber')}} *" value="{{$user->serial_number}}"
                                           class="w-100 courier_input" required="">
                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>{{__('member.fin')}} *</strong></h5>
                                    <input type="text" readonly placeholder="{{__('member.fin')}}*" value="{{$user->fin}}"
                                           class="w-100 courier_input">
                                </div>
                                <div class="col-md-7 col-sm-7 mb-4">
                                    <h5><strong>{{__('member.citizenship')}} *</strong></h5>
                                    <input type="text" name="citizenship" placeholder="{{__('member.citizenship')}} *" value="{{$user->citizenship}}"
                                           class="w-100 courier_input" required="">
                                </div>
                                <div class="col-md-5 col-sm-5 mb-4">
                                    <h5><strong>{{__('member.gender')}}</strong></h5>
                                    <input type="text" value="{{\App\lib\User::getGenderName($user->gender)}}" readonly
                                           class="w-100 courier_input">
                                </div>
                                <div class="col-md-12 col-sm-12 mb-4">
                                    <h5><strong>{{__('member.address')}} *</strong></h5>
                                    <input type="text" name="address" placeholder="{{__('member.address')}} *" value="{{$user->address}}"
                                           class="w-100 courier_input" required="">
                                </div>
                                <div class="col-md-12 button-part mt-4">
                                    <button type="submit" class="btn-effect">{{__('member.save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

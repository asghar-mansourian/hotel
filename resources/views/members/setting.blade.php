@extends('members.layout')

@section('title')
    Kargo | Setting
@endsection

@section('main')
    @include('members.code')
    <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="tab">
                    <button class="tablinks active " onclick="openCity(event, 'profil_text')">
                        <i class="fas fa-user-shield mr-0"></i> <span class="use_dis_no">Profile Information</span>
                    </button>
                    <button class="tablinks" onclick="openCity(event, 'parol')">
                        <i class="fas fa-user-lock mr-0"></i><span class="use_dis_no">Password</span>
                    </button>
                    <button class="tablinks" onclick="openCity(event, 'cv_text')">
                        <i class="fas fa-address-card mr-0"></i><span class="use_dis_no">Other</span>
                    </button>
                </div>
                <div class="border_bar">
                    <div id="profil_text" class="tabcontent active">
                        <form method="post" action="{{url('setting/changeProfileInformation')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12" style="padding: 1px 16px;">
                                    @include('layout.error')
                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>Name</strong></h5>
                                    <input type="text" name="name" placeholder="Name *" value="{{$user->name}}"
                                           class="w-100 courier_input" readonly="readonly">
                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>Family</strong></h5>
                                    <input type="text" name="family" placeholder="Family *" value="{{$user->family}}"
                                           class="w-100 courier_input" readonly="readonly">
                                </div>
                                <div class="col-md-5 col-sm-5 mb-4">
                                    <h5><strong>Çatdırılma ofisi *</strong></h5>
                                    <select name="" class=" w-100 " aria-labelledby="dropdown_baglama"
                                            style="    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0px 1px 6px rgb(204 204 207)!important;">
                                        <option class="">Bakı</option>
                                        <option class="dropdown-item">Gəncə</option>
                                        <option class="dropdown-item">Sumqayıt</option>
                                        <option class="dropdown-item">Zaqatala</option>
                                    </select>
                                </div>
                                <div class="col-md-7 col-sm-7 mb-4">
                                    <h5><strong>Birthdate </strong></h5>
                                    <input type="date" name="birthdate" placeholder="Birthdate *"
                                           value="{{$user->birthdate}}" class="w-100 courier_input">

                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>E-mail *</strong></h5>
                                    <input type="text" name="email" placeholder="E-mail" value="{{$user->email}}"
                                           readonly class="w-100 courier_input">
                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>Phone *</strong></h5>
                                    <input type="text" name="phone" placeholder="Phone" class="w-100 courier_input"
                                           readonly value="{{$user->phone}}">
                                </div>
                                <div class="col-md-12 button-part mt-4">
                                    <button type="submit"  class="btn-effect">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="parol" class="tabcontent">
                        <form action="{{url('/setting/changePassword')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12" style="padding: 1px 16px;">
                                    @include('layout.error')
                                </div>
                                <div class="col-md-12 col-sm-12 mb-4 p-0">
                                    <div class="col-md-6 col-sm-6 mb-4">
                                        <h5><strong>Current Password</strong></h5>
                                        <input type="password" name="current_password" placeholder="Current Password"
                                               class="w-100 courier_input" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-4 p-0">
                                    <div class="col-md-6 col-sm-6 mb-4">
                                        <h5><strong>Enter The New Password</strong></h5>
                                        <input type="password" name="password" placeholder="Password"
                                               class="w-100 courier_input" required="">
                                        <input type="password" name="password_confirmation"
                                               placeholder="Password Confrmation" class="w-100 mt-4 courier_input"
                                               required="">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
                                        <h5><strong>Be careful when adding a new password!</strong></h5>
                                        Use characters in your password<br/><br/>
                                        <i class="far fa-circle mr-3 ml-3" style="font-size: 8px;"></i>
                                        Use capital letters in your password<br/>
                                        <i class="far fa-circle mr-3 ml-3" style="font-size: 8px;"></i>
                                        Use a number in your password<br/>
                                        <i class="far fa-circle mr-3 ml-3" style="font-size: 8px;"></i>
                                        Use characters in your password<br/>
                                    </div>
                                </div>
                                <div class="col-md-12 button-part mt-5">
                                    <button type="submit" class="btn-effect">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="cv_text" class="tabcontent">
                        <form action="{{url('/setting/changeOther')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12" style="padding: 1px 16px;">
                                    @include('layout.error')
                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>Serial Number * </strong></h5>
                                    <input type="text" name="serial_number" readonly placeholder="Serial Number" value="{{$user->serial_number}}"
                                           class="w-100 courier_input" required="">
                                </div>
                                <div class="col-md-6 col-sm-6 mb-4">
                                    <h5><strong>FIN *</strong></h5>
                                    <input type="text" name="fin" placeholder="FIN *" value="{{$user->fin}}"
                                           class="w-100 courier_input" >
                                </div>
                                <div class="col-md-7 col-sm-7 mb-4">
                                    <h5><strong>Citizenship *</strong></h5>
                                    <input type="text" name="citizenship" placeholder="Citizenship" value="{{$user->citizenship}}"
                                           class="w-100 courier_input" required="">
                                </div>
                                <div class="col-md-5 col-sm-5 mb-4">
                                    <h5><strong>Gender</strong></h5>
                                    <select name="gender" class=" w-100 " aria-labelledby="dropdown_baglama"
                                            style="    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0px 1px 6px rgb(204 204 207)!important;">
                                        <option value="2" class="dropdown-item" @if($user->gender == 2) selected @endif>male</option>
                                        <option value="1" class="dropdown-item" @if($user->gender == 1) selected @endif>female</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-4">
                                    <h5><strong>Address *</strong></h5>
                                    <input type="text" name="address" placeholder="address *" value="{{$user->address}}"
                                           class="w-100 courier_input" required="">
                                </div>
                                <div class="col-md-12 button-part mt-4">
                                    <button type="submit" class="btn-effect">Save</button>
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
    <li class="">
        <a href="{{url('/home')}}"><i class="fas fa-th-large"></i><span class="use_dis_no">Dashboard</span></a>
    </li>
    <li class="">
        <a href="#"><i class="fas fa-search-location"></i><span class="use_dis_no">Xaricdəki ünvanlarım</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-shopping-basket"></i><span class="use_dis_no">Sifarişlərim</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">Bağlamalarım</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-donate"></i><span class="use_dis_no">AZN Balansım</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-donate"></i><span class="use_dis_no">TL Balansım</span></a>
    </li>
    <li>
        <a href="#"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">Kuryer</span></a>
    </li>
    <li>
        <a href="#"><i class="far fa-question-circle" style="font-size: 16px;"></i><span class="use_dis_no">Sorğu</span></a>
    </li>
    <li class="active_li">
        <a href="{{url('/setting')}}"><i class="fas fa-cogs"></i><span class="use_dis_no">Setting</span></a>
    </li>
    <li>
        <a href="{{url('/logout')}}"><i class="fas fa-power-off"></i><span class="use_dis_no">Log Out</span></a>
    </li>
@endsection

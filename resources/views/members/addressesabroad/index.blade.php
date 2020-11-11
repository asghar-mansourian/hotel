@extends('members.layout')

@section('title')
    Kargo | Orders
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="tab">
                    <button class="tablinks active " onclick="openCity(event, 'turkey')"><img src="{{url('front/image/flg-tr.png')}}"><span class="dis_no"> Türkiyə</span></button>
                    <button class="tablinks" onclick="openCity(event, 'amerika')"><img src="{{url('front/image/flg-usa.png')}}"><span class="dis_no">Amerika</span></button>
                </div>
                <div class="border_bar">
                    <div id="turkey" class="tabcontent active">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><strong>Ad, Soyad</strong></h5>
                                        <p>0044410 - KARGO İTHALAT VE İHRACAT LİMİTED şirketi</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Adres başlığı</strong></h5>
                                        <p>LİMAK - 0044410 - Emin Elvinli</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Adres satır 1 (Müştəri kodu,ad və soyadınızla birgə tam olaraq kopyalayın)</strong></h5>
                                        <p>0044410 Emin Elvinli, Halkalı, 1.Tuna cd. Üzümlü SK. 5a </p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>İl-Şehir</strong></h5>
                                        <p>Küçükçekmece</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>İlçe</strong></h5>
                                        <p>Istanbul</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Vergi dairesi</strong></h5>
                                        <p>Halkalı</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><strong>Semt</strong></h5>
                                        <p>Halkalı</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>ZIP/Post kodu</strong></h5>
                                        <p>34303</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Ülke</strong></h5>
                                        <p>Türkiye</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>TC kimlik</strong></h5>
                                        <p>35650276048</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Cep telefon</strong></h5>
                                        <p>05364700021</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Vergi numarası</strong></h5>
                                        <p>6081089593</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="amerika" class="tabcontent">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><strong>Name</strong></h5>
                                        <p>AZ0044410 Emin Elvinli</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Address Line</strong></h5>
                                        <p>28 W Ayre Street</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Address Line2</strong></h5>
                                        <p>Suite#AZ0044410 </p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>State</strong></h5>
                                        <p>Delaware (DE)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><strong>City</strong></h5>
                                        <p>Wilmington</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>ZIP/Postal code</strong></h5>
                                        <p>19804</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Country</strong></h5>
                                        <p>United States</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Phone Number</strong></h5>
                                        <p>800-4315119</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

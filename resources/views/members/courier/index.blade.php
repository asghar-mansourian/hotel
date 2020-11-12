@extends('members.layout')

@section('title')
    Kargo | Tl Balance
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">
        <div class="border_sh courier">
            <h2 class="mt-0">Kuryer</h2>
            <div class="row courier">
                <div class="col-md-12"><h3>Ərazi seç</h3></div>
                <div class="col-md-7 col-sm-7">
                    <h4>Bakı və Abşeron</h4>
                    <br>
                    <form action="">
                        <input type="radio" id="baki0" name="baki" value="1">
                        <label for="baki0">Səbail, Yasamal, Nəsimi, Binəqədi, Nərimanov - 3AZN</label><br>
                        <input type="radio" id="baki1" name="baki" value="2">
                        <label for="baki1">Xətai, Nizami, Sabunçu, Suraxanı - 4AZN</label><br>
                        <input type="radio" id="baki2" name="baki" value="3">
                        <label for="baki2">Xırdalan,Masazır,Lökbatan - 5 AZN</label><br>
                        <input type="radio" id="baki3" name="baki" value="4">
                        <label for="baki3">Bakı ətrafı kənd və qəsəbələr - 5 AZN</label><br>
                    </form>
                </div>
                <div class="col-md-5 col-sm-5">
                    <h4>Bakı və Abşeron</h4>
                    <br>
                    <form action="">
                        <input type="radio" id="age2" name="age" value="5">
                        <label for="age2">Gəncə (Şəhər daxili) - 2 AZN</label><br>
                    </form>
                </div>
                <div class="col-md-12 mt-5"></div>
                <div class="col-md-4 col-sm-6">
                    <input type="text" name="region" placeholder="Rayon *" class="w-100 courier_input" required>
                </div>
                <div class="col-md-4 col-sm-6">
                    <input type="text" name="village" placeholder="Qəsəbə " class="w-100 courier_input" >
                </div>
                <div class="col-md-4 col-sm-6">
                    <input type="street" name="" placeholder="Küçə *" class="w-100 courier_input" required>
                </div>
                <div class="col-md-12 mt-5"></div>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="home" placeholder="Ev *" class="w-100 courier_input" required>
                </div>
                <div class="col-md-6 col-sm-6">
                    <input type="number" name="telefon" placeholder="Telefon *" class="w-100 courier_input" required>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="font_black"><h5><strong>Kuryer sifariş etmək üçün bağlamanız yoxdur</strong></h5></div>
                    <div class="courier_dr">
                        <div class="dropdown">
                            <div class="dropdown-toggle" id="dropdown_baglama" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Bağlamanı seçin<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                            </div>
                            <div class="dropdown-menu w-100 p-4" aria-labelledby="dropdown_baglama">
                                <div class="dropdown-item ">
                                    <label class="container">Hamısı
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="dropdown-item">
                                    <label class="container">44599 sayli bağlama
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="dropdown-item">
                                    <label class="container">44580 sayli bağlama
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <textarea placeholder="Əlavə qeydlərinizi yazın" row="8" id="comment" class="courier_input w-100 h-100p"></textarea>
                </div>
                <div class="col-md-12 button-part mt-5">
                    <button type="submit" class="btn-effect">Təsdiq et</button>
                </div>
                <div class="col-md-12 button-part mt-5">
                    <div class="font_black"><h5><strong>Kuryer sifarişiniz 24 saat ərzində təyin olunur.</strong></h5></div>
                    <div class="font_black"><h5><strong>Kuryerin iş saatları 10:00 - 19:00 (həftənin 6 günü).</strong></h5></div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

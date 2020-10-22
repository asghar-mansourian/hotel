@extends('layout.layout')
@section('title')
    Kargo | Invoice
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 invoice_buttons">
                <a href="invoice.html" class="invoice_button">BƏYAN ET</a>
                <a href="order.html" class="order_button">SİFARİŞ ET</a>

            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab">
                                <button class="tablinks " onclick="openCity(event, 'turkey')"><img
                                        src="{{url('/front/image/order-TR.png')}}"><span class="dis_no"> Türkiyə</span>
                                </button>
                                <button class="tablinks active" onclick="openCity(event, 'amerika')"><img
                                        src="{{url('/front/image/order-Us.png')}}"><span class="dis_no">Amerika</span>
                                </button>
                            </div>
                            <div class="border_bar">
                                <div id="turkey" class="tabcontent active" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 mb-5">
                                            <input type="text" name="" placeholder="Mağaza adı *"
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-5">
                                            <input type="text" name="" placeholder="Bağlamadakı məhsulun növü *"
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-xs-12"></div>
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <input type="number" name="" placeholder="Bağlamadakı məhsulun sayı *"
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <input type="number" name="" placeholder="Qiyməti (tl) * "
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <input type="number" name="" placeholder="Sifarişin İzləmə kodu * "
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-xs-12"></div>
                                        <div class="col-md-6 col-sm-6 col-sm-5 mb-6">
                                            <h5><strong>Çatdırılma ofisi *</strong></h5>
                                            <div class="courier_dr">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" id="dropdown_baglama"
                                                         data-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false">
                                                        Bağlamanı seçin<i class="fas fa-chevron-down ml-2"></i>
                                                    </div>
                                                    <div class="dropdown-menu w-100 p-4"
                                                         aria-labelledby="dropdown_baglama">
                                                        <div class="dropdown-item active_span">Bakı</div>
                                                        <div class="dropdown-item">Gəncə</div>
                                                        <div class="dropdown-item">Sumqayıt</div>
                                                        <div class="dropdown-item">Zaqatala</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <h5><strong>Sifarişin verilmə tarixi *</strong></h5>
                                            <div class="col-md-12  courier_dr brit_year pl-0">
                                                <input type="date" name=""
                                                       class="w-100 courier_input" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-0">
                                            <textarea class="courier_textare"
                                                      placeholder="Bağlamanıza aid qeydləriniz varsa yazın"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            {{--                                            <input type="file" name="" class="courier_file float-left mr-5">--}}
                                            <button class="btn courier_button">Göndər</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="amerika" class="tabcontent" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 mb-5">
                                            <input type="text" name="" placeholder="Mağaza adı *"
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-md-6 col-sm-6 mb-5">
                                            <input type="text" name="" placeholder="Bağlamadakı məhsulun növü *"
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-xs-12"></div>
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <input type="number" name="" placeholder="Bağlamadakı məhsulun sayı *"
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <input type="number" name="" placeholder="Qiyməti (tl) * "
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <input type="number" name="" placeholder="Sifarişin İzləmə kodu * "
                                                   class="w-100 courier_input" required="">
                                        </div>
                                        <div class="col-xs-12"></div>
                                        <div class="col-md-5 col-sm-6 col-sm-5 mb-4">
                                            <h5><strong>Çatdırılma ofisi *</strong></h5>
                                            <div class="courier_dr">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" id="dropdown_baglama"
                                                         data-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false">
                                                        Bağlamanı seçin<i class="fas fa-chevron-down ml-2"></i>
                                                    </div>
                                                    <div class="dropdown-menu w-100 p-4"
                                                         aria-labelledby="dropdown_baglama">
                                                        <div class="dropdown-item active_span">Bakı</div>
                                                        <div class="dropdown-item">Gəncə</div>
                                                        <div class="dropdown-item">Sumqayıt</div>
                                                        <div class="dropdown-item">Zaqatala</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <h5><strong>Sifarişin verilmə tarixi *</strong></h5>
                                            <div class="col-md-4 col-xs-3 mb-4 courier_dr brit_day">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" id="brit_day" data-toggle="dropdown"
                                                         aria-haspopup="true" aria-expanded="false">
                                                        4<i class="fas fa-chevron-down ml-2"></i>
                                                    </div>
                                                    <div class="dropdown-menu w-100 p-4" aria-labelledby="brit_day">
                                                        <div class="dropdown-item active_span">1</div>
                                                        <div class="dropdown-item">2</div>
                                                        <div class="dropdown-item">3</div>
                                                        <div class="dropdown-item">4</div>
                                                        <div class="dropdown-item">5</div>
                                                        <div class="dropdown-item">6</div>
                                                        <div class="dropdown-item">7</div>
                                                        <div class="dropdown-item">8</div>
                                                        <div class="dropdown-item">9</div>
                                                        <div class="dropdown-item">10</div>
                                                        <div class="dropdown-item">11</div>
                                                        <div class="dropdown-item">12</div>
                                                        <div class="dropdown-item">13</div>
                                                        <div class="dropdown-item">14</div>
                                                        <div class="dropdown-item">15</div>
                                                        <div class="dropdown-item">16</div>
                                                        <div class="dropdown-item">17</div>
                                                        <div class="dropdown-item">18</div>
                                                        <div class="dropdown-item">19</div>
                                                        <div class="dropdown-item">20</div>
                                                        <div class="dropdown-item">21</div>
                                                        <div class="dropdown-item">22</div>
                                                        <div class="dropdown-item">23</div>
                                                        <div class="dropdown-item">24</div>
                                                        <div class="dropdown-item">25</div>
                                                        <div class="dropdown-item">26</div>
                                                        <div class="dropdown-item">27</div>
                                                        <div class="dropdown-item">28</div>
                                                        <div class="dropdown-item">29</div>
                                                        <div class="dropdown-item">30</div>
                                                        <div class="dropdown-item">31</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-3 mb-4 courier_dr brit_moon">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" id="brit_moon" data-toggle="dropdown"
                                                         aria-haspopup="true" aria-expanded="false">
                                                        08<i class="fas fa-chevron-down ml-2"></i>
                                                    </div>
                                                    <div class="dropdown-menu w-100 p-4" aria-labelledby="brit_moon">
                                                        <div class="dropdown-item">01</div>
                                                        <div class="dropdown-item">02</div>
                                                        <div class="dropdown-item">03</div>
                                                        <div class="dropdown-item">04</div>
                                                        <div class="dropdown-item">05</div>
                                                        <div class="dropdown-item">06</div>
                                                        <div class="dropdown-item">07</div>
                                                        <div class="dropdown-item active_span">08</div>
                                                        <div class="dropdown-item">09</div>
                                                        <div class="dropdown-item">10</div>
                                                        <div class="dropdown-item">11</div>
                                                        <div class="dropdown-item">12</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-6 mb-4 courier_dr brit_year">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" id="brit_year" data-toggle="dropdown"
                                                         aria-haspopup="true" aria-expanded="false">2020<i
                                                            class="fas fa-chevron-down ml-2"></i>
                                                    </div>
                                                    <div class="dropdown-menu w-100 p-4" aria-labelledby="brit_year">
                                                        <div class="dropdown-item active_span">2020</div>
                                                        <div class="dropdown-item">2019</div>
                                                        <div class="dropdown-item">2018</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-0">
                                            <textarea class="courier_textare"
                                                      placeholder="Bağlamanıza aid qeydləriniz varsa yazın"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            {{--                                            <input type="file" name="" class="courier_file float-left mr-5">--}}
                                            <button class="btn courier_button">Göndər</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="border_sh mt-5 text-center">
                    <h4><strong>Diqqət!</strong></h4>
                    <div class="text-center">
                        Dəyərli müştərilər, sifarişlərinizi özünüz etdiyiniz zaman bəyannamə Sizin tərəfinizdən əlavə
                        olunmalıdır. İnvoys yükləmədən bəyannamə əlavə etmək mümkün deyildir. Bəyannaməni dəqiq və
                        operativ doldurmağınız Sizin bağlamalarınızın gömrük yoxlamasından daha tez və problemsiz
                        keçməsinə kömək edəcək.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')


@endsection

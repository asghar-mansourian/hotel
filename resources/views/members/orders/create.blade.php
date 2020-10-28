@extends('layout.layout')
@php
    use App\lib\Helpers;
    $taxOrder = Helpers::getTaxOrder()
@endphp
@section('title')
    Kargo | Invoice
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.components.error');
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 invoice_buttons">
                @include('members.partials.buttons')
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($countries as $country)
                                <div class="tab" data-country-id="{{$country->id}}">
                                    <button class="tablinks @if($loop->first) active @endif" onclick="openCity(event, 'country-{{$country->id}}')">
                                        <img src="{{url('/front/image/order-TR.png')}}">
                                        <span class="dis_no">{{$country->name}}</span>
                                    </button>
                                </div>
                                <form class="border_bar" action="{{route('orders.store')}}" method="POST">
                                    @csrf
                                    <div id="country-{{$country->id}}" class="tabcontent active" style="@if($loop->first) display: block; @endif">
                                        <input type="hidden" name="country_id" value="{{$country->id}}">

                                        <div class="row container-order">
                                            <div class="col-md-7 col-sm-7 mb-4">
                                                <input type="text" name="link[]" value="{{old('link')}}" placeholder="Məhsul linki *" class="w-100 courier_input" required>
                                            </div>

                                            <div class="col-md-5 col-sm-5 mb-4">
                                                <input type="number" name="price[]" placeholder="Məbləğ(TL) *" class="w-100 courier_input" required>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-sm-5 mb-4">
                                                <h5><strong>Türkiyə içi kargo *</strong></h5>
                                                <select class="courier_input w-100" name="has_cargo[]">
                                                    <option selected value="{{\App\OrderItem::HAS_CARGO_FALSE}}">Xeyir !</option>
                                                    <option value="{{\App\OrderItem::HAS_CARGO_TRUE}}">Bəli !</option>
                                                </select>
                                            </div>

                                            <div class="col-md-8 col-sm-8 p-0">
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr hidden ">
                                                    <h5><strong>Karqo məbləği *</strong></h5>
                                                    <input type="number" name="cargo[]" class="w-100 courier_input" value="0">
                                                </div>
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                                                    <h5><strong>Cəmi(+{{$taxOrder}}%)</strong></h5>
                                                    <input type="number" name="total[]" class="w-100 courier_input" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 p-0">
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                                                    <h5><strong>Sayı *</strong></h5>
                                                    <input type="number" min="1" value="1" name="quantity[]" placeholder="Sayı *" class="w-100 courier_input" required="">
                                                </div>
                                                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                                                    <h5><strong>Ölçü *</strong></h5>
                                                    <input type="text" name="specification[]" placeholder="Sayı *" class="w-100 courier_input" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-0">
                                                <textarea class="courier_textare" name="description[]" placeholder="Məhsulun detalları"></textarea>
                                            </div>

                                            <div class="col-md-12 text-right">
                                                <button type="button" data-country-id="{{$country->id}}" class="courier_button mr-4 btn-add-container-order" style="width: auto;">Yeni link əlavə et<i
                                                        class="fas fa-plus ml-3"></i></button>

                                                <button type="button" class="invoice_button btn-remove-container-order">Linki sil<i class="fas fa-trash-alt ml-3"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="border_sh right_time">
                    <div class="tooltip"><span class="fa-fw select-all fas m-0 mr-0"></span>
                        <span class="tooltiptext">
                    Bu, Sizin Kargo.az vasitəsilə son 30 gündə ölkəyə gətirdiyiniz bağlamaların məhsul dəyəri və çatdırılma haqqı üçün ödədiyiniz məbləğdir. Qeyd edək ki, qanunvericiliyə görə 30 gün ərzində şəxsi istifadə üçün gətirilmiş poçt yüklərinin dəyəri və bunun üçün ödənmiş çatdırılma haqqı toplam 300 dolları keçdikdə gömrük rüsumu tətbiq edilir.</span>
                    </div>
                    <div style="clear: both;"></div>

                    <span id="answer1" style="display: block;">
                          <h4 class="text-center mt-0"><strong>Son 30 gün</strong></h4>
                          <div class="timer">
                            <svg class="rotate" viewBox="0 0 250 250">
                              <path id="loader" transform="translate(125, 125)"
                                    d="M 0 0 v -125 A 125 125 1 1 1 -113.28847337958123 -52.82728271758745 z"></path>
                            </svg>
                            <div class="dots">
                              <span class="time deg0"></span>
                              <span class="time deg45"></span>
                              <span class="time deg90"></span>
                              <span class="time deg135"></span>
                            </div>
                          </div>
                          <div class="spin-div relative">
                              <span id="procent">0.00</span>
                          </div>
                          <div style="clear: both;"></div>
                          <div class="text-center procent_dolar"><h4
                                  class="mb-0"><strong>0.00 <sup>$</sup></strong></h4></div>
                      </span>
                    <span id="text1"></span>

                </div>
                <div class="border_sh mt-5">
                    <h4 class="text-center"><strong>Sifariş et</strong></h4>
                    <div class="danger">
                        <form action="">
                            <input type="radio" id="kart" checked name="payment_type" value="{{\App\Order::PAYMENT_TYPE_ONLINE}}">
                            <label for="kart">
                                <span class="exp">Kart ilə ödəniş </span> <br> <span class="description">( İstənilən kredit və ya debet kartı ilə ödəniş edə bilərsiniz )
                        </span></label><br>
                            <div style="clear: both;"></div>
                            <input type="radio" id="balance" name="payment_type" value="{{\App\Order::PAYMENT_TYPE_CASH}}">
                            <label for="balance">
                                <span class="exp">TL balansı ilə ödəniş </span> <br>
                                <span class="description">( TL balansınızda kifayət qədər vəsait varsa, ödəniş edə bilərsiniz <br><b>TL balansınız: 0.00TL</b> )
                            </span></label><br>
                            <div style="clear: both;"></div>
                        </form>
                    </div>
                    <div class="price_kal mt-5">
                        <span class="text-left float-left">Cəmi: </span>
                        <span class="text-right">
                          <h3><strong>300 TL</strong></h3>
                      </span>
                    </div>
                    <div class="mt-5">
                        <h5><strong>Çatdırılma ofisi *</strong></h5>
                        <select class="@error('region_id') is-invalid @enderror w-100 courier_input "
                                name="region_id" value="{{ old('region_id') }}">
                            @foreach($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <button id="btn-save-order" class="order_button w-100 ml-0">Ödəniş et</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')
    <script type="text/x-handlebars-template" id="template-order">
        <div class="row container-order">
            <br>
            <hr>
            <br>
            <div class="col-md-7 col-sm-7 mb-4">
                <input type="text" name="link[]" placeholder="Məhsul linki *" class="w-100 courier_input" required>
            </div>

            <div class="col-md-5 col-sm-5 mb-4">
                <input type="number" name="price[]" placeholder="Məbləğ(TL) *" class="w-100 courier_input" required>
            </div>

            <div class="col-md-4 col-sm-4 col-sm-5 mb-4">
                <h5><strong>Türkiyə içi kargo *</strong></h5>
                <select class="courier_input w-100" name="has_cargo[]">
                    <option selected value="{{\App\OrderItem::HAS_CARGO_FALSE}}">Xeyir !</option>
                    <option value="{{\App\OrderItem::HAS_CARGO_TRUE}}">Bəli !</option>
                </select>
            </div>

            <div class="col-md-8 col-sm-8 p-0">
                <div class="col-md-6 col-xs-6 mb-4 courier_dr hidden ">
                    <h5><strong>Karqo məbləği *</strong></h5>
                    <input type="number" name="cargo[]" class="w-100 courier_input" value="0">
                </div>
                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                    <h5><strong>Cəmi(+$taxOrder%)</strong></h5>
                    <input type="number" name="total[]" class="w-100 courier_input" readonly>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 p-0">
                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                    <h5><strong>Sayı *</strong></h5>
                    <input type="number" value="1" name="quantity[]" placeholder="Sayı *" class="w-100 courier_input" required="">
                </div>
                <div class="col-md-6 col-xs-6 mb-4 courier_dr">
                    <h5><strong>Ölçü *</strong></h5>
                    <input type="text" name="specification[]" placeholder="Sayı *" class="w-100 courier_input" required="">
                </div>
            </div>

            <div class="col-md-12 mt-0">
                <textarea class="courier_textare" name="description[]" placeholder="Məhsulun detalları"></textarea>
            </div>

            <div class="col-md-12 text-right">
                <button type="button" class="courier_button mr-4 btn-add-container-order" style="width: auto;">Yeni link əlavə et<i class="fas fa-plus ml-3"></i></button>
                <button type="button" class="invoice_button btn-remove-container-order">Linki sil<i class="fas fa-trash-alt ml-3"></i></button>
            </div>
        </div>










    </script>

    <script>
        $(document).ready(function () {
            var countryId = $('div[class="tab"]').val();
            var taxOrder = {{$taxOrder}};

            // change select
            $(document).on('change', 'select[name="has_cargo[]"]', function () {
                $(this)
                    .closest('div')
                    .next()
                    .children()[0]
                    .classList
                    .toggle('hidden');
            });

            // add row
            $(document).on('click', '.btn-add-container-order', function () {
                if ($(this).data('country-id') !== undefined) {
                    countryId = $(this).data('country-id');
                }

                $('#country-' + countryId).append(
                    $('#template-order').html()
                )

                $(this).fadeOut();
            });

            // remove row
            $(document).on('click', '.btn-remove-container-order', function () {
                var containerCountry = $('#country-' + countryId);

                if (containerCountry.children('div').children.length > 1) {
                    $(this)
                        .closest('div .container-order')
                        .remove();
                }

                containerCountry
                    .children('div')
                    .last()
                    .find('.btn-add-container-order')
                    .fadeIn();
            })

            // save order
            $('#btn-save-order').click(function () {
                var containerCountry = $('#country-' + countryId);

                containerCountry.closest('form').submit();
            });


            var totalPriceOrder = function (blurInput) {
                var parent = blurInput.closest('div .container-order');

                var price = parseFloat(parent.find('input[name="price[]"]').val());
                var cargo = parseFloat(parent.find('input[name="cargo[]"]').val());
                var quantity = parseInt(parent.find('input[name="quantity[]"]').val());

                quantity = quantity === 0 ? 1 : quantity

                var total = price * quantity;

                var percentage = ((taxOrder / 100) * total);

                return (cargo + total + percentage);
            }

            $('input[name="price[]"], input[name="cargo[]"], input[name="quantity[]"]').blur(function () {
                console.log(totalPriceOrder($(this)))
            });

        })
    </script>
@endsection

@extends('layout.layout')
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
                <a href="invoice.html" class="invoice_button">BƏYAN ET</a>
                <a href="order.html" class="order_button">SİFARİŞ ET</a>

            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($countries as $country)
                                <div class="tab">
                                    <button class="tablinks" onclick="openCity(event, 'country-{{$country->id}}')"><img
                                            src="{{url('/front/image/order-TR.png')}}"><span
                                            class="dis_no">{{$country->name}}</span>
                                    </button>
                                </div>
                                <form class="border_bar" action="{{route('invoices.store')}}" method="POST">
                                    @csrf
                                    <div id="country-{{$country->id}}" class="tabcontent" style="display: none;">
                                        <input type="hidden" name="country_id" value="{{$country->id}}">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 mb-5">
                                                <input type="text" name="shop" value="{{ old('shop') }}"
                                                       placeholder="Mağaza adı *"
                                                       class=" @error('shop') is-invalid @enderror w-100 courier_input"
                                                       required="">
                                                @error('shop')
                                                <br>
                                                <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-6 mb-5">
                                                <input type="text" name="product_type" value="{{ old('product_type') }}"
                                                       placeholder="Bağlamadakı məhsulun növü *"
                                                       class="@error('product_type') is-invalid @enderror w-100 courier_input"
                                                       required="">
                                                @error('product_type')
                                                <br>
                                                <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-xs-12"></div>
                                            <div class="col-md-4 col-sm-6 mb-4">
                                                <input type="number" name="quantity" value="{{ old('quantity') }}"
                                                       placeholder="Bağlamadakı məhsulun sayı *"
                                                       class=" @error('quantity') is-invalid @enderror w-100 courier_input"
                                                       required="">
                                                @error('quantity')
                                                <br>
                                                <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 col-sm-6 mb-4">
                                                <input type="number" name="price" value="{{ old('price') }}"
                                                       placeholder="Qiyməti (tl) * "
                                                       class="@error('price') is-invalid @enderror w-100 courier_input"
                                                       required="">
                                                @error('price')
                                                <br>
                                                <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 col-sm-6 mb-4">
                                                <input type="number" name="order_track" value="{{ old('order_track') }}"
                                                       placeholder="Sifarişin İzləmə kodu * "
                                                       class="@error('order_track') is-invalid @enderror w-100 courier_input"
                                                       required="">
                                                @error('order_track')
                                                <br>
                                                <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-xs-12"></div>
                                            <div class="col-md-6 col-sm-6 col-sm-5 mb-6">
                                                <h5><strong>Çatdırılma ofisi *</strong></h5>
                                                <select class="@error('region_id') is-invalid @enderror w-100"
                                                        name="region_id" value="{{ old('region_id') }}">
                                                    @foreach($regions as $region)
                                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h5><strong>Sifarişin verilmə tarixi *</strong></h5>
                                                <div class="col-md-12  courier_dr brit_year pl-0">
                                                    <input type="date" name="order_date" value="{{ old('order_date') }}"
                                                           class="@error('order_date') is-invalid @enderror w-100 courier_input"
                                                           required="">
                                                    @error('order_date')
                                                    <br>
                                                    <span class="invalid-feedback" style="color: #b7474b " role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-0">
                                            <textarea class="courier_textare" name="description"
                                                      placeholder="Bağlamanıza aid qeydləriniz varsa yazın">{{ old('description') }}</textarea>
                                            </div>
                                            <div class="col-md-12">
                                                {{--                                            <input type="file" name="" class="courier_file float-left mr-5">--}}
                                                <button class="btn courier_button" type="submit">Göndər</button>
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

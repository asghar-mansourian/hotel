@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('member.invoice_title')}}
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
                            <div class="tab">
                                @foreach($countries as $country)
                                    <button class="tablinks @if($loop->first) active @endif"
                                            onclick="openCity(event, 'country-{{$country->id}}')"><img
                                            src="{{url("images/{$country->flag}")}}" width="20" alt="flag"><span
                                            class="dis_no">{{$country->name}}</span>
                                    </button>
                                @endforeach
                            </div>
                            <div class="border_bar">
                                @foreach($countries as $country)

                                    <form action="{{route('invoices.store')}}" method="POST" id="country-{{$country->id}}" class="tabcontent"
                                          style="@if($loop->first) display: block; @endif">
                                        @csrf
                                        <input type="hidden" name="country_id" value="{{$country->id}}">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 mb-5">
                                                <input type="text" name="shop" value="{{ old('shop') }}"
                                                       placeholder="{{__('member.invoiceName')}} *"
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
                                                       placeholder="{{__('member.productType')}} *"
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
                                                       placeholder="{{__('member.productNumber')}} *"
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
                                                       placeholder="{{__('member.price')}} ({{$country->currency}}) * "
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
                                                       placeholder="{{__('member.orderTrackingCode')}} * "
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
                                                <h5><strong>{{__('member.deliveryoffice')}} *</strong></h5>
                                                <select class="@error('branch_id') is-invalid @enderror w-100 courier_input "
                                                        name="branch_id">
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}" @if(auth()->user()->branch_id == $branch->id) selected @endif>{{$branch->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <h5><strong>{{__('member.dateofordering')}} *</strong></h5>
                                                <div class="col-md-12  courier_dr brit_year pl-0">
                                                    <input type="date" name="order_date" id="datePicker" value="{{ old('order_date')  }}"
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
                                                      placeholder="{{__('member.productAbout')}}">{{ old('description') }}</textarea>
                                            </div>
                                            <div class="col-md-12">
                                                {{--                                            <input type="file" name="" class="courier_file float-left mr-5">--}}
                                                <button class="btn courier_button" type="submit">{{__('member.send')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="border_sh mt-5 text-center">
                    <h4><strong>{{__('member.attention')}} !</strong></h4>
                    <div class="text-center">
                        {{__('member.attentiondesc')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')
    <script>
        Date.prototype.toDateInputValue = (function () {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
        $(document).ready(function () {
            $('#datePicker').val(new Date().toDateInputValue());
        })
    </script>

@endsection

@extends('members.layout')
@section('title')
    {{__('member.site_name')}}| {{__('member.invoice_title')}}
@endsection

@section('styles')

    <style>
        .filterDiv_ul ul li {
            width: 13.99%;
        }

        .filterDiv ul li {
            width: 13.99%;
        }

        nav li {
            float: none !important;
        }

        /*    start order tracking popup style*/
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .card .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 11%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step.deactive:before {
            background: #ddd !important;
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            border: 2px solid #ee5435;
        }

        .track .step.deactive .icon {
            border: 2px solid gainsboro;
        }

        .track .step.active .icon span {
            background-color: #ee5435 !important;
        }

        .track .step.deactive .icon span {
            background-color: inherit !important;
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 800;
            color: #e44a4a
        }

        .track .step.deactive .text {
            font-weight: 400;
            color: #333
        }

        .track .text {
            display: block;
            margin-top: 7px;
            font-size: 1rem;
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }
        @media (max-width: 767px) and (min-width: 481px) {
            .filterDiv,
            .filterDiv_ul {
                width: 800px;
                padding: 5px;
            }
        }
        .filterDiv{
            width: 800px;
            padding: 5px;
        }
        .filterDiv_ul {
            width: 800px;
            padding: 5px;
        }
    </style>
@endsection
@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">
        <div class="row">
            <div class="hide-alert">
                @include('admin.components.error')
            </div>

            @foreach($countries as $country)
                @foreach(auth()->user()->invoices->filterViaStatus(request()->query('status'))  as $invoice)
                    {{--            popup edit--}}
                    <div id="invoicepopup-{{$invoice->id}}" class="modal fade bd-example-modal-lg" tabindex="-1"
                         role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="mt-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="tab">
                                                <button class="tablinks @if($loop->first) active @endif"
                                                        onclick="openCity(event, 'country-{{$country->id}}')"><img
                                                        src="{{url("images/{$country->flag}")}}" width="20"
                                                        alt="flag"><span
                                                        class="dis_no">{{$country->name}}</span>
                                                </button>
                                            </div>
                                            <div class="border_bar">

                                                <form action="{{route('invoices.update', $invoice->id)}}" method="POST"
                                                      id="invoice-{{$invoice->id}}" class="tabcontent"
                                                      style="display: block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="country_id" value="{{$country->id}}">
                                                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 mb-5">
                                                            <input type="text" name="shop" value="{{$invoice->shop}}"
                                                                   placeholder="{{__('member.invoiceName')}} *"
                                                                   class=" @error('shop') is-invalid @enderror w-100 courier_input"
                                                                   required="">
                                                            @error('shop')
                                                            <br>
                                                            <span class="invalid-feedback" style="color: #b7474b "
                                                                  role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 mb-5">
                                                            <input type="text" name="product_type"
                                                                   value="{{$invoice->product_type}}"
                                                                   placeholder="{{__('member.productType')}} *"
                                                                   class="@error('product_type') is-invalid @enderror w-100 courier_input"
                                                                   required="">
                                                            @error('product_type')
                                                            <br>
                                                            <span class="invalid-feedback" style="color: #b7474b" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xs-12"></div>
                                                        <div class="col-md-4 col-sm-6 mb-4">
                                                            <input type="number" name="quantity"
                                                                   value="{{ $invoice->quantity }}"
                                                                   placeholder="{{__('member.productNumber')}} *"
                                                                   class=" @error('quantity') is-invalid @enderror w-100 courier_input"
                                                                   required="">
                                                            @error('quantity')
                                                            <br>
                                                            <span class="invalid-feedback" style="color: #b7474b "
                                                                  role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-4">
                                                            <input type="number" name="price"
                                                                   value="{{ $invoice->price }}"
                                                                   placeholder="{{__('member.price')}} ({{$country->currency}}) * "
                                                                   class="@error('price') is-invalid @enderror w-100 courier_input"
                                                                   required="">
                                                            @error('price')
                                                            <br>
                                                            <span class="invalid-feedback" style="color: #b7474b "
                                                                  role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 mb-4">
                                                            <input type="number" name="order_track"
                                                                   value="{{ $invoice->order_track }}"
                                                                   placeholder="{{__('member.orderTrackingCode')}} * "
                                                                   class="@error('order_track') is-invalid @enderror w-100 courier_input"
                                                                   required="">
                                                            @error('order_track')
                                                            <br>
                                                            <span class="invalid-feedback" style="color: #b7474b "
                                                                  role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xs-12"></div>
                                                        {{--<div class="col-md-6 col-sm-6 col-sm-5 mb-6">
                                                            <h5><strong>{{__('member.deliveryoffice')}} *</strong></h5>
                                                            <select
                                                                class="@error('branch_id') is-invalid @enderror w-100 courier_input "
                                                                name="branch_id">
                                                                @foreach($branches as $branch)
                                                                    <option
                                                                        {{$invoice->branch->id == $branch->id ? 'selected' : ''}}
                                                                        value="{{$branch->id}}">{{$branch->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>--}}
                                                        <div class="col-md-6 col-sm-6">
                                                            <h5><strong>{{__('member.dateofordering')}} *</strong></h5>
                                                            <div class="col-md-12  courier_dr brit_year pl-0">
                                                                <input type="date" name="order_date" id="datePicker"
                                                                       value="{{ $invoice->order_date  }}"
                                                                       class="@error('order_date') is-invalid @enderror w-100 courier_input"
                                                                       required="">
                                                                @error('order_date')
                                                                <br>
                                                                <span class="invalid-feedback" style="color: #b7474b "
                                                                      role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-0">
                                            <textarea class="courier_textare" name="description"
                                                      placeholder="{{__('member.productAbout')}}">{{ $invoice->description }}</textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button data-invoice="{{$invoice->id}}"
                                                                    class="update btn courier_button"
                                                                    type="submit">{{__('member.edit')}}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--            end popup--}}

                    {{--start order status popup--}}
                    <div id="orderstatus-{{$invoice->id}}" class="modal fade bd-example-modal-lg" tabindex="-1"
                         role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <article class="card">
                                            <div class="card-body">
                                                <article class="card">
                                                    <div class="card-body row">
                                                        <div class="col"><strong>{{__('member.order_title')}}</strong><br>{{$invoice->order_track}}</div>
                                                        <div class="col"><strong>{{__('member.date')}}</strong> <br>{{$invoice->order_date}}</div>
                                                        <div class="col"><strong>{{__('member.weight')}}</strong> <br>{{$invoice->weight}} kg</div>
                                                        <div class="col"><strong>{{__('member.weight_price')}}</strong> <br>{{$invoice->weight_price}} $</div>
                                                    </div>
                                                </article>
                                                @php
                                                    $num= 10000
                                                @endphp
                                                <div class="track">
                                                    @foreach(\App\Invoice::STATUS_ALL as $k=>$status )
                                                        @php
                                                            if ($status == 'fill_in_box' || $status == 'on_way' || $status == 'customs_inspection' || $status == 'cancel')
                                                            {
                                                                continue;
                                                            }
                                                                $invoice->status === $k ? $num=$loop->index : ''
                                                        @endphp
                                                        <div class="step {{$invoice->status >= $k ? 'active' : 'deactive'}}">
                                                        <span class="icon">
                                                             <span
                                                                 style="background: url(/front/image/ordertracking/{{$status}}.png) no-repeat center ;display: block;width: 100%;height: 100%; border-radius: 50%;"></span>
                                                        </span>
                                                            @php
                                                                $status_trans =  Illuminate\Support\Str::of($status)->studly()->lower()
                                                            @endphp

                                                            @if('in_warehouse' === $status)
                                                                <span class="text"> {{__('member.inwarehose')}}</span>
                                                            @elseif('warehouse_abroad' === $status)
                                                                <span class="text"> {{__('member.warehoseabroad')}}</span>
                                                            @else
                                                                <span class="text"> {{__("member.{$status_trans}")}}</span>
                                                            @endif
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--            end popup--}}
                @endforeach
            @endforeach


            <div class="col-md-12">
                <div class="tab">
                    @foreach($countries as $country)
                        <button class="tablinks
                        @if(request()->query('country') == $country->id) active @endif
                        @if(is_null(request()->query('country')) && $loop->first) active @endif"
                                onclick="openCity(event, 'country-{{$country->id}}')">
                            <img src="{{url("images/{$country->flag}")}}" width="20" alt="flag">
                            <span class="dis_no"> {{__('member.invoice_country_'.$country->id)}}</span>
                        </button>
                    @endforeach
                </div>
                <div class="border_bar">
                    @foreach($countries as $country)
                        <div id="country-{{$country->id}}" class="tabcontent" style="
                        @if(request()->query('country') == $country->id) display: block;  @endif
                        @if(is_null(request()->query('country')) && $loop->first) display: block;  @endif">
                            <div class="row">
                                <!-- Small button groups (default and split) -->
                                {{--<div class="btn-group">
                                    <button class="btn btn-warning btn-sm dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('member.filter')}}
                                    </button>
                                    <div class="dropdown-menu p-2" style="width: 300px;">

                                        <a href="{{url("/invoices?country={$country->id}")}}" style="font-size: 14px; padding: 10px;">
                                            <img style="width: 15px;height: 15px;" src="./front/image/my_order/note.svg">
                                            <span class="dis_no"> {{__('member.all')}}</span><span class="num">
                                                ({{$country->invoices->count()}})
                                            </span>
                                        </a>
                                        <br>
                                        <a href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_PURCHASED)}}" style="font-size: 14px; padding: 10px;">
                                            <img style="width: 15px;height: 15px;" src="./front/image/my_order/cargo.svg">
                                            <span class="dis_no"> {{__('member.purchased')}}</span><span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_PURCHASED)->count()}})
                                            </span>
                                        </a>
                                        <br>
                                        <a href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_WAREHOUSE_ABROAD)}}" style="font-size: 14px; padding: 10px;">
                                            <img style="width: 15px;height: 15px;"
                                                 src="./front/image/my_order/discount.svg">
                                            <span class="dis_no">{{$country->name}}  {{__('member.anbar')}}</span><span
                                                class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_WAREHOUSE_ABROAD)->count()}})
                                            </span>
                                        </a>
                                        <br>
                                        <a href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_IN_WAREHOUSE)}}" style="font-size: 14px; padding: 10px;">
                                            <img style="width: 15px;height: 15px;"
                                                 src="./front/image/my_order/wallet.svg">
                                            <span class="dis_no"> {{__('member.warehouse')}}</span><span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_IN_WAREHOUSE)->count()}})
                                            </span>
                                        </a>
                                        <br>
                                        <a href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_COURIER_DELIVERY)}}" style="font-size: 14px; padding: 10px;">
                                            <img style="width: 15px;height: 15px;"
                                                 src="./front/image/my_order/phone.svg">
                                            <span class="dis_no">{{__('member.courierdelivery')}}</span>
                                            <span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_COURIER_DELIVERY)->count()}})
                                            </span>
                                        </a>
                                        <br>
                                        <a href="{{url("/invoices?country={$country->id}&status=".\App\Invoice::STATUS_COMPLETE)}}" style="font-size: 14px; padding: 10px;">
                                            <img style="width: 15px;height: 15px;"
                                                 src="./front/image/my_order/bill.svg">
                                            <span class="dis_no">{{__('member.complete')}}</span>
                                            <span class="num">
                                                ({{$country->invoices->filterViaStatus(\App\Invoice::STATUS_COMPLETE)->count()}})
                                            </span>
                                        </a>
                                    </div>
                                </div>--}}
                                <br>
                                <div id="scrol_price" style="height: 553px" class="mt-5">
                                    <div id="scrol_price_content">
                                        <div class="filterDiv_ul">
                                            <ul>
                                                <li>{{__('member.order№')}}</li>
                                                <li>{{__('member.orderdate')}}</li>
                                                <li>{{__('member.shop')}}</li>
                                                <li style="width: 14%">{{__('member.weight')}}</li>
                                                <li style="width: 44%">{{__('member.action')}}</li>
                                            </ul>
                                        </div>
                                        @foreach(auth()->user()->invoices()->orderBy('id', 'desc')->get()->where('country_id', $country->id)->filterViaStatus(request()->query('status')) as $invoice)
                                            <div class="filterDiv income">
                                                <ul>
                                                    <li class="green">{{str_repeat('0',6) . $invoice->id}}</li>
                                                    <li>{{date('Y-m-Y',strtotime($invoice->created_at))}}</li>
                                                    <li>
                                                        @if(preg_match('/(http|ftp|mailto)/', $invoice->shop))
                                                            {{explode('.',parse_url($invoice->shop)['host'])[1]}}
                                                        @else
                                                            {{str_limit($invoice->shop, 15)}}
                                                        @endif
                                                    </li>
                                                    <li class="green bold">{{$invoice->weight != 0.00 ? $invoice->weight .' kg' : '-'}}</li>
                                                    @if($invoice->status  === \App\Invoice::STATUS_PURCHASED)
                                                        <li>
                                                            {{--<input type="button" value="Sifarişi izlə" class="btn btn-info">--}}
                                                            <form
                                                                action="{{route('invoices.destroy', ['invoice' => $invoice->id])}}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit" value="{{__('member.delete')}}" class="btn btn-danger">
                                                            </form>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <input type="submit" value="{{__('member.delete')}}" class="btn btn-danger" disabled>
                                                        </li>
                                                    @endif


                                                    <li>
                                                        <input type="button" value="{{__('member.edit')}}" style="    border-radius: 4px;"
                                                               data-invoice="{{$invoice->id}}"
                                                               class="edit btn btn-warning">


                                                    </li>
                                                    <li>
                                                        <input type="button" value="{{__('member.status')}}"
                                                               data-invoice="{{$invoice->id}}"
                                                               class="status btn btn-primary">


                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection
@push('scripts')
    <script>
        function changeProductCategory(id, invoice_id) {
            console.log(id)
            $('#product_category_id_' + invoice_id).val(id);
        }

        function getProductCategoryChild(parent_id, invoice_id) {
            if (parent_id != 'null') {
                $.ajax({
                    url: '/get_product_category_child/' + parent_id,
                    type: 'GET',
                    success: function (response) {
                        productCategoryChild = response.data;
                        if (productCategoryChild.length > 0) {
                            var html = '';
                            for (var i = 0; i < productCategoryChild.length; i++) {
                                html = html + '<option value="' + productCategoryChild[i].id + '">' + productCategoryChild[i].name + '</option>';
                            }
                            $('#child_category_' + invoice_id).empty();
                            $("#child_category_" + invoice_id).append(html);
                            $('#div_child_category_' + invoice_id).css('display', 'block');
                            $('#' + invoice_id).prev().val(productCategoryChild[0].id);
                        } else {
                            $('#' + invoice_id).prev().val(parent_id)
                            $('#div_child_category_' + invoice_id).css('display', 'none');
                        }
                    }
                });
            } else {
                $('#div_child_category_' + invoice_id).css('display', 'none');
                $("#child_category_" + invoice_id).empty();
            }

        }
    </script>
@endpush

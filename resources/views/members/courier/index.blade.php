@extends('members.layout')

@section('title')
    {{__('member.courier')}}
@endsection

@section('main')
    @include('members.partials.top_panel')
    <div class="mt-5">

        <div class="border_sh courier">
            <div class="hide-alert">
                @include('admin.components.error')
                @include('members.partials.validation_errors')
            </div>
            <h2 class="mt-0">{{__('member.courier')}}</h2>
            <form class="row courier" action="{{route('courier.store')}}" method="post">
                @csrf
                <div class="col-md-12"><h3>{{__('member.selectanarea')}}</h3></div>
                <div class="col-md-7 col-sm-7">
                    <h4>{{__('member.city_address')}}</h4>
                    <br>
                    @foreach($stocks as $stock)
                        <input type="radio" id="stock-{{$stock->id}}" @if($loop->first) checked @endif name="stock_id" value="{{$stock->id}}">
                        <label for="stock-{{$stock->id}}">{{$stock->address}}</label><br>
                    @endforeach
                </div>
                <div class="col-md-12 mt-5"></div>
                <div class="col-md-4 col-sm-6">
                    <input type="text" name="district" placeholder="{{__('member.district')}} *" class="w-100 courier_input" required>
                </div>
                <div class="col-md-4 col-sm-6">
                    <input type="text" name="city" placeholder="{{__('member.city')}} " class="w-100 courier_input" required>
                </div>
                <div class="col-md-4 col-sm-6">
                    <input type="street" name="street" placeholder="{{__('member.street')}} *" class="w-100 courier_input" required>
                </div>
                <div class="col-md-12 mt-5"></div>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="home" placeholder="{{__('member.home')}} *" class="w-100 courier_input" required>
                </div>
                <div class="col-md-6 col-sm-6">
                    <input type="number" name="phone" placeholder="{{__('member.phone')}} *" class="w-100 courier_input" required>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="font_black"><h5><strong>{{__('pack_to_order_a_courier')}}</strong></h5></div>
                    <div class="courier_dr">
                        {{__('member.selectinvoices')}}
                        <select multiple class="w-100" name="products[]" required>
                            @foreach($orders as $order)
                                <option value="order-{{$order->id}}">{{$order->id}} {{__('member.order_title')}} {{__('member.bindingnumber')}}</option>
                            @endforeach
                            @foreach($invoices as $invoice)
                                <option value="invoice-{{$invoice->id}}">{{$invoice->id}} {{__('member.invoice_title')}} {{__('member.bindingnumber')}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <textarea placeholder="{{__('member.makeadditionalnotes')}}" row="8" name="address" class="courier_input w-100 h-100p"></textarea>
                </div>
                <div class="col-md-12 button-part mt-5">
                    <button type="submit" class="btn-effect">{{__('member.confirm')}}</button>
                </div>
                <div class="col-md-12 button-part mt-5">
                    <div class="font_black"><h5><strong>{{__('member.courierorderscheduledtime')}}</strong></h5></div>
                    <div class="font_black"><h5><strong>{{__('member.courierworkinghours')}}.</strong></h5></div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

@extends('members.layout')

@section('title')
    {{__('member.site_name')}}| {{__('member.basket')}}
@endsection

@section('main')
    @include('members.partials.top_panel')
@section('styles')
    <style>
        .truncate-paragraph {
            width: 100px;
            text-overflow: ellipsis;
            overflow: hidden;
           }
       </style>
    @endsection
    <div class="mt-5">
        <div class="border_sh courier_out">
            <div class="row">
                <div class="hide-alert">
                    @include('admin.components.error')
                </div>
            </div>
            <table class="table table-striped card-table table-vcenter text-nowrap table-responsive table-bordered table-hover"
            style="width: 100%;
    display: block;
    height: auto;
    overflow-x: scroll;"
            >
                <thead>
                <tr>
                    <th></th>
                    <td>{{__('member.picture')}}</td>

                    <td>{{__('member.link')}}</td>
                    <td>{{__('member.quantity')}}</td>
                    <td>{{__('member.comission')}}</td>
                    <td>{{__('member.price')}}</td>
                    <td>{{__('member.total')}}</td>
                    <td>{{__('member.cargo')}}</td>
                    <th>{{__('member.delete')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($baskets as $basket)
                    @php
                        $crwal = \Illuminate\Support\Facades\DB::table('crawler_websites')->where('link' , $basket->link)->first();


                    @endphp
                    <tr>
                        <td><input type="checkbox" class="clickBasket" data-typePrice="@if($crwal != null) {{  $crwal->type_price   }}@else tl @endif" data-price="{{$basket->total}}" data-value="{{$basket->id}}"></td>

                        <td><img style="" class="img-responsive img-rounded" src="@if($crwal != null) {{ url('images/'.$crwal->photo)   }}@else null @endif" alt=""></td>
                        <td><a href="@if($crwal != null) {{  "https://" .$crwal->name   }} @else {{  $basket->link }} @endif "> @if($crwal != null) {{  $crwal->name   }}@else {{  $basket->link }} @endif</a></td>
                        <td>{{$basket->quantity}}</td>
                        <td>{{abs(($basket->price * $basket->quantity) - $basket->total)}}</td>
                        <td>{{$basket->price}}</td>
                        <td>{{$basket->total}}</td>
                        <td>{{$basket->cargo}}</td>
                        <td class="text-center"><a href="{{url('basket/delete/' .$basket->id )}}"><i class="fas fa-times"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="text-center">
                @if(count($baskets) > 0)
                <input type="hidden" id="finalAmountValue" value="0">
                <h3>{{__('member.finalAmountToPay')}} :
                    <span style="margin-left: 8px;" id="finalAmount">

                    </span>
                </h3>

                <form action="{{route('orders.store')}}" method="post" id="form-basket">
                    @csrf
                    <button class="invoice_button">{{__('member.makepayment')}}</button>
                </form>
                @else
                    <h3>{{__('member.basketempty')}}
                    </h3>
                @endif
            </div>

        </div>
    </div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection


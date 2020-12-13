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
        <table
            class="table table-striped card-table table-vcenter text-nowrap table-responsive table-bordered table-hover"
            style="width: 100%;
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
                    <td><input type="checkbox" class="clickBasket"
                               data-typePrice="@if($crwal != null) {{  $crwal->type_price   }}@else tl @endif"
                               data-price="{{$basket->total}}" data-value="{{$basket->id}}"></td>

                    <td><img style="height: 200px;" class="img-responsive img-rounded"
                             src="@if($crwal != null) {{ url('images/'.$crwal->photo)   }}@else null @endif" alt="">
                    </td>
                    <td>
                        <a href="@if($crwal != null) {{  "https://" .$crwal->name   }} @else {{  $basket->link }} @endif "> @if($crwal != null) {{  $crwal->name   }}@else {{  $basket->link }} @endif</a>
                    </td>
                    <td>{{$basket->quantity}}</td>
                    <td>{{abs(($basket->price * $basket->quantity) - $basket->total)}}</td>
                    <td>{{$basket->price}}</td>
                    <td>{{$basket->total}}</td>
                    <td>{{$basket->cargo}}</td>
                    <td class="text-center"><a href="{{url('basket/delete/' .$basket->id )}}"><i
                                class="fas fa-times"></i></a></td>
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
                    <button id="basketSubmit" class=" invoice_button" style="display: none">{{__('member.makepayment')}}</button>
                </form>
            @else
                <h3>{{__('member.basketempty')}}
                </h3>
            @endif
        </div>
        @if(count($baskets) > 0)
            <div class="text-center" id="basketFooter">

                <input data-target="#polices" onclick="check2(this)" class="@error('terms') is-invalid @enderror"
                       id="terms" type="checkbox" name="terms" required
                       style="vertical-align: middle!important;">
                <label data-target="#polices" data-toggle="modal"
                       style="margin-bottom: 0!important;cursor: pointer; margin-left: 4px!important;vertical-align: middle!important">{{__('member.Agreepolicy')}}</label>
                @error('terms')
                <span class="invalid-feedback"
                      role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        @endif
        <div id="polices" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{__('member.polices')}}</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{__('member.policesList')}}.</p>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button onclick="check(true)" data-dismiss="modal"
                                class="btn btn-primary">{{__('member.Agreepolicy')}}</button>
                        <button onclick="check(false)" class="btn btn-default"
                                data-dismiss="modal">{{__('member.notAcceptPolices')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <script>

            function check(type) {
                if (type){
                    $("#terms").prop("checked", true);
                    $("#basketSubmit").slideDown();
                }


                else{
                    $("#terms").prop("checked", false);
                    $("#basketSubmit").slideUp();

                }
            }
            function check2(type) {
                if ($(type).prop("checked") == true){
                    $("#basketSubmit").slideDown();
                }
                else{
                    $("#basketSubmit").slideUp();
                }


            }
        </script>

    </div>
</div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

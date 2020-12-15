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
        <style>
            tbody tr:nth-child(odd){
                border: 0 !important;
                background-color: #fcfcfc !important; border: 2px solid white !important;
            }
            tbody tr:nth-child(even){
                border: 0 !important;
                background-color: #fff!important;border: 2px solid white !important;
            }
            thead{

                border: 3px solid #fcfcfc;
            }
            thead td{
                background-color: #f4f8fb;

            }
            thead td:nth-child(1){
                border-radius: 20px 0 0 0 ;

            }
            thead td:nth-child(9){
                border-radius: 0  20px 0 0 ;

            }
            td{
                padding: 8px 10px !important;
                vertical-align: middle !important;
            }
            /* Styling Checkbox Starts */
            .checkbox-label {
                display: block;
                position: relative;
                margin: auto;
                cursor: pointer;
                font-size: 22px;
                line-height: 24px;
                height: 24px;
                width: 24px;
                clear: both;
            }

            .checkbox-label input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }

            .checkbox-label .checkbox-custom {
                position: absolute;
                top: 0px;
                left: 0px;
                height: 24px;
                width: 24px;
                background-color: transparent;
                border-radius: 5px;
                transition: all 0.3s ease-out;
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -ms-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
                border: 2px solid #FFFFFF;
            }


            .checkbox-label input:checked ~ .checkbox-custom {
                background-color: #FFFFFF;
                border-radius: 5px;
                -webkit-transform: rotate(0deg) scale(1);
                -ms-transform: rotate(0deg) scale(1);
                transform: rotate(0deg) scale(1);
                opacity:1;
                border: 2px solid #FFFFFF;
            }


            .checkbox-label .checkbox-custom::after {
                position: absolute;
                content: "";
                left: 12px;
                top: 12px;
                height: 0px;
                width: 0px;
                border-radius: 5px;
                border: solid #009BFF;
                border-width: 0 3px 3px 0;
                -webkit-transform: rotate(0deg) scale(0);
                -ms-transform: rotate(0deg) scale(0);
                transform: rotate(0deg) scale(0);
                opacity:1;
                transition: all 0.3s ease-out;
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -ms-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
            }


            .checkbox-label input:checked ~ .checkbox-custom::after {
                -webkit-transform: rotate(45deg) scale(1);
                -ms-transform: rotate(45deg) scale(1);
                transform: rotate(45deg) scale(1);
                opacity:1;
                left: 8px;
                top: 3px;
                width: 6px;
                height: 12px;
                border: solid #009BFF;
                border-width: 0 2px 2px 0;
                background-color: transparent;
                border-radius: 0;
            }



            /* For Ripple Effect */
            .checkbox-label .checkbox-custom::before {
                position: absolute;
                content: "";
                left: 10px;
                top: 10px;
                width: 0px;
                height: 0px;
                border-radius: 5px;
                border: 2px solid #FFFFFF;
                -webkit-transform: scale(0);
                -ms-transform: scale(0);
                transform: scale(0);
            }

            .checkbox-label input:checked ~ .checkbox-custom::before {
                left: -3px;
                top: -3px;
                width: 24px;
                height: 24px;
                border-radius: 5px;
                -webkit-transform: scale(3);
                -ms-transform: scale(3);
                transform: scale(3);
                opacity:0;
                z-index: 999;
                transition: all 0.3s ease-out;
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -ms-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
            }




            /* Style for Circular Checkbox */
            .checkbox-label .checkbox-custom.circular {
                border-radius: 50%;
                border: 2px solid #efefef;
            }

            .checkbox-label input:checked ~ .checkbox-custom.circular {
                background-color: #FFFFFF;
                border-radius: 50%;
                border: 2px solid #FFFFFF;
            }
            .checkbox-label input:checked ~ .checkbox-custom.circular::after {
                border: solid #009BFF;
                border-width: 0 2px 2px 0;
            }
            .checkbox-label .checkbox-custom.circular::after {
                border-radius: 50%;
            }

            .checkbox-label .checkbox-custom.circular::before {
                border-radius: 50%;
                border: 2px solid #FFFFFF;
            }

            .checkbox-label input:checked ~ .checkbox-custom.circular::before {
                border-radius: 50%;
            }
            .btn-custom-green{
                color: #00c99c;
                border: solid 1px #00c99c;
                border-radius: 5px;
                padding: 8px 18px 7px 16px;
                background: #fff;
                cursor: pointer;
                margin-left: 30px;
                transition: all .2s;
            }
            .btn-custom-green:hover{
                color: #fff;
                border-radius: 5px;
                background: #00c99c;
                transition: all .2s;

            }
        </style>
        <div class="" style="padding: 10px 10px 40px 10px;position: relative">
            <h4   style="display:inline;font-weight: bold;color: black!important;">{{__('member.orderforme')}}</h4>
            <a href="{{url('orders/create')}}" class="btn-custom-green" style="position: absolute;right: 20px;bottom: 33px;font-size: 13px;">
                <i class="fa fa-shopping-cart"></i>
                {{__('member.addaneworder')}}
            </a>
        </div>
        <table
            class="table table-striped card-table table-vcenter text-nowrap table-responsive  "
            style="width: 100%;
    height: auto;
    overflow-x: scroll;"
        >
            <thead style="background-color: #f4f8fb!important;">
            <tr>
                <td>
                    <label class="checkbox-label">
                        <input type="checkbox" id="all-basket-select"
                               data-typePrice=""
                               data-price="" data-value="">
                        <span class="checkbox-custom circular"></span>
                    </label>
                </td>
{{--                <td>{{__('member.picture')}}</td>--}}

{{--                <td>{{__('member.link')}}</td>--}}
{{--                <td>{{__('member.quantity')}}</td>--}}
{{--                <td>{{__('member.comission')}}</td>--}}
{{--                <td>{{__('member.price')}}</td>--}}
{{--                <td>{{__('member.total')}}</td>--}}
{{--                <td>{{__('member.cargo')}}</td>--}}
{{--                <th>{{__('member.delete')}}</th>--}}


                                <td>link</td>
                <td>picture</td>

                <td>quantity</td>
                                <td>comission</td>
                                <td>price</td>
                                <td>total</td>
                                <td>cargo</td>
                                <td>delete</td>
            </tr>
            </thead>
            <tbody>
            @foreach($baskets as $basket)
                @php
                    $crwal = \Illuminate\Support\Facades\DB::table('crawler_websites')->where('link' , $basket->link)->first();


                @endphp
                <tr>
                    <td>

                    <label class="checkbox-label">
                        <input type="checkbox"  class="clickBasket"
                               data-typePrice="@if($crwal != null) {{  $crwal->type_price   }}@else tl @endif"
                               data-price="{{$basket->total}}" data-value="{{$basket->id}}">
                        <span class="checkbox-custom circular"></span>
                    </label>

                    <td><img style="height: 200px;" class="img-responsive img-rounded"
                             src="@if($crwal != null) {{ url('images/'.$crwal->photo)   }}@else null @endif" alt="">
                    </td>
                    <td>
                        <a href="@if($crwal != null) {{  "https://" .$crwal->name   }} @else {{  $basket->link }} @endif "
                           target="_blank"> @if($crwal != null) {{  $crwal->name   }}@else {{  str_limit($basket->link, 15) }} @endif</a>
                    </td>
                    <td>{{$basket->quantity}}</td>
                    <td>{{abs(($basket->price * $basket->quantity) - $basket->total)}}</td>
                    <td>{{$basket->price}}</td>
                    <td>{{$basket->total}}</td>
                    <td>{{$basket->cargo}}</td>
                    <td class="text-center"><a href="{{url('basket/delete/' .$basket->id )}}" style="color: #7b7b93!important;"><i
                                class="fas fa-times"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            @if(count($baskets) > 0)
                <div class="text-left" id="basketFooter">

                    <input data-target="#polices" onclick="check2(this)" class="@error('terms') is-invalid @enderror"
                           id="terms" type="checkbox" name="terms" required
                           style="vertical-align: middle!important;">
                    <label data-target="#polices" data-toggle="modal"
                           style="color:#15b2ec!important;margin-bottom: 0!important;cursor: pointer; margin-left: 4px!important;vertical-align: middle!important">{{__('member.Agreepolicy')}}</label>
                    @error('terms')
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            @endif
            @if(count($baskets) > 0)
                <input type="hidden" id="finalAmountValue" value="0">
                <h4>{{__('member.finalAmountToPay')}} :
                    <span style="margin-left: 8px;font-weight: bold;font-size: 15px;font-size: 21px;
    color: black;" id="finalAmount">

                    </span>
                </h4>

                <form action="{{route('orders.store')}}" method="post" id="form-basket">
                    @csrf
                    <button id="basketSubmit" class=" invoice_button" style="display: none;background-color: #e6a41a!important;border-radius: 15px">{{__('member.makepayment')}}</button>
                </form>
            @else
                <h3>{{__('member.basketempty')}}
                </h3>
            @endif
        </div>

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
                    $("#basketSubmit").fadeIn();
                }


                else{
                    $("#terms").prop("checked", false);
                    $("#basketSubmit").fadeOut();

                }
            }
            function check2(type) {
                if ($(type).prop("checked") == true){
                    $("#basketSubmit").fadeIn();
                }
                else{
                    $("#basketSubmit").fadeOut();
                }


            }
        </script>

    </div>
</div>
@endsection

@section('menuItem')
    @include('members.partials.menu_sidebar')
@endsection

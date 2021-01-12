@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}}  | {{__('admin.ordertitle')}}
@endsection

@section('styleCustom')
    @component('admin.components.pagination')
    @endcomponent
@endsection

@section('main')
    <div class="row">

        <div class="col-12">
            @include('admin.components.error')
        </div>
        <div class="col-12" id="">
            @component('admin.components.panel')
                @slot('header')
                    <h3 class="card-title" style="display: inline">
                        <i class="fe fe-mail   mr-2"></i>{{__('admin.ordertableheader')}}
                    </h3>
                @endslot

                @slot('items')
                    <div class="table-responsive">

                        <table
                            data-page-length='{{$counts}}' id="tableList"
                            class="table table-striped card-table table-vcenter text-nowrap table-bordered table-hover">
                            <thead>
                            <th style="text-align: center;margin-right: 0px; margin-left: 0px">Id</th>
                            <th style="text-align: center;margin-right: 0px; margin-left: 0px">Order Id</th>
                            <th style="text-align: center">Type</th>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">User Id</th>
                            <th style="text-align: center">Website</th>
                            <th style="text-align: center">Price</th>
                            <th style="text-align: center">Balance Cargo</th>
                            <th style="text-align: center">Date and Time</th>
                            {{--                            <th style="text-align: center">{{__('admin.tableaction')}}</th>--}}
                            </thead>

                            <tbody class="mytbody">

                            @foreach($orders as $record)
                                @php
                                    if($record->type == 1)
                             {
                                          $type = "orders";
                                      $type2 = "order-items";
                             }

                                  if($record->type == 2)
                                  {
                                          $type = "invoices";
                                      $type2 = "invoices";
                                  }
                                @endphp

                                <tr>
                                    <td class="text-center">
                                            {{$record->id}}

                                    </td>
                                    <td class="text-center">
                                            @if($record->type == 1)
                                                {{$record->order_id}}
                                            @else
                                                -
                                            @endif

                                    </td>
                                    <td class="text-center">
                                        @if($record->type == 1)
                                                <div class=""> Order</div>
                                        @endif
                                        @if($record->type == 2)

                                                <div class="">Invoice</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                            {{$record->name . ' ' . $record->family}}
                                    </td>
                                    <td class="text-center">
                                            {{$record->user_id}}
                                    </td>
                                    @php
                                        if ($record->type == 1)
                                        {
                                            $url_info = parse_url($record->website);
                                        $url_info = $url_info['host'];
                                        }
                                        else{
                                            if(preg_match('/(http|https|www|ftp|mailto)/', $record->website))
                                            {
                                                $url_info = explode('.',parse_url($record->website)['host'])[1];
                                            }else{
                                                $url_info = str_limit($record->website, 15);
                                            }
                                        }
                                    @endphp
                                    <td class="text-center">
                                            {{$url_info}}
                                    </td>
                                    <td class="text-center">
                                            {{$record->price . ' ₺'}}
                                    </td>
                                    <td class="text-center">
                                        @if($record->balance_usd <= 0)
                                            <span style="color: red">-{{\App\lib\Helpers::formatPrice($record->balance_usd)}}  <sup>$</sup></span>
                                        @else
                                            <span style="color: green">{{\App\lib\Helpers::formatPrice($record->balance_usd)}} <sup>$</sup></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                            {{$record->date}}
                                    </td>

                                </tr>


                            @endforeach

                            </tbody>
                        </table>

                        <style>
                            nav {
                                text-align: center;
                            }
                            .dt-buttons{
                                float: right;
                            }
                        </style>


                    </div>

                @endslot


            @endcomponent
        </div>

    </div>
@endsection


@section('scriptCustom')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <input type="hidden" id="allNumberOfCount" value="{{$counts}}">
    <script>


        $(document).ready(function () {
            $('#tableList').DataTable( {
                searching: false,
                paging: false,
                dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );


        });
    </script>
    @component('admin.components.script.sweetAlertScript')
        @slot('url')
            ../../../admin/orders/
        @endslot
    @endcomponent
    {{--    @component('admin.components.script.paginatorScript' , ['type' => 2])--}}
    {{--        @slot('paginatorUrl')--}}
    {{--            orders/load?page=--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.searchScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/orders/search/--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.sortScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/orders/sort/--}}

    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.sortTableScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/orders/sort/--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.filterScript')--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.showScript')--}}
    {{--    @endcomponent--}}
@endsection



@section('crumb')

@endsection



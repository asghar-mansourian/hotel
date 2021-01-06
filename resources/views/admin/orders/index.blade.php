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


        {{--        <div class="col-4">--}}
        {{--            @component('admin.components.search')--}}
        {{--                @slot('url')--}}
        {{--                    {{url('admin/orders/search')}}--}}
        {{--                @endslot--}}
        {{--            @endcomponent--}}
        {{--        </div>--}}


        {{--        <div class="col-lg-4">--}}
        {{--            @component('admin.components.filter')--}}
        {{--                @slot('options')--}}
        {{--                    <option value="" selected="">انتخاب کنید ...</option>--}}
        {{--                    <option value="status|1">وضعیت حساب : فعال</option>--}}
        {{--                    <option value="status|0">وضعیت حساب : غیر فعال</option>--}}
        {{--                @endslot--}}
        {{--                @slot('url')--}}
        {{--                    {{url('admin/orders/filter')}}--}}
        {{--                @endslot--}}
        {{--            @endcomponent--}}
        {{--        </div>--}}

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
                            <th style="text-align: center">Id</th>
                            <th style="text-align: center">Type</th>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">Website</th>
                            <th style="text-align: center">Price</th>
                            <th style="text-align: center">Date and Time</th>
                            {{--                            <th style="text-align: center">{{__('admin.tableaction')}}</th>--}}
                            </thead>
                            <thead>
                            <th id="filter_col1" data-column="0">
                                <input style="width: 50px!important;" type="text" class="column_filter"
                                       id="col0_filter">
                            </th>
                            <th id="filter_col2" data-column="1">
                                <input style="width: 120px!important;" type="text" class="column_filter"
                                       id="col1_filter">
                            </th>
                            <th id="filter_col3" data-column="2">
                                <input style="width: 120px!important;" type="text" class="column_filter"
                                       id="col2_filter">
                            </th>
                            <th id="filter_col4" data-column="3">
                                <input style="width: 150px!important;" type="text" class="column_filter"
                                       id="col3_filter">
                            </th>
                            <th id="filter_col5" data-column="4">
                                <input style="width: 80px!important;" type="text" class="column_filter"
                                       id="col4_filter">
                            </th>
                            <th id="filter_col6" data-column="5">
                                <input style="width: 150px!important;" type="text" class="column_filter"
                                       id="col5_filter">
                            </th>
                            {{--                            <th id="filter_col7" data-column="6">--}}
                            {{--                            </th>--}}

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
                                    <td>
                                        <a href="{{url('admin/' . $type2 . '/show/' . $record->id . '?status=' . request()->get('status') ?? '0')}}">
                                            {{$record->id}}
                                        </a>

                                    </td>
                                    <td>
                                        @if($record->type == 1)
                                            <a href="{{url('admin/' . $type2 . '/show/' . $record->id. '?status=' . request()->get('status') ?? '0')}}">
                                                <div class=""> Order</div>
                                            </a>
                                        @endif
                                        @if($record->type == 2)
                                            <a href="{{url('admin/' . $type2 . '/show/' . $record->id. '?status=' . request()->get('status') ?? '0')}}">

                                                <div class="">Invoice</div>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/' . $type2 . '/show/' . $record->id. '?status=' . request()->get('status') ?? '0')}}">
                                            {{$record->name . ' ' . $record->family}}
                                        </a>
                                    </td>
                                    @php
                                        if ($record->type == 1)
                                        {
                                            $url_info = parse_url($record->website);
                                        $url_info = $url_info['host'];
                                        }
                                        else{
                                            $url_info = $record->website;
                                        }
                                    @endphp
                                    <td>
                                        <a href="{{url('admin/' . $type2 . '/show/' . $record->id. '?status=' . request()->get('status') ?? '0')}}">
                                            {{$url_info}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/' . $type2 . '/show/' . $record->id. '?status=' . request()->get('status') ?? '0')}}">
                                            {{$record->price . ' ₺'}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{url('admin/' . $type2 . '/show/' . $record->id. '?status=' . request()->get('status') ?? '0')}}">
                                            {{$record->date}}
                                        </a>
                                    </td>


                                    {{--                                    <td class="text-nowrap text-center">--}}

                                    {{--                                        <a href="{{url('admin/' . 'order-items' . '/edit/' . $record->id . '/' . $type2)}}"--}}
                                    {{--                                           class="btn btn-sm btn-success "--}}
                                    {{--                                           data-value="{{$record->id}}"--}}
                                    {{--                                        >--}}
                                    {{--                                            <i class="fa fa-pencil "></i>--}}
                                    {{--                                        </a>--}}


                                    </td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>

                        <style>
                            nav {
                                text-align: center;
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
    <input type="hidden" id="allNumberOfCount" value="{{$counts}}">
    <script>
        {{--        $(document).ready(function () {--}}
        {{--            $('#tableList').DataTable();--}}
        {{--        });--}}

        function filterGlobal() {
            $('#tableList').DataTable().search(
                $('#global_filter').val(),
                $('#global_regex').prop('checked'),
                $('#global_smart').prop('checked')
            ).draw();
        }

        function filterColumn(i) {

            $('#tableList').DataTable().column(i).search(
                $('#col' + i + '_filter').val(),
                $('#col' + i + '_regex').prop('checked'),
                $('#col' + i + '_smart').prop('checked')
            ).draw();
        }

        $(document).ready(function () {
            $('#tableList').DataTable();
            $('#tableList').DataTable().order([[5, 'desc']]).draw();

            $('input.global_filter').on('keyup click', function () {
                filterGlobal();
            });

            $('input.column_filter').on('keyup click', function () {

                filterColumn($(this).parent().attr('data-column'));
            });


            $("#tableList_filter").hide();
            $("select[name='tableList_length']").html("");
            $("select[name='tableList_length']").append("<option value={{$counts}}>all</option> <option value=30>30</option><option value=100>100</option><option value=500>500</option>");
            $("#tableList_length").after().append("<span  style=margin-left:14px> TYPE FILTER:<select id=filterByType><option value=none>None</option> <option value=order>Order</option><option value=invoice>Invoice</option></select> </span>");
            $("#filterByType").on('change', function () {
                if ($(this).val() == "none") {
                    $('#tableList').DataTable().column(1).search(
                        ""
                    ).draw();
                } else {
                    $('#tableList').DataTable().column(1).search(
                        $(this).val(),
                    ).draw();
                }

            })

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



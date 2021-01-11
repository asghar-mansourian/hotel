@php
    $__query_show = '';
        if (isset($query_show)){
            $__query_show = $query_show;
        }
@endphp
<div class="table-responsive" id="tableList">
    <table class="table table-striped card-table table-vcenter text-nowrap table-bordered table-hover">
        <thead>
        <tr>

            @foreach($selects as $select)
                @if(is_array($select))

                    <th>
                        {{__('admin.table' . $select[1].$select[0])}}
                        <div class="" style="display: none!important;">
                            <a class="sort"
                               style="@if($sortType == 'desc' && $sortField == $select[0].'_id') display:none;  @endif"
                               href="#" data-sort-field="{{$select[0].'_id'}}" data-sort-type="desc">
                                <i class="fa fa-arrow-down"
                                   style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                            </a>
                            <a class="sort "
                               style="@if($sortType  == 'asc' && $sortField == $select[1].'_id') display:none;  @endif"
                               href="#" data-sort-field="{{$select[0].'_id'}}" data-sort-type="asc">
                                <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                            </a>
                        </div>

                    </th>
                @else

                    <th>
                        {{__('admin.table' . $select)}}
                        <div class="" style="display: none!important;">

                            <a class="sort"
                               style="@if($sortType == 'desc' && $sortField == $select) display:none;  @endif"
                               href="#" data-sort-field="{{$select}}" data-sort-type="desc">
                                <i class="fa fa-arrow-down"
                                   style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                            </a>
                            <a class="sort"
                               style="@if($sortType  == 'asc' && $sortField == $select) display:none;  @endif"
                               href="#" data-sort-field="{{$select}}" data-sort-type="asc">
                                <i class="fa fa-arrow-up" style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                            </a>
                        </div>
                    </th>
                @endif
            @endforeach
            <th style="text-align: center">{{__('admin.tableaction')}}</th>

        </tr>
        </thead>
        <tbody class="mytbody">

        @foreach($records as $record)
            <tr>
                @foreach($selects as $select)

                    @if($select == "status")
                        <td>
                            @if($record->status)
                                <div class="">  {{__('admin.tableactive')}}</div>
                            @else
                                <div class="">{{__('admin.tabledeactive')}}</div>
                            @endif
                        </td>
                    @elseif($select == "status_type")
                        @if($record->status == 0)
                            <td>
                                <div class=""> ORDERED</div>
                            </td>

                        @endif
                        @if($record->status == 1)
                            <td>
                                <div class=""> WAREHOUSE ABROAD</div>
                            </td>

                        @endif
                        @if($record->status == 2)
                            <td>
                                <div class=""> ON WAY</div>
                            </td>

                        @endif
                        @if($record->status == 3)
                            <td>
                                <div class=""> CUSTOMS INSPECTION</div>
                            </td>
                        @endif
                        @if($record->status == 4)
                            <td>
                                <div class=""> IN WAREHOUSE</div>
                            </td>
                        @endif
                        @if($record->status == 5)
                            <td>
                                <div class=""> COURIER DELIVERY</div>
                            </td>
                        @endif
                        @if($record->status == 6)
                            <td>
                                <div class=""> RETURN</div>
                            </td>
                        @endif
                        @if($record->status == 7)
                            <td>
                                <div class=""> COMPLETE</div>
                            </td>
                        @endif
                    @else
                        @if(is_array($select))
                            @php


                                $count = count($select);
                                if ($count == 2){
                                    $v = isset($record->{$select[0]}->{$select[1]}) ? $record->{$select[0]}->{$select[1]} : '';
                                }
                                else{
                                     $v = isset($record->{$select[0]}->{$select[1]}->{$select[2]}) ? $record->{$select[0]}->{$select[1]}->{$select[2]} : '';
                                }



                            @endphp
                            <td>{{$v}}</td>

                        @else
                            <td>{{$record->$select}}</td>
                        @endif

                    @endif
                @endforeach
                <td class="text-nowrap text-center">

                    @foreach($options as $option)
                        @if($option == 'order')
                            <a href="{{url('admin/orders/?user=' . $record->id)}}"
                               data-toggle="tooltip"
                               title="Order" class="m-l-10 btn btn-primary btn-sm">
                                <i class="fe fe-edit mr-2"></i>{{__('admin.tableorder')}}
                            </a>
                        @endif
                        @if($option == 'assign_role')
                            <a href="{{url('admin/' . $url . '/assign_role/' . $record->id.$__query_show  )}}" data-userid="{{$record->id}}"
                               title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                <i class="fe fe-eye mr-2"></i>{{__('admin.assign_role')}}
                            </a>
                            {{--                            if route needs redirect to single page--}}
                            @isset($key)
                                @if ($key == 'singlePage')
                                    <a href="{{route('blog.shows', $record->slug)}}" data-userid="{{$record->id}}"
                                       title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                        <i class="fe fe-eye mr-2"></i>{{__('admin.assign_role')}}
                                    </a>
                                @else
                                    <a href="{{url('admin/' . $url . '/assign_role/' . $record->id)}}"
                                       data-userid="{{$record->id}}"
                                       title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                        <i class="fe fe-eye mr-2"></i>{{__('admin.assign_role')}}
                                    </a>
                                @endif
                            @endif
                        @endif
                        @if($option == 'show')
                            <a href="{{url('admin/' . $url . '/show/' . $record->id.$__query_show  )}}" data-userid="{{$record->id}}"
                               title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                            </a>
                            {{--                            if route needs redirect to single page--}}
                            @isset($key)
                                @if ($key == 'singlePage')
                                    <a href="{{route('blog.shows', $record->slug)}}" data-userid="{{$record->id}}"
                                       title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                        <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                                    </a>
                                @else
                                    <a href="{{url('admin/' . $url . '/show/' . $record->id)}}"
                                       data-userid="{{$record->id}}"
                                       title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                        <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                                    </a>
                                @endif
                            @endif
                        @endif
                        @if($option == 'edit')
                            <a href="{{url('admin/' . $url . '/edit/' . $record->id)}}"
                               data-toggle="tooltip"
                               title="Edit" class="m-l-10 btn btn-success btn-sm">
                                <i class="fe fe-edit mr-2"></i>{{__('admin.tableedit')}}
                            </a>
                        @endif
                        @if($option == 'delete')
                            <a href="{{url('admin/' . $url . '/delete/' . $record->id)}}"
                               class="btn btn-sm btn-danger delete" data-toggle="tooltip"
                               title data-placement="top" data-value="{{$record->id}}" data-original-title="Delete">
                                <i class="fe fe-trash mr-2"></i>{{__('admin.tabledelete')}}
                            </a>
                        @endif
                        @if($option === 'status_type')
                            <div class="dropdown" style="display:inline!important;">
                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle "
                                        data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fe fe-alert-circle mr-2"></i>change status
                                </button>
                                <div class="dropdown-menu " style="">
                                    <a class="dropdown-item"
                                       href="{{url(request()->getPathInfo().'/status/' . $record->id . '/' . 0 )}}"
                                       style="height: 20px;">ORDERED</a>
                                    <a class="dropdown-item"
                                       href="{{url(request()->getPathInfo().'/status/' . $record->id . '/' . 1 )}}"
                                       style="height: 20px;"> WAREHOUSE ABROAD</a>
                                    <a class="dropdown-item"
                                       href="{{url(request()->getPathInfo().'/status/' . $record->id . '/' . 2 )}}"
                                       style="height: 20px;">ON WAY</a>
                                    <a class="dropdown-item"
                                       href="{{url(request()->getPathInfo().'/status/' . $record->id . '/' . 3 )}}"
                                       style="height: 20px;"> CUSTOMS INSPECTION</a>
                                    <a class="dropdown-item"
                                       href="{{url(request()->getPathInfo().'/status/' . $record->id . '/' . 4 )}}"
                                       style="height: 20px;"> IN WAREHOUSE</a>
                                    <a class="dropdown-item"
                                       href="{{url(request()->getPathInfo().'/status/' . $record->id . '/' . 5 )}}"
                                       style="height: 20px;"> COURIER DELIVERY</a>
                                    <a class="dropdown-item"
                                       href="{{url(request()->getPathInfo().'/status/' . $record->id . '/' . 6 )}}"
                                       style="height: 20px;">RETURN</a>
                                    <a class="dropdown-item"
                                       href="{{url(request()->getPathInfo().'/status/'. $record->id . '/' . 7 )}}"
                                       style="height: 20px;">COMPLETE</a>
                                </div>

                            </div>

                        @endif
                    @endforeach

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

    {{$paginate}}
</div>

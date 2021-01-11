@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.countrytitle')}}
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


{{--        <div class="col-lg-4">--}}
{{--            @component('admin.components.search')--}}
{{--                @slot('url')--}}
{{--                    {{url('admin/countries/search')}}--}}
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
        {{--                    {{url('admin/countries/filter')}}--}}
        {{--                @endslot--}}
        {{--            @endcomponent--}}
        {{--        </div>--}}

        <div class="col-12" id="">
            @component('admin.components.panel')
                @slot('header')
                    <h3 class="card-title" style="display: inline">
                        <i class="fa fa-map   mr-2"></i>{{__('admin.countrytableheader')}}
                    </h3>
                    <a href="{{url('/admin/countries/create')}}" class="btn btn-sm btn-info ml-auto"><i
                            class="fe fe-plus-circle mr-1 "></i> {{__('admin.addcountry')}} </a>
                @endslot

                @slot('items')
                    {{--                    @component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $countries , 'selects' => ['id' , 'name','name_ru' , 'currency' ], 'options' => [ 'edit' , 'delete']])--}}
                    {{--                        @slot('paginate')--}}
                    {{--                            {{$countries->links()}}--}}
                    {{--                        @endslot--}}
                    {{--                        @slot('url')--}}
                    {{--                            countries--}}
                    {{--                        @endslot--}}
                    {{--                    @endcomponent--}}

                    <div class="table-responsive" id="tableList">
                        <table
                            class="table table-striped card-table table-vcenter text-nowrap table-bordered table-hover">
                            <thead>
                            <tr>

                                @foreach(['id' , 'name','name_ru' , 'currency' ] as $select)
                                    @if(is_array($select))

                                        <th>
                                            {{__('admin.table' . $select[1].$select[0])}}
                                            <div class="" style="display: none!important;">
                                                <a class="sort"
                                                   style="@if($sortType == 'desc' && $sortField == $select[0].'_id') display:none;  @endif"
                                                   href="#" data-sort-field="{{$select[0].'_id'}}"
                                                   data-sort-type="desc">
                                                    <i class="fa fa-arrow-down"
                                                       style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                                </a>
                                                <a class="sort "
                                                   style="@if($sortType  == 'asc' && $sortField == $select[1].'_id') display:none;  @endif"
                                                   href="#" data-sort-field="{{$select[0].'_id'}}" data-sort-type="asc">
                                                    <i class="fa fa-arrow-up"
                                                       style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
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
                                                    <i class="fa fa-arrow-up"
                                                       style="color: #384b6e;margin-right: 4px;font-size: 12px;"></i>
                                                </a>
                                            </div>
                                        </th>
                                    @endif
                                @endforeach
                                <th style="text-align: center">{{__('admin.tableaction')}}</th>

                            </tr>
                            </thead>
                            <tbody class="mytbody">

                            @foreach($countries as $record)
                                <tr>
                                    @foreach(['id' , 'name','name_ru' , 'currency' ] as $select)

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
                                                        $v = $record->{$select[0]}->{$select[1]};
                                                    }
                                                    else{
                                                         $v = $record->{$select[0]}->{$select[1]}->{$select[2]};
                                                    }



                                                @endphp
                                                <td>{{$v}}</td>

                                            @else
                                                <td>{{$record->$select}}</td>
                                            @endif

                                        @endif
                                    @endforeach
                                    <td class="text-nowrap text-center">

                                        @foreach([ 'edit' , 'delete'] as $option)
                                            @if($option == 'show')
                                                <a href="{{url('admin/' . 'countries' . '/show/' . $record->id)}}"
                                                   data-userid="{{$record->id}}"
                                                   title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                                    <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                                                </a>
                                                {{--                            if route needs redirect to single page--}}
                                                @isset($key)
                                                    @if ($key == 'singlePage')
                                                        <a href="{{route('blog.shows', $record->slug)}}"
                                                           data-userid="{{$record->id}}"
                                                           title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                                            <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                                                        </a>
                                                    @else
                                                        <a href="{{url('admin/' . 'countries' . '/show/' . $record->id)}}"
                                                           data-userid="{{$record->id}}"
                                                           title="Show" class="m-l-10 show-info btn-sm btn btn-info">
                                                            <i class="fe fe-eye mr-2"></i>{{__('admin.tableshow')}}
                                                        </a>
                                                    @endif
                                                @endif
                                            @endif
                                            @if($option == 'edit')
                                                <a href="{{url('admin/' . 'countries' . '/edit/' . $record->id)}}"
                                                   data-toggle="tooltip"
                                                   title="Edit" class="m-l-10 btn btn-success btn-sm">
                                                    <i class="fe fe-edit mr-2"></i>{{__('admin.tableedit')}}
                                                </a>
                                            @endif
                                            @if($option == 'delete')
                                                @if($record->id != 3)
                                                    <a href="{{url('admin/' . 'countries' . '/delete/' . $record->id)}}"
                                                       class="btn btn-sm btn-danger delete" data-toggle="tooltip"
                                                       title data-placement="top" data-value="{{$record->id}}"
                                                       data-original-title="Delete">
                                                        <i class="fe fe-trash mr-2"></i>{{__('admin.tabledelete')}}
                                                    </a>
                                                @endif
                                            @endif
                                            @if($option === 'status_type')
                                                <div class="dropdown" style="display:inline!important;">
                                                    <button type="button"
                                                            class="btn btn-warning btn-sm dropdown-toggle "
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

                        {{$countries->links()}}
                    </div>

                @endslot

            @endcomponent
        </div>

    </div>
@endsection


@section('scriptCustom')

    @component('admin.components.script.sweetAlertScript')
        @slot('url')
            ../../../admin/countries/
        @endslot
    @endcomponent
    {{--    @component('admin.components.script.paginatorScript' , ['type' => 2])--}}
    {{--        @slot('paginatorUrl')--}}
    {{--            countries/load?page=--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.searchScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/countries/search/--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    @component('admin.components.script.sortScript')
        @slot('url')
            ../../../admin/countries/sort/

        @endslot
    @endcomponent
    @component('admin.components.script.sortTableScript')
        @slot('url')
            ../../../admin/countries/sort/
        @endslot
    @endcomponent
    {{--    @component('admin.components.script.filterScript')--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.showScript')--}}
    {{--    @endcomponent--}}
@endsection



@section('crumb')
    @component('admin.components.crumb')
        @slot('title')
            {{trans('admin.paneltitle')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i><a
                    href="{{url('/admin/home')}}">{{__('admin.paneltitle')}}</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>{{__('admin.countrytitle')}}
            </li>
        @endslot
    @endcomponent
@endsection



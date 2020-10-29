@extends('admin.layout.layout')

@section('title')
    {{__('custom.admin.panel.title')}} | {{__('custom.admin.order.index.title')}}
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


        <div class="col-lg-4">
            @component('admin.components.search')
                @slot('url')
                    {{url('admin/orders/search')}}
                @endslot
            @endcomponent
        </div>


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
                        <i class="fe fe-mail   mr-2"></i>{{__('custom.admin.order.index.table.header')}}
                    </h3>
                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $orders , 'selects' => ['id' , 'status' , ['user' , 'email']] , 'options' => ['show']])
                        @slot('paginate')
                            {{$orders->links()}}
                        @endslot
                        @slot('url')
                            orders
                        @endslot
                    @endcomponent

                @endslot
                @slot('option')

            @endcomponent
        </div>

    </div>
@endsection


@section('scriptCustom')

    @component('admin.components.script.sweetAlertScript')
        @slot('url')
            ../../../admin/orders/
        @endslot
    @endcomponent
    @component('admin.components.script.paginatorScript' , ['type' => 2])
        @slot('paginatorUrl')
            orders/load?page=
        @endslot
    @endcomponent
    @component('admin.components.script.searchScript')
        @slot('url')
            ../../../admin/orders/search/
        @endslot
    @endcomponent
    @component('admin.components.script.sortScript')
        @slot('url')
            ../../../admin/orders/sort/

        @endslot
    @endcomponent
    @component('admin.components.script.sortTableScript')
        @slot('url')
            ../../../admin/orders/sort/
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
            {{trans('admin.panel.title')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i><a
                    href="{{url('/admin/home')}}">{{__('custom.admin.panel.title')}}</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-mail mr-2 fs-14"></i>{{__('custom.admin.order.title')}}
            </li>
        @endslot
    @endcomponent
@endsection



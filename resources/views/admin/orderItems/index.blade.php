@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.orderitemstitle')}}
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
{{--        <div class="col-lg-4">--}}
{{--            @component('admin.components.search')--}}
{{--                @slot('url')--}}
{{--                    {{url('admin/order-items/search')}}--}}
{{--                @endslot--}}
{{--            @endcomponent--}}
{{--        </div>--}}
        <div class="col-12" id="">

            @component('admin.components.panel')
                @slot('header')
                    <h3 class="card-title" style="display: inline">
                        <i class="fe fe-mail   mr-2"></i>{{__('admin.orderitemstableheader')}}
                    </h3>
                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType, 'sortField'=>$sortField, 'records' => $orders , 'selects' => ['id' , 'order_id' , 'link'] , 'options' => ['show' , 'delete']])
                        @slot('paginate')
                            {{$orders->links()}}
                        @endslot
                        @slot('url')
                            order-items
                        @endslot
                    @endcomponent

                @endslot


            @endcomponent
        </div>

    </div>
@endsection


@section('scriptCustom')

    @component('admin.components.script.sweetAlertScript')
        @slot('url')
            ../../../admin/order-items/
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
            {{__('admin.paneltitle')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i><a
                    href="{{url('/admin/home')}}">{{__('admin.paneltitle')}}</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-mail mr-2 fs-14"></i>{{__('admin.orderitemstitle')}}
            </li>
        @endslot
    @endcomponent
@endsection



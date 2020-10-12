@extends('admin.layout.layout')

@section('title')
    Dashboard | Show Users
@endsection

@section('styleCustom')
    <style>
        .pagination{
            margin-top: 15px;
        }
    </style>
@endsection
{{--@section('styleCustom')--}}
{{--    @component('admin.components.csrf')--}}
{{--    @endcomponent--}}
{{--    @component('admin.components.largeModal')--}}

{{--    @endcomponent--}}
{{--    @component('admin.components.mediumModal')--}}
{{--        @slot('modalTitle')--}}
{{--            اطلاعات کاربر--}}
{{--        @endslot--}}

{{--    @endcomponent--}}
{{--@endsection--}}

@section('main')
    <div class="row">

        <div class="col-12">
            @include('admin.components.error')
        </div>


                <div class="col-lg-4">
                    @component('admin.components.search')
                        @slot('url')
                            {{url('admin/users/search')}}
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
        {{--                    {{url('admin/users/filter')}}--}}
        {{--                @endslot--}}
        {{--            @endcomponent--}}
        {{--        </div>--}}

        <div class="col-12" id="">
            @component('admin.components.panel')
                @slot('header')
                    <h3  class="card-title" style="display: inline">
                        <i class="fa fa-user  mr-2"></i>Users List
                    </h3>

                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $users , 'selects' => ['id' , 'name' , 'email' , 'status' ]])
                        @slot('paginate')
                            {{$users->links()}}
                        @endslot
                        @slot('url')
                            users
                        @endslot
                    @endcomponent

                @endslot
            @endcomponent
        </div>

    </div>
@endsection


@section('scriptCustom')
    @component('admin.components.script.paginatorScript' , ['type' => 2])
        @slot('paginatorUrl')
            load?page=
        @endslot
    @endcomponent
    @component('admin.components.script.searchScript')
    @endcomponent

    @component('admin.components.script.sortScript')
    @endcomponent
    @component('admin.components.script.sortTableScript')
    @endcomponent
    @component('admin.components.script.filterScript')
    @endcomponent
    @component('admin.components.script.showScript')
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')
        @slot('title')
            {{trans('admin.panel.title')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</li>
            <li class="breadcrumb-item active"><i class="fe fe-user mr-2 fs-14"></i>users</li>
        @endslot
    @endcomponent
@endsection



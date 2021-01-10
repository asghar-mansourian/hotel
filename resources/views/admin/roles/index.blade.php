@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.roles')}}
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
                    {{url('admin/roles/search')}}
                @endslot
            @endcomponent
        </div>

        {{--        <div class="col-lg-4">--}}
        {{--            @component('admin.components.search')--}}
        {{--                @slot('url')--}}
        {{--                    {{url('admin/admins/search')}}--}}
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
                        <i class="fa fa-clipboard   mr-2"></i>Manage Admins
                    </h3>
                    <a href="{{url('/admin/roles/create')}}" class="btn btn-sm btn-info ml-auto"><i class="fe fe-plus-circle mr-1 "></i> Add Role </a>
                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $roles , 'selects' => ['id' , 'name' ], 'options' => ['edit' , 'delete']])
                        @slot('paginate')
                            {{$roles->links()}}
                        @endslot
                        @slot('url')
                            roles
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
            ../../../admin/roles/
        @endslot
    @endcomponent
    {{--    @component('admin.components.script.paginatorScript' , ['type' => 2])--}}
    {{--        @slot('paginatorUrl')--}}
    {{--            pages/load?page=--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.searchScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/pages/search/--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.sortScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/pages/sort/--}}

    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.sortTableScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/pages/sort/--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
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
                    href="{{url('/admin/home')}}">{{__('admin.admins')}}</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-paperclip mr-2 fs-14"></i>{{__('admin.roles')}}
            </li>
        @endslot
    @endcomponent
@endsection



@extends('admin.layout.layout')

@section('title')
    داشبورد | کاربران
@endsection

@section('styleCustom')
    @component('admin.components.csrf')
    @endcomponent
    @component('admin.components.largeModal')

    @endcomponent
    @component('admin.components.mediumModal')
        @slot('modalTitle')
            اطلاعات کاربر
        @endslot

    @endcomponent
    <link href="{{url('admin/'.App::getLocale().'/plugins/linea-icons/css/linea-icons.css')}}" rel="stylesheet">
@endsection

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


        <div class="col-lg-4">
            @component('admin.components.filter')
                @slot('options')
                    <option value="" selected="">انتخاب کنید ...</option>
                    <option value="status|1">وضعیت حساب : فعال</option>
                    <option value="status|0">وضعیت حساب : غیر فعال</option>
                @endslot
                @slot('url')
                    {{url('admin/users/filter')}}
                @endslot
            @endcomponent
        </div>

        <div class="col-12" id="">
            @component('admin.components.panel')
                @slot('header')
                    <h2 style="display: inline">
                        <i class="fa fa-user  mr-2"></i>لیست کاربران
                    </h2>
                    @component('admin.components.export')
                    @endcomponent
                    @component('admin.components.import')
                    @endcomponent
                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $users , 'selects' => ['id' , 'name' , 'family' , 'status' , 'email' , 'edit' , 'delete' , 'show']])
                        @slot('paginate')
                            {{$users->links()}}
                        @endslot
                        @slot('url')
                            users
                        @endslot
                    @endcomponent

                @endslot
                @slot('classBody')
                    block2
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
    @component('admin.components.form.blockUi')
    @endcomponent
    @component('admin.components.script.sortScript')
    @endcomponent
    @component('admin.components.script.sortTableScript')
    @endcomponent
    @component('admin.components.script.filterScript')
    @endcomponent
    @component('admin.components.script.showScript')
    @endcomponent
    @component('admin.components.script.exportScript')
    @endcomponent

@endsection

@section('crumb')
    @component('admin.components.crumb')
        @slot('title')
            لیست کاربران
        @endslot
        @slot('items')
            <li><a href="{{url('/admin/home')}}">داشبورد</a></li>
            <li class="active">کاربران</li>
        @endslot
    @endcomponent
@endsection



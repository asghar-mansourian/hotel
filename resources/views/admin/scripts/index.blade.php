@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.scriptitemstitle')}}
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
                    {{url('admin/scripts/search')}}
                @endslot
            @endcomponent
        </div>
        <div class="col-12" id="">

            @component('admin.components.panel')
                @slot('header')
                    <h3 class="card-title" style="display: inline">
                        <i class="fe fe-mail   mr-2"></i>{{__('admin.scriptitemstableheader')}}
                    </h3>
                    <a href="{{url('/admin/scripts/create')}}" class="btn btn-sm btn-info ml-auto"><i class="fe fe-plus-circle mr-1 "></i> {{__('admin.addpage')}} </a>
                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType, 'sortField'=>$sortField, 'records' => $scripts , 'selects' => ['id' ,'status', 'content' , 'file'] , 'options' => ['edit' , 'delete']])
                        @slot('paginate')
                            {{$scripts->links()}}
                        @endslot
                        @slot('url')
                            scripts
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
            ../../../admin/scripts/
        @endslot
    @endcomponent
    @component('admin.components.script.paginatorScript' , ['type' => 2])
        @slot('paginatorUrl')
            scripts/load?page=
        @endslot
    @endcomponent
    @component('admin.components.script.searchScript')
        @slot('url')
            ../../../admin/scripts/search/
        @endslot
    @endcomponent
    @component('admin.components.script.sortScript')
        @slot('url')
            ../../../admin/scripts/sort/

        @endslot
    @endcomponent
    @component('admin.components.script.sortTableScript')
        @slot('url')
            ../../../admin/scripts/sort/
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
            <li class="breadcrumb-item active"><i class="fe fe-mail mr-2 fs-14"></i>{{__('admin.scriptitemstitle')}}
            </li>
        @endslot
    @endcomponent
@endsection



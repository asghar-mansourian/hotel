@extends('admin.layout.layout')

@section('title')
    {{__('custom.admin.panel.title')}} | price items
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
                    {{url('admin/price-items/search')}}
                @endslot
            @endcomponent
        </div>


        <div class="col-12" id="">
            @component('admin.components.panel')
                @slot('header')
                    <h3 class="card-title" style="display: inline">
                        <i class="fa fa-map   mr-2"></i> Price Items
                    </h3>
                    <a href="{{url('/admin/price-items/create')}}" class="btn btn-sm btn-info ml-auto"><i class="fe fe-plus-circle mr-1 "></i> Add Price Item </a>
                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $priceItems , 'selects' => ['id' , 'from', 'to' , 'price' ], 'options' => ['edit' , 'delete']])
                        @slot('paginate')
                            {{$priceItems->links()}}
                        @endslot
                        @slot('url')
                            price-items
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
            ../../../admin/price-items/
        @endslot
    @endcomponent
    @component('admin.components.script.paginatorScript' , ['type' => 2])
        @slot('paginatorUrl')
            price-items/load?page=
        @endslot
    @endcomponent
    @component('admin.components.script.searchScript')
        @slot('url')
            ../../../admin/price-items/search/
        @endslot
    @endcomponent
    @component('admin.components.script.sortScript')
        @slot('url')
            ../../../admin/price-items/sort/

        @endslot
    @endcomponent
    @component('admin.components.script.sortTableScript')
        @slot('url')
            ../../../admin/price-items/sort/
        @endslot
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')
        @slot('title')
            {{trans('admin.panel.title')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i><a
                    href="{{url('/admin/home')}}">{{__('custom.admin.panel.title')}}</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>price item
            </li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>show
            </li>
        @endslot
    @endcomponent
@endsection



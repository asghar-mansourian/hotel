@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}} | {{__('admin.countrydetailtitle')}}
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


        <div class="col-12" id="">
            @component('admin.components.panel')
                @slot('header')
                    <h3 class="card-title" style="display: inline">
                        <i class="fa fa-map   mr-2"></i>{{__('admin.countrydetailstableheader')}}
                    </h3>
                    <a href="{{url('/admin/countries/details/create')}}" class="btn btn-sm btn-info ml-auto"><i class="fe fe-plus-circle mr-1 "></i> {{__('admin.adddetails')}} </a>
                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $countries , 'selects' => ['id' , [ 'country','name'], 'name' , 'value' ], 'options' => ['show' , 'edit' , 'delete']])
                        @slot('paginate')
                            {{$countries->links()}}
                        @endslot
                        @slot('url')
                            countries/details
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
            ../../../admin/countries/details/
        @endslot
    @endcomponent
    @component('admin.components.script.paginatorScript' , ['type' => 2])
        @slot('paginatorUrl')
            countries/details/load?page=
        @endslot
    @endcomponent
    @component('admin.components.script.searchScript')
        @slot('url')
            ../../../admin/countries/details/search/
        @endslot
    @endcomponent
    @component('admin.components.script.sortScript')
        @slot('url')
            ../../../admin/countries/details/sort/

        @endslot
    @endcomponent
    @component('admin.components.script.sortTableScript')
        @slot('url')
            ../../../admin/countries/details/sort/
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
                    href="{{url('/admin/home')}}"> {{trans('admin.paneltitle')}}</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>{{__('admin.countrytitle')}}
            </li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>{{__('admin.countrydetailtitle')}}
            </li>
        @endslot
    @endcomponent
@endsection



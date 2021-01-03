@extends('admin.layout.layout')

@section('title')
    {{__('custom.admin.panel.title')}} | {{__('custom.admin.blog.index.title')}}
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
                    {{url('admin/boxes/search')}}
                @endslot
            @endcomponent
        </div>

        <div class="col-12" id="">
            @component('admin.components.panel')
                @slot('header')
                    <h3 class="card-title" style="display: inline">
                        <i class="fa fa-clipboard   mr-2"></i>{{__('custom.admin.blog.index.table.header')}}
                    </h3>
                    <a href="{{url('/admin/boxes/create')}}" class="btn btn-sm btn-info ml-auto"><i class="fe fe-plus-circle mr-1 "></i> Add
                        {{__('admin.boxes')}} </a>
                @endslot

                @slot('items')
                    @component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $boxes , 'selects' => ['id' , 'status', 'created_at'], 'options' => ['show', 'delete']])
                        @slot('paginate')
                            {{$boxes->links()}}
                        @endslot
                        @slot('url')
                            boxes
                        @endslot
                        @slot('query_show')
                            ?status={{request()->has('status') ? request()->get('status') : 0}}
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
            ../../../admin/boxes/
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
            <li class="breadcrumb-item active"><i class="fe fe-paperclip mr-2 fs-14"></i>{{__('custom.admin.blog.title')}}
            </li>
        @endslot
    @endcomponent
@endsection



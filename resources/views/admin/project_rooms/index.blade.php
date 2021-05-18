@extends('admin.layout.layout')

@section('title')
    {{__('custom.admin.panel.title')}} | {{__('custom.admin.room.title')}}
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
{{--                    {{url('admin/customers/search')}}--}}
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
                        <i class="fa fa-clipboard   mr-2"></i>{{__('custom.admin.blog.index.table.header')}}
                    </h3>
                    <a href="{{url('/admin/project-rooms/create')}}" class="btn btn-sm btn-info ml-auto"><i class="fe fe-plus-circle mr-1 "></i>
                        {{__('admin.add_project_room')}} </a>
                @endslot

                @slot('items')
                        <div class="table-responsive" id="tableList">
                            <table class="table table-striped card-table table-vcenter text-nowrap table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td>{{__('admin.id')}}</td>
                                    <td>{{__('admin.name')}}</td>
                                    <td>{{__('admin.project_name')}}</td>
                                    <td>{{__('admin.action')}}</td>
                                </tr>
                                </thead>
                                <tbody class="mytbody">
                                @foreach($projectRooms as $projectRoom)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$projectRoom->name}}
                                        </td>
                                        <td>
                                            {{$projectRoom->project->name}}
                                        </td>
                                        <td>
                                            <a href="{{url('admin/project-rooms/delete/'. $projectRoom->id)}}"
                                               class="btn btn-sm btn-danger delete" data-toggle="tooltip"
                                               title data-placement="top" data-value="{{$projectRoom->id}}" data-original-title="Delete">
                                                <i class="fe fe-edit mr-2"></i>{{__('admin.delete')}}
                                            </a>
                                            <a href="{{url('admin/project-rooms/edit/' . $projectRoom->id)}}"
                                                   data-toggle="tooltip"
                                                   title="Edit" class="m-l-10 btn btn-success btn-sm">
                                                <i class="fe fe-edit mr-2"></i>{{__('admin.tableedit')}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$projectRooms->links()}}
                        </div>


                @endslot
            @endcomponent
        </div>

    </div>
@endsection


@section('scriptCustom')

    @component('admin.components.script.sweetAlertScript')
        @slot('url')
            ../../../admin/projects/
        @endslot
    @endcomponent
    {{--    @component('admin.components.script.paginatorScript' , ['type' => 2])--}}
    {{--        @slot('paginatorUrl')--}}
    {{--            blogs/load?blog=--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.searchScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/blogs/search/--}}
    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.sortScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/blogs/sort/--}}

    {{--        @endslot--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.sortTableScript')--}}
    {{--        @slot('url')--}}
    {{--            ../../../admin/blogs/sort/--}}
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
            {{trans('admin.panel.title')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i><a
                    href="{{url('/admin/home')}}">{{__('custom.admin.panel.title')}}</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-paperclip mr-2 fs-14"></i>{{__('custom.admin.projects.title')}}
            </li>
        @endslot
    @endcomponent
@endsection



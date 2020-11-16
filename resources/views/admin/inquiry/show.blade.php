@extends('admin.layout.layout')

@section('title')
    {{__('custom.admin.panel.title')}} | {{__('custom.admin.contact.index.title')}}
@endsection

@section('styleCustom')
    @component('admin.components.pagination')
    @endcomponent
    @component('admin.components.inquiry_style')
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
        {{--                    {{url('admin/contacts/filter')}}--}}
        {{--                @endslot--}}
        {{--            @endcomponent--}}
        {{--        </div>--}}

        <div class="col-12" id="">
            <div class="right">
               <pre>
                   {{__('admin.title')}}: {{$inquiry->title}}
                   {{$inquiry->message}}
                   @if($inquiry->image)
                      <img class="img1" src="{{storage_path($inquiry->image->file_name)}}">
                   @endif
                   {{__('admin.date')}}: {{$inquiry->created_at}}
               </pre>
            </div>
            @foreach($inquiry->inquirys as $inquiry_child)
                @if($inquiry_child->user_id == auth()->user()->id)
                    <div class="right">
                        <pre>
                            {{$inquiry_child->message}}
                            @if($inquiry_child->image)
                                <img class="img_comment" src="{{ route('storage_image',$inquiry_child->image->id) }}">
                            @endif
                            {{__('admin.date')}}: {{$inquiry_child->created_at}}
                        </pre>
                    </div>
                @else
                    <div class="right">
                        <pre style="background-color: #fff3cd">
                            {{$inquiry_child->message}}
                            @if($inquiry_child->image)
                                <img class="img_comment" src="{{ route('storage_image',$inquiry_child->image->id) }}">
                            @endif
                            {{__('admin.date')}}: {{$inquiry_child->created_at}}
                        </pre>
                    </div>
                @endif
            @endforeach
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title">
                        <i class="fa fa-reply mr-2"></i>
                        {{__('admin.answer')}}
                    </h3>

                </div>
                <div class="card-body">
                    <form method="post" class="form" action="{{route('admin_inquiry_store')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="parent_id" value="{{$inquiry->id}}">
                            <div class="col-md-12">
                                <input class="form-control" type="file" name="file" >
                            </div>
                            <br>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" placeholder="{{__('admin.message')}}"></textarea>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button class="btn btn-success">{{__('admin.send')}}</button>
                            </div>
                    </form>

                </div>
            </div>
            <div class="modal fade" role="dialog" id="imgmodal">
                <div class="modal-dialog">
                    <div class="modal-content"></div>
                    <img class="img-responsive" src="" id="show-img">
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection


@section('scriptCustom')

    @component('admin.components.script.sweetAlertScript')
        @slot('url')
            ../../../admin/contacts/
        @endslot
    @endcomponent
    @component('admin.components.script.paginatorScript' , ['type' => 2])
        @slot('paginatorUrl')
            contacts/load?page=
        @endslot
    @endcomponent
    @component('admin.components.script.searchScript')
        @slot('url')
            ../../../admin/contacts/search/
        @endslot
    @endcomponent
    @component('admin.components.script.sortScript')
        @slot('url')
            ../../../admin/contacts/sort/

        @endslot
    @endcomponent
    @component('admin.components.script.sortTableScript')
        @slot('url')
            ../../../admin/contacts/sort/
        @endslot
    @endcomponent
    {{--    @component('admin.components.script.filterScript')--}}
    {{--    @endcomponent--}}
    {{--    @component('admin.components.script.showScript')--}}
    {{--    @endcomponent--}}
    <script>
        $(document).ready(function(){
            $(".img_comment").click(function(){
                var img=$(this).attr('src');
                $("#show-img").attr('src',img);
                $("#imgmodal").modal('show');
            });
        });
    </script>
@endsection



@section('crumb')
    @component('admin.components.crumb')
        @slot('title')
            {{trans('admin.panel.title')}}
        @endslot
        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i><a
                    href="{{url('/admin/home')}}">{{__('custom.admin.panel.title')}}</a></li>
            <li class="breadcrumb-item active"><i class="fe fe-mail mr-2 fs-14"></i>{{__('custom.admin.contact.title')}}
            </li>
        @endslot
    @endcomponent
@endsection



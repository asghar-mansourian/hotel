@extends('admin.layout.layout')

@section('title')
    {{__('admin.dashboard')}}  | {{__('admin.showorders')}}
@endsection

@section('styleCustom')
    {{--    <link rel="stylesheet" href="{{url('admin/fa/plugins/dropify/dist/css/dropify.min.css')}}">--}}
    <style>
        .has-danger {
            border: 1px solid #d9534f !important;
        }
    </style>
@endsection

@section('main')
    <form class="form" method="post" id="mainForm">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="col-12">
                    @include('admin.components.error')
                </div>
                @component('admin.components.panel')
                    @slot('items')

                        <div class="card-body  ">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    Box Id
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control " name="" type="text" placeholder="Please Enter Id..." value="{{$box->id}}" id="" disabled="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    Box Created
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control " name="" type="text" placeholder="" value="{{$box->created_at}}" id="" disabled="">
                                </div>
                            </div>

                            {{--     <div class="form-group row">
                                     <label for="example-text-input" class="col-md-3 form-label my-auto">
                                         <span>status</span>
                                     </label>
                                     <div class="col-md-9">
                                         <input class="form-control " name="" type="text" placeholder="" value="ORDERED" id="" disabled="">
                                     </div>
                                 </div>
     --}}
                        </div>
                    @endslot


                    @slot('header')
                        <h2 class="card-title">{{__('admin.maininformation')}}</h2>
                    @endslot
                @endcomponent

            </div>
            <div class="col-12 col-lg-4">
                @component('admin.components.panel')


                    @slot('header')
                        <h2 class="card-title">{{__('admin.backtoorders')}}</h2>
                    @endslot
                    @slot('items')
                        <a href="{{url('admin/orders')}}"
                           class="btn btn-danger btn-block ">{{__('admin.back')}}</a>

                        @if(request()->get('status') == 1)
                            <a href="{{url('admin/boxes/status/' . $box->id . '/' . 2 )}}"
                               class="btn btn-primary btn-block ">Box Came To Domestic</a>
                        @elseif(request()->get('status') == 2)
                            <a href="{{url('admin/boxes/status/' . $box->id . '/' . 3 )}}"
                               class="btn btn-primary btn-block ">Domestic Warehouse</a>
                        @else
                            <a href="{{url('admin/boxes/status/' . $box->id . '/' . 1 )}}"
                               class="btn btn-primary btn-block ">Box Air Send</a>
                        @endif


                    @endslot


                @endcomponent


            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')
    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/countries/
        @endslot
    @endcomponent
@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i> {{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-map mr-2 fs-14"></i>{{__('admin.showorders')}}</li>
        @endslot
    @endcomponent
@endsection

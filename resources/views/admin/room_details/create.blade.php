@extends('admin.layout.layout')

@section('title')
    Dashboard | Add blog
@endsection

@section('styleCustom')
    <link rel="stylesheet" href="{{url('admin/fa/plugins/dropify/dist/css/dropify.min.css')}}">
    <style>
        .has-danger {
            border: 1px solid #d9534f !important;
        }
    </style>
    <link rel="stylesheet" href="{{url('/admin/en/plugins/dropzone/dropzone.css')}}">

@endsection

@section('main')
    <form class="form" method="post" id="mainForm" enctype="multipart/form-data"
          action="{{url('admin/room-details/store')}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')
                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                {{__('admin.project')}}
                            @endslot
                            @slot('name')
                                project
                            @endslot
                            @slot('items')
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}" >{{$project->name}}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                        @component('admin.components.form.optionLabel')
                            @slot('label')
                                {{__('admin.room')}}
                            @endslot
                            @slot('name')
                                room_id
                            @endslot
                            @slot('items')
                                @foreach($projects->first()->rooms as $room)
                                    <option value="{{$room->id}}">{{$room->name}}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.description')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="description"
                                      id="description" placeholder="" cols="30" rows="10">

                            </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.description_az')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="description_az"
                                      id="description_az" placeholder="" cols="30" rows="10">

                            </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.description_ru')}}
                                </label>
                                <div class="col-md-9">

                            <textarea class="form-control" name="description_ru"
                                      id="description_ru" placeholder="" cols="30" rows="10">

                            </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.picture')}}
                                </label>
                                <div class="col-md-9">

                                    <input type="file" name="picture" id="picture" class="dropify" data-max-file-size="500K"
                                           data-allowed-file-extensions="jpg png" data-default-file="">
                                </div>
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
                        <h2 class="card-title">{{__('admin.saveinformation')}}</h2>
                    @endslot
                    @slot('items')
                        @component('admin.components.form.submit')
                            @slot('class')
                                btn-block btn-info
                            @endslot
                            @slot('title')
                                {{__('admin.save')}}
                            @endslot
                        @endcomponent

                    @endslot
                @endcomponent


            </div>

        </div>
    </form>

@endsection
@section('scriptCustom')

    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/room-details/
        @endslot
    @endcomponent
    @component('admin.components.ckeditor')
        @slot('ids')
            description,description_az,description_ru
        @endslot
    @endcomponent

    @component('admin.components.form.pictureScript')

    @endcomponent
    <script src="{{url('/admin/en/plugins/dropzone/dropzone.js')}}"></script>

    <script>
        $('#project').on('change',function (){
           $.ajax({
               url:'/admin/get-project-rooms?project='+$(this).val(),
               type:'GET',
               success:function (response){
                   $('#room').empty();
                   var rooms = response.rooms;
                   var html='';
                   for(var i = 0;i<rooms.length;i++)
                       html = html + '<option value="'+ rooms[i].id +'">'+ rooms[i].name + '</option>';
                   $('#room').append(html);
                   console.log(html,rooms);
               },
               error:function (response){
                   console.log(error);
               }
           })
        });
    </script>

@endsection



@section('crumb')
    @component('admin.components.crumb')

        @slot('items')
            <li class="breadcrumb-item"><i class="fe fe-home mr-2 fs-14"></i>{{__('admin.dashboard')}}</li>
            <li class="breadcrumb-item active"><i class="fe fe-clipboard mr-2 fs-14"></i>{{__('admin.add_project')}}
            </li>
        @endslot
    @endcomponent
@endsection

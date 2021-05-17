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
        .col-md-9 a{
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="{{url('/admin/en/plugins/dropzone/dropzone.css')}}">

@endsection

@section('main')
    <form class="form" method="post" id="mainForm" enctype="multipart/form-data"
          action="{{url('/upload-project-image')}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                @component('admin.components.panel')
                    @slot('items')


                            @component('admin.components.form.optionLabel')
                                @slot('label')
                                    {{__('admin.select_project')}}
                                @endslot
                                @slot('name')
                                    project_id
                                @endslot
                                @slot('items')
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}" @if($project->id == $selectedProject->id) selected @endif>{{$project->name}}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 form-label my-auto">
                                    {{__('admin.up_indicator_picture')}}
                                </label>
                                <div class="col-md-9">
                                    <div id="dZUpload" class="dropzone">
                                        <div class="dz-default dz-message"></div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 form-label my-auto">
                                        {{__('admin.slider_indicator_picture')}}
                                    </label>
                                    <div class="col-md-9">
                                        @foreach($selectedProject->image as $image)
                                            <img src='{{url("/images/projects/$image->file_name")}}' height="50" width="50">
                                            <a data-id="{{$image->id}}" class="delete-file" >delete</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endslot


                            @slot('header')
                                <h2 class="card-title">{{__('admin.maininformation')}}</h2>
                            @endslot
                        @endcomponent

            </div>
{{--            <div class="col-12 col-lg-4">--}}
{{--                @component('admin.components.panel')--}}


{{--                    @slot('header')--}}
{{--                        <h2 class="card-title">{{__('admin.saveinformation')}}</h2>--}}
{{--                    @endslot--}}
{{--                    @slot('items')--}}
{{--                        @component('admin.components.form.submit')--}}
{{--                            @slot('class')--}}
{{--                                btn-block btn-info--}}
{{--                            @endslot--}}
{{--                            @slot('title')--}}
{{--                                {{__('admin.save')}}--}}
{{--                            @endslot--}}
{{--                        @endcomponent--}}

{{--                    @endslot--}}
{{--                @endcomponent--}}


{{--            </div>--}}

        </div>
    </form>

@endsection
@section('scriptCustom')

    @component('admin.components.script.mainFormScript')
        @slot('mainFormUrlValue')
            ../../../admin/projects/
        @endslot
    @endcomponent

    @component('admin.components.form.pictureScript')

    @endcomponent
    <script src="{{url('/admin/en/plugins/dropzone/dropzone.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $("#dZUpload").dropzone({
                url: "/admin/projects/project-slider-files",
                params: {
                    project_id: $('#project_id').val()
                },
                success:function(response){
                    response = JSON.parse(response.xhr.responseText);
                    console.log(response[1]);
                    $(".dz-preview:last-child .dz-remove").attr('onclick','deleteFile('+response[1]+')');
                },
                addRemoveLinks: true,
            });
        });

        //delete file from dropzone
        function  deleteFile(id) {
            $.ajax({
                type: 'POST',
                url: '{{url('/admin/projects/delete-slider-picture')}}',
                data: "id=" + id,
                dataType: 'html'
            });
        }

        $('.delete-file').on('click',function(){
            var element = this;
            $.ajax({
                type: 'POST',
                url: '{{url('/admin/projects/delete-slider-picture')}}',
                data: "id="+$(this).attr('data-id'),
                success:function(){
                    console.log($(element).prev('img'));
                    $(element).prev('img').remove();
                    $(element).remove();
                },
                error:function(){
                    alert('please try again');
                }
            });
        });

        $('#project_id').on('change',function(){
           window.location.href='{{url('/admin/projects/edit-picture?id=')}}'+$('#project_id').val();
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

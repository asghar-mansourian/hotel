@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.faq')}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{url('/front/css/faq.css?v=1.0.2')}}">
    @endsection
@section('content')
    <div class="tm-parallax" style="background-position: center 840px;">
        <header class="tm-parallax-header">
            <h2 class="">
                @if(\request()->get('status') == 'unfinished')
                    {{__('website.unfinished_project')}}
                @else
                    {{__('website.finished_projects')}}
                    @endif
            </h2>
        </header>
    </div>
    <!-- projects -->
    <div @if(\request()->get('status') == 'unfinished') class="projects_con" @else class="projects_in" @endif>
        <div class="site_center project">
            <div class="container mt-4 mb-5">
                <div class="row mt-3">
                    @foreach($projects as $project)
                        <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                            <a href="{{url('/project/'.$project->id)}}">
                                <div class="project_img">
                                    <img src="{{url('/images/'.$project->indicator_picture)}}">
                                    <div class="overlay">
                                    </div>
                                </div>
                                <div class="ribbon ribbon-top-left">
                                    <span class="discount-label">
                                        @if($project->status == \App\Project::STATUS_UNFINISHED)
                                            {{__('website.unfinished_project')}}
                                        @else
                                            {{__('website.finished')}}
                                        @endif
                                    </span>
                                </div>
                                <div class="project_text">
                                    <h4 class="color_blue"><strong>{{$project->title}}</strong></h4>
                                    <p class="color_grey">
                                        <span><i class="fas fa-map-marked-alt mr-2"></i>28 May m/s</span>
                                        <span><i class="fas fa-shoe-prints mr-2 ml-4"></i>10 dəq</span>
                                        <span class="float-right"><i class="fas fa-city mr-2"></i>13 mənzil qaldı</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footerCustom')
    <script>
        function showStuff(id, text, btn) {
            document.getElementById(id).style.display = 'block';
            document.getElementById(text).style.display = 'none';
            btn.style.display = 'none';
        }
    </script>
    <!-- faq menu js  -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel_faq = this.nextElementSibling;
                if (panel_faq.style.maxHeight) {
                    panel_faq.style.maxHeight = null;
                    panel_faq.style.margin = null;
                    panel_faq.style.padding = null;
                    panel_faq.style.border = null;
                } else {
                    panel_faq.style.maxHeight = panel_faq.scrollHeight + "10px";
                    panel_faq.style.margin = "20px 0";
                    panel_faq.style.padding = "15px";
                    panel_faq.style.border = "1px solid #eee";
                }
            });
        }
    </script>

@endsection

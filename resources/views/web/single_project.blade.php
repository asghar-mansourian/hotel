@extends('layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{url('/front/css/jquery.fancybox.min.css')}}">

@endsection
@section('content')
    <div class="tm-parallax" style="background-repeat: no-repeat;height: 500px;background-position: center;background-image:url('{{url('/images/'.$project->indicator_picture)}}')">
        <header class="tm-parallax-header" >
          <img src="{{url('/images/'.$project->up_indicator_picture)}}">
        </header>
    </div>
    <!-- Keyfiyyət -->
    <div class="site_center projects_in">
        <div class="container mt-4 mb-5 blog_list">
            <div class="row mt-3">
                <div class="col-md-12 col-sm-12 mb-3">
                    <h3 class="color_blue"><strong>{{$project->title}}</strong></h3>
                </div>
                <div class="col-md-6 col-sm-12">
                    {!! $project->description !!}
                    <p><i class="fas fa-headset mr-3 color_gold"></i>{{$project->telephone}}</p>

                    <p><i class="fas fa-phone mr-3 color_gold"></i>{{$project->mobile}}</p>

                    <p><i class="fas fa-map-marker-alt mr-3 color_gold"></i>{{$project->address}}</p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div id="blog_owl" class="owl-carousel owl-theme">
                        @foreach($project->image as $image)
                        <div class="item">
                            <div class="blog">
                                <div class="blog_img">
                                    <img src="{{url('images/projects/'.$image->file_name)}}" class="w-100">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 mt-4 projects_in">
                    <div class="tab">
                        @foreach($project->rooms as $room)
                        <button @if($loop->first) class="tablinks active" @else class="tablinks" @endif onclick="openCity(event, 'room{{$room->id}}')">{{$room->name}}</button>
                        @endforeach
                    </div>
                    @foreach($project->rooms as $room)

                    <div id="room{{$room->id}}" class="tabcontent"  @if($loop->first)style="display: block;"@endif>

                            @foreach($room->roomDetails as $detail)
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4 col-sm-6">
                                    <a data-fancybox="gallery" href="{{url('/images/projects/'.$detail->picture)}}">
                                        <img src="{{url('/images/projects/'.$detail->picture)}}" class="w-100 proj_tab"></a>
                                </div>
                                <div class="col-md-4 col-sm-6" style="background-color: #ebebeb !important;border-radius: 20px">
                                    <p>
                                        @if(app()->getLocale() == 'en')
                                            {!! $detail->description !!}
                                        @elseif(app()->getLocale() == 'ru')
                                            {!! $detail->description_ru !!}
                                        @elseif(app()->getLocale() == 'az')
                                            {!! $detail->description_az !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                                <br>
                            @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="map">
            <div class="contact_map">
                <div style="width: 100%">
                    <iframe width="100%" height="355" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="{{$project->google_map_address}}"></iframe>
                    <a href="https://www.maps.ie/route-planner.htm"></a></div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{url('/front/js/jquery.fancybox.min.js')}}"></script>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

    <script>
        $('#blog_owl').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            autoplay: 800,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    </script>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    @endpush

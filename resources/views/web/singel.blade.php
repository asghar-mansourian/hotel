@extends('layout.layout')
@section('styles')
    <style>
        .read_more a{
            font-size: 11px!important;
        }
    </style>
    @endsection
@section('content')
    <div class="tm-parallax" style="background-position: center 840px;">
        <header class="tm-parallax-header">
            <h2 class="">{{$blog->title}}</h2>
        </header>
    </div>
    <!-- Blog in-->
    <div class="site_center blog_in">
        <div class="container mt-4 mb-5 blog_out">
            <div class="row mt-3">
                <div class="col-md-9 col-sm-12 mb-4 p-0">
                    <div class="col-md-12">
                        <h4 class="color_blue mb-3">{{$blog->title}}</h4>
                        <div class="blog_in_img">
                            <img src="{{url('/images/'.$blog->picture)}}" class="w-100">
                            <div class="blog_date pl-0 pt-2" style="float: unset;">{{$blog->created_at}}</div>
                        </div>
                        <div class="color_blue">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 mb-4 mob_dis_no">
                    <h5 class="color_gold mb-4">{{__('website.latestnews')}}</h5>
                    @foreach($last_news as $news)

                    <div class="blog mb-4">
                        <div class="blog_img">
                            <a href="{{url('/blog/' . $news->slug)}}"><img src="{{url('/images/'.$news->picture)}}" class="w-100"></a>
                        </div>
                        <h6 class="blog_text"><strong><a  href="{{url('/blog/' . $news->slug)}}" class="color_blue">{{$news->title}}</a></strong></h6>
                        <div class="read_more"><a href="{{url('/blog/' . $news->slug)}}">{{__('website.readmore')}}</a></div>
                        <div class="blog_date">{{date('d-M-Y', strtotime($news->updated_at))}}</div>
                        <div style="clear: both;"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

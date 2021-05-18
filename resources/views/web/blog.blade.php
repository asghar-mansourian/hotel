@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.blog')}}
@endsection

@section('styles')
{{--    <link rel="stylesheet" href="{{url('front/css/blog.css?v=1.0.0')}}">--}}
@endsection
@section('content')
    <div class="tm-parallax" style="background-position: center 840px;">
        <header class="tm-parallax-header">
            <h2 class="">{{__('website.blog')}}</h2>
        </header>
    </div>
    <!-- Blog -->
    <div class="site_center blog_out">
        <div class="container mt-4 mb-5">
            <div class="row mt-3">
                @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="blog">
                        <div class="blog_img">
                            <a href="{{url('/blog/' . $blog->slug)}}"><img src="{{url('/images/'.$blog->picture)}}" class="w-100"></a>
                        </div>
                        <h5 class="blog_text"><strong><a href="{{url('/blog/' . $blog->slug)}}" class="color_blue">{{$blog->title}}</a></strong></h5>
                        <p style="padding: 0 15px">{{\App\lib\Helpers::getContent($blog->content)}}</p>
                        <div class="read_more"><a href="{{url('/blog/' . $blog->slug)}}">{{__('website.readmore')}}</a></div>
                        <div class="blog_date">{{date('d-M-Y', strtotime($blog->created_at))}}</div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

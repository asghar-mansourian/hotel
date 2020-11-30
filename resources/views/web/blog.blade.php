@extends('layout.layout')
@section('title')
    {{__('member.site_name')}}| {{__('website.blog')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="black pt-5"><span class="yellow mr-3"></span>{{__('website.blog')}}</div>
                <div class="italic">{{__('website.subtitle2')}}<br/>{{__('website.subtitle1')}}</div>
            </div>
            <div class="col-md-12 slider_search mt-5">
                <div class="search text-center">
                    <form method="post" action="{{route('blog.search')}}">
                        @csrf
                        <input type="text" name="search" placeholder="{{__('website.search')}} ...">
                        <button type="submit">{{__('website.search')}}</button>
                    </form>
                </div>
            </div>
            <div class="col-md-12 mt-50">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mt-5 mb-5 padding_25">
                        <div class="padding_15">
                            @php
                                $topBlog = $blogs->count() ? $blogs->first() : null
                            @endphp
                            @if($topBlog)
                                <div class="row">
                                    <div class="col-md-7 p-0">
                                        <div class="blog_mage">
                                            <div class="blog_img_he">
                                                <a href="{{url('/blog/' . $topBlog->slug)}}">
                                                    <img src="{{url('images/' . $topBlog->picture)}}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mob_p-4">
                                            <div class="top"><span class="top_span">Top</span></div>
                                            <h4><strong>{{$topBlog->title}}</strong></h4>
                                            <p class="font_grey mb-3">{{$topBlog->author->name}}<i class="far fa-comment ml-3 mr-1"></i> 3</p>
                                            <div class="line_he mt-2 mb-2">
                                                {{\App\lib\Helpers::getContent($topBlog->content)}}
                                            </div>
                                            <div class="blog_a mt-4 mb-3">
                                                <a href="{{url('/blog/' . $topBlog->slug)}}">{{__('website.readmore')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($blogs->count())
                        <div class="col-md-12 col-sm-12 black black_margin">{{__('website.latestnews')}}</div>
                    @endif
                    @foreach($blogs as $blog)
                        <div class="col-md-4 col-sm-6 height_380 mb-5">
                            <div class="p-0">
                                <div class="blog_mage">
                                    <div class="blog_img">
                                        <a href="{{url('/blog/' . $blog->slug)}}">
                                            <img src="{{url('images/' . $blog->picture)}}" class="w-100">
                                        </a>
                                    </div>
                                </div>
                                <div class="mob_p-4">
                                    <div class="new"><span class="new_span">{{__('website.new')}}</span></div>
                                    <h4><strong>{{$blog->title}}</strong></h4>
                                    <p class="font_grey mb-3">{{$blog->author->name}} <i class="far fa-comment ml-3 mr-1"></i> 3</p>
                                    <div class="line_he mt-2 mb-2">
                                        {{\App\lib\Helpers::getContent($blog->content)}}
                                    </div>
                                    <div class="blog_a mt-4 mb-3">
                                        <a href="{{url('/blog/' . $blog->slug)}}">{{__('website.readmore')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{$blogs->links()}}
            </div>
            {{--
                            <div class="col-md-12 mt-5 mb-5">
                                <div class="number_list">
                                    <ul>
                                        <li class="mr-4"><a href="#"><span class="fa-fw select-all fas mr-0"></span></a></li>
                                        <li><a href="#" class="">1</a></li>
                                        <li><a href="#" class="border_left active">2</a></li>
                                        <li><a href="#" class="border_left">3</a></li>
                                        <li class="mr-3 ml-3">
                                            <i class="fas fa-circle" style="font-size: 4px; margin-right: 0"></i>
                                            <i class="fas fa-circle" style="font-size: 4px; margin-right: 0"></i>
                                            <i class="fas fa-circle" style="font-size: 4px; margin-right: 0"></i>
                                        </li>
                                        <li><a href="#" class="">7</a></li>
                                        <li class="ml-4"><a href="#"><span class="fa-fw select-all fas mr-0"></span></a></li>
                                    </ul>
                                </div>
                            </div>
        </div>--}}
        </div>
@endsection

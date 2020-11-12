@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <div class="pt-5 black_blog"><span class="blog_yellow mr-3"><a href="/blog" class="blog_yellow mr-3">{{__('website.blog')}}</a></span> <i
                        class="fas fa-angle-right"></i> {{$blog->title}}</div>
            </div>
            <div class="col-md-12 mt-50">
                <div class="row">
                    <div class="col-md-8 col-sm-8 mt-5 mb-5">
                        <div class="col-md-12 col-sm-12 col-xs-12 p-0">
                            <div class="blog_mage">
                                <div class="blog_img_he">
                                    <img src="{{url('images/' . $blog->picture)}}" class="w-100"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="blog_sosyal ">
                                <div class="blog_share">{{__('website.share')}}</div>
                                <ul class="p-0">
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4><strong>{{$blog->title}}</strong></h4>
                            <p class="font_grey mb-3">{{$blog->author->name}} <span class="fa-fw select-all fas ml-5"></span> 3</p>
                            <div class="line_he mt-2 mb-2">{!! $blog->content !!}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 mt-5 mb-5  blog_padding">
                        <div class="border_sh">
                            <h3 class="mt-0"><strong>{{__('website.latestnews')}}</strong></h3>
                            @foreach($last_news as $news)
                                <div class="blog_list">
                                    <a href="{{url('/blog/' . $news->slug)}}">
                                        <div class="news">
                                            <img src="{{url('images/' . $news->picture)}}"></div>
                                        <p class="news_p">{{$news->title}}</p></a>
                                    <div class="font_grey text-right"><span class="fa-fw select-all fas ml-0 mr-3"></span>{{$news->created_at}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

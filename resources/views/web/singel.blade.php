@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <div class="pt-5 black_blog"><span class="blog_yellow mr-3">Blog</span> <i
                        class="fas fa-angle-right"></i> {{$blog->title}}</div>
            </div>
            <div class="col-md-12 mt-50">
                <div class="row">
                    <div class="col-md-9 col-sm-8 mt-5 mb-5">
                        <div class="border_sh padding_15">
                            <div class="row">
                                <div class="col-md-11 col-sm-10 col-xs-9 p-0">
                                    <div class="blog_mage">
                                        <div class="blog_img_he"><img src="{{url('images/' . $blog->picture)}}"
                                                                      class="w-100"></div>
                                        <div class="blog_history_he">{{$blog->created_at}}</div>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-3 p-0">
                                    <div class="blog_sosyal ">
                                        <div class="blog_share">Share</div>
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
                            </div>
                            <div class="col-md-12">
                                <h4><strong>{{$blog->title}}</strong></h4>
                                <p class="font_grey mb-3">{{$blog->author->name}} <span
                                        class="fa-fw select-all fas ml-5"></span> 3</p>
                                <div class="line_he mt-2 mb-2">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-4 mt-5 mb-5  blog_padding">
                        <div class="border_sh">
                            <h3><strong>Latest news</strong></h3>
                            @foreach($last_news as $news)
                                <div class="blog_list">
                                    <p><a href="{{url('/blog/' . $news->slug)}}">{{$news->title}}</a></p>
                                    <div class="font_grey text-right"><span
                                            class="fa-fw select-all fas ml-0 mr-3"></span>{{$news->created_at}}</div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

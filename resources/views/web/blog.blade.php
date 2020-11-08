@extends('layout.layout')
@section('title')
    Kargo | Blog
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="black pt-5"><span class="yellow mr-3">Kargo</span>Blog</div>
                <div class="italic">Global turkey logistics and transportation<br/>services via sea, land and air.</div>
            </div>
            <div class="col-md-12 slider_search mt-5">
                <div class="search text-center">
                    <input type="text" name="" placeholder="Search here...">
                    <button>Search</button>
                </div>
            </div>
            <div class="col-md-12 mt-50">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-md-4 col-sm-6 height_380 mt-5 mb-5">
                            <div class="border_sh p-0">
                                <div class="blog_mage">
                                    <div class="blog_img"><img src="{{url('images/' . $blog->picture)}}" class="w-100">
                                    </div>
                                    <div class="blog_history">{{$blog->created_at}}</div>
                                </div>
                                <div class="mob_p-4">
                                    <h4><strong>{{$blog->title}}</strong></h4>
                                    <p class="font_grey mb-3">{{$blog->author->name}} <i
                                            class="far fa-comment ml-3 mr-1"></i> 3</p>
                                    <div class="line_he mt-2 mb-2">
                                        {{ \App\lib\Helpers::getContent($blog->content)  }}
                                    </div>
                                    <div class="blog_a mt-4 mb-3">
                                        <a href="{{url('/blog/' . $blog->slug)}}"> Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{$blogs->links()}}
                {{--                pagination             --}}
                {{--                <div class="col-md-12 mt-5 mb-5">--}}
                {{--                    <div class="number_list">--}}
                {{--                        <ul>--}}
                {{--                            <li class="mr-4"><a href="#"><span class="fa-fw select-all fas mr-0"></span></a></li>--}}
                {{--                            <li><a href="#" class="">1</a></li>--}}
                {{--                            <li><a href="#" class="border_left active">2</a></li>--}}
                {{--                            <li><a href="#" class="border_left">3</a></li>--}}
                {{--                            <li class="mr-3 ml-3">--}}
                {{--                                <i class="fas fa-circle" style="font-size: 4px; margin-right: 0"></i>--}}
                {{--                                <i class="fas fa-circle" style="font-size: 4px; margin-right: 0"></i>--}}
                {{--                                <i class="fas fa-circle" style="font-size: 4px; margin-right: 0"></i>--}}
                {{--                            </li>--}}
                {{--                            <li><a href="#" class="">7</a></li>--}}
                {{--                            <li class="ml-4"><a href="#"><span class="fa-fw select-all fas mr-0"></span></a></li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

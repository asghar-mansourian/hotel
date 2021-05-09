@extends('1001gift.layout.layout')
@section('title')
    @include('1001gift.layout.page-header-code',['pageId'=>\App\PageHeaderCode::PAGE_PROHIBITED_PRODUCTS])
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="index_cont">
                <div class="row">
                    @phpwe
                        $locale = app()->getLocale();
                        $content = app()->getLocale() !== 'en' ? "content_{$locale} as content" : 'content';
                        $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';
                     $agency = Illuminate\Support\Facades\DB::table('pages')->where('id' , 10)->select([$content , $title])->first()
                    @endphp

                    <div class="col-md-12" style="margin: 0 15px">
                        <div class="black">{{$agency->title}}</div>
                        {{--                        {{__('website.prohibited_products')}}--}}
                    </div>

                    <div class="col-md-12">
                        <div class="banned_tabs full">
                            <div class="banned_tab tab-content active" >
                                {!! $agency ? $agency->content: '' !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')

@endsection

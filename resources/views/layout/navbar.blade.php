<div class="tm-nav-section" style="background: #202c3b">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#tmMainNav"
                        aria-controls="tmMainNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="tmMainNav">
                        <div class="nav-item mob_dis">
                            <a class="nav-link" href="#" style="border-bottom:1px solid #202c3b;">
                                <img src="{{url('/front/image/logo.png')}}" alt="Image" class="w_120"> <span class="sr-only">(current)</span></a>
                        </div>
                        <div class="nav_right">
                            <ul class="navbar-nav mx-auto tm-navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/about-us')}}">{{__('website.aboutus')}}</a>
                                    <ul>
                                        <li class="nav-item"><a href="{{url('/about-us')}}">{{__('website.aboutus')}}</a></li>
                                        <li class="nav-item"><a href="{{url('/pages/7')}}">{{__('website.sales_condotion')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{__('website.projects')}}</a>
                                    <ul>
                                        <li class="nav-item"><a href="{{url('/finished-project')}}">{{__('website.finished_projects')}}</a></li>
                                        <li class="nav-item"><a href="{{url('/unfinished-projects')}}">{{__('website.unfinished_projects')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/blog')}}">{{__('website.blog')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/quality')}}">{{__('website.quality')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/faq')}}">{{__('website.faq')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/media')}}">{{__('website.media')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-weight: bold;">
                                            {{ app()->getLocale() }}
                                            <i class="fas fa-angle-down ml-2"></i>
                                        </a>
                                        <div class="dropdown-menu lang-a" aria-labelledby="dropdown_panel">
                                            @foreach(\App\lib\Helpers::getLocales() as $locale)
                                                @if($locale->locale != app()->getLocale())
                                                    <a class="dropdown-item " href="/set-locale/{{$locale->locale}}"> {{$locale->locale}}</a><br/>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="number">{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>





{{--<div class="row pt-3 pb-3 mob_dis " style="padding: 0 15px;">--}}
{{--    <div class="logo">--}}
{{--        <a href="/"><img src="{{url('front/image/favicon/blue_logo.png')}}"></a>--}}
{{--    </div>--}}

{{--    <div class="menu_sec" style="    margin-top: 16px;">--}}
{{--        <ul>--}}
{{--            <li>--}}
{{--                <a href="/customers">{{__('website.customers')}}</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a class="{{url()->current() === url('/pricing') ? 'active' : ''}}"--}}
{{--                   href="{{url('/pricing')}}">{{__('website.pricing')}}</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a class="{{url()->current() === url('/how-we-work') ? 'active' : ''}}" href="{{url('/how-we-work')}}">&ensp;{{__('website.howwework')}} </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a class="{{url()->current() === url('/contact-us') ? 'active' : ''}}"--}}
{{--                   href="{{url('/contact-us')}}">{{__('website.contact')}}</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a class="btn btn-outline-danger btn-header-basket-parent"  href="{{url('/basket')}}" style="position: relative" >--}}
{{--                    <i style="--}}
{{--    font-size: 12px;--}}

{{--    border: 1px solid #466ea1 !important;--}}
{{--    font-size: 13px;--}}
{{--    padding: 7px 7px;--}}
{{--    border-radius: 5px;--}}
{{--    position: absolute;--}}
{{--    left: -7px;--}}
{{--    bottom: -9px;--}}
{{--    height: 30px;--}}
{{--    width: 40px;--}}
{{--        " class="fa fa-shopping-cart"></i>--}}
{{--                    @auth('web')--}}
{{--                        @if (auth()->check())--}}
{{--                            @php--}}

{{--                                $basketnum =\App\Basket::where('user_id' , auth()->user()->id)->count();--}}
{{--                            @endphp--}}
{{--                            <span style="--}}
{{--                                color: white;--}}
{{--    background-color: #466ea1;--}}
{{--    padding-top: 5px;--}}
{{--    width: 20px;--}}
{{--    height: 20px;--}}
{{--    position: absolute;--}}
{{--    top: -20px;--}}
{{--    border-radius: 100%;--}}
{{--    font-size: 9px;--}}
{{--    left: 20px;--}}
{{--                            ">{{$basketnum}}</span>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                    @guest()--}}

{{--                        <span style="    color: white;--}}
{{--    background-color: #466ea1;--}}
{{--    padding: 3px 6px;--}}
{{--    position: absolute;--}}
{{--    top: -15px;--}}
{{--    border-radius: 100%;--}}
{{--    font-size: 8px;">0</span>--}}
{{--                    @endauth--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="/orders/create" class="order_button" type="button" style="/*    margin-top: -4px;--}}
{{--    color: #040404;--}}
{{--    font-size: 11px;--}}
{{--    padding: 9px 24px;--}}
{{--    border: 1px solid #7a7a7b;--}}
{{--    border-radius: 11px;--}}
{{--    box-shadow: 0 0 5px 2px #e8e8e8;--}}
{{--        transition: all 0.2s;*/--}}
{{--">--}}
{{--                    {{__('member.neworder')}}--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<style>--}}
{{--    .btn-header-1:hover {--}}
{{--        background-color: #f25c69;--}}
{{--        color: white !important;--}}
{{--        border: 1px solid #f25c69 !important;--}}
{{--        transition: all 0.2s;--}}
{{--    }--}}

{{--</style>--}}

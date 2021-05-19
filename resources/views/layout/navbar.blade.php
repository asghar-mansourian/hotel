<div class="tm-nav-section" style="background: #202c3b">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-light">
                    <button id="tmMainNavButton"
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
                            <a class="nav-link" href="{{url('/')}}" style="border-bottom:1px solid #202c3b;">
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
                                        <li class="nav-item"><a href="{{url('/projects?status=finished')}}">{{__('website.finished_projects')}}</a></li>
                                        <li class="nav-item"><a href="{{url('/projects?status=unfinished')}}">{{__('website.unfinished_projects')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/blog')}}">{{__('website.blog')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/pages/8')}}">{{__('website.quality')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/faq')}}">{{__('website.faq')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/medias')}}">{{__('website.medias')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-weight: bold;">
                                            {{ strtoupper(app()->getLocale()) }}
                                            <i class="fas fa-angle-down ml-2"></i>
                                        </a>
                                        <div class="dropdown-menu lang-a" aria-labelledby="dropdown_panel">
                                            @foreach(\App\lib\Helpers::getLocales() as $locale)
                                                @if($locale->locale != app()->getLocale())
                                                    <a class="dropdown-item " href="/set-locale/{{$locale->locale}}"> {{strtoupper($locale->locale)}}</a><br/>
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

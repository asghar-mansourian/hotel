<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="index.html">
            <img src="{{url('admin/en/images/brand/logo.png')}}" class="header-brand-img desktop-lgo"
                 alt="Admintro logo">
            <img src="{{url('admin/en/images/brand/logo1.png')}}" class="header-brand-img dark-logo"
                 alt="Admintro logo">
            <img src="{{url('admin/en/images/brand/favicon.png')}}" class="header-brand-img mobile-logo"
                 alt="Admintro logo">
            <img src="{{url('admin/en/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo"
                 alt="Admintro logo">
        </a>
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{url('admin/en/images/avatar.png')}}" alt="user-img" class="avatar-xl rounded-circle mb-1">
            </div>
            <div class="user-info">
                <h5 class=" mb-1">{{\Illuminate\Support\Facades\Auth::user()->name}} <i
                        class="ion-checkmark-circled  text-success fs-12"></i></h5>
                <span class="text-muted app-sidebar__user-name text-sm">Admin</span>
            </div>
        </div>

    </div>
    <ul class="side-menu app-sidebar3">
        {{--        <li class="side-item side-item-category mt-4">Main</li>--}}
        <li class="slide">
            <a class="side-menu__item" href="{{url('admin/home')}}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"></path>
                </svg>
                <span class="side-menu__label">{{__('custom.admin.panel.title')}}</span><span
                    class="badge badge-danger side-badge">Main</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                </svg>
                <span class="side-menu__label">{{__('custom.admin.user.title')}}</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{url('admin/users')}}" class="slide-item">{{__('custom.admin.user.title')}}</a></li>
                <li><a href="{{url('admin/users/create')}}"
                       class="slide-item">{{__('custom.admin.user.create.title')}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"></path>
                        <circle cx="12" cy="9" r="2.5"></circle>
                    </svg>
                </svg>
                <span class="side-menu__label">region & country</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{url('admin/countries')}}" class="slide-item">countries</a></li>
                <li><a href="{{url('admin/regions')}}" class="slide-item">regions</a></li>
            </ul>
        </li>


        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"></path>
                    </svg>
                </svg>
                <span class="side-menu__label">pages</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{url('admin/pages')}}" class="slide-item">Pages</a></li>
                <li><a href="{{url('admin/pages/create')}}" class="slide-item">create page</a></li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"></path>
                    </svg>
                </svg>
                <span class="side-menu__label">blogs</span><i class="angle fa fa-angle-right"></i>
            </a>


            <ul class="slide-menu">
                <li><a href="{{url('admin/blogs')}}" class="slide-item">Articles</a></li>
                <li><a href="{{url('admin/blogs/create')}}" class="slide-item">create article</a></li>
            </ul>


        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.17L4 17.17V4h16v12zM11 5h2v6h-2zm0 8h2v2h-2z"></path></svg>
                </svg>
                <span class="side-menu__label">contact-us</span><i class="angle fa fa-angle-right"></i>
            </a>


            <ul class="slide-menu">
                <li><a href="{{url('admin/contacts')}}" class="slide-item">Show</a></li>
            </ul>


        </li>


        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"></path>
                    </svg>
                </svg>
                <span class="side-menu__label">faqs</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{url('admin/faqs')}}" class="slide-item">Faqs</a></li>
                <li><a href="{{url('admin/faqs/create')}}" class="slide-item">create faq</a></li>
            </ul>
        </li>

    </ul>
</aside>

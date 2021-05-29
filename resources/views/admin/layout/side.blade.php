<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="index.html">
            <img src="{{url('admin/en/images/brand/logo.png')}}" class="header-brand-img desktop-lgo"
                 alt="Admintro logo">
            <img src="{{url('admin/en/images/brand/logo.png')}}" class="header-brand-img dark-logo"
                 alt="Admintro logo">
            <img src="{{url('admin/en/images/brand/favicon.ico')}}" class="header-brand-img mobile-logo"
                 alt="Admintro logo">
            <img src="{{url('admin/en/images/brand/favicon.ico')}}" class="header-brand-img darkmobile-logo"
                 alt="Admintro logo">
        </a>
    </div>
{{--    <div class="app-sidebar__user">--}}
{{--        <div class="dropdown user-pro-body text-center">--}}
{{--            <div class="user-pic">--}}
{{--                <img src="{{url('admin/en/images/avatar.png')}}" alt="user-img" class="avatar-xl rounded-circle mb-1">--}}
{{--            </div>--}}
{{--            <div class="user-info">--}}
{{--                <h5 class=" mb-1">{{\Illuminate\Support\Facades\Auth::user()->name}} <i--}}
{{--                        class="ion-checkmark-circled  text-success fs-12"></i></h5>--}}
{{--                <span class="text-muted app-sidebar__user-name text-sm">Admin</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
    <ul class="side-menu app-sidebar3" style="margin-top: 85px;">
{{--        <li class="side-item side-item-category mt-4">Main</li>--}}
{{--        <li class="slide">--}}
{{--            <a class="side-menu__item" href="{{url('admin/admin-invoices')}}">--}}
{{--                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"--}}
{{--                     width="24">--}}
{{--                    <path d="M0 0h24v24H0V0z" fill="none"></path>--}}
{{--                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">--}}
{{--                        <path d="M0 0h24v24H0z" fill="none"></path>--}}
{{--                        <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>--}}

{{--                    </svg>--}}
{{--                </svg>--}}
{{--                <span class="side-menu__label">{{__('admin.admin_invoices}}</span><i class="angle fa fa-angle-right"></i>--}}
{{--            </a>--}}

{{--        </li>--}}
        <li class="slide">
            <a class="side-menu__item" href="{{url('admin/projects')}}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.projects')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>
        <li class="slide">
            <a class="side-menu__item" href="{{url('admin/project-rooms')}}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                    </svg>
                </svg>
                <span class="side-menu__label">{{__('admin.project_rooms')}}</span><i class="angle fa fa-angle-right"></i>
            </a>

        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{url('/admin/room-details/')}}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                    </svg>
                </svg>
                <span class="side-menu__label">{{__('admin.project_room_detail')}}</span><i class="angle fa fa-angle-right"></i>
            </a>

        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{url('admin/medias')}}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                    </svg>
                </svg>
                <span class="side-menu__label">{{__('admin.medias')}}</span><i class="angle fa fa-angle-right"></i>
            </a>

        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{url('admin/settings')}}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-wrench" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                    </svg>
                </svg>
                <span class="side-menu__label">{{__('admin.settings')}}</span><i class="angle fa fa-angle-right"></i>
            </a>

        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{url('/translations')}}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-language" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                    </svg>
                </svg>
                <span class="side-menu__label">{{__('admin.translate')}}</span><i class="angle fa fa-angle-right"></i>
            </a>

        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-wordpress" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                    </svg>
                </svg>
                <span class="side-menu__label">{{__('admin.blogs')}}</span><i class="angle fa fa-angle-right"></i>
            </a>


            <ul class="slide-menu">
                <li><a href="{{url('admin/blogs')}}" class="slide-item">{{__('admin.articles')}}</a></li>
                <li><a href="{{url('admin/blogs/create')}}" class="slide-item">{{__('admin.create_blogs')}}</a></li>
            </ul>


        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-image" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                    </svg>
                </svg>
                <span class="side-menu__label">{{__('admin.sliders')}}</span><i class="angle fa fa-angle-right"></i>
            </a>


            <ul class="slide-menu">
                <li><a href="{{url('admin/sliders')}}" class="slide-item">{{__('admin.sliders')}}</a></li>
                    <li><a href="{{url('admin/sliders/create')}}" class="slide-item">{{__('admin.create_slider')}}</a></li>
            </ul>


        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <i class="fa fa-envelope-open-o" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                </svg>
                <span class="side-menu__label">{{__('admin.contactus')}}</span><i class="angle fa fa-angle-right"></i>
            </a>


            <ul class="slide-menu">
                <li><a href="{{url('admin/contacts')}}" class="slide-item">{{__('admin.show')}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                     width="24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <i class="fa fa-question-circle" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                    </svg>
                </svg>
                <span class="side-menu__label">{{__('admin.faqs')}}</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{url('admin/faqs')}}" class="slide-item">{{__('admin.show_faqs')}}</a></li>
                <li><a href="{{url('admin/faqs/create')}}" class="slide-item">{{__('admin.create_faqs')}}</a></li>
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
                <span class="side-menu__label">{{__('admin.pages')}}</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{url('admin/pages')}}" class="slide-item">{{__('admin.pages')}}</a></li>
                    <li><a href="{{url('admin/pages/create')}}" class="slide-item">{{__('admin.createpage')}}</a></li>
            </ul>
        </li>
        <div style="visibility: hidden">
            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/orders?status=1&purchased=1')}}" data-status="1">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.purchased')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/orders?status=9&cancel=1')}}" data-status="9">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.canceled_orders')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/orders?status=2&warehouse_abroad=1')}}" data-status="2">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.outside_warehouse')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/boxes?status=0')}}" data-status="0" data-has-box="1">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.box_collection')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/boxes?status=1')}}" data-status="1" data-has-box="1">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.went_to_box_airport')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/boxes?status=2')}}" data-status="2" data-has-box="1">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.box_reached_the_country')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/orders?status=6&in_warehouse=1')}}" data-status="6">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.in_the_country_ware_house')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/orders?status=7&courier_delivery=1')}}" data-status="7">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.given_to_the_courier')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{url('admin/orders?status=8&complete=1')}}" data-status="8">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-shopping-basket" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.given_to_customers')}}</span><i class="angle fa fa-angle-right"></i>
                </a>

            </li>

            {{--        <li class="slide">--}}
            {{--            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">--}}
            {{--                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"--}}
            {{--                     width="24">--}}
            {{--                    <path d="M0 0h24v24H0V0z" fill="none"></path>--}}
            {{--                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">--}}
            {{--                        <path d="M0 0h24v24H0z" fill="none"></path>--}}
            {{--                        <i class="fa fa-money" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>--}}

            {{--                    </svg>--}}
            {{--                </svg>--}}
            {{--                <span class="side-menu__label">{{__('admin.invoices')}}</span><i class="angle fa fa-angle-right"></i>--}}
            {{--            </a>--}}
            {{--            <ul class="slide-menu">--}}
            {{--                <li><a href="{{url('admin/invoices')}}" class="slide-item">Show Invoices</a></li>--}}
            {{--            </ul>--}}
            {{--        </li>--}}


            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                         width="24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <i class="fa fa-wrench" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                        </svg>
                    </svg>
                    <span class="side-menu__label">{{__('admin.website_setting')}}</span><i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    @can('read SiteSetting')
                        <li class="slide">
                            <a class="side-menu__item" href="{{url('admin/settings')}}">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                     width="24">
                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <i class="fa fa-wrench" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                    </svg>
                                </svg>
                                <span class="side-menu__label">{{__('admin.settings')}}</span><i class="angle fa fa-angle-right"></i>
                            </a>

                        </li>

                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                     width="24">
                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <i class="fa fa-question-circle" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                    </svg>
                                </svg>
                                <span class="side-menu__label">{{__('admin.cancel_orders')}}</span><i class="angle fa fa-angle-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li><a href="{{url('admin/cancel-reason-orders')}}" class="slide-item">{{__('admin.cancel_reason_orders')}}</a></li>
                                <li><a href="{{url('admin/cancel-reason-orders/create')}}" class="slide-item">{{__('admin.reason_order_create')}}</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                     width="24">
                                    <i class="fa fa-user-md" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                </svg>
                                <span class="side-menu__label">{{__('admin.howWork')}}</span><i class="angle fa fa-angle-right"></i>
                            </a>


                            <ul class="slide-menu">
                                <li><a href="{{url('admin/how_we_work')}}" class="slide-item">{{__('admin.howWork')}}</a></li>
                                <li><a href="{{url('admin/how_we_work/create')}}" class="slide-item">{{__('admin.addhowWork')}}</a></li>
                            </ul>


                        </li>
                        @can('read Notification')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/notifications')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-phone" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.notifications')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>

                            </li>
                        @endcan
                        @can('read Script')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/scripts/index')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-adn" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.custom_script')}}</span><i class="angle fa fa-angular"></i></a>

                            </li>
                        @endcan
                        @can('read Translate')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('/translations')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-language" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.translate')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>

                            </li>
                        @endcan
                        @can('read Calculator')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/calculatores')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-calculator" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.calculator')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>

                            </li>
                        @endcan
                        @can('PriceItem')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/price-items')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-money" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.price_items')}}</span><i class="angle fa fa-angle-right"></i></a>

                            </li>
                        @endcan
                        @can('read Courier')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/couriers')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-money" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.courier')}}</span><i class="angle fa fa-angle-right"></i></a>

                            </li>
                        @endcan
                        @can('read Country')
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
                                    <span class="side-menu__label">{{__('admin.region_and_country')}}</span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/countries')}}" class="slide-item">{{__('admin.countries')}}</a></li>
                                    @can('read Region')
                                        <li><a href="{{url('admin/regions')}}" class="slide-item">{{__('admin.regions')}}</a></li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('read User')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.usertitle')}}</span><i
                                        class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/users')}}" class="slide-item">{{__('admin.usertitle')}}</a></li>
                                    <li><a href="{{url('admin/users/create')}}"
                                           class="slide-item">{{__('admin.usercreate')}}</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('read CountryDetail')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/countries/details')}}">
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
                                    <span class="side-menu__label">{{__('admin.countrydetail')}}</span><i class="angle fa fa-angle-right"></i></a>

                            </li>
                        @endcan
                        @can('read Page')
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
                                    <span class="side-menu__label">{{__('admin.pages')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/pages')}}" class="slide-item">{{__('admin.pages')}}</a></li>
                                    @can('create Page')
                                        <li><a href="{{url('admin/pages/create')}}" class="slide-item">{{__('admin.createpage')}}</a></li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('read Blog')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-wordpress" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.blogs')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>


                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/blogs')}}" class="slide-item">{{__('admin.articles')}}</a></li>
                                    <li><a href="{{url('admin/blogs/create')}}" class="slide-item">{{__('admin.create_blogs')}}</a></li>
                                </ul>


                            </li>
                        @endcan
                        @can('read Stock')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-compress" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{ __('admin.stocks') }}</span><i class="angle fa fa-angle-right"></i>
                                </a>


                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/stocks')}}" class="slide-item">{{ __('admin.stocks') }}</a></li>
                                    <li><a href="{{url('admin/stocks/create')}}" class="slide-item">{{ __('admin.createstock') }}</a></li>
                                </ul>


                            </li>
                        @endcan
                        @can('read Slider')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-image" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>
                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.sliders')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>


                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/sliders')}}" class="slide-item">{{__('admin.sliders')}}</a></li>
                                    @can('create Slider')
                                        <li><a href="{{url('admin/sliders/create')}}" class="slide-item">{{__('admin.create_slider')}}</a></li>
                                    @endcan
                                </ul>


                            </li>
                        @endcan
                        @can('read Customer')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <i class="fa fa-users" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                    </svg>
                                    <span class="side-menu__label">{{__('admin.customers')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>


                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/customers')}}" class="slide-item">{{__('admin.customers')}}</a></li>
                                    @can('create Customer')
                                        <li><a href="{{url('admin/customers/create')}}" class="slide-item">{{__('admin.add_customers')}}</a></li>
                                        <li><a href="{{url('admin/customer_reviews')}}" class="slide-item">{{__('admin.customer_reviews')}}</a></li>
                                    @endcan
                                </ul>


                            </li>
                        @endcan
                        @can('read Contact')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <i class="fa fa-envelope-open-o" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                    </svg>
                                    <span class="side-menu__label">{{__('admin.contactus')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>


                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/contacts')}}" class="slide-item">{{__('admin.show')}}</a></li>
                                    @can('read Inquiry')
                                        <li><a href="{{url('admin/inquiry')}}" class="slide-item">{{__('admin.inquiry')}}</a></li>
                                    @endcan
                                </ul>


                            </li>
                        @endcan


                        @can('read Faq')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-question-circle" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.faqs')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/faqs')}}" class="slide-item">{{__('admin.show_faqs')}}</a></li>
                                    <li><a href="{{url('admin/faqs/create')}}" class="slide-item">{{__('admin.create_faqs')}}</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('read Payment')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/payments')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-paypal" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.payments')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>

                            </li>
                        @endcan
                        @can('read Branch')
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/branches')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-building" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 7%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.branches')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>

                            </li>
                        @endcan
                        @can('read Role')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-lock" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 8%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.roles_and_permissions')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/roles')}}" class="slide-item">{{__('admin.roles')}}</a></li>
                                    <li><a href="{{url('admin/permissions')}}" class="slide-item">{{__('admin.permissions')}}</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('read Admin')
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                         width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <i class="fa fa-lock" style="font-size: 17px;color: #5c678f;position: absolute;top: 31%;left: 8%;"></i>

                                        </svg>
                                    </svg>
                                    <span class="side-menu__label">{{__('admin.admins')}}</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{url('admin/admins')}}" class="slide-item">{{__('admin.manage_admins')}}</a></li>
                                    @can('create Admin')
                                        <li><a href="{{url('admin/admins/create')}}" class="slide-item">{{__('admin.create_admin')}}</a></li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                    @endcan
                </ul>
            </li>
        </div>

    </ul>
</aside>

<style>
    .slide-menu a:before {
        content: '';
        margin-right: 0px !important;
        position: relative;
        font-family: 'typicons' !important;
        opacity: 0 !important;
    }
</style>

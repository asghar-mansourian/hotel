<div class="row pt-3 pb-3 mob_dis " style="padding: 0 15px;">
    <div class="logo">
        <a href="#"><img src="{{url('front/image/logo.svg')}}"></a>
    </div>

    <div class="menu_sec">
        <ul>
            <li>
                <a href="/" class="{{url()->current() === url('/') ? 'active' : ''}}">{{__('website.home')}}</a>
            </li>
            <li>
                <a href="#">{{__('website.pricing')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/how-we-work') ? 'active' : ''}}" href="{{url('/how-we-work')}}">{{__('website.howwework')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/faq') ? 'active' : ''}}" href="{{url('/faq')}}">{{__('website.faq')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/blog') ? 'active' : ''}}" href="{{url('/blog')}}">{{__('website.blog')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/contact-us') ? 'active' : ''}}" href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
            </li>
            @auth('web')
                <li>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_panel"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{\Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->family}}
                            <i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown_panel">
                            <a class="dropdown-item" href="{{url('/home')}}">{{__('website.dashboard')}}</a><br/>
                            <a class="dropdown-item" href="{{url('my-addresses-abroad')}}">{{__('website.myaddressesabroad')}}</a><br/>
                            <a class="dropdown-item" href="{{route('orders.index')}}">{{__('website.invoices')}}</a><br/>
                            <a class="dropdown-item" href="{{route('invoices.index')}}">{{__('website.orders')}}</a><br/>
                            <a class="dropdown-item" href="#">AZN {{__('website.balance.azn')}}</a><br/>
                            <a class="dropdown-item" href="#">TL {{__('website.balance.tl')}}</a><br/>
                            <a class="dropdown-item" href="#">Kuryer</a><br/>
                            <a class="dropdown-item" href="#">Sorğu</a><br/>
                            <a class="dropdown-item" href="{{url('/setting')}}">{{__('website.settings')}}</a><br/>
                            <a class="dropdown-item" href="{{url('/logout')}}">{{__('website.logout')}}</a><br/>
                        </div>
                    </div>
                </li>
            @endauth
            @guest('web')
                <li>
                    <a href="/login">
                        <strong>Daxil ol</strong>
                    </a> |
                    <a href="/register">
                        <strong>Qeydiyyat</strong>
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</div>

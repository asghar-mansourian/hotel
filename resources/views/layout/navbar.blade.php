<div class="row pt-3 pb-3 mob_dis " style="padding: 0 15px;">
    <div class="logo">
        <a href="/"><img src="{{url('front/image/logo-express.svg')}}"></a>
    </div>

    <div class="menu_sec" style="    margin-top: 16px;">
        <ul>
            <li>
                <a href="/customers">{{__('website.customers')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/pricing') ? 'active' : ''}}" href="{{url('/pricing')}}">{{__('website.pricing')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/how-we-work') ? 'active' : ''}}" href="{{url('/how-we-work')}}">&ensp;{{__('website.howwework')}} </a>
            </li>
            <li>
                <a class="{{url()->current() === url('/contact-us') ? 'active' : ''}}" href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
            </li>
            @auth('web')
                <li>
                    <a href="{{url('/basket')}}" class="btn btn-outline-danger " type="button" style="    margin-top: -4px;
    border:2px solid #f25c69;
    color: #fff;
    font-size: 11px;
    padding: 6px 24px;">
                        <i style="color:#f25c69 " class="fa fa-shopping-basket"></i>
                    </a>
                </li>
            @endauth
            @auth('web')
                <li>
                    <a href="/orders/create" class="btn btn-secondary" type="button" style="    margin-top: -4px;
    background: #f25c69;
    color: #fff;
    font-size: 11px;
    padding: 6px 24px;">
                        {{__('member.order_title')}}
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</div>

<div class="row pt-3 pb-3 mob_dis " style="padding: 0 15px;">
    <div class="logo">
        <a href="/"><img src="{{url('front/image/logo-express.svg')}}"></a>
    </div>

    <div class="menu_sec">
        <ul>
            <li>
                <a href="/customers">{{__('website.customers')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/pricing') ? 'active' : ''}}" href="{{url('/pricing')}}">{{__('website.pricing')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/blog') ? 'active' : ''}}" href="{{url('/blog')}}">{{__('website.blog')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/contact-us') ? 'active' : ''}}" href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
            </li>
            <li>
                <a href="/login" class="btn btn-secondary" type="button" style="    margin-top: -7px;
    background: #f25c69;
    color: #fff;
    font-size: 11px;
    padding: 6px 24px;">
                    {{__('member.order_title')}}
                </a>
            </li>
        </ul>
    </div>
</div>

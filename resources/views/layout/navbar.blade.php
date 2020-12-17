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
                <a class="{{url()->current() === url('/pricing') ? 'active' : ''}}"
                   href="{{url('/pricing')}}">{{__('website.pricing')}}</a>
            </li>
            <li>
                <a class="{{url()->current() === url('/how-we-work') ? 'active' : ''}}" href="{{url('/how-we-work')}}">&ensp;{{__('website.howwework')}} </a>
            </li>
            <li>
                <a class="{{url()->current() === url('/contact-us') ? 'active' : ''}}"
                   href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
            </li>
            <li>
                <a href="{{url('/basket')}}" class="btn btn-outline-danger " type="button" style="margin-top: -4px;
    border: 1px solid #bfbfbf;
    color: #fff;
    font-size: 11px;
    padding: 6px 9px;
    border-radius: 10px;position: relative">
                    <i style="    color: #7a7a7b;
    font-size: 12px;" class="fa fa-shopping-cart"></i>
                    @auth('web')
                        @if (auth()->check())
                            @php

                                $basketnum =\App\Basket::where('user_id' , auth()->user()->id)->count();
                            @endphp
                            <span style="    color: white;
    background-color: #f25c69;
    padding: 3px 6px;
    position: absolute;
    top: -7px;
    border-radius: 100%;
    font-size: 8px;">{{$basketnum}}</span>
                        @endif

                </a>
            </li>
            @endauth
            @auth('web')
                <li>
                    <a class="btn-header-1" href="/orders/create" class="btn btn-secondary" type="button" style="    margin-top: -4px;
    color: #040404;
    font-size: 11px;
    padding: 9px 24px;
    border: 1px solid #7a7a7b;
    border-radius: 11px;
    box-shadow: 0 0 5px 2px #e8e8e8;        transition: all 0.2s;
">
                        {{__('member.order_title')}}
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</div>

<style>
    .btn-header-1:hover {
        background-color: #f25c69;
        color: white !important;
        border: 1px solid #f25c69 !important;
        transition: all 0.2s;
    }
</style>

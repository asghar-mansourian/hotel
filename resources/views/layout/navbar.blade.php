<div class="row pt-3 pb-3 mob_dis " style="padding: 0 15px;">
    <div class="logo">
        <a href="/"><img src="{{url('front/image/favicon/blue_logo.png')}}"></a>
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
                <a class="btn btn-outline-danger btn-header-basket-parent"  href="{{url('/basket')}}" style="position: relative" >
                    <i style="
    font-size: 12px;

    border: 1px solid #2AF598 !important;
    font-size: 13px;
    padding: 7px 7px;
    border-radius: 5px;
    position: absolute;
    left: -7px;
    bottom: -9px;
    height: 30px;
    width: 40px;
        " class="fa fa-shopping-cart"></i>
                    @auth('web')
                        @if (auth()->check())
                            @php

                                $basketnum =\App\Basket::where('user_id' , auth()->user()->id)->count();
                            @endphp
                            <span style="
                                color: white;
    background-color: #28f19e;
    padding-top: 5px;
    width: 20px;
    height: 20px;
    position: absolute;
    top: -20px;
    border-radius: 100%;
    font-size: 9px;
    left: 20px;
                            ">{{$basketnum}}</span>
                        @endif
                    @endauth
                    @guest()

                        <span style="    color: white;
    background-color: #02ccb2;
    padding: 3px 6px;
    position: absolute;
    top: -15px;
    border-radius: 100%;
    font-size: 8px;">0</span>
                    @endauth
                </a>
            </li>

            <li>
                <a href="/orders/create" class="order_button" type="button" style="/*    margin-top: -4px;
    color: #040404;
    font-size: 11px;
    padding: 9px 24px;
    border: 1px solid #7a7a7b;
    border-radius: 11px;
    box-shadow: 0 0 5px 2px #e8e8e8;
        transition: all 0.2s;*/
">
                    {{__('member.neworder')}}
                </a>
            </li>
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

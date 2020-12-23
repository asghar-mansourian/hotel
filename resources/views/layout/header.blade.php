<div class="row" style="    display: flex; align-items: center;">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6 col-12">

        <div class="font_grey " style="display: inline-block">
            <ul style="margin-bottom: 6px;">
                <li style="display: inline; border-right: 1px solid pink">
                    <a style="    font-size: 12px;" class="{{url()->current() === url('/faq') ? 'active' : ''}}" href="{{url('/faq')}}">{{__('website.faq')}}&ensp;</a>
                </li>
                <li style="display: inline">
                    <a style="    font-size: 12px;" href="{{url('/blog')}}">&ensp;{{__('website.blog')}} </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12">
        <div class="menu_sec">
            <ul class="text-right">
                <li>
                    <div class="dropdown" style="display: inline-block">
                        <button class=" btn-secondary dropdown-toggle" style="border:0;height: 34px; " type="button" id="dropdown_panel"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ app()->getLocale() }}
                            <i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
                        </button>
                        <div class="dropdown-menu lang-a" aria-labelledby="dropdown_panel">
                            @foreach(\App\lib\Helpers::getLocales() as $locale)
                                @if($locale->locale != app()->getLocale())
                                    <a class="dropdown-item " href="/set-locale/{{$locale->locale}}"> {{$locale->locale}}</a><br/>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </li>
                @auth('web')
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_panel"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -5px;background-color: #fff;    color: #151f59;font-weight: 700; font-size: 12px">
                                {{\Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->family}}
                                <i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdown_panel" style="z-index: 999999;right: 0;left: unset">
                                <a class="dropdown-item" href="{{url('/home')}}">{{__('website.dashboard')}}</a><br/>
                                <a class="dropdown-item" href="{{ route('member.countrydetails.index') }}">{{str_limit(__('member.myaddressesabroad'),15)}}</a><br/>
                                <a class="dropdown-item" href="{{route('invoices.index')}}">{{__('member.order_title')}}</a><br/>
                                <a class="dropdown-item" href="{{route('orders.index')}}">{{__('member.mybindings')}}</a><br/>
                                <a class="dropdown-item" href="{{url('/az-balance')}}">{{__('member.aznBalance')}}</a><br/>
                                <a class="dropdown-item" href="{{url('tl-balance')}}">{{__('member.tlBalance')}}</a><br/>
                                @if(\App\Setting::getValue(\App\Setting::FIELD_HAS_COURIERS_IN_PROJECT))
                                    <a class="dropdown-item" href="{{route('courier')}}">{{__('website.balancecourier')}}</a><br/>
                                @endif
                                <a class="dropdown-item" href="{{route('inquiry')}}">{{__('website.balanceinquiry')}}</a><br/>
                                <a class="dropdown-item" href="{{url('/setting')}}">{{__('website.settings')}}</a><br/>
                                <a class="dropdown-item" href="{{url('/logout')}}">{{__('website.logout')}}</a><br/>
                            </div>
                        </div>
                    </li>
                @endauth
                @guest('web')
                    <li style="margin-top: 7px;">
                        <a style="    font-size: 12px;" href="/login">
                            <strong>{{__('website.login')}}</strong>
                        </a> |
                        <a style="    font-size: 12px;" href="/register">
                            <strong>{{__('website.register')}}</strong>
                        </a>
                    </li>
                    @endguest
                    </li>
            </ul>
        </div>
    </div>
</div>

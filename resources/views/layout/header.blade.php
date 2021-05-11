<div class="row" style="    display: flex; align-items: center;">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-5">

        <div class="font_grey " style="display: inline-block">
            <ul style="margin-bottom: 6px;">
                <li style="display: inline; border-right: 1px solid pink">
                    <a  class="{{url()->current() === url('/faq') ? 'active' : ''}}" href="{{url('/faq')}}">{{__('website.faq')}}</a>
                </li>
                <li style="display: inline">
                    <a  href="{{url('/blog')}}">&ensp;{{__('website.blog')}} </a>
                </li>

                <li style="display: inline;margin-left: 5px">
                    <a class="{{url()->current() === url('/about-us') ? 'active' : ''}}" href="{{url('/about-us')}}">{{__('website.about')}}</a>
                </li>
                |
                @guest('web')
                    <li style="margin-top: 7px;display: inline;margin-left: 5px;">
                        <a style="border: 1px solid black;border-radius: 5px;width: 100px" href="{{url('/login')}}">
                            <strong>{{__('website.login')}}</strong>
                        </a>
                        <a style="border: 1px solid black;background-color: #e4aa58;border-radius: 5px;width: 200px;margin-left: 10px;" href="{{url('/register')}}">
                            <strong>{{__('website.register')}}</strong>
                        </a>
                    </li>
                @endguest
                <li style="display: inline;margin-left: 5px">
                    <a class="{{url()->current() === url('/calculator') ? 'active' : ''}}" href="{{url('/calculator')}}">{{__('website.calculator')}}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7">
        <div class="menu_sec">
            <ul class="text-right">

                @auth('web')
                    <li style="margin-left: 10px!important;">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_panel"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -5px;font-weight: 700; font-size: 12px">
                                {{\Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->family}}
                                <i class="fas fa-user ml-2" style="font-size: 12px"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdown_panel" style="z-index: 999999;right: 0;left: unset">
                                <a class="dropdown-item" href="{{url('/home')}}">{{__('member.dashboard')}}</a><br/>
                                <a class="dropdown-item" href="{{ route('member.countrydetails.index') }}">{{str_limit(__('member.countrydetails'),15)}}</a><br/>
                                <a class="dropdown-item" href="{{route('orders.index')}}">{{__('member.orders')}}</a><br/>
                                <a class="dropdown-item" href="{{route('invoices.index')}}">{{__('member.mybindings')}}</a><br/>
                                <a class="dropdown-item" href="{{url('/az-balance')}}">{{__('member.aznBalance')}}</a><br/>
                                <a class="dropdown-item" href="{{url('tl-balance')}}">{{__('member.tlBalance')}}</a><br/>
                                @if(\App\Setting::getValue(\App\Setting::FIELD_HAS_COURIERS_IN_PROJECT))
                                    <a class="dropdown-item" href="{{route('courier')}}">{{__('website.balancecourier')}}</a><br/>
                                @endif
                                <a class="dropdown-item" href="{{route('inquiry')}}">{{__('member.inquiry')}}</a><br/>
                                <a class="dropdown-item" href="{{url('/setting')}}">{{__('member.setting')}}</a><br/>
                                <a class="dropdown-item" href="{{url('/logout')}}">{{__('member.logout')}}</a><br/>
                            </div>
                        </div>
                    </li>
                @endauth
                    @guest('web')
                        <li style="margin-left: 10px!important;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" style="margin-top: -5px;border: 1px solid black;font-weight: 700; font-size: 12px">
                                <i class="fas fa-phone-alt ml-2" style="font-size: 12px"></i>
                            </button>
                            <span>{{\App\Setting::getValue(\App\Setting::FIELD_PHONE)}}</span>
                        </li>

                @endguest
                    <li style="margin-left: 10px!important;">
                        <div class="dropdown" style="display: inline-block">
                            <button class=" btn-secondary dropdown-toggle" style="border:0;height: 34px; " type="button" id="dropdown_panel"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(app()->getLocale() == 'ru')
                                    RUS
                                @else
                                    ENG
                                @endif
                                {{--                            {{ app()->getLocale() }}--}}
                                <i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
                            </button>
                            <div class="dropdown-menu lang-a" aria-labelledby="dropdown_panel">
                                @foreach(\App\lib\Helpers::getLocales() as $locale)
                                    @if($locale->locale != app()->getLocale())
                                        <a class="dropdown-item " href="/set-locale/{{$locale->locale}}">
                                            @if($locale->locale == 'ru')
                                                RUS
                                            @else
                                                ENG
                                            @endif
                                        </a><br/>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </li>
            </ul>
        </div>
    </div>
</div>

<div class="row" style="    display: flex; align-items: center;">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6 col-12">

        <div class="font_grey " style="display: inline-block">
            <ul>
                <li style="display: inline; border-right: 1px solid pink">
                    <a style="    font-size: 12px;" class="{{url()->current() === url('/faq') ? 'active' : ''}}" href="{{url('/faq')}}"> {{__('website.faq')}} </a>
                </li>
                <li style="display: inline">
                    <a style="    font-size: 12px;" class="{{url()->current() === url('/how-we-work') ? 'active' : ''}}" href="{{url('/how-we-work')}}">&ensp;{{__('website.howwework')}} </a>
                </li>
            </ul>
        </div>
        <div class="dropdown" style="display: inline-block">
            <button class=" btn-secondary dropdown-toggle" style="border:0;" type="button" id="dropdown_panel"
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
        <div style="display: inline-block">
            <form class="convert-currency" method="post" action="{{url('/getCurrencyCalculator')}}">
                <div class="float-left">
                    <input type="text" name="currency" style="width: 104px;
    height: 12px;
    font-size: 11px;
    border-top: 0px;
    border-right: 0px;
    border-left: 0px;
    text-align: center;" value="1" required>
                </div>
                <select name="from" class=" " aria-labelledby="dropdown_baglama"
                        style="
width: 100px;
    margin-left: 10px;
    padding-right: 0px;
    padding-top: 0px;
    padding-left: 0px;
    padding-bottom: 0px;
    height: 22px;
    font-size: 11px;
    border-top: 0px;
    border-right: 0px;
        text-align-last: center;
    border-left: 0px;">
                    <option class="">{{__('member.select')}}</option>
                    <option class="dropdown-item" value="RUB">RUB</option>
                    <option class="dropdown-item" selected value="USD">USD</option>
                    <option class="dropdown-item" value="TRY">TRY</option>
                </select>
                <div style="clear: both;"></div>
                <div class="mt-2"></div>
                <div class="float-left">
                    <input class="result_cal" type="number" value="{{number_format(\App\lib\Helpers::getCurrency('usd', 'rub'), 2)}}" style="       width: 104px;
    height: 7px;
    font-size: 11px;
    border: 0px;
    background-color: white;
    text-align: center;" readonly>
                </div>
                <select name="to" class=" " aria-labelledby="dropdown_baglama"
                        style="    width: 100px;
    margin-left: 10px;
    padding-right: 0px;
    padding-top: 0px;
    padding-left: 0px;
    padding-bottom: 0px;
        text-align-last: center;

    height: 22px;
    box-shadow: 0 0 black !important;
    font-size: 11px;
    border: 0;
    text-align: center;
">
                    <option class="">{{__('member.select')}}</option>
                    <option class="dropdown-item" selected value="RUB">RUB</option>
                    <option class="dropdown-item" value="USD">USD</option>
                    <option class="dropdown-item" value="TRY">TRY</option>
                </select>
            </form>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12">
        <div class="menu_sec">
            <ul class="text-right">
                @auth('web')
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_panel"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{\Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->family}}
                                <i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdown_panel" style="z-index: 999999;right: 0;left: unset">
                                <a class="dropdown-item" href="{{url('/home')}}">{{__('website.dashboard')}}</a><br/>
                                <a class="dropdown-item" href="{{ route('member.countrydetails.index') }}">{{str_limit(__('member.myaddressesabroad'),15)}}</a><br/>
                                <a class="dropdown-item" href="{{route('invoices.index')}}">{{__('member.order_title')}}</a><br/>
                                <a class="dropdown-item" href="{{route('orders.index')}}">{{__('member.mybindings')}}</a><br/>
                                <a class="dropdown-item" href="#">{{__('member.aznBalance')}}</a><br/>
                                <a class="dropdown-item" href="{{url('tl-balance')}}">{{__('member.tlBalance')}}</a><br/>
                                <a class="dropdown-item" href="{{route('courier')}}">{{__('website.balance.courier')}}</a><br/>
                                <a class="dropdown-item" href="{{route('inquiry')}}">{{__('website.balance.inquiry')}}</a><br/>
                                <a class="dropdown-item" href="{{url('/setting')}}">{{__('website.settings')}}</a><br/>
                                <a class="dropdown-item" href="{{url('/logout')}}">{{__('website.logout')}}</a><br/>
                            </div>
                        </div>
                    </li>
                @endauth
                @guest('web')
                    <li>
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

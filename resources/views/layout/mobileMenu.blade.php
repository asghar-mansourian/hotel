<div class="mobil_menu">
    <div id="mySidepanel" class="sidepanel" style="z-index: 5555">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a class="{{url()->current() === url('/') ? 'active' : ''}}" href="{{route('home')}}">{{__('website.home')}}</a>
        <a class="{{url()->current() === url('/pricing') ? 'active' : ''}}" href="{{url('/pricing')}}">{{__('website.pricing')}}</a>
        <a class="{{url()->current() === url('/how-we-work') ? 'active' : ''}}" href="{{url('/how-we-work')}}">{{__('website.howwework')}}</a>
        <a class="{{url()->current() === url('/faq') ? 'active' : ''}}" href="{{url('/faq')}}">{{__('website.faq')}}</a>
        <a class="{{url()->current() === url('/blog') ? 'active' : ''}}" href="{{url('/blog')}}">{{__('website.blog')}}</a>
        <a class="{{url()->current() === url('/contact-us') ? 'active' : ''}}" href="{{url('/contact-us')}}">{{__('website.contact')}}</a>
        <hr>
        <a class="{{url()->current() === url('/login') ? 'active' : ''}}" href="{{url('/login')}}">{{__('website.login')}}</a>
        <a class="{{url()->current() === url('/register') ? 'active' : ''}}" href="{{url('/register')}}">{{__('website.register')}}</a>
    </div>
    <div class="logo_mob">
        <button class="openbtn" onclick="openNav()"><i class="fas fa-align-justify m-0"></i></button>
        <a href="#"><img src="{{url('front/image/logo.svg')}}"></a>
        @auth('web')
            <span class="dropdown float-right">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_panel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			      {{\Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->family}}<i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdown_panel">
                      <a class="dropdown-item" href="{{route('invoices.create')}}" > {{__('member.invoice_title')}}</a><br/>
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
			</span>
            <a class="btn-header-1 right" href="/orders/create" class="btn btn-secondary" type="button" style="
    color: #040404;
    font-size: 11px;
    padding: 9px 24px;
    border: 1px solid #7a7a7b;
    border-radius: 11px;
    box-shadow: 0 0 5px 2px #e8e8e8;
        transition: all 0.2s;
        float: right;
">
                {{__('member.neworder')}}
            </a>
            @endauth
        <div class="dropdown" style="display: inline-block;">
            <button class=" btn-secondary dropdown-toggle" style="border:0;height: 34px;;color: #151f59!important;background-color: white!important; " type="button" id="dropdown_panel"
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
        </div>


</div>

<li class="{{url()->current() === url('/home') ? 'active_li' : ''}}">
    <a href="{{url('/home')}}"><i class="fas fa-th-large"></i><span class="use_dis_no">{{__('website.dashboard')}}</span></a>
</li>
<li class="{{url()->current() === url('/country-details') ? 'active_li' : ''}}">
    <a href="{{ route('member.countrydetails.index') }}"><i class="fas fa-globe"></i><span class="use_dis_no">{{__('member.countrydetails')}}</span></a>
</li>
<li class="{{url()->current() === url('/orders') ? 'active_li' : ''}}">
    <a href="{{url('/orders')}}"><i class="fas fa-shopping-basket"></i><span class="use_dis_no">{{__('member.orders')}}</span></a>
</li>
<li class="{{url()->current() === route('invoices.index') ? 'active_li' : ''}}">
    <a href="{{route('invoices.index')}}"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">{{__('member.mybindings')}}</span></a>
</li>
<li class="{{url()->current() === url('/az-balance') ? 'active_li' : ''}}">
    <a href="{{url('/az-balance')}}"><i class="fas fa-donate"></i><span class="use_dis_no">{{__('member.aznBalance')}}</span></a>
</li>
{{--<li class="{{url()->current() === url('/tl-balance') ? 'active_li' : ''}}">--}}
{{--    <a href="{{route('tl_balance')}}"><i class="fas fa-donate"></i><span class="use_dis_no">{{__('member.tlBalance')}}</span></a>--}}
{{--</li>--}}
@if(\App\Setting::getValue(\App\Setting::FIELD_HAS_COURIERS_IN_PROJECT))
    <li class="{{url()->current() === url('/courier') ? 'active_li' : ''}}">
        <a href="{{route('courier')}}"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">{{__('member.courier')}}</span></a>
    </li>
@endif
<li class="{{url()->current() === url('/inquiry') ? 'active_li' : ''}}">
    <a href="{{route('inquiry')}}"><i class="far fa-question-circle" style="font-size: 16px;"></i><span class="use_dis_no">{{__('member.inquiry')}}</span></a>
</li>
<li class="{{url()->current() === url('/setting') ? 'active_li' : ''}}">
    <a href="{{url('/setting')}}"><i class="fas fa-cogs"></i><span class="use_dis_no">{{__('member.setting')}}</span></a>
</li>
<li>
    <a href="{{url('/logout')}}"><i class="fas fa-power-off"></i><span class="use_dis_no">{{__('member.logout')}}</span></a>
</li>

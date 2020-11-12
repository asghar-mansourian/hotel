<li class="{{url()->current() === url('/home') ? 'active_li' : ''}}">
    <a href="{{url('/home')}}"><i class="fas fa-th-large"></i><span class="use_dis_no">{{__('website.dashboard')}}</span></a>
</li>
<li class="{{url()->current() === url('/my-addresses-abroad') ? 'active_li' : ''}}">
    <a href="{{url('/my-addresses-abroad')}}"><i class="fas fa-search-location"></i><span class="use_dis_no">{{__('member.myaddressesabroad')}}</span></a>
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
<li>
    <a href="#"><i class="fas fa-donate"></i><span class="use_dis_no">{{__('member.tlBalance')}}</span></a>
</li>
<li>
    <a href="#"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">{{__('member.courier')}}</span></a>
</li>
<li>
    <a href="#"><i class="far fa-question-circle" style="font-size: 16px;"></i><span class="use_dis_no">{{__('member.inquiry')}}</span></a>
</li>
<li class="{{url()->current() === url('/setting') ? 'active_li' : ''}}">
    <a href="{{url('/setting')}}"><i class="fas fa-cogs"></i><span class="use_dis_no">{{__('member.setting')}}</span></a>
</li>
<li>
    <a href="{{url('/logout')}}"><i class="fas fa-power-off"></i><span class="use_dis_no">{{__('member.logout')}}</span></a>
</li>

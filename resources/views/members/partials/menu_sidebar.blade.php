<li class="{{url()->current() === url('/home') ? 'active_li' : ''}}">
    <a href="{{url('/home')}}"><i class="fas fa-th-large"></i><span class="use_dis_no">Dashboard</span></a>
</li>
<li class="">
    <a href="#"><i class="fas fa-search-location"></i><span class="use_dis_no">Xaricdəki ünvanlarım</span></a>
</li>
<li class="{{url()->current() === url('/orders') ? 'active_li' : ''}}">
    <a href="{{url('/orders')}}"><i class="fas fa-shopping-basket"></i><span class="use_dis_no">Orders</span></a>
</li>
<li class="{{url()->current() === route('invoices.index') ? 'active_li' : ''}}">
    <a href="{{route('invoices.index')}}"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">Bağlamalarım</span></a>
</li>
<li>
    <a href="#"><i class="fas fa-donate"></i><span class="use_dis_no">AZN Balansım</span></a>
</li>
<li>
    <a href="#"><i class="fas fa-donate"></i><span class="use_dis_no">TL Balansım</span></a>
</li>
<li>
    <a href="#"><i class="fas fa-hand-holding-heart"></i><span class="use_dis_no">Kuryer</span></a>
</li>
<li>
    <a href="#"><i class="far fa-question-circle" style="font-size: 16px;"></i><span class="use_dis_no">Sorğu</span></a>
</li>
<li class="{{url()->current() === url('/setting') ? 'active_li' : ''}}">
    <a href="{{url('/setting')}}"><i class="fas fa-cogs"></i><span class="use_dis_no">Setting</span></a>
</li>
<li>
    <a href="{{url('/logout')}}"><i class="fas fa-power-off"></i><span class="use_dis_no">Log Out</span></a>
</li>

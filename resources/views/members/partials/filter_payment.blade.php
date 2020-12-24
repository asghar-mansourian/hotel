<select name="filter_payment" onchange="window.location.href = window.location.origin  + window.location.pathname + '?filter_payment=' + this.value" aria-labelledby="dropdown_baglama"
        style=" width: 100px; box-shadow: 0 0 black !important;">
    <option class="dropdown-item" @if(request()->get('filter_payment') === 'all') {{'selected'}}  @endif   value="all">{{__('member.all')}}</option>
    <option class="dropdown-item" @if(request()->get('filter_payment') === 'output') {{'selected'}}  @endif    value="output">{{__('member.output')}}</option>
    <option class="dropdown-item" @if(request()->get('filter_payment') === 'income') {{'selected'}}  @endif    value="income">{{__('member.income')}}</option>
</select>

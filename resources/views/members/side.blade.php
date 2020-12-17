<div class="col-md-3 col-sm-2 col-xs-3">
    <div class="h4_height">
        <h4 class="use_dis_no">{{__('member.user')}} <strong>{{auth()->user()->name}}</strong></h4>
    </div>

    <div class="left-side mt-5">
        <ul>
            @include('members.partials.menu_sidebar')
        </ul>

    </div>
    <div class="rate_calculator mt-5">
        <div class="title_list mb-4">{{__('member.exchangeratecalculator')}}</div>
        <form class="convert-currency" method="post" action="{{url('/getCurrencyCalculator')}}">
            <div class="float-left">
                <input type="number" name="currency" id="calculate-currency-number" required value="1">
            </div>
            <select name="from" aria-labelledby="dropdown_baglama" style="width: 100px;margin-left: 10px; box-shadow: 0 0 black !important;">
{{--                <option class="">{{__('member.select')}}</option>--}}
                <option class="dropdown-item" value="RUB">RUB</option>
                <option class="dropdown-item" selected value="USD">USD</option>
                <option class="dropdown-item" value="TRY">TRY</option>
            </select>
            <div style="clear: both;"></div>
            <div class="mt-4"></div>
            <div class="float-left">
                <input class="result_cal" type="text" readonly>
            </div>
            <select name="to" class=" " aria-labelledby="dropdown_baglama"
                    style=" width: 100px;margin-left: 10px;
    box-shadow: 0 0 black !important;">
                {{--                <option class="">{{__('member.select')}}</option>--}}
                <option class="dropdown-item" selected value="RUB">RUB</option>
                <option class="dropdown-item" value="USD">USD</option>
                <option class="dropdown-item" value="TRY">TRY</option>
            </select>
            <div style="clear: both;"></div>

            <div class="col-md-12 button-part mt-4 p-0" style="display: none">
                <button type="submit" class="btn-effect w-100 ">{{__('member.calculate')}}</button>
            </div>
        </form>

        <div class="font_grey mt-4">{{__('member.calculateexchange')}}</div>
    </div>
    {{--<div class="daily_unit mt-5">
        <div class="title_list mb-4">{{__('member.dailysize')}}</div>
        <ul>
            @php
                $daySizeTRY = 1;
                $daySizeUSD = number_format(\App\lib\Helpers::getCurrency('try', 'usd'), 2);
                $daySizeRUB = number_format(\App\lib\Helpers::getCurrency('try', 'rub'), 2);
            @endphp
            <li>
                <img src="{{url('front/image/flg-tr.png')}}" alt="flt-tr">
                <span>{{$daySizeTRY}}</span>
                <span>TL</span>
            </li>
            <li>
                <img src="{{url('front/image/flag-rub.png')}}" alt="flt-az">
                <span>{{substr($daySizeRUB , 0 , 4)}}</span>
                <span>RUB</span>
            </li>
            <li>
                <img src="{{url('front/image/flg-usa.png')}}" alt="flt-usa">
                <span>{{substr($daySizeUSD , 0 , 4)}}</span>
                <span>USD</span>
            </li>
        </ul>
    </div>--}}
</div>

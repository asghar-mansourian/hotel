<div class="col-md-3 col-sm-2 col-xs-3">
    <div class="h4_height">
        <h4 class="use_dis_no">USER <strong>Panel</strong></h4>
    </div>

    <div class="left-side mt-5">
        <ul>
            @yield('menuItem')
        </ul>

    </div>
    <div class="rate_calculator mt-5">
        <div class="title_list mb-4">Exchange Rate Calculator</div>
        <form id="calBtn" method="post" action="{{url('setting/getCurrency')}}">
            <div class="float-left">
                <input type="number" name="currency" required>
            </div>
            <select name="from" class=" " aria-labelledby="dropdown_baglama"
                    style="width: 100px;margin-left: 10px;
    box-shadow: 0 0 black !important;">
                <option class="">select</option>
                <option class="dropdown-item" value="AZN">AZN</option>
                <option class="dropdown-item" value="USD">USD</option>
            </select>
            <div style="clear: both;"></div>
            <div class="mt-4"></div>
            <div class="float-left">
                <input id="result_cal" type="number" readonly>
            </div>
            <select name="to"  class=" " aria-labelledby="dropdown_baglama"
                    style=" width: 100px;margin-left: 10px;
    box-shadow: 0 0 black !important;">
                <option class="">select</option>
                <option class="dropdown-item" value="AZN">AZN</option>
                <option class="dropdown-item" value="USD">USD</option>
            </select>
            <div style="clear: both;"></div>

            <div class="col-md-12 button-part mt-4 p-0" style="display: none">
                <button  type="submit" class="btn-effect w-100 ">Calcute</button>
            </div>
        </form>

        <div class="font_grey mt-4">Calculated according to the exchange rate of the day.</div>
    </div>
    <div class="daily_unit mt-5">
        <div class="title_list mb-4">Daily size</div>
        <ul>
            <li>
                <img src="{{url('front/image/flg-tr.png')}}" alt="flt-tr">
                <span>1</span>
                <span>TL</span>
            </li>
            <li>
                <img src="{{url('front/image/flg-az.png')}}" alt="flt-az">
                <span>0.2177</span>
                <span>AZN</span>
            </li>
            <li>
                <img src="{{url('front/image/flg-usa.png')}}" alt="flt-usa">
                <span>0.1281</span>
                <span>USD</span>
            </li>
        </ul>
    </div>
</div>

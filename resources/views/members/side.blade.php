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
        <form>
            <div class="float-left"><input type="number" name="calculator"></div>
            <div class="dropdown" style="float: right;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_bance1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    AZN<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdown_bance1">
                    <a class="dropdown-item active" href="#">AZN</a><br/>
                    <a class="dropdown-item" href="#">TL</a><br/>
                    <a class="dropdown-item" href="#">USE</a><br/>
                </div>
            </div>
        </form>
        <div style="clear: both;"></div>
        <div class="mt-4"></div>
        <form>
            <div class="float-left"><input type="number" name="calculator"></div>
            <div class="dropdown" style="float: right;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_bance2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    USE<i class="fas fa-chevron-down ml-2" style="font-size: 11px"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdown_bance2">
                    <a class="dropdown-item" href="#">AZN</a><br/>
                    <a class="dropdown-item" href="#">TL</a><br/>
                    <a class="dropdown-item active" href="#">USE</a><br/>
                </div>
            </div>
        </form>
        <div style="clear: both;"></div>
        <div class="font_grey mt-4">Günün məzənnəsinə uyğun hesablanır.</div>
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

<div class="row" style="    display: flex; align-items: center;">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12">

        <div class="font_grey" style="display: inline-block">
            {{__('website.contactus')}} : +998 50 988 11 25
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
            <form id="calBtn" method="post" action="{{url('/getCurrencyCalculator')}}">
                <div class="float-left">
                    <input type="number" name="currency" style="    width: 104px;    height: 25px;" required>
                </div>
                <select name="from" class=" " aria-labelledby="dropdown_baglama"
                        style="width: 100px;margin-left: 10px;
    padding-right: 0px;
    padding-top: 0px;
    padding-left: 0px;
    padding-bottom: 0px;
    height: 25px;
}
    box-shadow: 0 0 black !important;">
                    <option class="">{{__('member.select')}}</option>
                    <option class="dropdown-item" value="AZN">RUB</option>
                    <option class="dropdown-item" value="USD">USD</option>
                    <option class="dropdown-item" value="TRY">TRY</option>
                </select>
                <div style="clear: both;"></div>
                <div class="mt-2"></div>
                <div class="float-left">
                    <input id="result_cal" type="number" style="    width: 104px;     height: 25px;" readonly>
                </div>
                <select name="to" class=" " aria-labelledby="dropdown_baglama"
                        style=" width: 100px;margin-left: 10px;
                            padding-right: 0px;
    padding-top: 0px;
    padding-left: 0px;
    padding-bottom: 0px;
        height: 25px;
    box-shadow: 0 0 black !important;">
                    <option class="">{{__('member.select')}}</option>
                    <option class="dropdown-item" value="AZN">RUB</option>
                    <option class="dropdown-item" value="USD">USD</option>
                    <option class="dropdown-item" value="TRY">TRY</option>
                </select>
            </form>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-12">
        <div class="menu_first">
            <ul>
                <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>

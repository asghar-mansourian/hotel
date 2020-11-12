<div class="row">
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

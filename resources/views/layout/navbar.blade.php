<div class="row pt-3 pb-3 mob_dis " style="padding: 0 15px;">
    <div class="logo">
        <a href="#"><img src="{{url('front/image/logo.svg')}}"></a>
    </div>

    <div class="menu_sec">
        <ul>
            <li>
                <a href="#" class="active">Home</a>
            </li>
            <li>
                <a href="#">Pricing</a>
            </li>
            <li>
                <a href="#">How we work</a>
            </li>
            <li>
                <a href="#">FAQ</a>
            </li>
            <li>
                <a href="#">Blog</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_panel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{\Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->family}}<i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown_panel">
                        <a class="dropdown-item" href="#">Panel səhifəsi</a><br/>
                        <a class="dropdown-item" href="#">Xaricdəki ünvanlarım</a><br/>
                        <a class="dropdown-item" href="#">Sifarişlərim</a><br/>
                        <a class="dropdown-item" href="#">Bağlamalarım</a><br/>
                        <a class="dropdown-item" href="#">AZN Balansım</a><br/>
                        <a class="dropdown-item" href="#">TL Balansım</a><br/>
                        <a class="dropdown-item" href="#">Kuryer</a><br/>
                        <a class="dropdown-item" href="#">Sorğu</a><br/>
                        <a class="dropdown-item" href="{{url('/setting')}}">setting</a><br/>
                        <a class="dropdown-item" href="{{url('/logout')}}">logout</a><br/>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="mobil_menu">
    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#" class="active">Home</a>
        <a href="#">Pricing</a>
        <a href="#">How we work</a>
        <a href="#">FAQ</a>
        <a href="#">Blog</a>
        <a href="#">Contact</a>
    </div>

    <div class="logo_mob">
        <button class="openbtn" onclick="openNav()"><i class="fas fa-align-justify m-0"></i></button>
        <a href="#"><img src="{{url('front/image/logo.svg')}}"></a>

        <span class="dropdown float-right">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_panel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    SB<i class="fas fa-chevron-down ml-2" style="font-size: 12px"></i>
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdown_panel">
			    <a class="dropdown-item" href="{{url('/home')}}">Panel səhifəsi</a><br/>
			    <a class="dropdown-item" href="#">Xaricdəki ünvanlarım</a><br/>
			    <a class="dropdown-item" href="{{route('orders.index')}}">Sifarişlərim</a><br/>
			    <a class="dropdown-item" href="{{route('invoices.index')}}">Bağlamalarım</a><br/>
			    <a class="dropdown-item" href="#">AZN Balansım</a><br/>
			    <a class="dropdown-item" href="{{route('tl_balance')}}">TL Balansım</a><br/>
			    <a class="dropdown-item" href="{{route('courier')}}">Kuryer</a><br/>
			    <a class="dropdown-item" href="{{route('inquiry')}}">Sorğu</a><br/>
			    <a class="dropdown-item" href="{{url('/setting')}}">Tənzimləmələr</a><br/>
			    <a class="dropdown-item" href="{{url('/logout')}}">Hesabdan çıx</a><br/>
			  </div>
			</span>
    </div>
</div>

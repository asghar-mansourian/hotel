@if(\Illuminate\Support\Facades\Session::has('message'))
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>
            {{\Illuminate\Support\Facades\Session::get('message')}}
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('danger'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{\Illuminate\Support\Facades\Session::get('message')}}
        </div>
    @endif
@endif

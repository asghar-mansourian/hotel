@component('admin.components.panel')

    @slot('header')
        <h3 class="card-title">
            <i class="fa fa-search mr-2"></i>
                search
        </h3>
    @endslot

    @slot('items')
        <form class="form" method="post" id="searchForm" action="{{$url}}">
            @csrf
            @component('admin.components.form.inputLabel')
                @slot('name')
                    search
                @endslot
                @slot('placeholder')
                    Please Enter Your Text...
                @endslot
                @slot('type')
                    text
                @endslot
                @slot('label')
                    Text
                @endslot
            @endcomponent
            <button type="submit" class="btn btn-block btn-sm btn-success">search</button>
            <div class="list-card" id="counts_parent" style="display: none">
                <span class="bg-info list-bar"></span>
                <div class="row align-items-center" id="counts">
                    <div class="text-center   w-100 "
                    ></div>


                </div>
            </div>
        </form>

    @endslot




@endcomponent


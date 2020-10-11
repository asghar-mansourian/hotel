@component('admin.components.panel')

    @slot('header')
        <span>
            <i class="fa fa-search mr-2"></i>
                جستجو
        </span>
    @endslot

    @slot('items')
        <form class="form" method="post" id="searchForm" action="{{$url}}">
            @csrf
            @component('admin.components.form.inputLabel')
                @slot('name')
                    search
                @endslot
                @slot('placeholder')
                    عبارت را وارد کنید...
                @endslot
                @slot('type')
                    text
                @endslot
                @slot('label')
                    عبارت
                @endslot
            @endcomponent
            <div class="form-group row" id="counts" style="display:none;">
                <div class="btn btn-outline btn-default   w-100 py-3  "
                     style="font-size: 18px;box-shadow: none"></div>

            </div>
        </form>

    @endslot




@endcomponent


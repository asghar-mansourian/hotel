@component('admin.components.panel')

    @slot('header')
        <span>
            <i class="fa fa-filter mr-2"></i>
                فیلتر
        </span>
    @endslot

    @slot('items')
        <form class="form" method="post" id="filterForm" action="{{$url}}">
            @csrf

            @component('admin.components.form.optionLabel')
                @slot('name')
                    filter
                @endslot
                @slot('items')
                    {{$options ?? ''}}
                @endslot
                @slot('label')
                    فیلتر
                @endslot
            @endcomponent

        </form>

    @endslot

@endcomponent

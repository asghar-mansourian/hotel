@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $settings , 'selects' => ['id' , 'key' , 'value']])

    @slot('paginate')
        {{$settings->links()}}
    @endslot
    @slot('url')
        settings
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/payments/load
    @endslot
@endcomponent
@component('admin.components.script.sortTableScript')
@endcomponent
@component('admin.components.script.showScript')
@endcomponent
@component('admin.components.form.pictureScript')
@endcomponent
@component('admin.components.script.mainFormScript')
    @slot('mainFormUrlValue')
        ../../../admin/payments/index
    @endslot
@endcomponent

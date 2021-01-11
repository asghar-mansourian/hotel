@component('admin.components.table' , ['sortType'=>'asc','sortField'=>'created_at','records' => $invoices , 'selects' => ['id' , 'shop','product_type','weight']])

    @slot('paginate')
        {{$invoices->links()}}
    @endslot
    @slot('url')
        pages
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/admin-invoices/load
    @endslot
@endcomponent
@component('admin.components.script.sortTableScript')
    @slot('url')
        ../../../admin/admin-invoices/sort/
    @endslot
@endcomponent
@component('admin.components.script.showScript')
@endcomponent
@component('admin.components.form.pictureScript')
@endcomponent
@component('admin.components.script.mainFormScript')
    @slot('mainFormUrlValue')
        ../../../admin/admin-invoices/index
    @endslot
@endcomponent

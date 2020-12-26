@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $orders , 'selects' => ['id' ,'status_type', 'shop' , 'price' , ['user' , 'email']],  'options' => ['show' , 'delete']])

    @slot('paginate')
        {{$users->links()}}
    @endslot
    @slot('url')
        users
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/invoices/load
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
        ../../../admin/invoices/index
    @endslot
@endcomponent

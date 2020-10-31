@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $payments , 'selects' => ['id' , 'price' , 'authority' , ['user' , 'email'] ] , 'options' => ['show' , 'delete']])

    @slot('paginate')
        {{$payments->links()}}
    @endslot
    @slot('url')
        payments
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

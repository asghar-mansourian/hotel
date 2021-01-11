@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $admins , 'selects' => ['id' , 'name' ]])

    @slot('paginate')
        {{$admin->links()}}
    @endslot
    @slot('url')
        admins
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/admins/load
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
        ../../../admin/admins/index
    @endslot
@endcomponent

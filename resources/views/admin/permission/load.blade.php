@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $permissions , 'selects' => ['id' , 'name' ]])

    @slot('paginate')
        {{$permissions->links()}}
    @endslot
    @slot('url')
        permissions
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/permissions/load
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
        ../../../admin/permissions/index
    @endslot
@endcomponent

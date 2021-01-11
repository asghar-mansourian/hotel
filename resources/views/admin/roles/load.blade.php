@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $roles , 'selects' => ['id' , 'name' ,'guard_name']])

    @slot('paginate')
        {{$roles->links()}}
    @endslot
    @slot('url')
        roles
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/roles/load
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
        ../../../admin/roles/index
    @endslot
@endcomponent

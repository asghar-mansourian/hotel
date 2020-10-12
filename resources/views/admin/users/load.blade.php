@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $users , 'selects' => ['id' , 'name' , 'email',   'status'  ]])

    @slot('paginate')
        {{$users->links()}}
    @endslot
    @slot('url')
        users
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])


@endcomponent
@component('admin.components.script.sortTableScript')
@endcomponent
@component('admin.components.script.showScript')
@endcomponent
@component('admin.components.form.pictureScript')
@endcomponent
@component('admin.components.script.mainFormScript')
    @slot('mainFormUrlValue')
        ../../../admin/users/index
    @endslot
@endcomponent

@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $regions , 'selects' => ['id' , 'name' , 'description']])

    @slot('paginate')
        {{$regions->links()}}
    @endslot
    @slot('url')
        regions
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/branches/load
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
        ../../../admin/regions/index
    @endslot
@endcomponent

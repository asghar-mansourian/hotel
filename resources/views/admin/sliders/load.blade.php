@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $pages , 'selects' => ['id' , 'title' ]])

    @slot('paginate')
        {{$pages->links()}}
    @endslot
    @slot('url')
        pages
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/pages/load
    @endslot
@endcomponent
@component('admin.components.script.sortTableScript')
    @slot('url')
        ../../../admin/blogs/sort/
    @endslot
@endcomponent
@component('admin.components.script.showScript')
@endcomponent
@component('admin.components.form.pictureScript')
@endcomponent
@component('admin.components.script.mainFormScript')
    @slot('mainFormUrlValue')
        ../../../admin/pages/index
    @endslot
@endcomponent

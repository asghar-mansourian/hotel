@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $faqs , 'selects' => ['id' , 'title' ]])

    @slot('paginate')
        {{$faqs->links()}}
    @endslot
    @slot('url')
        faqs
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/faqs/load
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
        ../../../admin/faqs/index
    @endslot
@endcomponent

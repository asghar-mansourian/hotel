@component('admin.components.table' , ['sortType'=>$sortType,'sortField'=>$sortField,'records' => $calculatores , 'selects' =>
 ['id' , 'from' , 'to' , [ 'country','name'] , 'currency','liquid_currency']])

    @slot('paginate')
        {{$calculatores->links()}}
    @endslot
    @slot('url')
        calculatores
    @endslot
@endcomponent

@component('admin.components.script.paginatorScript' , ['type' => 1])

    @slot('paginatorUrl')
        ../../../admin/calculatores/load
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
        ../../../admin/calculatores/index
    @endslot
@endcomponent

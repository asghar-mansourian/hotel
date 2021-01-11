@component(
'admin.components.table' ,
 [
 'sortType'=>'asc',
 'sortField'=>'created_at',
 'records' => $invoices ,
  'selects' => ['id' , 'shop','product_type','weight' ]
  ]
)
    @slot('paginate')
        {{$invoices->appends(Request::except('page'))->links()}}
    @endslot
    @slot('url')
        admin-invoices
    @endslot
@endcomponent

@if(isset($countInvoices) )
    <input type="hidden" class="countInvoices" value="{{$countInvoices}}">
    <script>
        jQuery(document).ready(function () {
            var counter = jQuery('.countInvoices').val();
            jQuery('#counts_parent').fadeIn(200);
            jQuery('#counts').children().html('Number of items found : ' + counter + ' Found');
        });
    </script>
@endif

@component('admin.components.script.paginatorScript' , ['type' => 1])


@endcomponent

@component('admin.components.script.sortTableScript')
    @slot('url')
        ../../../admin/admin-invoices/sort/
    @endslot
@endcomponent
@component('admin.components.script.showScript')
@endcomponent
@component('admin.components.form.pictureScript')
@endcomponent
@component('admin.components.script.mainFormScript')
    @slot('mainFormUrlValue')
        ../../../admin/admin-invoices/index
    @endslot
@endcomponent

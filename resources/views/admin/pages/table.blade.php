@component(
'admin.components.table' ,
 [
 'sortType'=>$sortType,
 'sortField'=>$sortField,
 'records' => $countries ,
  'selects' => ['id' , 'title'  ]
  ]
)
    @slot('paginate')
        {{$pages->appends(Request::except('page'))->links()}}
    @endslot
    @slot('url')
        pages
    @endslot
@endcomponent

@if(isset($countUsers) )
    <input type="hidden" class="countUsers" value="{{$countUsers}}">
    <script>
        jQuery(document).ready(function () {
            var counter = jQuery('.countUsers').val();
            jQuery('#counts_parent').fadeIn(200);
            jQuery('#counts').children().html('Number of items found : ' + counter + ' Found');
        });
    </script>
@endif

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
        ../../../admin/pages/index
    @endslot
@endcomponent

@component(
'admin.components.table' ,
 [
 'sortType'=>$sortType,
 'sortField'=>$sortField,
 'records' => $users ,
  'selects' => ['id' , 'name' , 'family' , 'status' , 'email' , 'edit' , 'delete' , 'show']
  ]
)
    @slot('paginate')
        {{$users->appends(Request::except('page'))->links()}}
    @endslot
    @slot('url')
        users
    @endslot
@endcomponent

@if(isset($countUsers) )
    <input type="hidden" class="countUsers" value="{{$countUsers}}">
    <script>
        jQuery(document).ready(function () {
            var counter = jQuery('.countUsers').val();
            jQuery('#counts').fadeIn(200);
            jQuery('#counts').children().html('تعداد موارد یافت شده : ' + counter + ' مورد یافت شد');
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
        ../../../admin/users/index
    @endslot
@endcomponent

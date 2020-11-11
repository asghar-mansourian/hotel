@component(
'admin.components.table' ,
 [
 'sortType'=>$sortType,
 'sortField'=>$sortField,
 'records' => $orders ,
  'selects' => ['id' , 'status' ,  ['user' , 'email'] ]
  , 'options' => ['show' , 'delete']
  ]
)

    @slot('paginate')
        @if(isset($paginate))

        @else
            {{$orders->appends(Request::except('page'))->links()}}
        @endif
        @slot('url')
            orders
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
            @slot('url')
                ../../../admin/orders/sort/
            @endslot
        @endcomponent
        @component('admin.components.script.showScript')
        @endcomponent
        @component('admin.components.form.pictureScript')
        @endcomponent
        @component('admin.components.script.mainFormScript')
            @slot('mainFormUrlValue')
                ../../../admin/orders/index
            @endslot
        @endcomponent

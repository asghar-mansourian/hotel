<input type="hidden" id="paginatorValue" value="{{$paginatorUrl ?? ''}}">
@if($type == 1)
<script>
    jQuery('.pagination li a').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        jQuery.ajax({
            url: url,
            success: function (data) {
                jQuery('#tableList').html(data);
            }
        });
    });
</script>
@elseif($type == 2)
<script>
    jQuery('.pagination li a').click(function (e) {
        e.preventDefault();

        var page = jQuery(this).html();
        var url = jQuery('#paginatorValue').val();
        var url = url + page;
        jQuery.ajax({
            url: url,
            success: function (data) {
                jQuery('#tableList').html(data);
            }
        });
    });
</script>
@endif

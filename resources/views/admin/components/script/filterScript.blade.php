{{--    sort  --}}
<script>

    jQuery(document).ready(function () {


        jQuery('#filter').on('change', function () {
            jQuery('.mytbody').html('');

            jQuery('div.block2').block({
                message: '<h3>در حال تغییر ...</h3>',
                css: {
                    border: '1px solid #fff'
                }
            });
            var filter = jQuery("select[name=filter]").find("option:selected").val();
            // if(filter == "")
            //     filter = null;
            // alert(filter);
            var url = '../../../admin/users/filter/';

            var error = function (response) {

                var jsonResponse = JSON.parse(response.responseText);
                console.log(jsonResponse.errors);
                jQuery(jsonResponse.errors).each(function (index, value) {
                    jQuery('#' + jsonResponse.keys[index]).addClass('has-danger');
                    jQuery('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                })

            }
            var success = function (response) {
                jQuery('#tableList').html(response);

            }


            var after = function () {
                jQuery('div.block2').unblock();
            }
            var before = function () {
                jQuery('.form-control').removeClass('has-danger');
                jQuery('.help-block').each(function () {
                    jQuery(this).remove();
                });
            }
            var option = {
                data: {'filter': filter},
                url: url,
                type: 'POST',

            };
            $.ajaxSetup(option);
            $.ajax({
                beforeSend: function () {
                    before()
                },
                success: function (response) {
                    success(response)
                },
                error: function (response) {
                    error(response)
                },
                complete: function () {
                    after()
                }
            });
        });

    });
</script>

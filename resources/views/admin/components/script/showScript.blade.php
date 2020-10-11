{{--    modal  --}}
<script>

    jQuery(document).ready(function () {


        jQuery('.show-info').on('click', function () {
            jQuery('.modal-body').html('');
            jQuery('.modal-title').html('اطلاعات کاربر');
            jQuery('.modal-footer').html(' <button type="button" class="btn btn-danger waves-effect text-right" data-dismiss="modal">بستن</button>');


            var id = jQuery(this).attr("data-userid");

            var url = '../../../admin/users/show/';

            var error = function (response) {

                var jsonResponse = JSON.parse(response.responseText);
                console.log(jsonResponse.errors);
                jQuery(jsonResponse.errors).each(function (index, value) {
                    jQuery('#' + jsonResponse.keys[index]).addClass('has-danger');
                    jQuery('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                })

            }
            var success = function (response) {
                jQuery('.modal-body').html(response);

            }


            var after = function () {
                // jQuery('div.block3').unblock();
            }
            var before = function () {
                jQuery('.form-control').removeClass('has-danger');
                jQuery('.help-block').each(function () {
                    jQuery(this).remove();
                });
            }
            var option = {
                data: {'id': id},
                url: url,
                type: 'POST',

            };
            jQuery.ajaxSetup(option);
            jQuery.ajax({
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

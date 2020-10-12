{{--    search  --}}
<script>

    jQuery(document).ready(function () {


        jQuery('#search').on('keyup', function () {
            jQuery('.mytbody').html('');
            jQuery('#counts_parent').fadeOut(200);

            var title = jQuery("input[name=search]").val();
            var url = '../../../admin/users/search/';

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
                if (title == '')
                    jQuery('#counts_parent').fadeOut(200);
            }


            var after = function () {

            }
            var before = function () {
                jQuery('.form-control').removeClass('has-danger');
                jQuery('.help-block').each(function () {
                    jQuery(this).remove();
                });
            }
            var option = {
                data: {'search': title,},
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

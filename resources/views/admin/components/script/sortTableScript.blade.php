{{--    sort  --}}
<script>

    jQuery(document).ready(function () {


        jQuery('.sort').on('click', function (e) {
            e.preventDefault();
            jQuery('.mytbody').html('');


            var sort_type = jQuery(this).attr("data-sort-type");
            var sort_field = jQuery(this).attr("data-sort-field");
            var url = '../../../admin/users/sort/';

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

            }
            var before = function () {
                jQuery('.form-control').removeClass('has-danger');
                jQuery('.help-block').each(function () {
                    jQuery(this).remove();
                });
            }
            var option = {
                data: {'sort_type': sort_type, 'sort_field': sort_field},
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

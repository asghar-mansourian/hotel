{{--    sort  --}}
<input type="hidden" id="data-click-sort" data-value="{{$url}}">

<script>

    jQuery(document).ready(function () {


        jQuery('#sort_field').on('change', function () {
            jQuery('.mytbody').html('');


            var sort_type = jQuery("select[name=sort_type]").find("option:selected").val();
            var sort_field = jQuery("select[name=sort_field]").find("option:selected").val();
            var url =$('#data-click-search').attr('data-value');

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
<script>

    jQuery(document).ready(function () {


        jQuery('#sort_type').on('change', function () {
            jQuery('.mytbody').html('');


            var sort_type = jQuery("select[name=sort_type]").find("option:selected").val();
            var sort_field = jQuery("select[name=sort_field]").find("option:selected").val();
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

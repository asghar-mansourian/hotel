<input type="hidden" id="mainFormUrlValue" value="{{$mainFormUrlValue ?? ''}}">

<script>
    $(document).ready(function () {


        $('#mainForm').on('submit', function (e) {

            e.preventDefault();
            $('div.block2').block({
                message: '<h3>لطفا صبر کنید ...</h3>',
                css: {
                    border: '1px solid #fff'
                }
            });
            var form = $(this);
            var error = function (response) {
                var jsonResponse = JSON.parse(response.responseText);
                console.log(jsonResponse.errors);
                $(jsonResponse.errors).each(function (index, value) {
                    $('#' + jsonResponse.keys[index]).addClass('has-danger');
                    $('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                })

            }
            var success = function (response) {
                var url = jQuery('#mainFormUrlValue').val();

                window.location.replace(url);
            };
            var after = function () {
                $('div.block2').unblock();
            }
            var before = function () {
                $('.form-control').removeClass('has-danger');
                $('.help-block').each(function () {
                    $(this).remove();
                });
            }
            var option = {
                data: new FormData(this),
                url: form.attr('action'),
                type: form.attr('method'),
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
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

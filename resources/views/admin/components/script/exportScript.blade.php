{{--    modal  --}}


<script>
    jQuery(document).ready(function () {
        jQuery('.export').on('click', function () {

            jQuery('.modal-title').html('خروجی گرفتن');
            jQuery('.modal-footer').html('    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">بستن</button>\n' +
                '                <a href="#" class="btn btn-success waves-effect" id="exportButton" ><i class="fa fa-download mr-3"></i>دریافت</a>');
            jQuery('.modal-body').html('  <div class="form-group row">\n' +
                '                    <label for="example-text-input" class="col-4 col-sm-3 col-md-2 col-form-label">\n' +
                '                        نام فایل \n' +
                '                    </label>\n' +
                '                    <div class="col-8 col-sm-9 col-md-10">\n' +
                '                        <input  class="form-control fileName" name="fileName" type="text"\n' +
                '                                 placeholder="لطفا نام فایل را وارد کنید" value=""\n' +
                '                                 id="fileName">\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '                <div class="form-group row">\n' +
                '                    <label for="example-text-input" class="col-4 col-sm-3 col-md-2 col-form-label">\n' +
                '                        تاریخ پایان\n' +
                '                    </label>\n' +
                '                    <div class="col-8 col-sm-9 col-md-10">\n' +
                '                        <input   class="form-control toDate" name="toDate" type="text"\n' +
                '                                 placeholder="لطفا تاریخ پایان را وارد کنید" \n' +
                '                                 id="" value="1398/4/4">\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '                <div class="form-group row">\n' +
                '                    <label for="example-text-input" class="col-4 col-sm-3 col-md-2 col-form-label">\n' +
                '                        تاریخ شروع\n' +
                '                    </label>\n' +
                '                    <div class="col-8 col-sm-9 col-md-10">\n' +
                '                        <input  value="1398/4/4" class="form-control fromDate" name="fromDate"  type="text" placeholder="لطفا تاریخ شروع را وارد کنید" id="">\n' +
                '                    </div>\n' +
                '                </div>');
        });

    });


</script>

<script>

    jQuery(document).ready(function () {


        jQuery("body").on("click", "#exportButton", function (e) {
            e.preventDefault();

            var fromDate = jQuery(".fromDate").val();
            var toDate = jQuery(".toDate").val();
            var url = '../../../admin/users/export/pdf';
            var error = function (response) {

                var jsonResponse = JSON.parse(response.responseText);
                console.log(jsonResponse.errors);
                jQuery(jsonResponse.errors).each(function (index, value) {
                    jQuery('#' + jsonResponse.keys[index]).addClass('has-danger');
                    jQuery('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                })

            }
            var success = function (response) {

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
            alert(fromDate)
            var option = {
                data: {'fromDate': fromDate, 'toDate': toDate},
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


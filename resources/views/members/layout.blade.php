@extends('layout.layout')
@section('content')

    <div class="container">
        <div class="row">
            @include('members.side')
            <div class="col-md-9 col-sm-10 col-xs-9">
                @yield('main')
            </div>
        </div>
    </div>
@endsection

@section('footerCustom')
    <script>
        $(document).ready(function () {


            $('#calBtn').on('change', function (e) {

                e.preventDefault();
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
                    // var url = '/setting';
                    //
                    // window.location.replace(url);
                    $('#result_cal').attr('value' , response.vl);
                };
                var after = function () {
                    // $('div.block2').unblock();
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
@endsection

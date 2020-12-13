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
        function showStuff(id, text, btn) {
            document.getElementById(id).style.display = 'block';
            document.getElementById(text).style.display = 'none';
            btn.style.display = 'none';
        }
    </script>

    <script>
        filterSelection("all")

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>


    <script>
        $(document).ready(function () {


            $('#balance_val').on('keyup', function (e) {

                e.preventDefault();
                var currency = $(this).val();

                var error = function (response) {
                    var jsonResponse = JSON.parse(response.responseText);
                    console.log(jsonResponse.errors);
                    $(jsonResponse.errors).each(function (index, value) {
                        $('#' + jsonResponse.keys[index]).addClass('has-danger');
                        $('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                    })

                }
                var success = function (response) {
                    var data = response.search(',');
                    data = response.substr(6, 4);

                    // var url = '/setting';
                    //
                    // window.location.replace(url);
                    $('#new_balance_val').attr('value', data);
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
                    data: {id: currency, type: 'AZN'},
                    url: "../setting/getCurrency/{id}/{type}",
                    type: "get",
                    // dataType: "JSON",
                    // processData: false,
                    // contentType: false,
                    // cache: false,
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

        $(document).ready(function () {
            $(".copy").click(function (e) {
                thisEl = $(this);
                copyId = thisEl.attr('data-copy')
                text = $(this).parent().children('p.contents').text();
                copyToClipboard(text)
            });

            function copyToClipboard(text) {
                var elem = document.createElement("textarea");
                document.body.appendChild(elem);
                elem.value = text;
                elem.select();
                document.execCommand("copy");
                document.body.removeChild(elem);
            }


            $(".edit").click(function (e) {
                var invoice = $(this).attr('data-invoice');
                // $("#invoicepopup-"+invoice).modal()
                $("#invoicepopup-" + invoice).modal('toggle');
            });

            $(".status").click(function (e) {
                var invoice = $(this).attr('data-invoice');
                $("#orderstatus-" + invoice).modal('toggle');
            });
            $(".items").click(function (e) {
                var items = $(this).attr('data-items');
                $("#items-" + items).modal('toggle');
            });

            $(".update").click(function (e) {
                e.preventDefault();
                var invoice = $(this).attr('data-invoice');
                var form = $('#country-' + invoice);
                var url = '{{ route("invoices.update", ":id") }}';
                url = url.replace(':id', invoice);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    type: "post",
                    url: url,
                    dataType: "json",
                    data: new FormData(document.getElementById("invoice-" + invoice)),
                    processData: false,
                    contentType: false,
                    success: function (response) {


                        if (response.success == true) {
                            location.reload();
                        } else {
                            $.each(response.errors, function (k, error) {
                                alert(error);
                            });
                        }
                    }
                });

            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $("#basketFooter").hide();
            $('.clickBasket').on('change', function () {
                let value = $(this).attr('data-value');
                let counter = 0;
                let typePrice = $(this).attr('data-typePrice');
                let price = parseFloat($(this).attr('data-price'));
                let finalAmountValue = parseFloat($("#finalAmountValue").val());
                let finalAmount = $("#finalAmount");
                if ($(this).prop('checked') == true) {
                    $("#form-basket").append(
                        `<input type="hidden" name="basketItem[]" value="${value}">`
                    );

                    finalAmountValue += price;
                    $("#finalAmountValue").attr('value', finalAmountValue);
                    finalAmount.html(finalAmountValue.toFixed(2) + ' ' + typePrice);
                } else {

                    $("input[name='basketItem[]']").each((key, item) => {
                        if ($(item).val() == value) {
                            $(item).remove();

                            finalAmountValue = finalAmountValue.toFixed(3);
                            finalAmountValue -= price.toFixed(3);
                            $("#finalAmountValue").attr('value', finalAmountValue);
                            finalAmount.html(finalAmountValue.toFixed(2) + ' ' + typePrice);
                        }
                    });
                }

                $("input[name='basketItem[]']").each((key, item) => {

                    if ($(this).prop('checked') == true) {
                        counter++;
                        $("#basketFooter").show();
                        if ($("#terms").prop('checked') == true) {
                            $("#basketSubmit").show();
                        }
                    } else {
                        counter--;
                    }

                });
                if (counter == 0) {
                    $("#basketFooter").hide();
                    $("#basketSubmit").hide();
                }
            });
        })
    </script>
@endsection

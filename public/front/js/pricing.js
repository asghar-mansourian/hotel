$(document).ready(function () {
    $('#calculate').click(function (e) {
        var context = $(this);

        var success = function (response) {
            if (response.price) {
                $("#result-price").html('<i class="fas fa-dollar-sign"></i>' + response.price)
            } else {
                $("#result-price").html('<i class="fas fa-dollar-sign"></i>')
            }
            context.css('background-color', '#1637f2');
        };

        var before = function () {
            context.css('background-color', '#98a0cf');
        }
        var option = {
            data: {},
            url: "get-price-via-weight/" + $('#weight').val().replace(',','.')+'/'+$('#calculate_country_id').val(),
            type: "GET",
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
            }
        });
    });
})

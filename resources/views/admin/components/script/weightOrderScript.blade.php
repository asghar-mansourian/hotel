<script>
    $(document).ready(function () {
        $('#btn-save').click(function (e) {
            var weight = $("#weight").val();
            var overseas_warehouse_number = $("#overseas-warehouse-number").val();
            var domestic_warehouse_number = $("#domestic-warehouse-number").val();

            var success = function () {
                alert('Saved Information Order And Decrease Balance Of User!')
            };

            var formData = new FormData()
            formData.append('weight', weight)
            formData.append('overseas_warehouse_number', overseas_warehouse_number)
            formData.append('domestic_warehouse_number', domestic_warehouse_number)
            var option = {
                data: formData,
                url: '{{$url}}',
                type: "post",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
            };
            $.ajaxSetup(option);
            $.ajax({
                success: function (response) {
                    success(response)
                },
            });
        });
        //calc price
        $('#weight').blur(function (e) {
            var context = $(this);

            var success = function (response) {
                if (response.price) {
                    $("#weight-price").val(response.price + ' $')
                } else {
                    $("#weight-price").val(0 + ' $')
                }
                context.css('background-color', '#beige');
            };

            var before = function () {
                context.css('background-color', '#beige');
            }
            var option = {
                data: {},
                url: "/get-price-via-weight/" + $('#weight').val(),
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
                },
            });
        });
    })
</script>

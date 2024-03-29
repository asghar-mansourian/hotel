$(document).ready(function () {

// calc once order
    var totalPriceOrder = function (blurInput) {
        var parent = blurInput.closest('div .container-order');

        var price = parseFloat(parent.find('input[name="price[]"]').val());
        var cargo = parseFloat(parent.find('input[name="cargo[]"]').val());
        var quantity = parseInt(parent.find('input[name="quantity[]"]').val());

        quantity = (quantity === '' || quantity === 0 || isNaN(quantity)) ? 1 : quantity
        price = (price === '' || isNaN(price)) ? 0 : price
        cargo = (cargo === '' || isNaN(cargo)) ? 0 : cargo

        var total = (quantity * price) + cargo;

        var percentage = ((taxOrder / 100) * total);

        return (total + percentage).toFixed(2);
    }

// calc total orders
    var totalPriceOrders = function () {
        var parent = $('#country-' + countryId);

        var totalPriceOrders = 0;
        parent.children('div').each(function () {
            if (parseFloat($(this).find('input[name="total[]"]').val())) {
                totalPriceOrders += parseFloat($(this).find('input[name="total[]"]').val())
            }
        })

        return (totalPriceOrders).toFixed(2);
    }

// change select
    $(document).on('change', 'select[name="has_cargo[]"]', function () {

        $(this)
            .closest('div')
            .next()
            .children()
            .find('input[name="cargo[]"]')
            .val(0)

        $(this)
            .closest('div')
            .next()
            .children()[0]
            .classList
            .toggle('hidden');

        var parent = $(this).closest('div .container-order');

        parent.find('input[name="total[]"]').val(
            totalPriceOrder($(this))
        )

        $('.total-price-orders').last().text(
            totalPriceOrders() + ' ₺'
        )
    });

// add row
    $(document).on('click', '.btn-add-container-order', function () {
        if ($(this).data('country-id') !== undefined) {
            countryId = $(this).data('country-id');
        }

        $('#country-' + countryId).append(
            $('#template-order').html()

        )
        $('.order-create-footer1').hide();
        $('.order-create-footer2').hide();
        $('.order-create-footer1').last().show();
        $('.order-create-footer2').last().show();
        var factorNum = $('#factor-number-header').val();
         $('.total-price-orders').html(totalPriceOrders() + ' ₺');
        $('.factor-result-num').last().html("#" + $('#factor-number-header').val());
        factorNum++;
        $('#factor-number-header').val(factorNum);
        $(this).fadeOut();
    });

// remove row
    $(document).on('click', '.btn-remove-container-order', function () {
        var containerCountry = $('#country-' + countryId);

        if (containerCountry.children('div').length > 1) {
            $(this)
                .closest('div .container-order')
                .remove();
        }

        containerCountry
            .children('div')
            .last()
            .find('.btn-add-container-order')
            .fadeIn();

        $('.total-price-orders').last().text(
            totalPriceOrders() + ' ₺'
        )
        $('.order-create-footer1').hide();
        $('.order-create-footer2').hide();
        $('.order-create-footer1').last().show();
        $('.order-create-footer2').last().show();
        var factorNum = $('#factor-number-header').val();
        factorNum--;
        $('#factor-number-header').val(factorNum);
    })

// save order
    $('#btn-save-order').click(function () {
        var containerCountry = $('#country-' + countryId);

        var form = containerCountry;

        if (!form.find('input[name="payment_type"]').length) {
            var inputPaymentType = $("<input>")
                .attr("type", "hidden")
                .attr("name", "payment_type").val(
                    $('input[name="payment_type"]:checked').val()
                );

            var inputBranchId = $("<input>")
                .attr("type", "hidden")
                .attr("name", "branch_id").val(
                    $('select[name="branch_id"]').val()
                );

            form.append(inputPaymentType, inputBranchId);
        } else {
            form.find('input[name="payment_type"]').val(
                $('input[name="payment_type"]:checked').val()
            )

            form.find('input[name="branch_id"]').val(
                $('select[name="branch_id"]').val()
            )
        }

        form.find('.btn-submit-form').trigger('click');

    });

    $(document).on('blur', 'input[name="price[]"], input[name="cargo[]"], input[name="quantity[]"]', function () {
        var parent = $(this).closest('div .container-order');

        parent.find('input[name="total[]"]').val(
            totalPriceOrder($(this)) + ' ₺'
        )

        $('.total-price-orders').last().text(
            totalPriceOrders() + ' ₺'
        )

    });

    $(document).on('keyup', 'input[name="price[]"]', function () {
        var parent = $(this).closest('div .container-order');

        parent.find('input[name="total[]"]').val(
            totalPriceOrder($(this)) + ' ₺'
        )



    });

    $(document).on('keyup', 'input[name="cargo[]"]', function () {
        var parent = $(this).closest('div .container-order');

        parent.find('input[name="total[]"]').val(
            totalPriceOrder($(this)) + ' ₺'
        )

    });

    $(document).on('keyup', 'input[name="quantity[]"]', function () {
        var parent = $(this).closest('div .container-order');

        parent.find('input[name="total[]"]').val(
            totalPriceOrder($(this)) + ' ₺'
        )

    });
})

<script src="{{url('/admin/en/js/vue.js')}}"></script>
<script>
    var box = new Vue({
        el: '#container-box',
        data: {
            items: []
        },
        methods: {
            addOrderToBox: function () {
                var context = this;
                var barcode = $('#barcode').val();
                var box_id = $('#box-id').val();

                $.ajaxSetup({
                    data: {barcode: barcode, box_id: box_id},
                    url: '/admin/boxes/store',
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                });

                $.ajax({
                    beforeSend: function (res) {
                        console.log('berfor')
                    },
                    error: function (res) {
                        if (res.statusCode().status == 404) {
                            alert(res.responseJSON.message)
                        } else {
                            alert('Server Error!')
                        }
                    },
                    success: function (res) {
                        $('#box-id').val(res.box_id);
                        context.items = res.items
                    }
                });
            },
            removeItemBox: function (boxItemId, boxId) {
                var r = confirm("Do you want to delete?");
                if (r == false) {
                    return false;
                }

                var context = this;

                $.ajaxSetup({
                    data: {box_id: boxId},
                    url: '/admin/box-items/destroy/' + boxItemId,
                    type: "DELETE",
                    dataType: "JSON",
                    cache: false,
                });

                $.ajax({
                    beforeSend: function (res) {
                        console.log('berfor')
                    },
                    error: function (res) {
                        if (res.statusCode().status == 404) {
                            alert(res.responseJSON.message)
                        } else {
                            alert('Server Error!')
                        }
                    },
                    success: function (res) {
                        $('#box-id').val(res.box_id);
                        context.items = res.items
                    }
                });
            },
            loadBoxes: function () {
                var box_id = $('#box-id').val();
                if (box_id) {
                    var context = this;

                    $.ajaxSetup({
                        data: {barcode: 'load-boxes', box_id: box_id},
                        url: '/admin/boxes/store',
                        type: "POST",
                        dataType: "JSON",
                        cache: false,
                    });

                    $.ajax({
                        error: function (res) {
                            if (res.statusCode().status == 404) {
                                alert(res.responseJSON.message)
                            } else {
                                alert('Server Error!')
                            }
                        },
                        success: function (res) {
                            context.items = res.items
                        }
                    });
                }
            }
        }
    });
    box.loadBoxes();
</script>

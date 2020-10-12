
<link href="{{url('admin/en/plugins/sweet-alert/jquery.sweet-modal.min.css')}}" rel="stylesheet"/>
<link href="{{url('admin/en/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet"/>
<style>

    button.confirm {
        background-color: #ef4b4b !important;
    }
</style>
<script src="{{url('admin/en/plugins/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
<script src="{{url('admin/en/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{url('admin/en/js/sweet-alert.js')}}"></script>
<input type="text" id="data-click-sweet" data-value="{{$url}}">
<script>
    $(document).ready(function () {
        $(document).on('click', '.delete', function (e) {

            e.preventDefault();
            var data = $(this).attr('data-value');
            var url = $('#data-click-sweet').attr('data-value');

            swal({
                    title: "Are You Sure?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "accept",
                    closeOnConfirm: false,
                    cancelButtonText: "cancel",
                    cancelButtonClass: "btn-primary",

                },
                function () {
                    window.location.replace(url +  'destroy/' + data);
                });

            return false;

        });

    })
</script>

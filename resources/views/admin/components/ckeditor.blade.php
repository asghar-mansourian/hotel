<input type="hidden" id="id" data-id="{{ $ids ?? ''}}">
<script src="{{ url('admin/en/plugins/vendor/ckeditor/ckeditor.js') }}"></script>
<script>


    var id = $('#id').attr('data-id');
    var arr = id.split(',');

    $.each(arr, function (index, value) {
        var editoralnsajad = CKEDITOR.replace('' + value + '', {
            filebrowserUploadUrl: '/admin/editor/ckeditorUploader?type=Files&_token={{csrf_token()}}',
            filebrowserImageUploadUrl: '/admin/editor/ckeditorUploader?type=Files&_token={{csrf_token()}}',
            filebrowserUploadMethod: 'form'
        });
    });


</script>

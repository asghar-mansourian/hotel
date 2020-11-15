<script src="{{ url('admin/en/plugins/vendor/ckeditor/ckeditor.js') }}"></script>
<script>

    var editoralnsajad = CKEDITOR.replace('content', {
        filebrowserUploadUrl: '/admin/editor/ckeditorUploader?type=Files&_token={{csrf_token()}}',
        filebrowserImageUploadUrl: '/admin/editor/ckeditorUploader?type=Files&_token={{csrf_token()}}',
        filebrowserUploadMethod: 'form'
    });

</script>

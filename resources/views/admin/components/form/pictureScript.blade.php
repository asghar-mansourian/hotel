<script src="{{url('admin/fa/plugins/dropify/dist/js/dropify.min.js')}}"></script>

<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify({
            messages: {
                default: 'یک فایل اینجا بکشید و یا کلیک کنید',
                replace: 'برای جایگزینی ، یک فایل اینجا بکشید و یا کلیک کنید',
                remove: 'حذف',
                error: 'خطا در ارسال فایل'
            },
            error: {
                'fileSize': 'حجم فایل بیشتر از 500 کیلو بایت می باشد',
                {{--'minWidth': 'The image width is too small ({{ value }}}px min).',--}}
                    {{--'maxWidth': 'The image width is too big ({{ value }}}px max).',--}}
                    {{--'minHeight': 'The image height is too small ({{ value }}}px min).',--}}
                    {{--'maxHeight': 'The image height is too big ({{ value }}px max).',--}}
                'fileExtension': 'فرمت وارد شده قابل قبول نمی باشد',
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>

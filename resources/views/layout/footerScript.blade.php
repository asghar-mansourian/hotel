<script src="{{url('front/js/style_js.js')}}"></script>
<script src="{{url('front/js/jquery.js')}}"></script>
<script src="{{url('front/js/bootstrap.min.js')}}"></script>
<script src="{{url('front/js/bootstrap-select.min.js')}}"></script>
<script src="{{url('front/js/clipboard.min.js')}}"></script>


<script>
    function showStuff(id, text, btn) {
        document.getElementById(id).style.display = 'block';
        document.getElementById(text).style.display = 'none';
        btn.style.display = 'none';
    }

</script>

<script>

    $(document).ready(function () {


        $('.convert-currency').change(function (e) {
            var form = $(this);
            var error = function (response) {
                var jsonResponse = JSON.parse(response.responseText);
                $(jsonResponse.errors).each(function (index, value) {
                    $('#' + jsonResponse.keys[index]).addClass('has-danger');
                    $('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');
                })
            }
            var success = function (response) {
                form.find('.result_cal').attr('value', response);
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

        $( ".convert-currency" ).trigger( "change" );


    });

</script>
<!-- uploaded script-->
@foreach(\App\Script::where('status','1')->get() as $script)
    @if (! is_null($script->content) || $script->content)
        {!! $script->content !!}
    @elseif(! is_null($script->file) || $script->file)
        <script src='{{url("admin/scripts/files/$script->file")}}'></script>
    @endif
@endforeach

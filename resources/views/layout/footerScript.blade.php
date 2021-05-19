<script src="{{url('front/js/jquery-1.9.1.min.js')}}"></script>
<!-- Single Page Nav plugin works with this version of jQuery -->
<script src="{{url('front/js/jquery.singlePageNav.min.js')}}"></script>
<script src="{{url('front/js/bootstrap.min.js')}}"></script>
<script src="{{url('front/js/owl.carousel.min.js')}}"></script>

<script>
    /**
     * detect IE
     * returns version of IE or false, if browser is not Internet Explorer
     */
    function detectIE() {
        var ua = window.navigator.userAgent;

        var msie = ua.indexOf("MSIE ");
        if (msie > 0) {
            // IE 10 or older => return version number
            return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
        }

        var trident = ua.indexOf("Trident/");
        if (trident > 0) {
            // IE 11 => return version number
            var rv = ua.indexOf("rv:");
            return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
        }
        return false;
    }

    function setVideoHeight() {
        const videoRatio = 1920 / 1080;
        const minVideoWidth = 400 * videoRatio;
        let secWidth = 0,
            secHeight = 0;

        secWidth = videoSec.width();
        secHeight = videoSec.height();

        secHeight = secWidth / 2.13;

        if (secHeight > 600) {
            secHeight = 600;
        } else if (secHeight < 400) {
            secHeight = 400;
        }

        if (secWidth > minVideoWidth) {
            $("video").width(secWidth);
        } else {
            $("video").width(minVideoWidth);
        }

        videoSec.height(secHeight);
    }

    // Parallax function
    // https://codepen.io/roborich/pen/wpAsm
    var background_image_parallax = function($object, multiplier) {
        multiplier = typeof multiplier !== "undefined" ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({ "background-attatchment": "fixed" });
        $(window).scroll(function() {
            var from_top = $doc.scrollTop(),
                bg_css = "center " + multiplier * from_top + "px";
            $object.css({ "background-position": bg_css });
        });
    };

    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $(".scrolltop:hidden")
                .stop(true, true)
                .fadeIn();
        } else {
            $(".scrolltop")
                .stop(true, true)
                .fadeOut();
        }

        // Make sticky header
        if ($(this).scrollTop() > 158) {
            $(".tm-nav-section").addClass("sticky");
        } else {
            $(".tm-nav-section").removeClass("sticky");
        }
    });

    let videoSec;

    $(function() {
        if (detectIE()) {
            alert(
                "Please use the latest version of Edge, Chrome, or Firefox for best browsing experience."
            );
        }
        // const mainNav = $("#tmMainNav");
        // mainNav.singlePageNav({
        //     filter: ":not(.external)",
        //     offset: $(".tm-nav-section").outerHeight(),
        //     updateHash: true,
        //     beforeStart: function() {
        //         mainNav.removeClass("show");
        //     }
        // });

        videoSec = $("#tmVideoSection");

        // Adjust height of video when window is resized
        $(window).resize(function() {
            setVideoHeight();
        });

        setVideoHeight();

        $(window).on("load scroll resize", function() {
            var scrolled = $(this).scrollTop();
            var vidHeight = $("#hero-vid").height();
            var offset = vidHeight * 0.6;
            var scrollSpeed = 0.25;
            var windowWidth = window.innerWidth;

            if (windowWidth < 768) {
                scrollSpeed = 0.1;
                offset = vidHeight * 0.5;
            }

            $("#hero-vid").css(
                "transform",
                "translate3d(-50%, " + -(offset + scrolled * scrollSpeed) + "px, 0)"
            ); // parallax (25% scroll rate)
        });

        // Parallax image background
        background_image_parallax($(".tm-parallax"), 0.4);

        // Back to top
        $(".scroll").click(function() {
            $("html,body").animate(
                { scrollTop: $("#home").offset().top },
                "1000"
            );
            return false;
        });
    });
</script>

{{--<script src="{{url('front/js/style_js.js')}}"></script>--}}
{{--<script src="{{url('front/js/jquery.js')}}"></script>--}}
{{--<script src="{{url('front/js/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{url('front/js/bootstrap-select.min.js')}}"></script>--}}
{{--<script src="{{url('front/js/clipboard.min.js')}}"></script>--}}


{{--<script>--}}
{{--    function showStuff(id, text, btn) {--}}
{{--        document.getElementById(id).style.display = 'block';--}}
{{--        document.getElementById(text).style.display = 'none';--}}
{{--        btn.style.display = 'none';--}}
{{--    }--}}

{{--</script>--}}

{{--<script>--}}

{{--    $(document).ready(function () {--}}


{{--        $('.convert-currency').change(function (e) {--}}
{{--            var form = $(this);--}}
{{--            var error = function (response) {--}}
{{--                var jsonResponse = JSON.parse(response.responseText);--}}
{{--                $(jsonResponse.errors).each(function (index, value) {--}}
{{--                    $('#' + jsonResponse.keys[index]).addClass('has-danger');--}}
{{--                    $('#' + jsonResponse.keys[index]).after('<span class="help-block"  style="color:red">' + value + '</span>');--}}
{{--                })--}}
{{--            }--}}
{{--            var success = function (response) {--}}
{{--                form.find('.result_cal').attr('value', response);--}}
{{--            };--}}
{{--            var after = function () {--}}
{{--                // $('div.block2').unblock();--}}
{{--            }--}}
{{--            var before = function () {--}}
{{--                $('.form-control').removeClass('has-danger');--}}
{{--                $('.help-block').each(function () {--}}
{{--                    $(this).remove();--}}
{{--                });--}}
{{--            }--}}
{{--            var option = {--}}
{{--                data: new FormData(this),--}}
{{--                url: form.attr('action'),--}}
{{--                type: form.attr('method'),--}}
{{--                dataType: "JSON",--}}
{{--                processData: false,--}}
{{--                contentType: false,--}}
{{--                cache: false,--}}
{{--            };--}}
{{--            $.ajaxSetup(option);--}}
{{--            $.ajax({--}}
{{--                beforeSend: function () {--}}
{{--                    before()--}}
{{--                },--}}
{{--                success: function (response) {--}}
{{--                    success(response)--}}
{{--                },--}}
{{--                error: function (response) {--}}
{{--                    error(response)--}}
{{--                },--}}
{{--                complete: function () {--}}
{{--                    after()--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}


{{--        $( "#calculate-currency-number" ).bind('input',function (){--}}
{{--            $( ".convert-currency" ).trigger( "change" );--}}
{{--        })--}}

{{--        $('#resend_sms').click(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                url:'{{route('user.resend.code')}}',--}}
{{--                type:'post',--}}
{{--                data:{--}}
{{--                    '_token':'{{csrf_token()}}',--}}
{{--                },--}}
{{--                dataType:'json',--}}
{{--                success:function(data){--}}
{{--                    if (data.success){--}}
{{--                        $('#msg').empty();--}}
{{--                        $('#msg').append('<div class="alert alert-success"> {!!__("website.newsmscodesend")!!} </div>');--}}
{{--                    }else {--}}
{{--                        $('#msg').empty();--}}
{{--                        $('#msg').append('<div class="alert alert-danger"> {!!__("website.newsmserror")!!} </div>');--}}
{{--                    }--}}

{{--                },--}}
{{--                error:function(error){--}}
{{--                    // console.log(error)--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}

{{--        $('#send_sms').click(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            mobile=$('#mobile').val();--}}
{{--            $.ajax({--}}
{{--                url:'{{ route('user.verify.save') }}',--}}
{{--                type:'post',--}}
{{--                data:{--}}
{{--                    '_token':'{{csrf_token()}}',--}}
{{--                    'sms_code':mobile--}}
{{--                },--}}
{{--                dataType:'json',--}}
{{--                success:function(data){--}}
{{--                    if (data.success){--}}
{{--                        $('#msg').empty();--}}
{{--                        $('#msg').append('<div class="alert alert-success"> {!!__("website.successsmscode")!!} </div>');--}}
{{--                        window.location.replace("{{ route('panel') }}");--}}
{{--                    }else {--}}
{{--                        $('#msg').empty();--}}
{{--                        $('#msg').append('<div class="alert alert-danger"> {!!__("website.smscodeerror")!!} </div>');--}}
{{--                    }--}}

{{--                },--}}
{{--                error:function(error){--}}

{{--                }--}}
{{--            })--}}
{{--        });--}}

{{--        $( ".convert-currency" ).trigger( "change" );--}}
{{--    });--}}

{{--</script>--}}
{{--<!-- uploaded script-->--}}
{{--@foreach(\App\Script::where('status','1')->get() as $script)--}}
{{--    @if (! is_null($script->content) || $script->content)--}}
{{--        {!! $script->content !!}--}}
{{--    @elseif(! is_null($script->file) || $script->file)--}}
{{--        <script src='{{url("admin/scripts/files/$script->file")}}'></script>--}}
{{--    @endif--}}
{{--@endforeach--}}

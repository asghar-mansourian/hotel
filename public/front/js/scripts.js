(function($){
    $(document).ready(function(){
       $(".lang").click(function(){
          $(".lang-list").fadeToggle();
       });

       $(".left-menu").click(function(){
           $(".mCustomScrollbar").addClass("openmenu");
       });

        $(".close-menu").click(function(){
            $(".mCustomScrollbar").removeClass("openmenu");
        });

        $(".header,.content,.footbanner,.footer,.footerbot,.bannerleft,.bannerright").click(function(){
            $(".mCustomScrollbar").removeClass("openmenu");
        });

        $(".inputs").keyup(function () {
            if (this.value.length == this.maxLength) {
                $(this).next('.inputs').focus();
            }
        });

        $(".sil").click(function(){
           $(".inputs").val('');
        });

        $("#bahman").change(function(){
            var temp = $(this).val();
            var status = $.inArray("car",temp);
            if(status == 0){
                $(".inpt3,.inpt4").attr("onkeypress","");
            }else{
                $(".inpt3,.inpt4").attr("onkeypress","return /[0-9]/i.test(event.key)");
            }
        });
        $('#srchtbl').DataTable();
        // $(".pagination li").hide();
        // $(".main-pagin li").show();
        // $("#srchtbl th").removeClass("sorting sorting_asc sorting_desc");
        // $("#srchtbl th").click(function(){
        //     $("#srchtbl th").removeClass("sorting sorting_asc sorting_desc");
        // });
        $(".dataTables_paginate").parent().removeClass("col-sm-7").addClass("col-lg-12 col-md-12 col-sm-12 col-xs-12");

    });
})
(jQuery);

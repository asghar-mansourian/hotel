(function () {
    "use strict";

    var slideMenu = $('.side-menu');

    // Toggle Sidebar
    $(document).on('click', '[data-toggle="sidebar"]', function (event) {
        event.preventDefault();
        $('.app').toggleClass('sidenav-toggled');
    });

    $(".app-sidebar").hover(function () {
        if ($('.app').hasClass('sidenav-toggled')) {
            $('.app').addClass('sidenav-toggled1');
        }
    }, function () {
        if ($('.app').hasClass('sidenav-toggled')) {
            $('.app').removeClass('sidenav-toggled1');
        }
    });

    // Activate sidebar slide toggle
    $("[data-toggle='slide']").click(function (event) {
        event.preventDefault();
        if (!$(this).parent().hasClass('is-expanded')) {
            slideMenu.find("[data-toggle='slide']").parent().removeClass('is-expanded');
        }
        $(this).parent().toggleClass('is-expanded');
    });

    $("[data-toggle='sub-slide']").click(function (event) {
        event.preventDefault();
        if (!$(this).parent().hasClass('is-expanded')) {
            slideMenu.find("[data-toggle='sub-slide']").parent().removeClass('is-expanded');
        }
        $(this).parent().toggleClass('is-expanded');
        $('.slide.active').addClass('is-expanded');
    });

    // Set initial active toggle
    $("[data-toggle='slide.'].is-expanded").parent().toggleClass('is-expanded');
    $("[data-toggle='sub-slide.'].is-expanded").parent().toggleClass('is-expanded');


    //Activate bootstrip tooltips
    $("[data-toggle='tooltip']").tooltip();


    // ______________Active Class
    $(".app-sidebar li a").each(function () {
        var urlParams = new URLSearchParams(window.location.search);
        var status = urlParams.get('status');
        var pageUrl = window.location.href;


        if (status == $(this).data('status') && $(this).data('has-box') && window.location.href.search('boxes') != -1) {
            $(this).addClass("active");
            $(this).parent().addClass("active"); // add active to li of the current link
            $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
            $(this).parent().parent().parent().parent().parent().addClass("active");
            $(this).parent().parent().prev().click(); // click the item to make it drop

            return false;
        }

        if (status == $(this).data('status') && window.location.href.search('boxes') == -1 && window.location.href.search('home') == -1 ) {
            if(window.location.href.search('order-items/show')!=-1 && status==0){
                var siteAddress = document.location.origin+'/admin/orders';
                var els = document.querySelectorAll("a[href='"+siteAddress+"']");
                $(els).addClass("active");
                $(els).parent().addClass("active"); // add active to li of the current link
                $(els).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(els).parent().parent().parent().parent().parent().addClass("active");
                $(els).parent().parent().prev().click(); // click the item to make it drop
            }
            else{
                if(window.location.href.indexOf('order-items')!=-1 ||
                    window.location.href.indexOf('orders')!=-1 ||
                    window.location.href.indexOf('boxes') != -1 ||
                    window.location.href.indexOf('invoices') != -1)
                {
                    $(this).addClass("active");
                    $(this).parent().addClass("active"); // add active to li of the current link
                    $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                    $(this).parent().parent().parent().parent().parent().addClass("active");
                    $(this).parent().parent().prev().click(); // click the item to make it drop
                    return false;
                }
                else{
                    $('.side-menu li:last-child a').addClass('active');
                }
            }
        }

    });


})();

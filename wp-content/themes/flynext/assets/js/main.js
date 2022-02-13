/**
 * Theme Main Scripts
 * @since 1.0.0
 */
;(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {


        // Default Navigation Bar
        $(".navbar-toggler").click(function () {
            $(".navbar-nav").toggleClass("show", 1000);
        });
        $('#nav-icon3').click(function () {
            $(this).toggleClass('open', 1000);
        });

        // navbar-click
        $(".menu-item-has-children  a").on("mouseover", function () {
            var element = $(this).parent("li");
            if (element.hasClass("show")) {
                element.removeClass("show");
                element.find("li").removeClass("show");
            } else {
                element.addClass("show");
                element.siblings("li").removeClass("show");
                element.siblings("li").find("li").removeClass("show");
            }
        });

        //sidebar Menu
        $(document).on('click', '.header-toggle-area', function () {
            $('.page-wrapper').toggleClass('show');
        });

        //Cross Menu
        $('.nav-menu-close').on('click', function () {
            $('.page-wrapper').removeClass('show');
        });

        /*----------------------
           Search Popup
       -----------------------*/
        var bodyOvrelay = $('#body-overlay');
        var searchPopup = $('#search-popup');

        bodyOvrelay.on('click', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click', '#search', function (e) {
            e.preventDefault();
            searchPopup.addClass('active');
            bodyOvrelay.addClass('active');
        });


        /*----------------------------------
           Magnific popup activation
       ----------------------------------*/
        $('.video-play-btn').magnificPopup({
            type: 'video'
        });

        /*-------------------------------
            back to top
        ------------------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });
        /*-------------------------------
            Navbar Fix
        ------------------------------*/
        if ($(window).width() < 991) {
            navbarFix()
        }

    });

    $(window).on('resize', function () {
        /*-------------------------------
            Navbar Fix
        ------------------------------*/
        if ($(window).width() < 991) {
            navbarFix()
        }
    });


    //define variable for store last scrolltop
    var lastScrollTop = '';
    $(window).on('scroll', function () {
        /*---------------------------
            back to top show / hide
        ---------------------------*/
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }
        /*--------------------------
         sticky menu activation
        ---------------------------*/
        var st = $(this).scrollTop();
        var mainMenuTop = $('.navbar-area');
        if ($(window).scrollTop() > 1000) {
            if (st > lastScrollTop) {
                // hide sticky menu on scrolldown
                mainMenuTop.removeClass('nav-fixed');

            } else {
                // active sticky menu on scrollup
                mainMenuTop.addClass('nav-fixed');
            }

        } else {
            mainMenuTop.removeClass('nav-fixed ');
        }
        lastScrollTop = st;

    });

    $(window).on('load', function () {
        /*-----------------------------
            preloader
        -----------------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(1000);
        /*-----------------------------
            back to top
        -----------------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut(100);
    });

    function navbarFix() {
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })
    }

})(jQuery);

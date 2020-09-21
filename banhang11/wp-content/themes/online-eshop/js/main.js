(function ($) {
    "use strict";

    // Preloader 
    jQuery(window).on('load', function () {
        jQuery("#status").fadeOut();
        jQuery("#preloader").delay(350).fadeOut("slow");
    });



    $(document).ready(function () {
        $(".top-linked").cartAccessibleDropDown();
    });

    $.fn.cartAccessibleDropDown = function () {
        var el = $(this);
        $("a", el).focus(function () {
            $(this).parents("li").addClass("cart-focus");
            $(this).parents("p.buttons").addClass("cart-focus");
        }).blur(function () {
            $(this).parents("li").removeClass("cart-focus");
            $(this).parents("p.buttons").removeClass("cart-focus");
        });
    }
    /* ========================================== 
    scrollTop() >= 300
    Should be equal the the height of the header
    ========================================== */

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 300) {
            $('.main-menu , .main-menus , .main-menus3').addClass('fixed-header');
        } else {
            $('.main-menu , .main-menus , .main-menus3').removeClass('fixed-header');
        }
    });
    /*----------------------------
     1. Mobile Menu Activation
    -----------------------------*/
     jQuery('.mobile-menu nav').meanmenu({
         meanScreenWidth: "991",
     });

    /*----------------------------
    2. Toggle Search Form
    ------------------------------ */
    $(".show-fil").on("click", function () {
        $(".box-filter").slideToggle("slow");
    });
    /*------------------------------------    
     3. Toogle Menu
    --------------------------------------*/
    $('.cart-btns').on('click', function () {
        $('.offset-cart-area').addClass('offset-body-on');
        $('.offset-overlay').addClass('is-visible');
    });

    $('.close-offset').on('click', function () {
        $('.offset-body').removeClass('offset-body-on');
        $('.offset-overlay').removeClass('is-visible');
    });

    /*------------------------------------    
    4. Overlay Close
    --------------------------------------*/
    $('.offset-overlay').on('click', function () {
        $(this).removeClass('is-visible');
        $('.offset-body').removeClass('offset-body-on');
    });
    /*----------------------------
5. Search Box
------------------------------ */
    $(".search-box-icon").on('click', function () {
        $(".search-box").show("slow");
    });

    $(".meanmenu-reveal").on('focus', function () {
        // console.log($("nav.mean-nav").children(".sub-menu"));
        $('.mean-nav>ul').show();
        $("nav.mean-nav .sub-menu").show();
    });

    document.addEventListener('keydown', function (event) {
        if (event.keyCode === 27) {
          event.preventDefault();          
            $('.mean-nav>ul').hide();
            $("nav.mean-nav .sub-menu").hide();
        }
    }.bind(this));

    $(".cart-head>button").on("click", function () {
        $(".nav-shop-cart").slideToggle("slow");
    });

    /*----------------------------
    6. wow js active
    ------------------------------ */
    new WOW().init();

    /*----------------------------
    7. owl active
    ------------------------------ */

    //Categories page Slider
    $(".cat-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 5,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 5],
        itemsDesktopSmall: [992, 4],
        itemsTablet: [768, 3],
        itemsMobile: [480, 1],
    });


    //Categories Slider
    $(".catagerys-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 5,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [992, 2],
        itemsTablet: [768, 2],
        itemsMobile: [480, 1],
    });


    //recommended product slidera
    $(".recommended-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 3,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [992, 2],
        itemsTablet: [768, 2],
        itemsMobile: [480, 1],
    });

    //Categories Slider
    $(".featured-slider").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 4,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [992, 3],
        itemsTablet: [768, 2],
        itemsMobile: [480, 1],
    });


    //Offer Slider
    $(".offer-right-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Brand Slider
    $(".brand-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: true,
        navigation: false,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Brand Slider
    $(".beand2-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 4,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [992, 3],
        itemsTablet: [768, 2],
        itemsMobile: [480, 1],
    });

    //Feature products Slider
    $(".fetured-products-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 3,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [992, 2],
        itemsTablet: [768, 2],
        itemsMobile: [480, 1],
    });

    //Full banner Slider
    $(".full-banner-slider").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });


    //Top seller product Slider
    $(".top-pro-slider").owlCarousel({
        autoPlay: false,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Testimonial Slider
    $(".test-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: true,
        navigation: false,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Collection men Slider
    $(".collections-men-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Catagery Slider
    $(".catagery-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 4,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [992, 3],
        itemsTablet: [768, 2],
        itemsMobile: [480, 1],
    });

    //Featured Product Slider
    $(".featured-products-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 4,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [992, 3],
        itemsTablet: [768, 2],
        itemsMobile: [480, 1],
    });

    //Sidebar Product Slider
    $(".sidebar-products").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: true,
        navigation: false,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Sidebar Offers Slider
    $(".sidber-offer").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Menu Product Slider
    $(".menu-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Offer banner Slider
    $(".bann-img-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: true,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [480, 1],
    });

    //Blog slider
    $(".testimonial-blog-slider").owlCarousel({
        autoPlay: true,
        slideSpeed: 2000,
        pagination: false,
        navigation: false,
        items: 1,
        /* transitionStyle : "fade", */
        /* [This code for animation ] */
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [992, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
    });


    /*----------------------------
    8. magnific Popup active
    ------------------------------ */
    $('#products').magnificPopup({
        delegate: '.pops',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function (item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
            }
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function (element) {
                return element.find('img');
            }
        }

    });

    //Product slide popup
    $('#pro-gallery').magnificPopup({
        delegate: '.pop-pro',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function (item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
            }
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function (element) {
                return element.find('img');
            }
        }

    });

    //Product slide popup
    $('#pro-gallery2').magnificPopup({
        delegate: '.pop-pro',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function (item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
            }
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function (element) {
                return element.find('img');
            }
        }

    });
    // -------------------------------------------------------------------------- //
    //    1 Full Skin Search
    // -------------------------------------------------------------------------- //

    $(function () {
        $('a[href="#search"]').on('click', function (event) {
            event.preventDefault();
            $('#search').addClass('open');
            $('#search > form > input[type="search"]').focus();
        });

        $('#search, #search button.close').on('click keyup', function (event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });

    });
    /*--------------------------
    9. jarallax active
    ---------------------------- */
    $('.jarallax').jarallax({
        speed: 0.5
    });

    /*----------------------------
    12. list grid view active
    ------------------------------ */
    //List Product
    $('#listview').on('click', function (event) {
        event.preventDefault();
        $('#products .item').addClass('list-item');
    });

    //Grid Product
    $('#gridview').on('click', function (event) {
        event.preventDefault();
        $('#products .item').removeClass('list-item');
        $('#products .item').addClass('grid-item');
    });

    /*--------------------------
    13. Slick slider
    ---------------------------- */
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.sliders-nav'

    });
    $('.sliders-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });

    /*--------------------------
    15. scrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

})(jQuery);
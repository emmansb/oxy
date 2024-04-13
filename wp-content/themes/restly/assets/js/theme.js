;
(function($) {
    "use strict";


    /*---------- 03. Mobile Menu Active ----------*/
 $.fn.tpmobilemenu = function (options) {
    var opt = $.extend(
        {
            menuToggleBtn: ".tp-menu-toggle",
            bodyToggleClass: "tp-body-visible",
            subMenuClass: "tp-submenu",
            subMenuParent: "tp-item-has-children",
            subMenuParentToggle: "tp-active",
            meanExpandClass: "tp-mean-expand",
            appendElement: '<span class="tp-mean-expand"></span>',
            subMenuToggleClass: "tp-open",
            toggleSpeed: 400,
        },
        options
    );

    return this.each(function () {
        var menu = $(this); // Select menu

        // Menu Show & Hide
        function menuToggle() {
            menu.toggleClass(opt.bodyToggleClass);

            // collapse submenu on menu hide or show
            var subMenu = "." + opt.subMenuClass;
            $(subMenu).each(function () {
                if ($(this).hasClass(opt.subMenuToggleClass)) {
                    $(this).removeClass(opt.subMenuToggleClass);
                    $(this).css("display", "none");
                    $(this).parent().removeClass(opt.subMenuParentToggle);
                }
            });
        }

        // Class Set Up for every submenu
        menu.find("li").each(function () {
            var submenu = $(this).find("ul");
            submenu.addClass(opt.subMenuClass);
            submenu.css("display", "none");
            submenu.parent().addClass(opt.subMenuParent);
            submenu.prev("a").append(opt.appendElement);
            submenu.next("a").append(opt.appendElement);
        });

        // Toggle Submenu
        function toggleDropDown($element) {
            if ($($element).next("ul").length > 0) {
                $($element).parent().toggleClass(opt.subMenuParentToggle);
                $($element).next("ul").slideToggle(opt.toggleSpeed);
                $($element).next("ul").toggleClass(opt.subMenuToggleClass);
            } else if ($($element).prev("ul").length > 0) {
                $($element).parent().toggleClass(opt.subMenuParentToggle);
                $($element).prev("ul").slideToggle(opt.toggleSpeed);
                $($element).prev("ul").toggleClass(opt.subMenuToggleClass);
            }
        }

        // Submenu toggle Button
        var expandToggler = "." + opt.meanExpandClass;
        $(expandToggler).each(function () {
            $(this).on("click", function (e) {
                e.preventDefault();
                toggleDropDown($(this).parent());
            });
        });

        // Menu Show & Hide On Toggle Btn click
        $(opt.menuToggleBtn).each(function () {
            $(this).on("click", function () {
                menuToggle();
            });
        });

        // Hide Menu On out side click
        menu.on("click", function (e) {
            e.stopPropagation();
            menuToggle();
        });

        // Stop Hide full menu on menu click
        menu.find("div").on("click", function (e) {
            e.stopPropagation();
        });
    });
};

$(".tp-menu-wrapper").tpmobilemenu();



    // Sticky Menu
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $("#sticky-header").removeClass("sticky-bar");
        } else {
            $("#sticky-header").addClass("sticky-bar");
        }
    });

    // Header Search
    if ($(".search-open").length) {
        $(".search-open").on("click", function(e) {
            e.preventDefault();
            $(".header-search-popup").toggleClass("active");
            $("body").toggleClass("locked");
        });
    }
    // Video Post PopUp
    if ($('.video-popup').length) {
        $('.video-popup').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }
    // Post gallery 
    if ($('.post-gallerys').length) {
        $('.post-gallerys').slick({
            dots: false,
            infinite: true,
            speed: 700,
            cssEase: 'linear',
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }
    // Limit Post Navication Title 
    if ($('.post-nav-container p').length) {
        $('.post-nav-container p').text($('.post-nav-container p').text().substring(0, 40));
    }

    $(window).on("load", function() {
        if ($(".preloader-area").length) {
            $(".preloader-area").fadeOut();
        }
    });
    // Bottom to top 
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    $('#back-top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
    if ($('.woo-spimg').length) {
        $('.woo-spimg').magnificPopup({
            delegate: 'a',
            type: 'image',
            mainClass: 'mfp-zoom-out', // this class is for CSS animation below
            gallery: { enabled: true },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    }
    if ($('.woo-product-big-img').length) {
        $('.woo-product-big-img').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.woo-product-small-img'
        });
    }
    if ($('.woo-product-small-img').length) {
        $('.woo-product-small-img').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.woo-product-big-img',
            dots: true,
            arrows: false,
            focusOnSelect: true,
            centerMode: true,
            centerPadding: '60px',
        });
    }
    if ($('#restly-shop-view-mode li').length) {
        $('#restly-shop-view-mode li').on('click', function() {
            $('body').removeClass('restly-product-grid-view').removeClass('restly-product-list-view');

            if ($(this).hasClass('restly-shop-list')) {
                $('body').addClass('restly-product-list-view');
                Cookies.set('restly-shop-view', 'list');
            } else {
                $('body').addClass('restly-product-grid-view');
                Cookies.remove('restly-shop-view');
            }
            return false;
        });
    }

}(jQuery))
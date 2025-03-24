jQuery(function($) {
    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    color rotation
    ----------------------------------------- */

    const hoverEffectType = $("body").hasClass("post-hover-effect"),
    $cards = $(".card-hover");

    function hoverEffect($card) {
        $card.on("mousemove", function (r) {
            r.stopImmediatePropagation();
            let i = { x: $card.offset().left + $card.outerWidth() / 2, y: $card.offset().top + $card.outerHeight() / 2 };
            requestAnimationFrame(function () {
                const e = r.pageX,
                t = r.pageY;
                var n = i.x - e,
                o = i.y - t,
                o = Math.atan2(o, n),
                n = Math.round(o * (180 / Math.PI));
                $card.css("--rotation", (n - 90) + "deg");
            });
        });
    }

    if (hoverEffectType) {
        $cards.each(function () {
            hoverEffect($(this));
        });

        $(window).on("resize", function () {
            $cards.each(function () {
                let $card = $(this);
                $card.off("mousemove");
                setTimeout(function () {
                    hoverEffect($card);
                }, 100);
            });
        });
    }

    /* -----------------------------------------
    Rtl Check
    ----------------------------------------- */
    $.RtlCheck = function () {
        if ($('body').hasClass("rtl")) {
            return true;
        } else {
            return false;
        }
    }
    $.RtlSidr = function () {
        if ($('body').hasClass("rtl")) {
            return 'right';
        } else {
            return 'left';
        }
    }
    /* -----------------------------------------
    Marquee
    ----------------------------------------- */
    $('.marquee').marquee({
        speed: 200,
        gap: 0,
        delayBeforeStart: 0,
        direction: $.RtlSidr(),
        duplicated: true,
        pauseOnHover: true,
        startVisible: true
    });
    /* -----------------------------------------
    Banner
    ----------------------------------------- */
    // banner style 1
    $('.banner-section.style-1 .banner-post-wrapper').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        arrows: true,
        adaptiveHeight: false,
        slidesToShow: 1,
        rtl: $.RtlCheck(),
        asNavFor: '.banner-section.style-1 .banner-thumb-wrapper',
        nextArrow: '<button class="adore-arrow slide-next fas fa-angle-right"></button>',
        prevArrow: '<button class="adore-arrow slide-prev fas fa-angle-left"></button>',
        responsive: [
        {
            breakpoint: 480,
            settings: {
                arrows: false,
            }
        }
        ]
    });
    $('.banner-section.style-1 .banner-thumb-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.banner-section.style-1 .banner-post-wrapper',
        dots: false,
        arrows: false,
        vertical: true,
        focusOnSelect: true,
    });

    /*--------------------------------------------------------------
    # Navigation menu responsive
    --------------------------------------------------------------*/
    $(document).ready(function(){
        $(".menu-toggle").click(function(){
            $(".main-navigation .nav-menu").slideToggle("slow");
        });
    });
    $(window).on('load resize', function() {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    /*--------------------------------------------------------------
    # Navigation Search
    --------------------------------------------------------------*/
    var searchWrap = $('.navigation-search-wrap');
    $(".navigation-search-icon").click(function(e) {
        e.preventDefault();
        searchWrap.toggleClass("show");
        searchWrap.find('input.search-field').focus();
    });
    $(document).click(function(e) {
        if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
            $(".navigation-search-wrap").removeClass("show");
        }
    });

    $('.navigation-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.navigation-search-icon').focus();
        }
    });

    $('.navigation-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.navigation-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.navigation-search-wrap').removeClass('show');
                $('.navigation-search-icon').focus();
            }
        }
    });

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.complete-blog-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

});
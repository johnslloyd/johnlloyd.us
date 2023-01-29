// Vimeo Vieo Function
Cutie_Pie_Vimeo();

function Cutie_Pie_Vimeo() {
    
    !function (a, b) {
        var c = {
            catchMethods: {methodreturn: [], count: 0}, init: function (b) {
                ;var c, d, e;
                b.originalEvent.origin.match(/vimeo/gi) && "data" in b.originalEvent && (e = "string" === a.type(b.originalEvent.data) ? a.parseJSON(b.originalEvent.data) : b.originalEvent.data, e && (c = this.setPlayerID(e), c.length && (d = this.setVimeoAPIurl(c), e.hasOwnProperty("event") && this.handleEvent(e, c, d), e.hasOwnProperty("method") && this.handleMethod(e, c, d))))
            }, setPlayerID: function (b) {
                return a("iframe[src*=" + b.player_id + "]")
            }, setVimeoAPIurl: function (a) {
                return "http" !== a.attr("src").substr(0, 4) ? "https:" + a.attr("src").split("?")[0] : a.attr("src").split("?")[0]
            }, handleMethod: function (a) {
                this.catchMethods.methodreturn.push(a.value)
            }, handleEvent: function (b, c, d) {
                switch (b.event.toLowerCase()) {
                    case"ready":
                        for (var e in a._data(c[0], "events")) e.match(/loadProgress|playProgress|play|pause|finish|seek|cuechange/) && c[0].contentWindow.postMessage(JSON.stringify({
                            method: "addEventListener",
                            value: e
                        }), d);
                        if (c.data("vimeoAPICall")) {
                            for (var f = c.data("vimeoAPICall"), g = 0; g < f.length; g++) c[0].contentWindow.postMessage(JSON.stringify(f[g].message), f[g].api);
                            c.removeData("vimeoAPICall")
                        }
                        c.data("vimeoReady", !0), c.triggerHandler("ready");
                        break;
                    case"seek":
                        c.triggerHandler("seek", [b.data]);
                        break;
                    case"loadprogress":
                        c.triggerHandler("loadProgress", [b.data]);
                        break;
                    case"playprogress":
                        c.triggerHandler("playProgress", [b.data]);
                        break;
                    case"pause":
                        c.triggerHandler("pause");
                        break;
                    case"finish":
                        c.triggerHandler("finish");
                        break;
                    case"play":
                        c.triggerHandler("play");
                        break;
                    case"cuechange":
                        c.triggerHandler("cuechange")
                }
            }
        }, d = a.fn.vimeoLoad = function () {
            var b = a(this).attr("src"), c = !1;
            if ("https:" !== b.substr(0, 6) && (b = "http" === b.substr(0, 4) ? "https" + b.substr(4) : "https:" + b, c = !0), null === b.match(/player_id/g)) {
                c = !0;
                var d = -1 === b.indexOf("?") ? "?" : "&",
                    e = a.param({api: 1, player_id: "vvvvimeoVideo-" + Math.floor(1e7 * Math.random() + 1).toString()});
                b = b + d + e
            }
            return c && a(this).attr("src", b), this
        };
        jQuery(document).ready(function () {
            a("iframe[src*='vimeo.com']").each(function () {
                d.call(this)
            })
        }), a(["loadProgress", "playProgress", "play", "pause", "finish", "seek", "cuechange"]).each(function (b, d) {
            jQuery.event.special[d] = {
                setup: function () {
                    var b = a(this).attr("src");
                    if (a(this).is("iframe") && b.match(/vimeo/gi)) {
                        var e = a(this);
                        if ("undefined" != typeof e.data("vimeoReady")) e[0].contentWindow.postMessage(JSON.stringify({
                            method: "addEventListener",
                            value: d
                        }), c.setVimeoAPIurl(a(this))); else {
                            var f = "undefined" != typeof e.data("vimeoAPICall") ? e.data("vimeoAPICall") : [];
                            f.push({message: d, api: c.setVimeoAPIurl(e)}), e.data("vimeoAPICall", f)
                        }
                    }
                }
            }
        }), a(b).on("message", function (a) {
            c.init(a)
        }), a.vimeo = function (a, d, e) {
            var f = {}, g = c.catchMethods.methodreturn.length;
            if ("string" == typeof d && (f.method = d), void 0 !== typeof e && "function" != typeof e && (f.value = e), a.is("iframe") && f.hasOwnProperty("method")) if (a.data("vimeoReady")) a[0].contentWindow.postMessage(JSON.stringify(f), c.setVimeoAPIurl(a)); else {
                var h = a.data("vimeoAPICall") ? a.data("vimeoAPICall") : [];
                h.push({message: f, api: c.setVimeoAPIurl(a)}), a.data("vimeoAPICall", h)
            }
            return "get" !== d.toString().substr(0, 3) && "paused" !== d.toString() || "function" != typeof e || (!function (a, d, e) {
                var f = b.setInterval(function () {
                    c.catchMethods.methodreturn.length != a && (b.clearInterval(f), d(c.catchMethods.methodreturn[e]))
                }, 10)
            }(g, e, c.catchMethods.count), c.catchMethods.count++), a
        }, a.fn.vimeo = function (b, c) {
            return a.vimeo(this, b, c)
        }
    }(jQuery, window);

}

// global variable for the action
var action = [];
var iframe = document.getElementsByClassName("video-main-wrapper");
var src;
var ratio_class;

Array.prototype.forEach.call(iframe, function (el) {
    // Do stuff here
    var id = el.getAttribute("data-id");
    jQuery(document).ready(function ($) {
        "use strict";

        src = $(el).find('iframe').attr('src');
        if (src) {

            if (src.indexOf('youtube.com') != -1) {

                $(el).find('iframe').attr('width', '');
                $(el).find('iframe').attr('height', '');
                $(el).find('iframe').attr('id', id);
                $(el).find('iframe').addClass('twp-iframe-video-youtube');
                $(el).find('iframe').attr('src', src + '&enablejsapi=1&autoplay=1&mute=1&rel=0&modestbranding=0&autohide=0&showinfo=0&controls=0&loop=1');

            }

            if (src.indexOf('vimeo.com') != -1) {

                $(el).find('iframe').attr('id', id);
                $(el).find('iframe').addClass('twp-iframe-video-vimeo');
                $(el).find('iframe').attr('src', src + '&title=0&byline=0&portrait=0&transparent=0&autoplay=1&controls=0&loop=1');
                $(el).find('iframe').attr('allow', 'autoplay;');

                var player = document.getElementById(id);
                $(player).vimeo("setVolume", 0);

                $('#' + id).closest('.entry-video').find('.twp-mute-unmute').on('click', function () {

                    if ($(this).hasClass('unmute')) {

                        $(player).vimeo("setVolume", 1);
                        $(this).removeClass('unmute');
                        $(this).addClass('mute');

                        $(this).find('.twp-video-control-action').empty();
                        $(this).find('.twp-video-control-action').html(cutie_pie_custom.unmute);
                        $(this).find('.screen-reader-text').html(cutie_pie_custom.unmute_text);

                    } else if ($(this).hasClass('mute')) {

                        $(player).vimeo("setVolume", 0);
                        $(this).removeClass('mute');
                        $(this).addClass('unmute');
                        $(this).find('.twp-video-control-action').empty();
                        $(this).find('.twp-video-control-action').html(cutie_pie_custom.mute)

                    }

                });

                $('#' + id).closest('.entry-video').find('.twp-pause-play').on('click', function () {

                    if ($(this).hasClass('play')) {

                        $(player).vimeo('play');

                        $(this).removeClass('play');
                        $(this).addClass('pause');
                        $(this).find('.twp-video-control-action').html(cutie_pie_custom.pause);
                        $(this).find('.screen-reader-text').html(cutie_pie_custom.pause_text);

                    } else if ($(this).hasClass('pause')) {

                        $(player).vimeo('pause');
                        $(this).removeClass('pause');
                        $(this).addClass('play');
                        $(this).find('.twp-video-control-action').html(cutie_pie_custom.play);
                        $(this).find('.screen-reader-text').html(cutie_pie_custom.play_text);

                    }

                });

            }

        } else {

            var currentVideo;

            $(el).find('video').attr('loop', 'loop');
            $(el).find('video').attr('autoplay', 'autoplay');
            $(el).find('video').removeAttr('controls');
            $(el).find('video').attr('id', id);

            $('#' + id).closest('.entry-video').find('.twp-mute-unmute').on('click', function () {

                if ($(this).hasClass('unmute')) {

                    currentVideo = document.getElementById(id);
                    $(currentVideo).prop('muted', false);

                    $(this).removeClass('unmute');
                    $(this).addClass('mute');
                    $(this).find('.twp-video-control-action').html(cutie_pie_custom.unmute);
                    $(this).find('.screen-reader-text').html(cutie_pie_custom.unmute_text);

                } else if ($(this).hasClass('mute')) {

                    currentVideo = document.getElementById(id);
                    $(currentVideo).prop('muted', true);
                    $(this).removeClass('mute');
                    $(this).addClass('unmute');
                    $(this).find('.twp-video-control-action').html(cutie_pie_custom.mute)

                }

            });

            setTimeout(function () {

                if ($('#' + id).length) {

                    currentVideo = document.getElementById(id);
                    currentVideo.play();

                }

            }, 3000);

            $('#' + id).closest('.entry-video').find('.twp-pause-play').on('click', function () {

                if ($(this).hasClass('play')) {

                    currentVideo = document.getElementById(id);
                    currentVideo.play();

                    $(this).removeClass('play');
                    $(this).addClass('pause');
                    $(this).find('.twp-video-control-action').html(cutie_pie_custom.pause);
                    $(this).find('.screen-reader-text').html(cutie_pie_custom.pause_text);

                } else if ($(this).hasClass('pause')) {

                    currentVideo = document.getElementById(id);
                    currentVideo.pause();

                    $(this).removeClass('pause');
                    $(this).addClass('play');
                    $(this).find('.twp-video-control-action').html(cutie_pie_custom.play);
                    $(this).find('.screen-reader-text').html(cutie_pie_custom.play_text);

                }

            });

        }


    });

});


// this function gets called when API is ready to use
function onYouTubePlayerAPIReady() {

    jQuery(document).ready(function ($) {
        "use strict";

        $('.twp-iframe-video-youtube').each(function () {


            var id = $(this).attr('id');

            // create the global action from the specific iframe (#video)
            action[id] = new YT.Player(id, {
                events: {
                    // call this function when action is ready to use
                    'onReady': function onReady() {

                        action[id].playVideo();

                        $('#' + id).closest('.entry-video').find('.twp-pause-play').on('click', function () {

                            var id = $(this).attr('attr-id');

                            if ($(this).hasClass('play')) {

                                action[id].playVideo();

                                $(this).removeClass('play');
                                $(this).addClass('pause');
                                $(this).find('.twp-video-control-action').html(cutie_pie_custom.pause);
                                $(this).find('.screen-reader-text').html(cutie_pie_custom.pause_text);

                            } else if ($(this).hasClass('pause')) {

                                action[id].pauseVideo();
                                $(this).removeClass('pause');
                                $(this).addClass('play');
                                $(this).find('.twp-video-control-action').html(cutie_pie_custom.play);
                                $(this).find('.screen-reader-text').html(cutie_pie_custom.play_text);

                            }


                        });

                        $('#' + id).closest('.entry-video').find('.twp-mute-unmute').on('click', function () {

                            var id = $(this).attr('attr-id');
                            if ($(this).hasClass('unmute')) {

                                action[id].unMute();

                                $(this).removeClass('unmute');
                                $(this).addClass('mute');
                                $(this).find('.twp-video-control-action').html(cutie_pie_custom.unmute);
                                $(this).find('.screen-reader-text').html(cutie_pie_custom.unmute_text);

                            } else if ($(this).hasClass('mute')) {

                                action[id].mute();
                                $(this).removeClass('mute');
                                $(this).addClass('unmute');
                                $(this).find('.twp-video-control-action').html(cutie_pie_custom.mute);
                                $(this).find('.screen-reader-text').html(cutie_pie_custom.mute_text);

                            }


                        });

                    },
                }
            });

        });

    });
}


// Inject YouTube API script
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function Cutie_Pie_SetCookie(cname, cvalue, exdays) {

    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}

function Cutie_Pie_GetCookie(cname) {

    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');

    for (var i = 0; i < ca.length; i++) {

        var c = ca[i];

        while (c.charAt(0) == ' ') {

            c = c.substring(1);

        }

        if (c.indexOf(name) == 0) {

            return c.substring(name.length, c.length);

        }

    }

    return "";
}

jQuery(document).ready(function ($) {
    "use strict";

    $(window).load(function () {
        $("body").addClass("page-loaded");
    });

    $(function () {
        AOS.init({
            duration: 1200,
            easing: 'ease-in-out-back'
        });
    });

    // Hide Comments
    $('.cutie-pie-no-comment .booster-block.booster-ratings-block, .cutie-pie-no-comment .comment-form-ratings, .cutie-pie-no-comment .twp-star-rating').hide();

    // Rating disable
    if (cutie_pie_custom.single_post == 1 && cutie_pie_custom.cutie_pie_ed_post_reaction) {

        $('.tpk-single-rating').remove();
        $('.tpk-comment-rating-label').remove();
        $('.comments-rating').remove();
        $('.tpk-star-rating').remove();

    }


    /**
    * Light & Dark Mode jQuery Toggle Using localStorage
    */    

    // Check for saved 'switchMode' in localStorage
    let switchMode = localStorage.getItem('switchMode');

    // Get selector
    const switchModeToggle = $(' .theme-colormode-switcher ');

    // Dark mode function
    const enableDarkMode = function() {
        // Add the class to the body
        $( 'body' ).addClass('theme-darkmode-enabled');
        // Update switchMode in localStorage
        localStorage.setItem('switchMode', 'enabled');
    }

    // Light mdoe function
    const disableDarkMode = function() {
        // Remove the class from the body
        $( 'body' ).removeClass('theme-darkmode-enabled');
        // Update switchMode in localStorage value
        localStorage.setItem('switchMode', null);
    }

    // If the user already visited and enabled switchMode
    if (switchMode === 'enabled') {
        enableDarkMode();
        // Dark icon enabled
        $( '.mode-icon-change' ).addClass( 'mode-icon-night' );
        $( '.mode-icon-change' ).removeClass( 'mode-icon-light' );
    } else {
        // Light icon enabled
        $( '.mode-icon-change' ).addClass( 'mode-icon-light' );
        $( '.mode-icon-change' ).removeClass( 'mode-icon-night' );
    }

    // When someone clicks the button
    switchModeToggle.on('click', function() {
        // Change switch icon
        $( '.mode-icon-change' ).toggleClass( 'mode-icon-light' );
        $( '.mode-icon-change' ).toggleClass( 'mode-icon-night' );

        // get their switchMode setting
        switchMode = localStorage.getItem('switchMode');

        // if it not current enabled, enable it
        if (switchMode !== 'enabled') {
            enableDarkMode();              
        // if it has been enabled, turn it off  
        } else {  
            disableDarkMode();              
        }
    });
    // Add Class on article
    $('.theme-article-post.post').each(function () {
        $(this).addClass('twp-article-loded');
    });

    // Aub Menu Toggle
    $('.submenu-toggle').click(function () {
        $(this).toggleClass('button-toggle-active');
        var currentClass = $(this).attr('data-toggle-target');
        $(currentClass).slideToggle();
    });


    $('.skip-link-menu-start').focus(function () {

        if (!$("#offcanvas-menu #primary-nav-offcanvas").length == 0) {
            $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus();
        }

        if (!$("#offcanvas-menu #social-nav-offcanvas").length == 0) {
            $("#offcanvas-menu #social-nav-offcanvas ul li:last-child a").focus();
        }

    });


    // Action On Esc Button For Offcanvas
    $(document).keyup(function (j) {
        if (j.key === "Escape") { // escape key maps to keycode `27`

            if ($('#offcanvas-menu').hasClass('offcanvas-menu-active')) {
                $('#offcanvas-menu').removeClass('offcanvas-menu-active');
                $('.navbar-control-offcanvas').removeClass('active');
                $('body').removeClass('body-scroll-locked');

                setTimeout(function () {
                    $('.navbar-control-offcanvas').focus();
                }, 300);

            }
        }
    });

    // Toggle Menu Start
    $('.navbar-control-offcanvas').click(function () {

        $(this).addClass('active');
        $('body').addClass('body-scroll-locked');
        $('#offcanvas-menu').toggleClass('offcanvas-menu-active');
        $('.button-offcanvas-close').focus();

    });

    $('.offcanvas-close .button-offcanvas-close').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
        $('html').removeAttr('style');
        $('.navbar-control-offcanvas').focus();
    });

    $('#offcanvas-menu').click(function () {

        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');

    });

    $(".offcanvas-wraper").click(function (e) {

        e.stopPropagation(); //stops click event from reaching document

    });

    $('.skip-link-menu-end').focus(function () {
        $('.button-offcanvas-close').focus();
    });

    // Toggle Menu End

    // Data Background
    var pageSection = $(".data-bg");
    pageSection.each(function (indx) {
        var src = $(this).attr("data-background");
        if (src) {
            $(this).css("background-image", "url(" + src + ")");
        }
    });

    var rtled = false;

    if ($('body').hasClass('rtl')) {
        rtled = true;
    }

    // Content Gallery Slide Start
    $("figure.wp-block-gallery.has-nested-images.columns-1, .wp-block-gallery.columns-1 ul.blocks-gallery-grid, .gallery-columns-1").each(function () {
            $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: false,
            autoplaySpeed: 8000,
            infinite: true,
            nextArrow: '<button type="button" class="slide-btn slide-next-icon"></button>',
            prevArrow: '<button type="button" class="slide-btn slide-prev-icon"></button>',
            dots: false,
            rtl: rtled,
        });
    });

    $(".testimonial-slider").each(function () {
        $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: false,
            autoplaySpeed: 8000,
            infinite: true,
            prevArrow: false,
            nextArrow: false,
            dots: true,
            rtl: rtled,
        });
    });

    $(".main-slider").each(function () {
        $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: false,
            autoplaySpeed: 8000,
            infinite: true,
            prevArrow: false,
            nextArrow: false,
            dots: true,
            rtl: rtled,
        });
    });

    $('#site-header').theiaStickySidebar({
        additionalMarginTop: 30
    });

    // Navigation toggle on scroll
    $(window).scroll(function () {

        if ($(window).scrollTop() > $(window).height() / 2) {
            $('.scroll-up').addClass('enable-scroll-up');
        } else {
            $('.scroll-up').removeClass('enable-scroll-up');
        }

    });

    // Scroll to Top on Click
    $('.scroll-up').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    // Widgets Tab

    $('.twp-nav-tabs .tab').on('click', function (event) {

        var tabid = $(this).attr('tab-data');
        $(this).closest('.tabbed-container').find('.tab').removeClass('active');
        $(this).addClass('active');
        $(this).closest('.tabbed-container').find('.tab-content .tab-pane').removeClass('active');
        $(this).closest('.tabbed-container').find('.content-' + tabid).addClass('active');

    });

});


/*  -----------------------------------------------------------------------------------------------
    Intrinsic Ratio Embeds
--------------------------------------------------------------------------------------------------- */

var CutiePie = CutiePie || {},
    $ = jQuery;

var $cutie_pie_doc = $(document),
    $cutie_pie_win = $(window),

    viewport = {};
viewport.top = $cutie_pie_win.scrollTop();
viewport.bottom = viewport.top + $cutie_pie_win.height();

CutiePie.instrinsicRatioVideos = {

    init: function () {

        CutiePie.instrinsicRatioVideos.makeFit();

        $cutie_pie_win.on('resize fit-videos', function () {

            CutiePie.instrinsicRatioVideos.makeFit();

        });

    },

    makeFit: function () {

        var vidSelector = "iframe, .format-video object, .format-video video";

        $(vidSelector).each(function () {

            var $cutie_pie_video = $(this),
                $cutie_pie_container = $cutie_pie_video.parent(),
                cutie_pie_iTargetWidth = $cutie_pie_container.width();

            // Skip videos we want to ignore
            if ($cutie_pie_video.hasClass('intrinsic-ignore') || $cutie_pie_video.parent().hasClass('intrinsic-ignore')) {
                return true;
            }

            if (!$cutie_pie_video.attr('data-origwidth')) {

                // Get the video element proportions
                $cutie_pie_video.attr('data-origwidth', $cutie_pie_video.attr('width'));
                $cutie_pie_video.attr('data-origheight', $cutie_pie_video.attr('height'));

            }

            // Get ratio from proportions
            var cutie_pie_ratio = cutie_pie_iTargetWidth / $cutie_pie_video.attr('data-origwidth');

            // Scale based on ratio, thus retaining proportions
            $cutie_pie_video.css('width', cutie_pie_iTargetWidth + 'px');
            $cutie_pie_video.css('height', ($cutie_pie_video.attr('data-origheight') * cutie_pie_ratio) + 'px');

        });

    }

};

$cutie_pie_doc.ready(function () {

    CutiePie.instrinsicRatioVideos.init();      // Retain aspect ratio of videos on window resize

});
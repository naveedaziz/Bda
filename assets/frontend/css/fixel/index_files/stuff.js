function embed() {
    var frame = document.createElement('iframe');
    frame.setAttribute('src',
	'http://player.vimeo.com/video/95263870');
    frame.width = '634';
    frame.height = '400';
    frame.frameBorder = '0';
    frame.style.border = '0';
    document.getElementById('ptVideo').appendChild(frame);
    return false;
};

function embed2() {
    var frame = document.createElement('iframe');
    frame.setAttribute('src',
	'http://player.vimeo.com/video/95263965');
    frame.width = '634';
    frame.height = '400';
    frame.frameBorder = '0';
    frame.style.border = '0';
    document.getElementById('ptVideo').appendChild(frame);
    return false;
};

function hdrCenter() {

    $('#homeHeader .slider img').removeAttr('style');

    var curr_h = $('#homeHeader .slider li:visible img').height();
    var box_h = $('#homeHeader').height();

    var curr_w = $('#homeHeader .slider li:visible img').width();
    var box_w = $('#homeHeader').width();

    if (curr_h > box_h) {
        var tmp = Math.round((curr_h - box_h) / 2);
        $('#homeHeader .slider li img').css({ 'margin-top': '-' + tmp + 'px' });
    }

    if (curr_w > box_w) {
        var tmp = Math.round((curr_w - box_w) / 2);
        $('#homeHeader .slider li img').css({ 'margin-left': '-' + tmp + 'px' });
    }

}


var gmap;

function gMap() {
    gmap = new GMaps({
        div: '#gMap',
        lat: 25.067816,
        lng: 55.144578,
        zoomControl: false,
        panControl: false,
        streetViewControl: false,
        mapTypeControl: false,
        overviewMapControl: false,
        zoom: 17,
        scrollwheel: false,
        click: function (e) {
            gmap.hideInfoWindows();
        }
    });

    gmap.addMarker({
        lat: 25.067760,
        lng: 55.144578,
        icon: '/img/we-are-here-new.png'
    });
}

var gflag = 0;
var to = null;
var to2 = null;
var to3 = null;
var prev = 0;
var curID = 0;

var pp_wait = 7000;

var ddHide2 = function (dd) {
    to2 = setTimeout(function () {
        $(dd + ':visible').stop().slideUp(600);
        clearTimeout(to2);
        clearTimeout(to3);
        $('#topLinks a').removeClass('hover');
    }, 10);
}



function inputStuff() {

    $('.inpt:input, div.inpt :input').each(function () {

        var default_value = this.value;

        $(this).focus(function () {
            if ($(this).attr('value') == default_value) {
                $(this).attr('value', '').removeClass('default inpt_err')
                if ($(this).attr('id') == 'inptNewsletter') {
                    default_value = 'Your Email Address';
                }
            }
        });

        $(this).blur(function () {
            if ($(this).attr('value') == '') {
                $(this).attr('value', default_value).addClass('default').removeClass('inpt_err');
            }
        });

    });

}



$(document).ready(function () {

    var primaryMenuItems = $('#topMenu').children('li');
    primaryMenuItems.each(function () {
        var $this = $(this),
            subMenu = $this.children('.sub_nav_container'),
            closeSubMenu = subMenu.find('.btnClose');

        $this.hoverIntent({
            over: function () {
                subMenu.fadeIn(200);
            },
            out: function () {
                subMenu.fadeOut(300);
            },
            timeout: 10,
            interval: 25
        });

        closeSubMenu.on('click', function (e) {
            e.preventDefault();

            $(this).parent('.sub_nav_container').fadeOut(300);
        });

        $(window).on('scroll', function (e) {
            $('.sub_nav_container').fadeOut(300);
        });
    });


    $('#topLinks a').click(function (e) {
        e.preventDefault();
        tmp = $(this).parent().attr("id") + '_dd';
        clearTimeout(to3);

        if ($(this).hasClass('hover')) {
            ddHide2('.tl_dd:visible');
            return;
        }

        $('#topLinks a').removeClass('hover');
        $(this).addClass('hover');

        if ($('.tl_dd').is(':visible')) {
            $('.tl_dd:visible').slideUp(600);
        } else {
        }

        $("#" + tmp).slideDown(600);

    });
    $('.tl_dd .btnClose').click(function (e) {
        e.preventDefault();
        ddHide2('.tl_dd:visible');
    });

    $('#topLinks a, .tl_dd').hover(
        function () { clearTimeout(to3); },
        function () { to3 = setTimeout(function () { ddHide2('.tl_dd:visible'); }, pp_wait); }
    );


    $('.printPage').click(function (e) {
        e.preventDefault();
        javascript: window.print();
    });


    $('.btnRequest, #request .btnClose').click(function (e) {
        e.preventDefault();
        if ($('#request').is(':hidden')) {
            $('#request').fadeIn(300);
            $('.icon_plus_minus').addClass('opened');
        } else {
            $('#request').fadeOut(300);
            $('.icon_plus_minus').removeClass('opened');
        }
    });


    //Fancy select
    $('.selectAlternate').fancySelect();

    var triggers = $('.fancy-select .trigger');

    triggers.each(function () {
        var $this = $(this),
			selectbox = $this.siblings('.options');

        $this.data('isOpened', false);

        $this.on('close.fs', function () {
            selectbox.mCustomScrollbar("destroy");
            $this.data('isOpened', false);
        });

        $this.on('click', function (e) {
            var $this = $(this);

            if (!$this.data('isOpened')) {
                selectbox.mCustomScrollbar();
                $this.data('isOpened', true);
            }

        });
    });


    if ($("#services").length > 0) {

        //$('.services').css({'height': $('.services').height(), 'width':$('.services').width()});

        if (!Modernizr.touch) {
            var curr_w = $('.wrap').width();

            if (curr_w == 960) {
                sr_dims = ['', 318, 314, 312];
            } else if (curr_w == 720) {
                sr_dims = ['', 224, 226, 256];
            } else {
                sr_dims = ['', 239, 235, 234];
            }

            $('.services .iconLink').hover(
			    function () {
			        var type = $(this).attr('data-type');
			        if (typeof type == 'undefined') { return; }

			        var box = $(this)

			        box.addClass('hover').find('.hidden').fadeIn(200, function () {

			            if (box.hasClass('portfolio')) {
			                box.find('.ins').fadeIn(200);
			            } else {
			                box.find('.hidden').animate({
			                    width: sr_dims[type],
			                    height: 318
			                }, 200, function () {
			                    box.find('.ins').fadeIn(200)
			                });
			            }

			        });
			    },
			    function () {
			        var box = $(this);

			        if (box.hasClass('tellfriend')) { return; }

			        box.removeClass('hover').find('.hidden').stop().fadeOut(200, function () {
			            box.find('.hidden').removeAttr('style');
			            box.find('.ins').removeAttr('style');
			        });
			    }
		    );
        }

        if (Modernizr.touch) {
            $('.services div.iconLink:not(.tellfriend)').on('click', function () {
                window.location.href = $(this).find('.btn').attr('href');
            });

            $('.services .tellfriend').on('click', function (e) {
                e.preventDefault();
                var type = $(this).attr('data-type');
                if (typeof type == 'undefined') { return; }

                var box = $(this)

                box.addClass('hover').find('.hidden').fadeIn(200, function () {

                    if (box.hasClass('portfolio')) {
                        box.find('.ins').fadeIn(200);
                    } else {
                        box.find('.hidden').animate({
                            width: '100%',
                            height: 318
                        }, 200, function () {
                            box.find('.ins').fadeIn(200)
                        });
                    }

                });
            });
        }


        $('.iconLink .btnClose').click(function (e) {
            e.preventDefault();

            var box = $(this).parents('.iconLink');
            box.removeClass('hover').find('.hidden').stop().fadeOut(200, function () {
                box.find('.hidden').removeAttr('style');
                box.find('.ins').removeAttr('style');
                box.find('.steps').removeAttr('style');
                box.find('.step1').show();
            });
            e.stopImmediatePropagation();
        });

        $('.tellfriend .btn').click(function (e) {
            e.preventDefault();
            var box = $(this).parents('.steps');


            if ($(this).hasClass('btnSend')) {
                if (jQuery("#requesttellFriend").validationEngine("validate")) {
                    box.fadeOut(200, function () {

                        $('.tellfriend .sending').fadeIn(200, function () {

                            $.ajax({
                                type: 'POST',
                                url: '../Post.aspx',
                                data: {
                                    FriendEmail: $("#txt_emailFriend").val(), YourName: $("#txt_yourname").val(), YourEmail: $("#txt_youremail").val(), Message: $("#txt_message").val(), CaptchaCode: $("#txtCaptcha").val(), copy: $("#copyMe2").val(), ShareLink: $("#linkshare").val(), requesttype: "sendtellfriendemail"
                                },
                                success: function (data) {
                                    if (data == "success") {
                                        $('.tellfriend .sending').fadeOut(300, function () {
                                            $('.tellfriend .thanks').fadeIn(200, function () {

                                                setTimeout(function () {
                                                    $('.tellfriend .thanks').fadeOut(200, function () {
                                                        $("#txt_emailFriend").val("Add friend(s) email(s)...");
                                                        $("#txt_yourname").val("Your name...");
                                                        $("#txt_youremail").val("Your email address");
                                                        $("#txt_message").val("Your message (500 character limit)");
                                                        $("#copyMe2").prop("checked", false);
                                                        $("#txtCaptcha").val("");
                                                        $('.tellfriend .error').hide();
                                                        $("#CaptchaImage").attr("src", "/captcha/jpegimage.aspx?date=" + Date.now());
                                                        
                                                    });
                                                    $('.tellfriend .step1').fadeIn(200);
                                                    
                                                }, 5000);

                                            });
                                        });

                                    } else if (data == "invalid captcha") {
                                        $("#CaptchaImage").attr("src", "/captcha/jpegimage.aspx?date=" + Date.now());
                                        $('.tellfriend .sending').fadeOut(500, function () {
                                            $('.tellfriend .error').show();
                                            $('.tellfriend .step4').fadeIn(200);
                                        });
                                    }
                                },
                                dataType: 'html'
                            });
                        });
                    });
                }

            } else {
                if (jQuery("#requesttellFriend").validationEngine("validate")) {
                    box.fadeOut(200, function () {
                        box.next().fadeIn(200);
                    });
                }
            }
        });

    }



    if ($("#sidebar .iconLink").length > 0) {

        //$('#sidebar .portfolio .hidden').css({ 'height':$('#sidebar .portfolio').outerHeight(), 'width':$('#sidebar .portfolio').outerWidth() });

        $('#sidebar .iconLink').hover(
			function () {
			    var box = $(this)

			    box.addClass('hover').find('.hidden').fadeIn(200, function () {
			        box.find('.ins').fadeIn(200);
			    });
			},
			function () {
			    var box = $(this);

			    if (box.hasClass('tellfriend')) { return; }

			    box.removeClass('hover').find('.hidden').stop().fadeOut(200, function () {
			        //box.find('.hidden').removeAttr('style');
			        box.find('.ins').removeAttr('style');
			    });
			}
		);

    }

    var xpnd_speed = 400;

    $('.q_link').click(function (e) {
        e.preventDefault();
        var tmp = $(this).next('.q_txt');
        if (tmp.length <= 0) { return; }

        if (tmp.is(':hidden')) {

            $('.q_txt:visible').slideUp(xpnd_speed);
            tmp.slideDown(xpnd_speed);

        } else {
            tmp.slideUp(xpnd_speed);
        }
    });


    $('#promoVideo, .btnPromo').click(function (e) {
        if (!Modernizr.touch) {
            e.preventDefault();
            $.fancybox.open({
                content: '<iframe width="634" height="400" frameborder="0" src="http://player.vimeo.com/video/95263965" style="border: 0px none;"></iframe>',
                scrolling: 'no',
                width: 634,
                height: 400,
                closeBtn: false,
                helpers: {
                    title: null,
                    overlay: { locked: false }
                }
            });
        }
    });


    var fancy_iframe = $('.fancy_iframe');
    if (!Modernizr.touch) {
        fancy_iframe.fancybox({
            padding: 18,
            closeBtn: false,
            helpers: {
                title: false
            }
        });
    }

    var fancybox_item = $('.fancybox_item');
    if (!Modernizr.touch) {
        fancybox_item.fancybox({
            padding: 18,
            closeBtn: false,
            helpers: {
                title: false
            }
        });
    }



    //	inputStuff();

    var def_txt = [
		'Select Option',
		'Please Select',
		'Select City',
		'Country of residence',
		'Select a time',
		'Location',
		'Your Email Address',
		'Enter Your Email',
		''
    ];

    $('div[class^="slct"]')
		.each(function () {
		    //$(this).find('b').text( $(this).find("option:selected").text() );			
		});

    $("div.inpt select, div.slct select").change(function () {
        var tmp = $(this).find("option:selected").text();
        //$(this).parent().find('b').text( tmp ).removeClass('default');

        if (jQuery.inArray(tmp, def_txt) != -1) {
            $(this).parent().find('b').text(tmp).addClass('default');
        } else {
            $(this).parent().find('b').text(tmp).removeClass('default');
        }
    });

    $('.arrowDown').click(function (e) {
        e.preventDefault();
        scrl_id = $(this).attr('href');
        scrl_pos = $(scrl_id).position().top;
        if ($('#wrapper').hasClass('sticky')) {
            scrl_pos -= 59;
        } else {
            scrl_pos -= 115;
        }
        $('body,html').animate({ scrollTop: scrl_pos }, 'slow');
    });


    $('.ft2 #expand').click(function (e) {
        e.preventDefault();

        if ($(this).hasClass('plus')) {

            $('#ftMore').slideDown(400);
            $(this).attr('class', 'minus');

            $('html, body').animate({
                scrollTop: '+=200'
            }, 800);

        } else {

            $('#ftMore').slideUp(400);
            $(this).attr('class', 'plus');

        }

    });


    $('#backTop').click(function (e) {
        e.preventDefault();
        $('body,html').animate({ scrollTop: 0 }, 'slow');
    });


    /* Correct year near copyright sign   */
    $("#currYear").text((new Date).getFullYear());


    $('.email').each(function () {
        var $email = $(this);
        var address = $email.text()
		.replace(/\s*\[at\]\s*/, '@')
		.replace(/\s*\[dot\]\s*/g, '.');
        $email.html('<a href="mailto:' + address + '" title="' + address + '">' + address + '</a>');
    });

    $('#topLinks a, #topMenu a, .subMenu a, a.btn, #footer ul a, .btnBlue, .btnPurple, .btnPurple2, #crumbar a, .printPage, #sidebar nav li a, #sitemap a').each(function () {
        var tmp = $(this).attr('title'); if (tmp !== undefined) { return; }
        $(this).attr('title', $(this).text())
    });

    $('#statistics .links a').each(function () {
        var tmp = $(this).attr('title'); if (tmp !== undefined) { return; }
        $(this).attr('title', $(this).find('b').text())
    });

    /* Show appropriate sub-menu if needed.. */
    var url = window.location.pathname;

    //url = url.substr(url.lastIndexOf("/") + 1); // filename
    var url_ttl = document.title;

    if ((url != '/404.aspx') && (url_ttl.indexOf("Error 404") == -1)) {

        url = url.split("#")[0];

        $("#sidebar nav, #footer .ft0").find("a[href$='" + url + "']").first().addClass('act');
        //$(".subMenu").find("a[href$='" + url + "']").attr('class','act');

        url = url.substr(0, url.lastIndexOf("/") + 1);

        var url_cs = url.indexOf("casestudies");
        if (url_cs > 0) {
            $("#sidebar nav, #footer .ft0").find("a[href*='casestudies']").addClass('act');
            url = url.substr(0, url_cs);
        }

    }


    //since we have URL rewriting enabled, we need to manually adjust some links highlighting
    var currentURL = window.location.pathname;

    //Higlighting the careers menu on single job listing page
    if (currentURL.split('/')[1] == 'careers') {
        $("#sidebar nav").find('a[href="/careers/index.aspx"]').addClass('act');
    }

    $("#sidebar nav").find('a[href="http://www.wewanttraffic.com/ourwork/animation.aspx"]').removeClass('act');


    //Changing the first link in the breadcrumb to point to the homepage
    $('#crumbar .wrap').find('a').first().attr('href', '/');



    //Highlighting the header
    $('#topMenu').find('a[href="' + currentURL + '"]').first().addClass('active');

    if ('web-design' == currentURL.split('/')[1] && 'casestudies' == currentURL.split('/')[2]) {
        $('#topMenu').find('a[href="/web-design/casestudies.aspx"]').addClass('active');
    }

    if ('seo' == currentURL.split('/')[1] && 'casestudies' == currentURL.split('/')[2]) {
        $('#topMenu').find('a[href="/seo/casestudies.aspx"]').addClass('active');
    }

    if ('social-media-marketing' == currentURL.split('/')[1] && 'casestudies' == currentURL.split('/')[2]) {
        $('#topMenu').find('a[href="/social-media-marketing/casestudies.aspx"]').addClass('active');
    }


    //Higlighting the top menu based on inner pages
    var currentSection = window.location.pathname.split('/')[1];

    if (currentSection == 'web-design') {
        $('#tm_1').children('a').addClass('act');
    }

    if (currentSection == 'mobile') {
        $('#tm_1').children('a').addClass('act');
    }

    if (currentSection == 'animation') {
        $('#tm_1').children('a').addClass('act');
    }

    if (currentSection == 'masterkey') {
        $('#tm_1').children('a').addClass('act');
    }

    if (currentSection == 'seo') {
        $('#tm_2').children('a').addClass('act');
    }

    if (currentSection == 'social-media-marketing') {
        $('#tm_2').children('a').addClass('act');
    }

    if (currentSection == 'pay-per-click') {
        $('#tm_2').children('a').addClass('act');
    }

    if (currentSection == 'copywriting') {
        $('#tm_3').children('a').addClass('act');
    }

    if (currentSection == 'content') {
        $('#tm_3').children('a').addClass('act');
    }

    if (currentSection == 'video') {
        $('#tm_3').children('a').addClass('act');
    }

    if (currentSection == 'outsourcing') {
        $('#tm_3').children('a').addClass('act');
    }

    if (currentSection == 'cms-development') {
        $('#tm_4').children('a').addClass('act');
    }

    if (currentSection == 'ecommerce') {
        $('#tm_4').children('a').addClass('act');
    }

    if (window.location.pathname.split('/')[1] == 'integration') {
        $('#tm_4').children('a').addClass('act');
    }


    //Again, we need some manual hightlighting due to URL rewriting
    if (currentSection === undefined || ( currentSection.split( '.aspx' ) !== '' )) {
        currentSection = window.location.pathname;

        if (currentSection == '/web-design.aspx') {
            $('#tm_1').children('a').addClass('act');
        }

        if (currentSection == '/web-development.aspx') {
            $('#tm_1').children('a').addClass('act');
        }

        if (currentSection == '/animation.aspx') {
            $('#tm_1').children('a').addClass('act');
        }

        if (currentSection == '/masterkey.aspx') {
            $('#tm_1').children('a').addClass('act');
        }

        if (currentSection == '/mobile.aspx') {
            $('#tm_1').children('a').addClass('act');
        }

        if (currentSection == '/seo.aspx') {
            $('#tm_2').children('a').addClass('act');
        }

        if (currentSection == '/social-media-marketing.aspx') {
            $('#tm_2').children('a').addClass('act');
        }

        if (currentSection == '/pay-per-click.aspx') {
            $('#tm_2').children('a').addClass('act');
        }

        if (currentSection == '/digital-agency.aspx') {
            $('#tm_2').children('a').addClass('act');
        }

        if (currentSection == '/copywriting.aspx') {
            $('#tm_3').children('a').addClass('act');
        }

        if (currentSection == '/content.aspx') {
            $('#tm_3').children('a').addClass('act');
        }

        if (currentSection == '/video.aspx') {
            $('#tm_3').children('a').addClass('act');
        }

        if (currentSection == '/outsourcing.aspx') {
            $('#tm_3').children('a').addClass('act');
        }

        if (currentSection == '/cms-development.aspx') {
            $('#tm_4').children('a').addClass('act');
        }

        if (currentSection == '/ecommerce.aspx') {
            $('#tm_4').children('a').addClass('act');
        }

        if (currentSection == '/contactus/index.aspx') {
            $('#tm_5').children('a').addClass('act');
        }
    }


    var faqAnchors = $('.q_link, .q_txt a');
    faqAnchors.each(function () {
        var $this = $(this);
        if (!$this.attr('title')) {
            $this.attr('title', $this.html());
        }
    });


    //Adjusting para heights on case-studies page
    if ('/seo/casestudies.aspx' == window.location.pathname && $(window).width() > 640) {
        var rows = $('.case_study_row');
        rows.each(function () {
            var $this = $(this),
                para = $this.find('.case_study_entry p'),
                paraHeight = ($(para[0]).height() > $(para[1]).height()) ? $(para[0]).height() : $(para[1]).height();

            para.css('height', paraHeight);
        });
    }


    //Homepage social buttons
    var homeSocialSidebar = $('.home').siblings('.addthis_toolbox.addthis_floating_style.addthis_32x32_style');
    homeSocialSidebar.waypoint({
        offset: '50%',
        handler: function (dir) {
            if (dir === 'down') {
                $(this).addClass('home_social_sidebar');
            } else if (dir === 'up') {
                $(this).removeClass('home_social_sidebar');
            }
        }
    });



    //Currency converter in copywriting questionaire
    if (!Modernizr.touch) {
        $('.fancy_iframe').fancybox({
            type: 'iframe',
            padding: 18,
            closeBtn: false,
            helpers: {
                title: false
            }
        });

        $('.fancy_iframe_cc').fancybox({
            type: 'iframe',
            padding: 18,
            width: 300,
            height: 300,
            closeBtn: false,
            helpers: {
                title: false
            }
        });
    }


    //Responsive Navigation
    var topMenuContainer = $('#topMenu'),
        topMenuSections = topMenuContainer.find('nav'),
        responsiveNav = '',
        responsiveNavContainer = $('#responsive_nav_container');

    topMenuSections.each(function () {
        var $this = $(this),
            h2 = $this.find('h2'),
            dd = $this.find('li');

        responsiveNav += '<h2>' + h2.text() + '</h2><ul>';
        dd.each(function () {
            responsiveNav += '<li>' + $(this).html() + '</li>';
        });
        responsiveNav += '</ul>'
    });

    responsiveNav += '<h2><a href="/contactus/index.aspx" title="Contact Us Today">Contact Us</a></h2>';
    responsiveNav += '<a href="#" class="btnClose" title="Close">Close</a>';

    responsiveNavContainer.append(responsiveNav);


    //Toggling responsive navigation
    var resToggleBtn = $('#responsive_nav_toggle'),
        resCloseBtn = responsiveNavContainer.find('.btnClose'),
        isResNAvAnimating = false;

    resToggleBtn.on('click', function (e) {
        e.preventDefault();

        var $this = $(this);

        if (!isResNAvAnimating) {
            isResNAvAnimating = true;
            $this.toggleClass('opened');
            resCloseBtn.fadeToggle();
            responsiveNavContainer.slideToggle(500, function () {
                isResNAvAnimating = false;
            });
        }
    });


    //Highlighting responsive nav
    var currentPage = responsiveNavContainer.find('a[href="' + window.location.pathname + '"]'),
        currentURL = window.location.pathname;

    currentPage.addClass('active');
    currentPage.parents('ul:first').css('display', 'block');

    responsiveNavContainer.find('a[href="' + currentURL + '"]').first().addClass('active');

    if ('web-design' == currentURL.split('/')[1] && 'casestudies' == currentURL.split('/')[2]) {
        responsiveNavContainer.find('a[href="/web-design/casestudies.aspx"]').addClass('active');
    }

    if ('seo' == currentURL.split('/')[1] && 'casestudies' == currentURL.split('/')[2]) {
        responsiveNavContainer.find('a[href="/seo/casestudies.aspx"]').addClass('active');
    }

    if ('social-media-marketing' == currentURL.split('/')[1] && 'casestudies' == currentURL.split('/')[2]) {
        responsiveNavContainer.find('a[href="/social-media-marketing/casestudies.aspx"]').addClass('active');
    }


    //Toggling different navigation sections
    var sectionHeads = responsiveNavContainer.find('h2'),
        sectionNavs = responsiveNavContainer.find('ul');

    sectionHeads.each(function () {
        var $this = $(this);

        $this.on('click', function (e) {
            sectionNavs.not($this.next('ul')).slideUp();
            $this.next('ul').slideToggle();
            e.stopImmediatePropagation();
        });
    });

    resCloseBtn.on('click', function (e) {
        e.preventDefault();

        if (!isResNAvAnimating) {
            responsiveNavContainer.slideUp(500);
            resToggleBtn.removeClass('opened');
            resCloseBtn.fadeOut();
        }
    });


    if ($('.types').width() > 0) {
        $('.types').each(function () {
            var $this = $(this),
                leftBoxes = $this.find('.l').find('.icon_tick, .icon_cross'),
                rightBoxes = $this.find('.r').find('.icon_tick, .icon_cross'),
                height = '';

            for (var i = 0; i < leftBoxes.length; i++) {
                height = ($(leftBoxes[i]).height() > $(rightBoxes[i]).height()) ? $(leftBoxes[i]).height() : $(rightBoxes[i]).height();
                $(leftBoxes[i]).css('height', height);
                $(rightBoxes[i]).css('height', height);
            }
        });
    }


    //Highlighting Footer Navigation
    currentPage = window.location.pathname;
    $('#footer').find('.div9').find('a[href="' + currentPage + '"]').addClass('active');


    //Inserting the logo via js as SVG fallback
    var logoContainer = $('.no-svg #logo');
    if (logoContainer.length > 0) {
        logoContainer.html('<img src="/img/logo.png" alt="Traffic" style="display:inline-block; max-width:100%; height:auto;" />');
    }


});



function headerStuff() {

    //var stickyNavTop = $('#header').offset().top;
    var stickyNavTop = 0;
    var stickyNavHeight = $('#header #top').height();

    var stickyNav = function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > stickyNavTop) {

            $('#wrapper').addClass('sticky');

            $('#logo').stop().animate({
                marginTop: "13px",
                width: '121px'
            }, 100);

            $('#header #top').stop().animate({
                height: "60px"
            }, 200);

        } else {

            $('#wrapper').removeClass('sticky');

            $('#logo').stop().animate({
                marginTop: "50px",
                width: '174px'
            }, 100);

            $('#header #top').stop().animate({
                height: stickyNavHeight
            }, 200, function () {
                $('#header').removeAttr('style')
            });
        }
    };

    if (!Modernizr.touch) {
        stickyNav();
    }

    $(window).scroll(function () {
        if (!Modernizr.touch) {
            stickyNav();
            ddHide2('.tl_dd:visible');
        }
    });

}



$(window).resize(function () {
    $('#homeHeader .slider img').removeAttr('style');
    setTimeout(function () {
        hdrCenter();
    }, 300);
});



$(window).load(function () {

    headerStuff();

    hdrCenter();

    if (($("#middle").length > 0) && ($('#sidebar').length > 0)) {
        if ($('#middle .cleaner[style*="padding"]').length > 0) {
            $('#middle .cleaner[style*="padding"]').removeAttr('style');
        }
        var heightDiff = $('#sidebar').outerHeight() - $('#middle').outerHeight();
        if (heightDiff > 0) {
            if (!Modernizr.touch) {
                $('#middle .work-text').css({
                    height: '+=' + heightDiff
                });
            }
        }
    }

    gMap();

    //if ($("#location").length > 0 && $(window).width() > 640) {
    //    gMap();
    //}

    //$(window).resize(function () {
    //    if ($(window).width() > 640) {
    //        gMap();
    //    }
    //});

    if ($("#someClients").length > 0) {

        $('#someClients a').BlackAndWhite({
            hoverEffect: true,
            webworkerPath: false,
            responsive: true,
            speed: {
                fadeIn: 200,
                fadeOut: 200
            }
        });
    }


    //Placing header content in the right place
    var headerSocialContent = $('#friend_dd, #follow_dd, #network_dd'),
        headerEntryPoint = $('#head_entry_point');

    headerEntryPoint.after(headerSocialContent);


    //Retrieving latest news from the blog
    if (window.location.pathname == '/' || window.location.pathname == 'http://wewanttraffic.com/') {
        var newsContainer = $('#traffic_blog_feed');
        $.ajax({
            url: '/blog-feed.txt',
            success: function (data) {
                newsContainer.html(data);
            },
            cache: false
        });
    }

    if (window.location.pathname == "/support/haveyoursay.aspx") {
        var newsContainer = $('.haveyousaynews');
        $.ajax({
            url: '/blog-feed.txt',
            success: function (data) {
                data = $(data);
                var anchors = data.children('a');
                var htmlString = '';
                anchors.each(function () {
                    htmlString += '<h3><a href="' + $(this).attr('href') + '" target="_blank">' + $(this).find('b').text() + '</a></h3>';
                    htmlString += '<span>' + $(this).siblings('.news_meta').find('.news_info').find('span:eq(1)').text().replace('Date: ', '') + '</span>';
                });
                newsContainer.html(htmlString);
            },
            cache: false
        });
    }

    if ( $( window ).width() > 768 ) {
        setTimeout(function () {
            addthis.init();
        }, 2000);
    }


    //Injecting SVG
    $.get('/svg/svg-header.shtml', function (data) {
        $('.header_svg').html(data);
    });

    if (window.location.pathname == '/') {
        $.get('/svg/svg-homepage.shtml', function (data) {
            $('.home_svg').html(data);
        });
        $.get('/svg/svg-slider.shtml', function (data) {
            $('.slider_svg').html(data);
        });
    }

});


/**
 * Debouncing function for window resizing event
 */
(function ($, sr) {
    var debounce = function (func, threshold, execAsap) {
        var timeout;

        return function debounced() {
            var obj = this, args = arguments;
            function delayed() {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            };

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100);
        };
    }
    jQuery.fn[sr] = function (fn) { return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
})(jQuery, 'smartresize');


/**
 * Homepage slider stuff
 */
(function () {

    if ($('#home-slider').length > 0) {

        /**
    	 * The slider container
    	 */
        var homeSliderContainer = $('#home-slider'),
            syncSliderContainer = $('#home-slider-sync');


        /**
         * Function to make the slider markup from json file
         */
        var makeHomeSlider = function(data) {
            var content = '',
    			img = '',
    			alt = '',
    			slideInfo = '',
                videoLink = '',
                order = [];

            for (var i in data['items']) {
                order.push(parseInt(i));
            }

            order.sort(function () { return Math.round(Math.random()); });

            for (var i in data['items']) {
                img = data['items'][i].img;
                alt = data['items'][i].alt;
                slideInfo = data['items'][i].info;
                videoLink = (data['items'][i].hasOwnProperty('videoLink')) ? ('<a href="' + data['items'][i].videoLink + '" class="slider_video video_link_map" title="Watch the video" target="_blank">&nbsp;</a>') : '';

                content += '<div class="item" data-slide-info="' + slideInfo + '"><img data-src="' + img + '" alt="' + alt + '" class="lazyOwl" ' + ' />';
                content += videoLink;
                content += '</div>';

                videoLink = '';
            }

            homeSliderContainer.html(content);
        };


        var makeSyncSlider = function(data) {

            var content = '',
                title = '',
                desc = '',
                link = '',
                iframeClass = '',
                buttonText = '';

            for (var i in data['slideinfos']) {
                title = data['slideinfos'][i].title;
                desc = data['slideinfos'][i].description;
                link = data['slideinfos'][i].link;
                slideInfo = data['slideinfos'][i].info;
                iframeClass = data['slideinfos'][i].hasOwnProperty('isVideo') ? "slider_video " : '';
                buttonText = data['slideinfos'][i].hasOwnProperty('isVideo') ? "Watch the video " : 'See the work';

                content += '<div class="item" data-slide-info="' + slideInfo + '"><h2>' + title + '</h2><p>' + desc + '</p><a class="btn btnPortfolio ' + iframeClass + '" href="' + link + '" target="_blank" title="' + buttonText + '">' + buttonText + '</a></div>';

                iframeClass = '';
                buttonText = 'See the work';
            }

            syncSliderContainer.html(content);
        };


        /**
         * Syncing the two sliders
         */
        var currentSlide = '',
            syncSlide = '';

        var syncWithSlider = function (slider) {
            currentSlide = slider.find('.active').children('.item').data('slide-info');
            syncSlide = syncSliderContainer.find('[data-slide-info="' + currentSlide + '"]').parent('.owl-item').index();
            syncSlider.trigger('owl.goTo', syncSlide);
        };


        /**
         * Initializing the video and pausing the slider on video play
         */
        var initializeSliderVideo = function () {
            if (!Modernizr.touch && $('.slider_video').length > 0) {
                $('.slider_video').fancybox({
                    type: 'iframe',
                    padding: 18,
                    closeBtn: false,
                    helpers: {
                        title: false
                    },
                    beforeLoad: function() { homeSlider.data('owlCarousel').stop(); },
                    afterClose: function() { homeSlider.data('owlCarousel').play(); }
                });
            }
        };


        /**
         * Adjusting the height of the slider container after initializatino
         */
        var adjustSliderHeight = function () {
            $('.home-slider-container').removeAttr('style');
        };


        /**
    	 * Determining if it's mobile
    	 */
        var isMobile = ($(window).width() <= 640) ? true : false;


        /**
    	 * Slider configuration object 
    	 */
        var rootPath = '/json/',
    		sliderGroups = ['web', 'mobile', 'seo', 'content'],
    		sliderGroup = sliderGroups[Math.floor(Math.random() * sliderGroups.length)],
    		sliderSize = (isMobile) ? 'narrow' : 'full';

        var homeSliderConfig = '';

        var makeHomeSliderConfig = function(sliderGroup, sliderSize) {
            var homeSliderConfig = {
                transitionStyle: 'fadeUp',
                singleItem: true,
                navigation: false,
                pagination: false,
                addClassActive: true,
                lazyLoad: true,
                mouseDrag: false,
                touchDrag: false,
                autoPlay: 8000,
                responsiveRefreshRate: 5,
                jsonPath: rootPath + sliderGroup + '-' + sliderSize + '.json',
                jsonSuccess: makeHomeSlider,
                afterLazyLoad: adjustSliderHeight,
                afterAction: syncWithSlider
            };

            return homeSliderConfig;
        };

        var makeSyncSliderConfig = function(sliderGroup) {
            var syncSliderConfig = {
                transitionStyle: 'fade',
                singleItem: true,
                navigation: false,
                pagination: false,
                autoPlay: false,
                mouseDrag: false,
                touchDrag: false,
                responsiveRefreshRate: 5,
                jsonPath: rootPath + 'info-' + sliderGroup + '.json',
                jsonSuccess: makeSyncSlider,
                afterInit: initializeSliderVideo
            };

            return syncSliderConfig;
        };


        /**
         * Slider initialization
         */
        var syncSlider = syncSliderContainer.owlCarousel(makeSyncSliderConfig(sliderGroup)),
            homeSlider = homeSliderContainer.owlCarousel(makeHomeSliderConfig(sliderGroup, sliderSize));

        $('.slide_groups').find('a[data-slide-group="' + sliderGroup + '"]').addClass('active');


        /**
         * Functions to handle the prev/next buttons
         */
        var enableNP = false;

        $('#homeHeader .hmPrev').on('click', function (e) {
            e.preventDefault();
            if (!enableNP) {
                homeSlider.trigger('owl.prev');
                enableNP = true;
                setTimeout(function () {
                    enableNP = false;
                }, 800);
            }
        });

        $('#homeHeader .hmNext').on('click', function (e) {
            e.preventDefault();
            if (!enableNP) {
                homeSlider.trigger('owl.next');
                enableNP = true;
                setTimeout(function () {
                    enableNP = false;
                }, 800);
            }
        });


        /**
         * Responsive slider
         */
        var isMobileInitialized = false,
        	isDesktopInitialized = false,
            currentSlideIndex = '';

        $(window).smartresize(function () {
            if ($(this).width() <= 640 && !isMobileInitialized) {
                sliderSize = 'narrow';
                homeSlider.data('owlCarousel').reinit(makeHomeSliderConfig(sliderGroup, sliderSize));
                isMobileInitialized = true;
                isDesktopInitialized = false;
            } else if ($(this).width() > 640 && !isDesktopInitialized) {
                sliderSize = 'full';
                homeSlider.data('owlCarousel').reinit(makeHomeSliderConfig(sliderGroup, sliderSize));
                isMobileInitialized = false;
                isDesktopInitialized = true;
            }
        });


        /**
         * Toggling slide groups
         */
        var slideGroupButtons = $('.slide_groups').find('a'),
            isToggling = false;

        slideGroupButtons.each(function () {
            var $this = $(this),
        		newSliderGroup = $this.data('slide-group');

            $this.on('click', function (e) {
                e.preventDefault();

                if (sliderGroup !== newSliderGroup && !isToggling) {
                    sliderGroup = newSliderGroup;
                    isToggling = true;

                    slideGroupButtons.removeClass('active');
                    $this.addClass('active');

                    $('.home-slider-container').css('height', homeSliderContainer.find('.owl-item').first().height());

                    homeSliderContainer.fadeOut(500, function () {
                        homeSlider.data('owlCarousel').reinit(makeHomeSliderConfig(sliderGroup, sliderSize));
                        syncSlider.data('owlCarousel').reinit(makeSyncSliderConfig(sliderGroup));
                        isToggling = false;
                    });
                }
            });
        });


        /**
         * Pausing the slider on browser tab change
         */
        var hidden, visibilityChange;
        if (typeof document.hidden !== "undefined") {
            hidden = "hidden";
            visibilityChange = "visibilitychange";
        } else if (typeof document.mozHidden !== "undefined") {
            hidden = "mozHidden";
            visibilityChange = "mozvisibilitychange";
        } else if (typeof document.msHidden !== "undefined") {
            hidden = "msHidden";
            visibilityChange = "msvisibilitychange";
        } else if (typeof document.webkitHidden !== "undefined") {
            hidden = "webkitHidden";
            visibilityChange = "webkitvisibilitychange";
        }

        $(document).on(visibilityChange, function () {
            if (document.hidden) {
                homeSlider.data('owlCarousel').stop();
            } else if (!document.hidden) {
                homeSlider.data('owlCarousel').play();
            }
        });

    }

})();
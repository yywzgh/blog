jQuery(document).ready(function ($) {


    $(".menu_xs").click(function(e){
        e.preventDefault();
        $("header .navigate").slideToggle();
    });
    

    if($(window).width() <= 768){
        $(".sub-menu").hide();            
        $("header .menu-item-has-children > a").click(function(e){
            e.preventDefault();
            $(this).parent().find(">.sub-menu").slideToggle();
        });
    }


    /*$(document).on('click','.menu_xs',function(e){
        jQuery('.navigate').fadeToggle(300);
    });

    $('.menu_xs').click(function() {
        jQuery('.navigate').toggleClass('active');    
    });

    $('.navigate').click(function() {
        $(this).css({'display':'none'});
        menuVisible = false;
    });*/

    

   if (fmr_obj.total != 0) {

        var total = fmr_obj.total;
        var ajax = true;
        var count = 2;
        $(window).scroll(function () {

            var scrollTop = jQuery(window).scrollTop();
            var ajaxheight = jQuery(".happy_items").height() - jQuery(window).height();

            if ((scrollTop + 700) > ajaxheight && ajax) {
                jQuery(this).addClass('active2');
                if (ajax) {
                    if (count > total + count) {
                        return false;
                    } else {
                        if ($("div").is(".no_posts_1")) return;
                        loadArticle(count);
                        count++;

                    }
                    ajax = false;
                }
                return false;
            }
        });
        function loadArticle(pageNumber) {

            var ofset = $(".hh-item").length;


            var is_sticky = "";
            $('.more_btn2').attr('disabled', true);
            $.ajax({
                url: fmr_ajaxurl,
                type: 'POST',
                data: "action=fmr_infinite_scroll&page_no=" + pageNumber + "&ofset=" + ofset +
                "&cat=" + fmr_obj.cat + "&is_sticky=" + is_sticky +
                "&year=" + fmr_obj.year + "&monthnum=" +fmr_obj.monthnum +
                "&day="+ fmr_obj.day + "&s="+fmr_obj.s,
                success: function (html) {
                    if(fmr_obj.get_set == 's2'){
                        var $moreBlocks = jQuery(html).filter('div.hh-item');
                        $(".happy_items").append($moreBlocks); // This will be the div where our content will be loaded
                        $(".happy_items").masonry('appended', $moreBlocks);
                    } else {
                        $(".happy_items").append(html);
                    }


                    ajax = true;
                }
            });
            return false;
        }
    }
});

/*
 * requestAnimationFrame pollyfill
 */
if (!window.requestAnimationFrame) {
    window.requestAnimationFrame = (window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || function (callback) {
        return window.setTimeout(callback, 1000 / 60);
    });
}


/*!
 * Mantis.js / jQuery / Zepto.js plugin for Constellation
 * @version 1.2.2
 * @author Acauã Montiel <contato@acauamontiel.com.br>
 * @license http://acaua.mit-license.org/
 */
(function (jQuery, window) {
    /**
     * Makes a nice constellation on canvas
     * @constructor Constellation
     */
    function Constellation(canvas, options) {
        var jQuerycanvas = jQuery(canvas),
            context = canvas.getContext('2d'),
            defaults = {
                star: {
                    color: 'rgba(255, 255, 255, .5)',
                    width: 1
                },
                line: {
                    color: 'rgba(255, 255, 255, .5)',
                    width: 0.2
                },
                position: {
                    x: 0, // This value will be overwritten at startup
                    y: 0 // This value will be overwritten at startup
                },
                width: window.innerWidth,
                height: window.innerHeight,
                velocity: 0.1,
                length: 100,
                distance: 120,
                radius: 150,
                stars: []
            },
            config = jQuery.extend(true, {}, defaults, options);

        function Star() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;

            this.vx = (config.velocity - (Math.random() * 0.5));
            this.vy = (config.velocity - (Math.random() * 0.5));

            this.radius = Math.random() * config.star.width;
        }

        Star.prototype = {
            create: function () {
                context.beginPath();
                context.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
                context.fill();
            },

            animate: function () {
                var i;
                for (i = 0; i < config.length; i++) {

                    var star = config.stars[i];

                    if (star.y < 0 || star.y > canvas.height) {
                        star.vx = star.vx;
                        star.vy = -star.vy;
                    } else if (star.x < 0 || star.x > canvas.width) {
                        star.vx = -star.vx;
                        star.vy = star.vy;
                    }

                    star.x += star.vx;
                    star.y += star.vy;
                }
            },

            line: function () {
                var length = config.length,
                    iStar,
                    jStar,
                    i,
                    j;

                for (i = 0; i < length; i++) {
                    for (j = 0; j < length; j++) {
                        iStar = config.stars[i];
                        jStar = config.stars[j];

                        if (
                            (iStar.x - jStar.x) < config.distance &&
                            (iStar.y - jStar.y) < config.distance &&
                            (iStar.x - jStar.x) > -config.distance &&
                            (iStar.y - jStar.y) > -config.distance
                        ) {
                            if (
                                (iStar.x - config.position.x) < config.radius &&
                                (iStar.y - config.position.y) < config.radius &&
                                (iStar.x - config.position.x) > -config.radius &&
                                (iStar.y - config.position.y) > -config.radius
                            ) {
                                context.beginPath();
                                context.moveTo(iStar.x, iStar.y);
                                context.lineTo(jStar.x, jStar.y);
                                context.stroke();
                                context.closePath();
                            }
                        }
                    }
                }
            }
        };

        this.createStars = function () {
            var length = config.length,
                star,
                i;

            context.clearRect(0, 0, canvas.width, canvas.height);

            for (i = 0; i < length; i++) {
                config.stars.push(new Star());
                star = config.stars[i];

                star.create();
            }

            star.line();
            star.animate();
        };

        this.setCanvas = function () {
            canvas.width = config.width;
            canvas.height = config.height;
        };

        this.setContext = function () {
            context.fillStyle = config.star.color;
            context.strokeStyle = config.line.color;
            context.lineWidth = config.line.width;
        };

        this.setInitialPosition = function () {
            if (!options || !options.hasOwnProperty('position')) {
                config.position = {
                    x: canvas.width * 0.5,
                    y: canvas.height * 0.5
                };
            }
        };

        this.loop = function (callback) {
            callback();

            window.requestAnimationFrame(function () {
                this.loop(callback);

            }.bind(this));
        };

        this.bind = function () {
            jQuerycanvas.on('mousemove', function (e) {
                config.position.x = e.pageX - jQuerycanvas.offset().left;
                config.position.y = e.pageY - jQuerycanvas.offset().top;
            });
        };

        this.init = function () {
            this.setCanvas();
            this.setContext();
            this.setInitialPosition();
            this.loop(this.createStars);
            this.bind();
        };
    }

    jQuery.fn.constellation = function (options) {
        return this.each(function () {
            var c = new Constellation(this, options);
            c.init();
        });
    };
})(jQuery, window);

// Init plugin

/********************************End canaves **********************/


jQuery(document).ready(function ($) {
    jQuery('canvas').constellation({
        star: {
            width: 3
        },
        line: {
            color: ' rgba(255, 255, 255,0.5)',
            width: 0.3
        },
        radius: 300
    });

    jQuery('#canvas').click(function () {
        $(this).hide();
    });

    jQuery('#scrol_down_bnt').click(function () {
        $('html, body').animate({
            scrollTop: $(".middle_content").offset().top
        }, 2000);
    });
    jQuery('.parallax-window').parallax({imageSrc: jQuery('.parallax-window').attr('data-image')}).removeAttr("style");
    jQuery('.parallax-window').fadeIn(1000);

});


jQuery(document).ready(function ($) {
    //input focus
    $('.tokenfield').focusout(function () {
        alert('1');
    });
    //click search button
    $('.search-click').click(function () {
        $('.search_input_in, .search_input_button').show();
        $(this).hide();
    });

    //fmr_Send_review send
    $('#F_reviews .send-message').click(function (e) {
        e.preventDefault();
        fmr_Send_review();
    });
    //tag-list
    /*$('.tags_list li a').click(function(e){
     e.preventDefault();
     $(this).addClass('active');
     $(this).parent().siblings().find('a').removeClass('active');
     })*/
    $('.chat_send .send-message').click(function () {
        snd();
    });

    //submit title focus
    $('#edited_labelatitle').focus();

    //close iframe

    $('#fmr_chatframe').load(function () {

        var iframe = $('#fmr_chatframe').contents();

        iframe.find(".chat_ava_exit a").click(function () {
            $('#fmr_chatframe').prop("src", "");
            $('#fmr_chatframe').hide();
        });
    });
    $('.img_chat_item').click(function () {
        $('#fmr_chatframe').show();
    });
    var wH = $(window).height();
    $('.chat_messages').height(wH - 195 + 'px');
    $('.cart_items_container').height(wH - 100 + 'px');

    //tags input


    //mega effect


    //best apps slider


    //index-front columns
    $('.index-front-column-pop ul').each(function () {
        var front_col_width = $(this).width();
        $(this).css({
            'margin-left': ((front_col_width / 2) * (-1)) + 'px'
        })
    });

    //wrap mega-menu
    var offset_left = $('.map_header').offset().left;
    $('.mega-menu-megamenu .mega-sub-menu').css({
        'padding-left': offset_left + 'px',
        'padding-right': offset_left + 'px',
    })

    //range

    jQuery(function () {
        jQuery('.hh-item_masonry').parent('.happy_items').masonry({
            itemSelector: '.hh-item',
            columnWidth: 0
        });

    });
    $('body').on("mouseenter", '.pg', function (e) {
        $(this).children('.grid_h1').addClass('grid-opacity');
        $(this).children('.pg .happy_like').addClass('grid-opacity');
    });
    $('body').on("mouseleave", '.pg', function (e) {
        $(this).children('.grid_h1').removeClass('grid-opacity');
        $(this).children('.pg .happy_like').removeClass('grid-opacity');
    });

    $('body').on("click", '.item_container', function (e) {
        document.location.href =  $(this).data('url');
    });
    // add arrow in menu-children item
    $('.head_nav > .menu-item-has-children').children('a').append('<i class="fa fa-caret-down"></i>');
    $('.sub-menu .menu-item-has-children').children('a').append('<i class="fa fa-caret-down"></i>');
    //auth fade
    $('.reg_image_container').addClass("reg_opacity_in");
    //btn-hack in auth effect
    var btn;
    if (document.querySelector('.btn-hack')) {
        btn = document.querySelector('.btn-hack');
        var btnFront;
        btnFront = btn.querySelector('#auth_menu'); // !== null;
        if (btnFront) {
            var btnYes = btn.querySelector('.btn-back .yes'),
                btnNo = btn.querySelector('.btn-back .no');
            jQuery('#reg_close').on('click', function (event) {
                // event.preventDefault();
                // $(this).parents(".is-open").removeClass("is-open");
            });
            jQuery('#auth_menu').on('click', function (event) {
                event.preventDefault();
                var mx = event.clientX - btn.offsetLeft,
                    my = event.clientY - btn.offsetTop;
                event.preventDefault();
                var w = btn.offsetWidth,
                    h = btn.offsetHeight;
                var directions = [{
                    id: 'top',
                    x: w / 2,
                    y: 0
                }, {
                    id: 'right',
                    x: w,
                    y: h / 2
                }, {
                    id: 'bottom',
                    x: w / 2,
                    y: h
                }, {
                    id: 'left',
                    x: 0,
                    y: h / 2
                }
                ];
                directions.sort(function (a, b) {
                    return distance(mx, my, a.x, a.y) - distance(mx, my, b.x, b.y);
                });
                btn.setAttribute('data-direction', directions.shift().id);
                btn.classList.add('is-open');
                return false;
            });
            btnYes.addEventListener('click', function (event) {
                btn.classList.remove('is-open');
                return false;
            });
            btnNo.addEventListener('click', function (event) {
                btn.classList.remove('is-open');
                return false;
            });
        }
    }
    function distance(x1, y1, x2, y2) {
        var dx = x1 - x2;
        var dy = y1 - y2;
        return Math.sqrt(dx * dx + dy * dy);
    }

    // Custom Navigation Events
    $(".user_photo .next").click(function () {
        owl.trigger('owl.next');
    })
    $(".user_question .next").click(function () {
        owl6.trigger('owl.next');
    })
    $('#owl-demo6 .owl-wrapper-outer').append('<div class="photos_gradient"></div>');
    //Navigation sub-menu open
   /* $('.head_nav .menu-item-has-children').hover(
        function () {
            $(this).children('.sub-menu').fadeIn(300);
        },
        function () {
            $(this).children('.sub-menu').fadeOut(300);
        }
    );*/
});


function openUserPrivate(url) {
    window.open(url, 'private3', 'toolbar=0,scrollbars=1,width=1200,height=' + jQuery(window).height() - 100);
};

$( document ).ready( function() {

    /**
     * Set image dimensions in IE11 otherwise it leaves
     * huge gaps after.
     */

    var $outer = $('.s-image_hotspot-outer');
    var $inner = $('.s-image_hotspot-inner');

    // Получаем ширину внешнего и внутреннего контейнеров
    var outerWidth = $outer.outerWidth();
    var innerWidth = $inner.outerWidth();

    // Вычисляем значение scrollLeft для центрирования внутреннего контейнера
    var scrollLeftValue = ((innerWidth - outerWidth) / 2) + 20;
    var scrollTopValue = ((innerHeight - outerHeight) / 2) + 120;

    $outer.scrollTop(scrollTopValue);
    $outer.scrollLeft(scrollLeftValue);

    function get_header_height() {

        var height = ( $( 'body' ).hasClass( 'home' ) ) ? 117.56 : parseInt( $( '.site-header' ).outerHeight() );
        if ( $( window ).width() <= 1099 && $( 'body' ).hasClass( 'home' ) ) {
            height = 70;
        }

        if ( $( '#wpadminbar' ).length ) {
            height += $( '#wpadminbar' ).height();
        }

        return height;

    }

    var $d       = $( document );
    var win_h    = $( window ).height();
    var header_h = get_header_height();
    // console.log('header_h',header_h)

    /**
     * Load more.
     */
    var can_load = true;

    $d.on( 'click', '.js-pdg-load-more', function() {

        var $btn = $( this );

        var id    = this.dataset.lmId;
        var lm    = pdg_load_more[id];
        var $wrap = $( '[data-lm-wrap="' + id + '"]' );
        var data = {
            action: 'pdg_load_more',
            args: lm.args,
            page: lm.page,
            max : lm.max,
            tpl : lm.tpl
        };

        if ( 'lang' in lm ) {
            data.lang = lm.lang;
        }

        if ( 'tpl_args' in lm ) {
            data.tpl_args = lm.tpl_args;
        }

        if ( ! can_load ) {
            return;
        }

        $.ajax( {
            type: 'post',
            url : pdg.ajaxUrl,
            data: data,

            beforeSend: function() {
                can_load = false;

                $btn.addClass( 'loading' );
            },
            complete: function() {
                can_load = true;

                $btn.removeClass( 'loading' );
            },
            success: function( res ) {

                if ( res ) {
                    $wrap.append( res );
                    lm.page++;
                    set_section_offsets()

                    if ( lm.page == lm.max ) {
                        $btn.remove();
                    }
                }

            }
        } )
    } );


    /**
     * Cookies.
     */
    // if ( $( '.cc-window' ).length ) {
    //     $( '.cc-window' ).addClass( 'cc-window--is-active' );
    // }


    /**
     * Section scrolling and active sections
     * based on scrolled position.
     */
    var $menu_items = $( 'body.home .nav-main > ul > li > a' );
   
    // if ( $( '.c-sub-sub-menu' ).length ) {
    //     $menu_items = $( '.c-sub-sub-menu a' );
    // }

    var scroll_items = $menu_items.map( function() {
        var url_arr = $( this ).attr( 'href' ).split( '/' );
        var $item   = $( url_arr[url_arr.length - 1] );

        if ( $item.length ) {
            return $item;
        }
    } );


    var f_update_header_height = true;
    var is_scrolling;

    function active_on_scroll() {
        if ( disable_active_on_scroll ) {
            return;
        }

        // Update header height first time this function is run.
        if ( f_update_header_height ) {
            header_h = get_header_height();
            f_update_header_height = false;
        }

        var from_top = $d.scrollTop() + header_h;

        var cur = scroll_items.map( function() {
            if ( parseInt( $( this ).attr( 'data-offset' ) ) <= from_top ) {
                return this;
            }
        } );


        cur = cur[cur.length - 1];

        var id      = cur && cur.length ? cur[0].id : '';
        var push_id = '#' + id;


        $menu_items.parent().removeClass( 'active' );

        if ( id ) {
            $menu_items.parent().end().filter( '[href*="/#' + id + '"]' ).parent().addClass( 'active' );
            if ( $d.scrollTop() + win_h == $( document ).height() ) {
                $menu_items.parent().removeClass( 'active' ).last().addClass( 'active' );
            }
        } else {
            push_id = ' ';
        }

        // Clear our timeout throughout the scroll
        window.clearTimeout( is_scrolling );

        // Set a timeout to run after scrolling ends
        is_scrolling = setTimeout( function() {
            if ( history.replaceState ) {
                history.replaceState( null, null, push_id );
            } else {
                window.location.hash = id;
            }
        }, 250 );

    }

    $d.on( 'scroll.active-on-scroll', active_on_scroll );

    $( 'body.home .nav-main > ul > li > a, body.home .nav-main > ul > li > ul > li > a[href*="#"], .c-sub-sub-menu a, .nav-main .sub-menu .sub-menu a' ).click( function( e ) {
        e.preventDefault();
        
        var url_arr = $( this ).attr( 'href' ).split( '/' );
        var id      = url_arr[url_arr.length - 1];
        
        $d.off( 'scroll.active-on-scroll' );
        
        $menu_items.parent().removeClass( 'active' );
        $( this ).parent().addClass( 'active' );

        $( 'html, body' ).stop().animate( {
            'scrollTop': parseInt( $( id ).attr( 'data-offset' ) ) - header_h + 20
        }, 500, function() {
            active_on_scroll();
            $d.on( 'scroll.active-on-scroll', active_on_scroll );

            $( 'body' ).removeClass( 'nav-open' );
        } );

    } );

    /**
     * Service popup.
     */

    $d.on( 'click', '.js-service-open', function() {

        var $block = $( this );
        var w_w    = $( window ).width();

        var data = {
            id:     $block.attr( 'data-service-id' )  ,
            action: 'pdgc_load_service'
        };

        $.ajax( {
            type: 'POST',
            url:  pdg.ajaxUrl,
            data: data,
            beforeSend: function() {
                $block.addClass( 'loading' );
            },
            success: function( resp ) {
                $block.removeClass( 'loading' );

                $.fancybox.open( resp, {
                    touch: false,
                    smallBtn: false,
                    btnTpl: {
                        close:
                        '<button data-fancybox-close class="fancybox-button--close">' +
                        '<span class="abs-c ic ic--close"></span>' + 
                        '</button>'
                    },
                    afterShow: function() {
                        $( '.c-service-nav' ).flexslider( {
                            animation: 'slide',
                            controlNav: false,
                            // directionNav: false,
                            prevText: '<span class="ic ic--arrow-2 abs-c"></span>',
                            nextText: '<span class="ic ic--arrow-2 abs-c"></span>',
                            animationLoop: false,
                            slideshow: false,
                            itemWidth: ( w_w >= 768 ) ? 124 : 73,
                            itemMargin: ( w_w >= 768 ) ? 16 : 8,
                            touch: false,
                            asNavFor: '.c-service-slider',
                            start: function(slider) {
                                slider.closest( '.c-service-slider-wrap' ).addClass( 'init' );
                    
                                if ( slider.pagingCount === 1 ) slider.addClass( 'flex-centered' );
                            }
                        } );
                    
                        $( '.c-service-slider' ).flexslider( {
                            animation: 'slide',
                            controlNav: false,
                            directionNav: false,
                            animationLoop: false,
                            slideshow: false,
                            touch: false,
                            sync: '.c-service-nav'
                        });
                    }
                } );
            }
        } )

    } );

    $d.on( 'click', '.js-reference-open', function() {

        var $block = $( this );
        var w_w    = $( window ).width();

        var data = {
            id:     $block.attr( 'data-reference-id' )  ,
            action: 'pdgc_load_reference'
        };

        $.ajax( {
            type: 'POST',
            url:  pdg.ajaxUrl,
            data: data,
            beforeSend: function() {
                $block.addClass( 'loading' );
            },
            success: function( resp ) {
                $block.removeClass( 'loading' );

                $.fancybox.open( resp, {
                    touch: false,
                    smallBtn: false,
                    btnTpl: {
                        close:
                        '<button data-fancybox-close class="fancybox-button--close">' +
                        '<span class="abs-c ic ic--close"></span>' + 
                        '</button>'
                    },
                    afterShow: function() {
                        $( '.c-reference-nav' ).flexslider( {
                            animation: 'slide',
                            controlNav: false,
                            // directionNav: false,
                            prevText: '<span class="ic ic--arrow-2 abs-c"></span>',
                            nextText: '<span class="ic ic--arrow-2 abs-c"></span>',
                            animationLoop: false,
                            slideshow: false,
                            itemWidth: ( w_w >= 768 ) ? 124 : 73,
                            itemMargin: ( w_w >= 768 ) ? 16 : 8,
                            touch: false,
                            asNavFor: '.c-reference-slider',
                            start: function(slider) {
                                slider.closest( '.c-reference-slider-wrap' ).addClass( 'init' );
                    
                                if ( slider.pagingCount === 1 ) slider.addClass( 'flex-centered' );
                            }
                        } );
                    
                        $( '.c-reference-slider' ).flexslider( {
                            animation: 'slide',
                            controlNav: false,
                            directionNav: false,
                            animationLoop: false,
                            slideshow: false,
                            touch: false,
                            sync: '.c-reference-nav'
                        });
                    }
                    
                } );
                setTimeout(() => {
                    $('.fancybox-slide').scrollTop(0);
                }, 500);

            }
        } )

    } );


    /**
     * Same height elements.
     */
    //  function same_height() {
    //     $( '[data-same-height]' ).each( function( i, el ) {
    //         var $block = $( el );
    //         var classes = $block.attr( 'data-same-height' ).split( ',' );
    //         var highest = {};
    
    //         for ( var i = 0, n = classes.length; i < n; i++ ) {
    //             var elClass = classes[ i ];
    
    //             highest[ elClass ] = 0;
    
    //             $block.find( '.' + elClass ).each( function( i, el ) {
    //                 $( el ).height( 'auto' );
    
    //                 var height = $( el ).height();
    
    //                 highest[ elClass ] = ( height > highest[ elClass ] ) ? height : highest[ elClass ];
    //             } );
    //         }
    
    //         $.each( highest, function( key, value ) {
    //             $block.find( '.' + key ).height( value );
    //         } );
    
    //     } );
    // }

    // same_height();
    
    // $( window ).on( 'resize', same_height );

    // $( document ).ajaxComplete( function( event, xhr, settings ) {
    //   same_height();
    // } );





    /**
     * Section padding.
     */
    function set_section_padding() {

        $( '.c-section' ).each( function( i, section ) {
            if ( $( section ).next().hasClass( 'c-section' ) ) {
                $( section ).addClass( 'c-section--pb-0' );
            }
        } );

        set_section_offsets();

    }

    set_section_padding();


    /**
     * Sub menu on handheld devices.
     */
    if ( $( window ).width() <= 1099 ) {
        $d.on( 'click', '.menu-item__indicator', function() {
            $( this ).parent().toggleClass( 'sub-menu-open' );
        } );
    }



    /**
     * Review slider.
     */
    // function activate_reviews_slider_nav( slider ) {
    //     if ( $( '.flex-prev', slider ).hasClass( 'flex-disabled' ) ) {
    //         $( '.reviews-slider__direction--prev', slider ).addClass( 'is-disabled' );
    //     } else {
    //         $( '.reviews-slider__direction--prev', slider ).removeClass( 'is-disabled' );
    //     }

    //     if ( $( '.flex-next', slider ).hasClass( 'flex-disabled' ) ) {
    //         $( '.reviews-slider__direction--next', slider ).addClass( 'is-disabled' );
    //     } else {
    //         $( '.reviews-slider__direction--next', slider ).removeClass( 'is-disabled' );
    //     }
    // }

    // $( '.reviews-slider' ).flexslider( {
    //     slideshow: false,
    //     animation: 'slide',
    //     animationLoop: false,
    //     itemWidth: ( $( window ).width() <= 768 ) ? 360 : 408,
    //     itemMargin: 24,
        
    //     start: function( slider ) {
    //         $( '<button class="reviews-slider__direction reviews-slider__direction--prev js-review-slider-prev"><span class="ic ic-caret-down"></span></button>' ).insertBefore( $( slider.controlNav[0] ).parent() );
    //         $( '<button class="reviews-slider__direction reviews-slider__direction--next js-review-slider-next"><span class="ic ic-caret-down"></span></button>' ).insertAfter( $( slider.controlNav[slider.controlNav.length - 1] ).parent() );

    //         activate_reviews_slider_nav( slider[0] );
    //     },

    //     after: function( slider ) {
    //         activate_reviews_slider_nav( slider[0] );
    //     }
    // } );

    $( document ).on( 'click', '.js-review-slider-prev', function() {
        $( this ).closest( '.c-reviews' ).find( '.flex-prev' ).click();
    } );

    $( document ).on( 'click', '.js-review-slider-next', function() {
        $( this ).closest( '.c-reviews' ).find( '.flex-next' ).click();
    } );

    /**
 * Load Recaptcha when needed.
 */
var captchaLoaded = false;

// Load reCAPTCHA script when CF7 form field is focused
$( '.wpcf7-form input' ).on( 'focus', function() {
    // If we have loaded script once already, exit.
    if ( captchaLoaded ) {
        return;
    }

    // Variable Intialization
    console.log( 'reCAPTCHA script loading.' );

    var head = document.getElementsByTagName( 'head' )[0];
    var recaptchaScript = document.createElement( 'script' );
    var cf7script = document.createElement( 'script' );

    // Add the recaptcha site key here.
    var recaptchaKey = '6Ld3G_QpAAAAAOd7Hf_tI9_dTQEKhHAFjsQu_83T';

    // Dynamically add Recaptcha Script
    recaptchaScript.type = 'text/javascript';
    recaptchaScript.src = 'https://www.google.com/recaptcha/api.js?render=' + recaptchaKey + '&#038;ver=3.0';

    // Dynamically add CF7 script 
    cf7script.type = 'text/javascript';
    cf7script.text = "!function(t,e){var n={execute:function(e){t.execute(\"" + recaptchaKey +"\",{action:e}).then(function(e){for(var t=document.getElementsByTagName(\"form\"),n=0;n<t.length;n++)for(var c=t[n].getElementsByTagName(\"input\"),a=0;a<c.length;a++){var o=c[a];if(\"_wpcf7_recaptcha_response\"===o.getAttribute(\"name\")){o.setAttribute(\"value\",e);break}}})},executeOnHomepage:function(){n.execute(e.homepage)},executeOnContactform:function(){n.execute(e.contactform)}};t.ready(n.executeOnHomepage),document.addEventListener(\"change\",n.executeOnContactform,!1),document.addEventListener(\"wpcf7submit\",n.executeOnHomepage,!1)}(grecaptcha,{homepage:\"homepage\",contactform:\"contactform\"});";

    // Add Recaptcha Script
    head.appendChild( recaptchaScript );
    // Add CF7 Script AFTER Recaptcha. Timeout ensures the loading sequence.
    setTimeout(function() {
        head.appendChild( cf7script );
    }, 1000 );
    //Set flag to only load once
    captchaLoaded = true;
} );

} );
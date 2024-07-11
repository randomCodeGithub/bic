class PDGC
{

    constructor() {

        this.cacheSelectors();
        this.listeners();
        this.setScrolledClass();
        this.activeOnScroll();
        this.blocskAnimation();
        this.stretchBlocks();

    }

    /**
     * Cache frequently used selectors.
     */
    cacheSelectors() {

        this.$window = $( window );
        this.$body   = $( 'body' );

    }

    /**
     * Add event listerners.
     */
    listeners() {

        this.$window.on( 'scroll', () => this.setScrolledClass() );

        $( '.js-burger' ).on( 'click', () => this.toggleHandheldMenu() );

        $( window ).on( 'resize', this.stretchBlocks );

    }

    /**
     * Toggle "is-scrolled" class on body element.
     */
    setScrolledClass() {

        this.$body.toggleClass( 'is-scrolled', this.$window.scrollTop() > 24 );

    }

    /**
     * Toggle "nav-open" class on body element.
     */
    toggleHandheldMenu() {

        this.$body.toggleClass( 'nav-open' );

    }

    activeOnScroll() {
        window.disable_active_on_scroll = false;
        window.set_section_offsets = function() {
            $( 'body' ).addClass( 'disable-animations' );
            setTimeout( function() {
                $( '.home .site-content .blocks-content > *, .has-sub-sub-menu .site-content .editor > *' ).each( function( i, block ) {
                    
                    $( block ).attr( 'data-offset', $( block ).offset().top );
                } );
        
                $( 'body' ).removeClass( 'disable-animations' );
            }, 500 );
        }

        set_section_offsets();

        if ( window.location.hash && $( '[href*="/' + window.location.hash + '"]' ).length ) {
            disable_active_on_scroll = true;
    
            set_section_offsets();
    
            setTimeout( function() {
                $( 'html, body' ).stop().animate( {
                    'scrollTop': parseInt( $( window.location.hash ).attr( 'data-offset' ) ) - ($( window ).width() <= 1099 ? 70 :105)
                }, 500, function() {
                    disable_active_on_scroll = false;
                } );
            }, 600 ); // Run after set_section_offsets()
        }

    }

    blocskAnimation() {
        AOS.init( {
            disable: 'mobile'
        } );
    }

    stretchBlocks() {
        var $block = $(".js-stretch");
            var width  = $( '.site-content' ).width();
            if (!$block.length) {
              return;
            }
            $block.css("margin-left", "");
            var offset = parseInt($block.offset().left) - 100;
            $block.css({'width': width + 'px',"margin-left": "-" + offset + "px" });
    }

}

$( document ).ready( () => new PDGC() );
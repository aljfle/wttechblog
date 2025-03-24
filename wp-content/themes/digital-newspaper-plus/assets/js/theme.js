/**
 * Handles theme general events
 * 
 * @package Digital Newspaper Pro
 * @since 1.0.0
 */
jQuery(document).ready(function($) {
    "use strict"

    // main banner popular posts slider events
    var bc = $( "#main-banner-section" );
    var bpc = bc.find( ".popular-posts-wrap" );
    if( bpc.length ) {
        var bpcVertical = bpc.data( "vertical" );
        if( bpc.hasClass( 'slick-initialized' ) ) bpc.slick( 'unslick' )
        if( bpcVertical) {
            bpc.slick({
                vertical: bpcVertical,
                slidesToShow: 4,
                dots: false,
                infinite: true,
                arrows: true,
                autoplay: true,
                nextArrow: `<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>`,
                prevArrow: `<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>`,
            })
        } else {
            bpc.slick({
                dots: false,
                infinite: true,
                arrows: true,
                rtl: nrtl,
                draggable: true,
                autoplay: true,
                nextArrow: `<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>`,
                prevArrow: `<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>`,
            })
        }  
    }
})
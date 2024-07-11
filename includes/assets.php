<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * This file contains code related to
 * various asset inclusions, both frontend and admin.
 * 
 * @package pandago3-child
 */

add_action( 'wp_enqueue_scripts', function() {

    $assets = PDGC_ASSETS;
    $theme  = $assets . '/vendor/theme';
    // $parent_theme  = PDG_URL . '/assets/vendor/pandago';

    // Bootstrap grid.
    // Use the version that best suits your needs.
    wp_enqueue_style( 'pdgc-bootstrap', "{$theme}/bootstrap-grid-bare.css", [], PDGC_VER );
    // wp_enqueue_style( 'pdgc-bootstrap', "{$theme}/bootstrap-grid-full.css", [], PDGC_VER );


    // Main theme assets.
    wp_enqueue_style( 'pdgc-main', "{$assets}/css/main.css", [], PDGC_VER );
    wp_enqueue_script( 'pdgc-main', "{$assets}/main.js", ['jquery'], PDGC_VER, true );


    // Error 404.
    if ( is_404() ) {
        wp_enqueue_style( 'pdgc-404', "{$theme}/404.css", [], PDGC_VER );
    }

    // Posts page
    if (is_home()) {
        wp_enqueue_style( 'pdgc-posts-page', "{$assets}/vendor/theme/posts-page.css" );
        wp_enqueue_script( 'pdgc-posts-page', "{$assets}/vendor/theme/posts-page.js", [], false, true );
    }

    if (is_singular('post')) {
        wp_enqueue_style( 'pdgc-single', "{$assets}/vendor/theme/single.css" );
        wp_enqueue_script( 'pdgc-single', "{$assets}/vendor/theme/single.js", [], false, true );
    }

    // Late loaded assets.
    // wp_enqueue_script( 'pdg-late', "{$parent_theme}/late.js", [], PDGC_VER, true );
    wp_enqueue_style( 'pdgc-late', "{$theme}/late.css", [], PDGC_VER );
    wp_enqueue_script( 'pdgc-late', "{$theme}/late.js", [], PDGC_VER, true );
    wp_enqueue_script('google-recaptcha');
    // wp_enqueue_script('wpcf7-recaptcha');

}, 20 );
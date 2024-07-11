<?php if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'get_field' ) ) {
    return;
}

/**
 * Theme defines.
 */
define( 'PDGC_VER',    wp_get_theme()->get( 'Version' ) );
define( 'PDGC_PATH',   get_stylesheet_directory() );
define( 'PDGC_INC',    PDGC_PATH . '/includes' );
define( 'PDGC_URL',    get_stylesheet_directory_uri() );
define( 'PDGC_ASSETS', PDGC_URL . '/assets' );

/**
 * AJAX functions.
 */
include PDGC_INC . '/ajax.php';

/**
 * Include themes static assets.
 */
include PDGC_INC . '/assets.php';

/**
 * ACF blocks.
 */
include PDGC_INC . '/blocks.php';

/**
 * Actions and filters.
 */
include PDGC_INC . '/hooks.php';

/**
 * Gutenberg editor.
 */
include PDGC_INC . '/editor.php';

/**
 * Theme functions.
 */
include PDGC_INC . '/theme-functions.php';
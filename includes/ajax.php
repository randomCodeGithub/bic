<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * This file contains code for AJAX calls.
 * 
 * @package pandago3-child
 */

/**
 * Load more posts.
 */
function pdg_load_more(){
 
	$args                = json_decode( stripslashes( $_POST['args'] ), true );
	$args['paged']       = $_POST['page'] + 1;
	$args['post_status'] = 'publish';

    if ( ! file_exists( PDGC_PATH . '/' . $_POST['tpl'] . '.php' ) ) {
        return;
    }

    if ( defined( 'ICL_LANGUAGE_CODE' ) && isset( $_POST['lang'] ) ) {
        do_action( 'wpml_switch_language', htmlspecialchars( $_POST['lang'] ) );
    }

    $tpl_args = array();

    if ( isset( $_POST['tpl_args'] ) ) {
        $tpl_args = json_decode( stripslashes( $_POST['tpl_args'] ), true );

        if ( ! is_array( $tpl_args ) ) {
            return;
        }
    }

	query_posts( $args );

	if ( have_posts() ) {
        $tpl = htmlspecialchars( $_POST['tpl'] );

        while ( have_posts() ) {
            the_post();

            get_template_part( $tpl, null, $tpl_args );
        }
    }

	exit;

}
add_action( 'wp_ajax_pdg_load_more', 'pdg_load_more');
add_action( 'wp_ajax_nopriv_pdg_load_more', 'pdg_load_more');

/**
 * Load service.
 */
function pdgc_load_service_handler() {

    $id = intval( sanitize_key( $_POST['id'] ) );

    if ( ! $id ) {
        die;
    }

    global $post;

    $post = get_post( $id );

    setup_postdata( $post );

    get_template_part( 'partials/service' );

    die;

}
add_action( 'wp_ajax_pdgc_load_service', 'pdgc_load_service_handler' );
add_action( 'wp_ajax_nopriv_pdgc_load_service', 'pdgc_load_service_handler' );

/**
 * Load reference.
 */
function pdgc_load_reference_handler() {

    $id = intval( sanitize_key( $_POST['id'] ) );

    if ( ! $id ) {
        die;
    }

    global $post;

    $post = get_post( $id );

    setup_postdata( $post );

    get_template_part( 'partials/reference' );

    die;

}
add_action( 'wp_ajax_pdgc_load_reference', 'pdgc_load_reference_handler' );
add_action( 'wp_ajax_nopriv_pdgc_load_reference', 'pdgc_load_reference_handler' );
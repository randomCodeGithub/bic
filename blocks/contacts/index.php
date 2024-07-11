<?php if ( ! defined( 'ABSPATH' ) ) exit;

include_once PDGC_INC . '/class-blocks-extender.php';
include_once dirname( __FILE__ ) . '/controller.php';

new PDGC_Block_Contacts( $block, $post_id );
<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * This file contains PDGC_Block_Extender class.
 * More information below.
 * 
 * @package pandago3-child
 */

include_once get_template_directory() . '/includes/class-blocks.php';

/**
 * Extender class for PDGC block.
 * You can write custom methods here that will be shared
 * across all of your blocks.
 */
class PDGC_Block_Extender extends PDGC_Block
{

    public function __construct( $block, $post_id ) {

        parent::__construct( $block, $post_id );

    }

}
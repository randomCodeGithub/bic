<?php if ( ! defined( 'ABSPATH' ) ) exit;

class PDGC_Block_Contacts extends PDGC_Block_Extender
{

	public function __construct( $block, $post_id ) {

		parent::__construct( $block, $post_id );

		$this->set_args();
		$this->get_content();
		$this->render();

	}

	private function set_args() {

		$this->args = [
			'id'  => $this->block['id'],
			'content' => [
				'title'  => '',
				'map'  => '',
				'map_mobile'  => '',
				'address'  => get_field('contacts_address', 'option'),
				'google_maps_link'  => get_field('google_maps_link', 'option'),
				'waze_link'  => get_field('waze_link', 'option'),
			]
		];

	}

}
<?php if ( ! defined( 'ABSPATH' ) ) exit;

class PDGC_Block_Statistics extends PDGC_Block_Extender
{

	public function __construct( $block, $post_id ) {

		parent::__construct( $block, $post_id );

		$this->set_args();

		$this->get_content();
		$this->get_items();

		$this->render();

	}

	private function set_args() {

		$this->args = [
			'id'  => $this->block['id'],
			'content' => [
				'title'  => '',
				'text'  => '',
				'link'  => '',
				'map'  => '',
				'statistic'  => '',
				'image_hotspot'  => '',
			],
			'items' => []
		];

	}

}
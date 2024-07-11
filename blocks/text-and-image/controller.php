<?php if ( ! defined( 'ABSPATH' ) ) exit;

class PDGC_Block_Text_and_image extends PDGC_Block_Extender
{

	public function __construct( $block, $post_id ) {

		parent::__construct( $block, $post_id );

		$this->set_args();
		$this->get_content();
		$this->get_settings();
		$this->render();

	}

	private function set_args() {

		$this->args = [
			'id'  => $this->block['id'],
			'content' => [
				'title' => '',
				'hightlighted_text' => '',
				'text' => '',
				'image' => '',
			],
			'settings' => [
				'reversed' => ''
			]
		];

	}

}
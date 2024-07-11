<?php if ( ! defined( 'ABSPATH' ) ) exit;

class PDGC_Block_Contact_form extends PDGC_Block_Extender
{

	public function __construct( $block, $post_id ) {

		parent::__construct( $block, $post_id );

		$this->set_args();
		$this->get_content();
		$this->get_form();
		$this->render();

	}

	private function set_args() {

		$this->args = [
			'id'  => $this->block['id'],
			'content' => [
				'title' => '',
				'text' => '',
				'phone' => '',
			],
			'form' => '',
		];

	}

	private function get_form() {

		if ( $form = get_field( 'form' ) ) {
			$this->args['form'] = "[contact-form-7 id=\"{$form->ID}\"]";
		}

	}

}
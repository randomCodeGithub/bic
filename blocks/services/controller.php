<?php if ( ! defined( 'ABSPATH' ) ) exit;

class PDGC_Block_Services extends PDGC_Block_Extender
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
				'title' => ''
			],
			'items' => [],
		];

	}

	public function get_items($field = 'items')
	{
		$query = new WP_Query([
			'post_type' => 'service',
			'posts_per_page' => get_field('per_page') ?: -1,
			'order' => 'ASC',
		]);

		if ($query->have_posts()) {
			$this->args['items'] = $query->posts;
		}
	}

}
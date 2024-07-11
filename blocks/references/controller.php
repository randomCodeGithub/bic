<?php if ( ! defined( 'ABSPATH' ) ) exit;

class PDGC_Block_References extends PDGC_Block_Extender
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
			'query' => [],
		];

	}

	public function get_items($field = 'items')
	{
		$query = new WP_Query([
			'post_type' => 'reference',
			'posts_per_page' => get_field('per_page') ?: 3,
		]);

		if ($query->have_posts()) {
			$this->args['items'] = $query->posts;
			$this->args['query']['query_vars'] = $query->query_vars;
			$this->args['query']['max_num_pages'] = $query->max_num_pages;
		}
	}

}
<?php if ( ! defined( 'ABSPATH' ) ) exit;

class PDGC_Block_Posts extends PDGC_Block_Extender
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
				'title' => '',
				'link' => ''
			],
			'items' => [],
			'query' => [],
		];

	}

	public function get_items($field = 'items')
	{
		$args = [
			'posts_per_page' => get_field('per_page') ?: 3,
		];
		if (is_singular('post')) {
			$post_id = get_the_ID();
			$args['post__not_in'] = [$post_id];
			$terms = wp_get_post_terms($post_id, 'tag');
			$post_categories  = wp_list_pluck($terms, 'term_id');
			if ($post_categories) {
				$args['tax_query'] = [
					[
						'taxonomy' => 'tag',
						'terms'    => $post_categories,
					]
				];
			}
		}
		$query = new WP_Query($args);

		if ($query->have_posts()) {
			$this->args['items'] = $query->posts;
			$this->args['query']['query_vars'] = $query->query_vars;
			$this->args['query']['max_num_pages'] = $query->max_num_pages;
		}
	}

}
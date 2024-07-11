<?php if (!defined('ABSPATH')) exit;
/**
 * This file contains code for various WordPress hooks (actions or filters).
 * 
 * @package pandago3-child
 */

/**
 * Additional menus.
 */
add_action('init', function () {

    register_nav_menus([
        'footer' => 'Footer navigation',
    ]);
});

/**
 * Register widgets.
 */
function pdgc_widgets_init()
{

    register_sidebar(array(
        'name'          => 'Single Post',
        'id'            => 'single_post',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));

    register_sidebar([
        'name'          => 'Posts page',
        'id'            => 'posts_page',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'pdgc_widgets_init');

/**
 * Disable gutenberg for some post types
 */
function disable_gutenberg_for_custom_post_types($use_block_editor, $post_type)
{
    $disabled_post_types = ['reference', 'service'];

    if (in_array($post_type, $disabled_post_types, true)) {
        return false;
    }

    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_custom_post_types', 10, 2);

/**
 * Include pdg_load_more.
 */
add_action('wp_head', function () {
?>
    <script>
        var pdg_load_more = {}
    </script>
<?php
});

/**
 * Add custom attribute.
 */
add_filter('nav_menu_link_attributes', 'menu_item_custom_attribute', 10, 3);
function menu_item_custom_attribute($atts, $item, $args)
{
    // inspect $item
    $atts['data-title'] = $item->title;
    return $atts;
}
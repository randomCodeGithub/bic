<?php if (!defined('ABSPATH')) exit;
global $wp_query;
$block = $args['instance'];
$content  = $args['content'];
$items    = $args['items'];
$query    = $args['query'];
?>

<section class="b-posts c-section <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?> data-aos="fade-up" data-aos-delay="300">
    <?php
    if ($title  = $content['title']) {
        $block->the_block_title($content['title'], 'b-posts__title h2 tt-upp');
    }
    ?>
    <div class="row" data-lm-wrap="posts">
        <?php foreach ($items as $post) {
            setup_postdata($post);
            get_template_part($block->template, 'item');
        }
        ?>
    </div>
    <?php if($content['link']): ?>
        <div class="text-center">
            <a href="<?php echo $content['link'] ?>" class="btn" data-lm-id="posts"><?php _e('VIEW MORE', 'pdgc'); ?></a>
        </div>
    <?php endif ?>
    <script>
        pdg_load_more.posts = {
            args: '<?php echo json_encode($query['query_vars']); ?>',
            page: <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>,
            max: <?php echo $query['max_num_pages']; ?>,
            lang: '',
            tpl: '<?php echo $block->template ?>-item'
        };
    </script>
</section>
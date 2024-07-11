<?php if (!defined('ABSPATH')) exit;
$block = $args['instance'];
$content  = $args['content'];
$items    = $args['items'];
$query    = $args['query'];
?>

<section class="b-references c-section <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?> data-aos="fade-up" data-aos-delay="300">
    <?php
    if ($title  = $content['title']) {
        $block->the_block_title($content['title'], 'b-references__title h2 tt-upp');
    }
    ?>
    <div class="row" data-lm-wrap="references">
        <?php foreach ($items as $post) {
            setup_postdata($post);
            get_template_part($block->template, 'item');
        }
        ?>
    </div>
    <?php if($query['max_num_pages'] > 1): ?>
        <div class="text-center">
            <button class="btn js-pdg-load-more" data-lm-id="references"><?php _e('VIEW MORE', 'pdgc'); ?></button>
        </div>
    <?php endif ?>
    <script>
        pdg_load_more.references = {
            args: '<?php echo json_encode($query['query_vars']); ?>',
            page: <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>,
            max: <?php echo $query['max_num_pages']; ?>,
            lang: '',
            tpl: '<?php echo $block->template ?>-item'
        };
    </script>
</section>
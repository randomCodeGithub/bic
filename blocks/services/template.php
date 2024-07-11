<?php if (!defined('ABSPATH')) exit;
$block = $args['instance'];
$content  = $args['content'];
$items    = $args['items'];
?>

<section class="b-services c-section <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?> data-aos="fade-right" data-aos-delay="300">
    <div class="row">
        <div class="col-lg-3">
            <?php
            if ($title  = $content['title']) {
                $block->the_block_title($content['title'], 'b-services__title tt-upp h2');
            }
            ?>
        </div>
        <?php foreach ($items as $post) {
            setup_postdata($post);
            get_template_part($block->template, 'item');
        }
        ?>
    </div>
</section>
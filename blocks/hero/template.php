<?php if (!defined('ABSPATH')) exit;

$block = $args['instance'];
$content  = $args['content'];
$settings  = $args['settings'];
?>

<section class="b-hero full-width <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?> <?php if ($settings['background']) : ?> style="background-image: url(<?php echo PDG::get_image_src($settings['background'], [1366, 0]); ?>);" <?php endif ?>>
    <?php if ($settings['background']) : ?>
        <picture>
            <?php if ($settings['background_mobile']) : ?>
                <source media="(max-width: 1099.98px)" srcset="<?php echo PDG::get_image_src($settings['background_mobile'], 'full'); ?>" />
            <?php endif; ?>
            <source srcset="<?php echo PDG::get_image_src($settings['background'], 'full'); ?>" />
    
            <?php PDG::img($settings['background'], 'full', [
                'class' => ['hero__image']
            ]); ?>
        </picture>
    <?php endif ?>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-7 c-white">
                <?php
                if ($title  = $content['title']) {
                    $block->the_block_title($content['title'], 'b-hero__title h1');
                }
                ?>
                <?php if ($text  = $content['text']) : ?>
                    <p class="b-hero__text"><?php echo $text ?></p>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
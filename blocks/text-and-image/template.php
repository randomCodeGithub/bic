<?php if (!defined('ABSPATH')) exit;

$block = $args['instance'];
$content  = $args['content'];
$settings  = $args['settings'];
?>
<section class="b-text-and-image <?php if($settings['reversed']): ?>reversed<?php endif ?> <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?>>
    <div class="row align-items-center">
        <div class="col-lg-6 b-text-and-image__content-col <?php if($settings['reversed']): ?>order-last<?php endif ?>">
            <?php
            if ($title  = $content['title']) {
                $block->the_block_title($content['title'], 'b-text-and-image__title h3');
            }
            ?>
            <?php if ($hightlighted_text = $content['hightlighted_text']) : ?>
                <p class="b-text-and-image__hightlighted-text"><?php echo $hightlighted_text ?></p>
            <?php endif ?>
            <?php if ($text = $content['text']) : ?>
                <div class="b-text-and-image__text editor"><?php echo $text ?></div>
            <?php endif ?>
        </div>
        <?php if ($content['image']) : ?>
            <div class="col-lg-6 <?php if($settings['reversed']): ?>order-first<?php endif ?>">
                <?php PDG::img($content['image'], 'full', [
                    'class' => ['b-text-and-image__image']
                ]); ?>
            </div>
        <?php endif ?>
    </div>
</section>
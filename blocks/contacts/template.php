<?php if (!defined('ABSPATH')) exit;
$block = $args['instance'];
$content  = $args['content'];
?>

<section class="b-contacts c-section <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?> data-aos="fade-right" data-aos-delay="300">
    <?php if (!is_admin()) : ?>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <?php
                if ($title  = $content['title']) {
                    $block->the_block_title($content['title'], 'b-contacts__title h2');
                }
                ?>
                <?php if ($content['address']) : 
                    $address_link = $content['google_maps_link'] ?: "https://maps.google.com/?q={$content['address']}";    
                ?>
                    <div class="b-contacts__address">
                        <?php echo $content['address'] ?>
                    </div>
                    <div class="b-contacts__address-links">
                        <a class="tt-upp" target="_blank" href="<?php echo $address_link ?>">
                            <?php _e('View in map', 'pdgc') ?>
                        </a>
                        <?php if($content['waze_link']): ?>
                            <a class="tt-upp" target="_blank" href="<?php echo $content['waze_link'] ?>">
                                <?php _e('Waze', 'pdgc') ?>
                            </a>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
            <?php if ($content['map']) : ?>
                <div class="col-lg-6">
                    <picture>
                        <?php if ($content['map_mobile']) : ?>
                            <source media="(max-width: 1099.98px)" srcset="<?php echo PDG::get_image_src($content['map_mobile'], 'full'); ?>" />
                        <?php endif; ?>
                        <source srcset="<?php echo PDG::get_image_src($content['map'], 'full'); ?>" />

                        <?php PDG::img($content['map'], 'full', [
                            'class' => ['contacts__image']
                        ]); ?>
                    </picture>
                </div>
            <?php endif ?>
        </div>
    <?php endif ?>
    <InnerBlocks />
</section>
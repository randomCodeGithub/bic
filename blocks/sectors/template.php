<?php if (!defined('ABSPATH')) exit;
$block = $args['instance'];
$content  = $args['content'];
$items    = $args['items'];
?>

<section class="b-sector c-section <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?> data-aos="fade-up" data-aos-delay="300">
    <?php if (!is_admin()) : ?>
        <div class="row">
            <div class="col-lg-3">
                <?php
                if ($title  = $content['title']) {
                    $block->the_block_title($content['title'], 'b-sector__title h2');
                }
                ?>
                <?php if ($text  = $content['text']) : ?>
                    <p class="b-sector__text"><?php echo $text ?></p>
                <?php endif ?>
                <?php if ($content['link']) :
                    $target = ($content['link']['target'] == '_blank') ? 'target="_blank"' : '';
                ?>
                    <a class="b-sector__link" href="<?php echo esc_url($content['link']['url']); ?>" <?php echo $target; ?>>
                        <?php echo $content['link']['title']; ?>
                    </a>
                <?php endif ?>
            </div>
            <?php if ($items) : ?>
                <?php foreach ($items as $item) : ?>
                    <div class="col-lg-3">
                        <div class="sector-item js-sector-open">
                            <?php
                            if ($image = $item['image']) {
                                PDG::img($image, [624, 0], [
                                    'class' => ['sector-item__image']
                                ]);
                            }

                            ?>
                            <div class="sector-item__content">
                                <?php if ($item['title']) : ?>
                                    <div class="sector-item__title">
                                        <?php echo $item['title']; ?>
                                        <i class="ic ic--plus"></i>
                                    </div>
                                <?php endif; ?>
                                <?php if ($item['text']) : ?>
                                    <p class="sector-item__text"><?php echo $item['text']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="background opened"></div>
                            <div class="background closed"></div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    <?php endif ?>
    <InnerBlocks />
</section>
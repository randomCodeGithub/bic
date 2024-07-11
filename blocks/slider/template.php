<?php if (!defined('ABSPATH')) exit;
$block = $args['instance'];
$items    = $args['items'];
?>
<section class="b-slider c-section <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?> data-aos="fade-up" data-aos-delay="300">
    <?php if (!is_admin()) : ?>
        <div class="s-slider-wrapper">
            <?php if ($items) : ?>
                <div class="s-slider js-s-slider">
                    <?php foreach ($items as $item) : ?>
                        <div class="s-slide">
                            <div class="row align-items-center">
                                <div class="col-lg-6 s-slider__content-col">
                                    <?php if ($title = $item['title']) : ?>
                                        <h2 class="s-slide__title h2">
                                            <?php echo $title ?>
                                        </h2>
                                    <?php endif ?>
                                    <?php if ($text = $item['text']) : ?>
                                        <p class="s-slide__text">
                                            <?php echo $text ?>
                                        </p>
                                    <?php endif ?>
                                    <div class="s-slider__view d-none d-lg-flex justify-content-between align-items-end">
                                        <div class="paging-info"></div>
                                        <div class="s-slider__btns d-flex">
                                            <a href="#" class="js-s-prev s-prev-arrow">
                                                <i class="ic ic--arrow"></i>
                                            </a>
                                            <a href="#" class="js-s-next s-next-arrow">
                                                <i class="ic ic--arrow"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 s-slider__image-col">
                                    <?php if ($images = $item['gallery']) : ?>
                                        <div class="row">
                                            <?php foreach ($images as $image) : ?>
                                                <div class="col-6">
                                                    <a data-fancybox data-src="<?php echo PDG::get_image_src($image, 'full') ?>" class="s-slide__image-wrapper d-block">
                                                        <div class="s-slide__image-bg">
                                                            <i class="ic ic--zoom"></i>
                                                        </div>
                                                        <?php
                                                        PDG::img($image, [624, 0], [
                                                            'class' => ['s-slide__image']
                                                        ]);
                                                        ?>
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="s-slider__view d-flex justify-content-between align-items-end d-lg-none">
                    <div class="paging-info"></div>
                    <div class="s-slider__btns d-flex">
                        <a href="#" class="js-s-prev s-prev-arrow">
                            <i class="ic ic--arrow"></i>
                        </a>
                        <a href="#" class="js-s-next s-next-arrow">
                            <i class="ic ic--arrow"></i>
                        </a>
                    </div>
                </div>
            <?php endif ?>

        </div>
    <?php endif ?>
    <InnerBlocks />
</section>
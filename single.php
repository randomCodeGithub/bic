<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>

<div class="blocks">
    <div class="container">
        <div class="blocks-content editor">
            <div data-link="<?php echo get_permalink(get_option('page_for_posts')) ?>" class="back js-back text-decor-none d-none d-lg-block">
                <span class="flex align-items-center">
                    <i class="ic ic--arrow-2"></i>    
                    <?php _e('BACK TO ALL NEWS', 'pdgc'); ?>
                </span>
            </div>
            <section class="s-item-grid item-grid row c-section">
                <div class="col-lg-6">
                    <div data-link="<?php echo get_permalink(get_option('page_for_posts')) ?>" class="back js-back text-decor-none d-lg-none">
                        <span class="flex align-items-center">
                            <i class="ic ic--arrow-2"></i>    
                            <?php _e('BACK TO ALL NEWS', 'pdgc'); ?>
                        </span>
                    </div>
                    <h1 class="item-grid__title h2"><?php the_title(); ?></h1>
                    <p class="item-grid__date"><?php echo get_the_date('d.m.Y.'); ?></p>
                    <div class="item-grid__content editor">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php
                if ($image_id = get_post_thumbnail_id()) : ?>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="item-grid__image-wrapper">
                            <?php PDG::img($image_id, 'full', [
                                'class' => ['item-grid__image']
                            ]); ?>

                        </div>
                    </div>
                <?php endif ?>
            </section>
            <?php if (is_active_sidebar('single_post')) {
                dynamic_sidebar('single_post');
            } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
<?php if (!defined('ABSPATH')) exit;
get_header();
?>

<div class="blocks">
    <div class="container">
        <div class="blocks-content editor">
            <?php if (is_active_sidebar('posts_page')) {
                dynamic_sidebar('posts_page');
            } ?>
            <section class="b-posts c-section" data-aos="fade-up" data-aos-delay="300">
                <div class="row">
                    <?php
                    if (have_posts()) :
                        global $wp_query;
                        while (have_posts()) :
                            the_post();
                    ?>
                            <div class="item-grid col-lg-4">
                                <a href="<?php the_permalink() ?>" class="post">
                                    <?php
                                    if ($image_id = get_post_thumbnail_id()) : ?>
                                        <div class="post__image-wrapper">
                                            <?php PDG::img($image_id, 'full', [
                                                'class' => ['post__image']
                                            ]); ?>

                                        </div>
                                    <?php endif ?>
                                    <div class="post__title tt-upp">
                                        <?php the_title() ?>
                                    </div>

                                    <?php if (get_the_excerpt()) : ?>
                                        <p class="post__excerpt"><?php echo get_the_excerpt(); ?></p>
                                    <?php endif ?>

                                    <span class="tt-upp">
                                        <?php _e('Read more', 'pdgc'); ?>
                                        <i class="ic ic--arrow-2"></i>
                                    </span>

                                </a>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
                <?php PDG::pager($wp_query,[
                'prev' => '<i class="ic ic--arrow-2"></i>',
                'next' => '<i class="ic ic--arrow-2"></i>',
            ]) ?>
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>
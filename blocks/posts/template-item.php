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
<div class="item-grid col-lg-4">
    <div class="reference js-reference-open" data-reference-id="<?php echo get_the_ID() ?>">
        <?php
        if ($image_id = get_post_thumbnail_id()) : ?>
            <div class="reference__image-wrapper">
                <?php PDG::img($image_id, 'full', [
                    'class' => ['reference__image']
                ]); ?>

            </div>
        <?php endif ?>
        <div class="reference__title">
            <?php the_title() ?>
            <i class="ic ic--plus"></i>
        </div>

        <div class="reference__info">
            <?php if ($country = get_field('country', get_the_ID())) : ?>
                <div class="country"><?php echo $country ?></div>
            <?php endif ?>
            <?php if ($client = get_field('client', get_the_ID())) : ?>
                <div class="client"><?php echo $client ?></div>
            <?php endif ?>
        </div>

    </div>
</div>
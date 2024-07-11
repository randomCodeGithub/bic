<div class="item-grid col-lg-3">
    <div class="service js-service-open" data-service-id="<?php echo get_the_ID() ?>">
        <div class="service__title">
            <span>
                <?php
                if ($image = get_field('icon', get_the_ID())) {
                    PDG::img($image, 'full', [
                        'class' => ['service__icon']
                    ]);
                }
                ?>
                <?php the_title() ?></span>
            <i class="ic ic--plus"></i>
        </div>
        <?php if($excerpt = get_field('excerpt', get_the_ID())): ?>
            <div class="service__text">
                <?php echo $excerpt ?>
            </div>
        <?php endif ?>
    </div>
</div>
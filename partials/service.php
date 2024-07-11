<?php $service_id = get_the_ID(); ?>

<div class="c-service">
    <div class="container">
        <div class="c-service__inner">
            <div class="row">
                <div class="c-service__info col-lg-6 c-white">
                    <h2 class="c-service__title h2"><?php the_title(); ?></h2>
                    <?php if ( $sub_title = get_field( 'sub_title', $service_id ) ): ?>
                        <h4 class="c-service__sub-title h4"><?php echo $sub_title ?></h4>
                    <?php endif ?>

                    <div class="c-service__text editor">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php if ( $gallery = get_field( 'gallery', $service_id ) ): ?>
                    <div class="col-lg-6">
                        <div class="c-service-slider-wrap">
                            <div class="c-service-slider">
                                <ul class="slides">
                                    <?php foreach ( $gallery as $image ): ?>
                                        <li>
                                            <div class="c-service-slider__slide bg-cover" style="background-image: url( <?php echo PDG::get_image_src( $image, [624, 470 ] ); ?> );"></div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="c-service-nav">
                                <ul class="slides">
                                    <?php foreach ( $gallery as $image ): ?>
                                        <li class="c-service-nav__slide bg-cover" style="background-image: url( <?php echo PDG::get_image_src( $image, [624, 470 ] ); ?> );"></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
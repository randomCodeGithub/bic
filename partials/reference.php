<?php $reference_id = get_the_ID(); ?>

<div class="c-reference">
    <div class="container">
        <div class="c-reference__inner">
            <div class="row">
                <div class="c-reference__info col-lg-6 c-white">
                    <h2 class="c-reference__title h2"><?php the_title(); ?></h2>
                    <?php if ( $country = get_field( 'country', $reference_id ) ): ?>
                        <h5 class="c-reference__country h5"><?php echo $country ?></h4>
                    <?php endif ?>
                    <?php if ( $client = get_field( 'client', $reference_id ) ): ?>
                        <h5 class="c-reference__client h5"><?php echo $client ?></h4>
                    <?php endif ?>

                    <div class="c-reference__text editor">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php if ( $gallery = get_field( 'gallery', $reference_id ) ): ?>
                    <div class="col-lg-6">
                        <div class="c-reference-slider-wrap">
                            <div class="c-reference-slider">
                                <ul class="slides">
                                    <?php foreach ( $gallery as $image ): ?>
                                        <li>
                                            <div class="c-reference-slider__slide bg-cover" style="background-image: url( <?php echo PDG::get_image_src( $image, [624, 470 ] ); ?> );"></div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="c-reference-nav">
                                <ul class="slides">
                                    <?php foreach ( $gallery as $image ): ?>
                                        <li class="c-reference-nav__slide bg-cover" style="background-image: url( <?php echo PDG::get_image_src( $image, [624, 470 ] ); ?> );"></li>
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
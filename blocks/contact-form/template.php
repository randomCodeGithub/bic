<?php if (!defined('ABSPATH')) exit;
$block    = $args['instance'];
$content  = $args['content'];
?>
<section class="b-form <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?>>
    <div class="row align-items-center">
        <div class="col-lg-6">
            <div class="js-pdg-form pdg-form"><?php echo do_shortcode($args['form']); ?></div>
        </div>
        <div class="col-lg-6">
            <?php
            if ($title  = $content['title']) {
                $block->the_block_title($content['title'], 'b-contacts__title h3');
            }
            ?>
            <?php if ($text  = $content['text']) : ?>
                <p class="b-form__text"><?php echo $text ?></p>
            <?php endif ?>

            <?php if ($phone  = $content['phone']) : ?>
                <div class="b-form__links">
                    <a class="btn tt-upp" href="tel:<?php echo $phone ?>">
                    <i class="ic ic--phone"></i>
                    <?php _e('CALL US', 'pdgc') ?>
                </a>
                <a class="btn tt-upp btn-whatsapp" href=" https://wa.me/<?php echo $phone ?>">
                        <i class="ic ic--whatsapp"></i>
                        <?php _e('WRITE US ON WHATSAPP', 'pdgc') ?>
                    </a>
                </div>
            <?php endif ?>

        </div>
    </div>

</section>
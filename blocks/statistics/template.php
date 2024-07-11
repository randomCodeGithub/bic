<?php if (!defined('ABSPATH')) exit;

$block = $args['instance'];
$content  = $args['content'];
$items    = $args['items'];
?>

<section class="b-statistics c-section <?php echo $args['instance']->the_block_class(); ?>" <?php $args['instance']->the_block_anchor(); ?> data-aos="fade-left" data-aos-delay="500">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php
                if ($title  = $content['title']) {
                    $block->the_block_title($content['title'], 'b-statistics__title h2');
                }
                ?>
                <?php if ($text  = $content['text']) : ?>
                    <p class="b-statistics__text"><?php echo $text ?></p>
                <?php endif ?>
                <?php if ($content['link']) :
                    $target = ($content['link']['target'] == '_blank') ? 'target="_blank"' : '';
                ?>
                    <a class="b-statistics__link" href="<?php echo esc_url($content['link']['url']); ?>" <?php echo $target; ?>>
                        <?php echo $content['link']['title']; ?>
                    </a>
                <?php endif ?>
            </div>
            <?php if ($items) : ?>
                <div class="col-lg-9 s-items">
                    <div class="row">
                        <?php foreach ($items as $item) : ?>
                            <div class="col-lg-4">
                                <div class="s-item">
                                    <?php if ($item['count']) : ?>
                                        <div class="s-item__count"><?php echo $item['count']; ?></div>
                                    <?php endif; ?>
                                    <?php if ($item['text']) : ?>
                                        <p class="s-item__text"><?php echo $item['text']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
            <?php ?>
            <?php if ($ih_id = $content['image_hotspot']) : ?>
                <div class="col-12 row r-image_hotspot">
                    <div class="col-lg-8 s-image_hotspot">
                        <div class="s-image_hotspot-wrapper">
                            <i class="ic ic--swipe d-lg-none"></i>
                            <div class="s-image_hotspot-outer">
                                <div class="s-image_hotspot-inner">
                                    <?php echo do_shortcode("[devvn_ihotspot id='{$ih_id}']") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($statistic = $content['statistic']) : ?>
                        <div class="offset-lg-1 col-lg-3">
                            <div class="s-item">
                                <?php if ($statistic['tagline']) : ?>
                                    <div class="s-item__tagline"><?php echo $statistic['tagline']; ?></div>
                                <?php endif; ?>
                                <?php if ($statistic['count']) : ?>
                                    <div class="s-item__count"><?php echo $statistic['count']; ?></div>
                                <?php endif; ?>
                                <?php if ($statistic['text']) : ?>
                                    <p class="s-item__text"><?php echo $statistic['text']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            <?php endif; ?>
    
        </div>
    </div>
</section>
<?php if (!defined('ABSPATH')) exit; ?>

</div>

<footer class="site-footer">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <?php if ($logo = get_field('footer_logo', 'option')) : ?>
                        <div class="footer-logo">
                            <?php PDG::img($logo, 'full', [
                                'class' => ['footer-logo__image']
                            ]); ?>
                        </div>
                        <?php get_template_part('partials/social'); ?>
                    <?php endif ?>
                </div>
                <div class="col-lg-auto footer-address-col">
                    <?php if ($address = get_field('contacts_address', 'option')) : 
                        $address_link = get_field('google_maps_link', 'option') ?: "https://maps.google.com/?q={$address}";
                    ?>
                        <h5 class="footer-contact-title h5 tt-upp"><?php _e('Address', 'pdgc'); ?></h5>
                        <ul class="footer-contact">
                            <li>
                                <i class="ic ic--place"></i>
                                <span><?php echo $address ?></span>
                                <div class="footer__address-links">
                                    <a class="tt-upp" target="_blank" href="<?php echo $address_link ?>">
                                        <?php _e('View in map', 'pdgc') ?>
                                    </a>
                                    <?php if ($waze_link = get_field('waze_link', 'option')) : ?>
                                        <a class="tt-upp" target="_blank" href="<?php echo $waze_link ?>">
                                            <?php _e('Waze', 'pdgc') ?>
                                        </a>
                                    <?php endif ?>
                                </div>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="col-lg-auto footer-contact-col">
                    <?php
                    $email = get_field('contacts_email', 'option');
                    $phone = get_field('contacts_phone', 'option');
                    ?>
                    <?php if ($email || $phone) : ?>
                        <h5 class="footer-contact-title h5 tt-upp"><?php _e('Contact us', 'pdgc'); ?></h5>
                        <ul class="footer-contact">
                            <?php if ($email) : ?>
                                <li>
                                    <i class="ic ic--email"></i>
                                    <span><?php echo $email ?></span>
                                </li>
                            <?php endif ?>
                            <?php if ($phone) : ?>
                                <li>
                                    <i class="ic ic--phone"></i>
                                    <span><?php echo $phone ?></span>
                                </li>
                            <?php endif ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 footer-navigation-col">
                    <?php PDG::nav('footer', 'footer-navigation' ); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row align-items-lg-center">
                <div class="col-6 col-lg-3 privacy-col">
                    <?php $privacyPolicyLink = get_privacy_policy_url();
                    if (!empty($privacyPolicyLink)) : ?>
                        <a class="text-decor-none d-block privacy-policy" href="<?php echo $privacyPolicyLink ?>"><?php _e('Privacy policy', 'pdgc'); ?></a>
                    <?php endif ?>
                </div>
                <div class="col-lg-6 text-center copyright-col">
                    <?php get_template_part('partials/copyright'); ?>
                </div>
                <div class="col-6 col-lg-3 d-flex justify-content-end developer-col">
                    <?php get_template_part('partials/developer'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php get_template_part('partials/layout', 'foot'); ?>
<?php if (!defined('ABSPATH')) exit; ?>

<?php get_template_part('partials/layout', 'head'); ?>

<header class="site-header">
    <div class="container flex align-items-center justify-content-between">
        <!-- Logo -->
        <?php get_template_part('partials/logo', null, [
            'class' => 'site-header__logo'
        ]); ?>
        <!-- /Logo -->
        <div class="site-menu flex align-items-center">
            <!-- Main navigation -->
            <nav class="nav-main flex align-items-center">
                <?php PDG::nav('header'); ?>
                <?php if ($header_btn = get_field('header_btn', 'option')) :
                    $target = ($header_link['target'] == '_blank') ? 'target="_blank"' : '';
                ?>
                    <a class="btn header-btn" href="<?php echo esc_url($header_btn['url']); ?>" <?php echo $target; ?>>
                        <?php echo $header_btn['title']; ?>
                    </a>
                <?php endif ?>
            </nav>
            <!-- /Main navigation -->
        </div>

        <!-- Burger -->
        <button class="burger d-lg-none js-burger">
            <span class="burger__part is-top"></span>
            <span class="burger__part is-mid"></span>
            <span class="burger__part is-bot"></span>
            <?php get_template_part('svg/burger', 'opened'); ?>
        </button>
        <!-- /Burger -->
    </div>
</header>

<div class="site-content">
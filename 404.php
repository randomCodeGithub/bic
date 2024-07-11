<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>

<div class="c-404 container ta-center">
    <h1 class="c-404__title">404</h1>

    <h2 class="c-404__sub-title h4 c-primary"><?php _e( 'PAGE NOT FOUND!', 'pdgc' ); ?></h2>

    <p class="c-404__message"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'pdgc' ); ?></p>

    <div class="c-404__btn-wrap">
        <a class="btn" href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'TO HOMEPAGE', 'pdgc' ); ?></a>
    </div>
</div>

<?php get_footer(); ?>
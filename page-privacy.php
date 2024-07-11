<!--
Template Name: Privātuma Politika 
-->
<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>
<style>
    .site-content {
        margin-top: 35px;
    }

    .page-title {
        margin-bottom: 23px;
    }

    .blocks {
        padding-bottom: 140px;
    }

    @media (max-width: 1099.98px) {
        .blocks-content {
            padding-bottom: 70px;
        }
    }
</style>

<div class="blocks">
    <div class="container">
        <h1 class="page-title h1"><?php the_title(); ?></h1>

        <div class="blocks-content editor">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<span class="pdg-developer flex align-items-center">
    <span class="pdg-developer__label"><?php echo apply_filters( 'pdg_developer_label', __( 'Developed by:', 'pdg' ) ); ?></span>

    <a class="pdg-developer__logo-wrap d-block" href="https://sem.lv/" title="<?php echo apply_filters( 'pdg_developer_title', __( 'Sem.lv - Mājas lapas un dizaina izstrāde', 'pdg' ) ); ?>" target="_blank">
        <span class="pdg-developer__logo d-block" style="background-image: url( <?php echo apply_filters( 'pdg_developer_logo', PDGC_ASSETS . '/img/sem.svg' ); ?> );"></span>
    </a>
</span>
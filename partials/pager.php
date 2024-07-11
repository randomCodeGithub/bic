<ul class="pager flex justify-content-center align-items-center">

    <!-- Arrows -->
    <?php if ( array_key_exists( 'first', $args['arrows'] ) && $args['arrows']['first'] ): ?>
        <li class="pager__arrow is-first <?php if ( ! $args['arrows']['first']['is_active'] ): ?>is-inactive<?php endif; ?>">
            <a class="pager__arrow-link" href="<?php echo $args['arrows']['first']['url']; ?>"><?php echo $args['arrows']['first']['value']; ?></a>
        </li>
    <?php endif; ?>

    <?php if ( array_key_exists( 'prev', $args['arrows'] ) && $args['arrows']['prev'] ): ?>
        <li class="pager__arrow is-prev <?php if ( ! $args['arrows']['prev']['is_active'] ): ?>is-inactive<?php endif; ?>">
            <a class="pager__arrow-link" href="<?php echo $args['arrows']['prev']['url']; ?>"><?php echo $args['arrows']['prev']['value']; ?></a>
        </li>
    <?php endif; ?>
    <!-- Arrows -->

    <!-- Pages -->
    <?php foreach ( $args['pages'] as $item ): ?>
        <li class="pager__item <?php if ( $item['is_current'] ): ?>is-current<?php endif; ?> <?php if ( $item['type'] == 'dots' ): ?>is-dots<?php endif; ?>">
            <?php if ( $item['is_current'] || $item['type'] == 'dots' ): ?>
                <span class="pager__link" data-page="<?php echo $item['value']; ?>"><?php echo $item['value']; ?></span>
            <?php else: ?>
                <a class="pager__link" href="<?php echo $item['url']; ?>" data-page="<?php echo $item['value']; ?>"><?php echo $item['value']; ?></a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
    <!-- /Pages -->

    <!-- Arrows -->
    <?php if ( array_key_exists( 'next', $args['arrows'] ) && $args['arrows']['next'] ): ?>
        <li class="pager__arrow is-next <?php if ( ! $args['arrows']['next']['is_active'] ): ?>is-inactive<?php endif; ?>">
            <a class="pager__arrow-link" href="<?php echo $args['arrows']['next']['url']; ?>"><?php echo $args['arrows']['next']['value']; ?></a>
        </li>
    <?php endif; ?>

    <?php if ( array_key_exists( 'last', $args['arrows'] ) && $args['arrows']['last'] ): ?>
        <li class="pager__arrow is-last <?php if ( ! $args['arrows']['last']['is_active'] ): ?>is-inactive<?php endif; ?>">
            <a class="pager__arrow-link" href="<?php echo $args['arrows']['last']['url']; ?>"><?php echo $args['arrows']['last']['value']; ?></a>
        </li>
    <?php endif; ?>
    <!-- Arrows -->

</ul>
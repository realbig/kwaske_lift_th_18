<?php
/**
 * Template part for off canvas menu
 *
 * Overridden from parent to include an extra hook.
 *
 * @since {{VERSION}}
 */

do_action( 'kwaske_rentals_body_open' );
?>

<nav class="mobile-off-canvas-menu off-canvas position-right" id="<?php foundationpress_mobile_menu_id(); ?>" data-off-canvas data-auto-focus="false" role="navigation">
  <?php foundationpress_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>

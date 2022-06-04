<?php
//The sidebar containing the main widget area

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</aside>

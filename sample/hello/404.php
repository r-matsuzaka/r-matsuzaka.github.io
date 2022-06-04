<?php 
get_header();
$hello_get_global_var = hello_global_var(); 
?>
<div class="block-content">
    <h3 class="block-title">
    <?php echo esc_html__('404', 'hello'); ?>
    </h3>
	<h3 class="subheading">
    <?php 
    if ($hello_get_global_var['error-title']) {
      echo esc_html($hello_get_global_var['error-title']);
    } else {
      echo esc_html__('Ooops! You are lost.', 'hello');
    }
    ?>
    <?php echo esc_html__('Go', 'hello'); ?> <a class="link" href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_html__('Home', 'hello'); ?></a>		
	</h3>
</div>
<?php get_footer(); ?>

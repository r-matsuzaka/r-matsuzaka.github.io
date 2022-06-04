<?php 
get_header();
$hello_get_global_var = hello_global_var();
?>
<?php if ( $hello_get_global_var['sidebar'] == 1 ) : ?>
<div class="row">
    <div class="col-md-12">
        <span class="open-sidebar"><?php echo esc_html($hello_get_global_var['sidebar-button-text']); ?> <i class="ion-navicon"></i><i class="ion-ios-close-empty"></i></span>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php endif ?>
<?php while(have_posts()) : the_post(); ?>
<div id="blog-header" <?php if ( ( $hello_get_global_var['fimg_tbg'] == 1 ) && has_post_thumbnail() ): ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>); "<?php endif ?>>
    <div class="image-overlay"></div>
    <div class="single-post-title">
        <h1><?php the_title(); ?></h1>
        <p class="post-info">
            <span class="post-author"><?php echo esc_html__('Posted by', 'hello'); ?> <?php the_author(); ?></span>
            <span class="slash"></span>
            <span class="post-date"><?php echo get_the_date(); ?></span>
            <span class="slash"></span>
            <span class="post-catetory"><?php the_category( ', ' ); ?></span>
            <?php if (get_the_tags()) : ?>
            <span class="slash"></span>
            <span class="post-catetory"><?php the_tags( '', ', ', '' ); ?></span>
            <?php endif ?>                    
        </p>
    </div>
</div>
<div class="block-content">
    <div class="row">
        <div class="col-md-12">
            <div id="single-post">
                <div <?php post_class(); ?>>
                	<?php if ( ( $hello_get_global_var['fimg_tbg'] != 1 ) && has_post_thumbnail() ): ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <?php endif ?>
                    <div class="post-body">
                        <?php the_content(); ?>
                        <?php
                          wp_link_pages( array(
                            'before'      => '<div class="text-right">' . esc_html__( 'Read Next: ', 'hello' ). '<ul class="unstyled pagination">',
                            'after'       => '</ul></div>',
                            'link_before' => '<li class="page-item"><span class="page-link">',
                            'link_after'  => '</span></li>',
                          ) );
                         ?>                                
                    </div>
                    <?php if(get_the_author_meta('description')) : ?>
                    <div class="author-box row">
                        <div class="col-sm-2">
                            <img src="<?php echo esc_url(get_avatar_url( get_the_author_meta('ID') )); ?>" class="rounded-circle" alt="<?php the_author(); ?>" />
                        </div>
                        <div class="col-sm-10">
                            <h3><?php the_author(); ?><span> | <?php echo implode(', ', get_userdata(get_the_author_meta('ID'))->roles) ?></span></h3>
                            <p><?php the_author_meta( 'description' ); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ( $hello_get_global_var['social_share_icon'] == 1 && class_exists( 'lcThemeToolkit' ) ) {
                        load_template( WP_PLUGIN_DIR . '/lc-theme-toolkit/social-share/social-share.php', true );
                      } ?>
                    <div class="post-nav text-center">
                        <span class="float-left">
                        <?php previous_post_link( '%link', '&leftarrow; '.esc_html__( 'Previous Post', 'hello' ) ); ?>
                        </span>
                        <span>
                            <a href="<?php the_permalink(); ?>"><i class="ion-grid"></i></a>
                        </span>
                        <span class="float-right">
                        <?php next_post_link( '%link', esc_html__( 'Next Post', 'hello' ).' &rightarrow;' ); ?>
                        </span>
                    </div>
                </div>
                <?php comments_template(); ?>                        
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
<?php get_header(); ?>
<?php while(have_posts()): the_post(); ?>
    <?php if( function_exists( 'kc_is_using' ) && kc_is_using() ) : ?>
        <?php the_content(); ?>
    <?php else : ?>
        <div id="blog-header" class="animated slideInRight" <?php if (has_post_thumbnail()): ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>); "<?php endif ?>>
            <div class="image-overlay"></div>
            <div class="single-post-title">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-md-12">
                    <div id="single-post">
                        <div class="post">
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
                        </div>
                        <?php comments_template(); ?>                        
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
<?php endwhile ?>
<?php get_footer(); ?>

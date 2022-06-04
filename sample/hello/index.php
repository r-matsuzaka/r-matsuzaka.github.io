<?php 
get_header();
$hello_get_global_var = hello_global_var();
?>
<div class="block-content">
    <h3 class="block-title">
    <?php if (is_home()) : ?>
        <?php echo esc_html__('Blog', 'hello'); ?>
    <?php elseif (is_category()) : ?>
        <?php echo esc_html__('Blog Category:', 'hello'); ?> <?php single_cat_title(); ?>
    <?php elseif (is_tag()) : ?>
        <?php echo esc_html__('Blog Tag:', 'hello'); ?> <?php single_tag_title(); ?>
    <?php elseif (is_tax('portfolio-category')) : ?>
        <?php echo esc_html__('Portfolio Category:', 'hello'); ?> <?php single_term_title(); ?>
    <?php elseif (is_search()) : ?>
        <?php echo esc_html__('Search:', 'hello'); ?> <?php the_search_query(); ?>
    <?php endif; ?> 
    </h3>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <?php if ( have_posts( )) : while(have_posts()) : the_post(); ?>        
            <div <?php post_class(); ?>>
                <?php if (has_post_thumbnail()): ?>
                <div class="post-thumbnail">
                    <a class="open-post" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    </a>
                </div>
                <?php endif ?>
                <div class="post-title">
                    <a class="open-post" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <p class="post-info">
                        <span class="post-author"><?php echo esc_html__('Posted by', 'hello'); ?> <?php the_author(); ?></span>
                        <span class="slash"></span>
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="slash"></span>
                        <span class="post-catetory">
                            <?php 
                            if (get_post_type() == 'portfolio') { 
                                $terms = get_the_terms( get_the_ID(), 'portfolio-category' ); 
                                if ( $terms && ! is_wp_error( $terms ) ) {
                                    $cat_name = array();

                                    foreach ( $terms as $term ) {
                                        $cat_name[] = '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';
                                    }
                                    
                                  echo join( ", ", $cat_name);     
                                }
                            }
                            else {
                                the_category( ', ' );
                            }
                            ?>
                        </span>
                        <?php if (get_the_tags()) : ?>
                        <span class="slash"></span>
                        <span class="post-catetory"><?php the_tags( '', ', ', '' ); ?></span>
                        <?php endif ?>
                    </p>
                </div>
                <div class="post-body">
                    <p><?php echo wp_trim_words(get_the_content(), ($hello_get_global_var['blog-excerpt-length']) ? esc_html($hello_get_global_var['blog-excerpt-length']) : esc_html__('35', 'hello'), ''); ?></p>
                    <a class="btn read-more-btn open-post" href="<?php the_permalink(); ?>">
                    <?php 
                    if ($hello_get_global_var['blog-read-more']) {
                      echo esc_html($hello_get_global_var['blog-read-more']);
                    } else {
                      echo esc_html__('Read More', 'hello');
                    }
                    ?>
                    </a>
                </div>
            </div>
            <?php endwhile; else: ?>
            <p class="search-no-match"><?php echo esc_html__( 'Sorry, no posts matched your criteria.', 'hello' ) ?></p>
            <?php endif; ?>
            <div class="text-center">
            <?php 
            $pagination = paginate_links( array(
                'type' => 'array',
                'prev_text' => esc_html__( 'Previous', 'hello' ),
                'next_text' => esc_html__( 'Next', 'hello' )
              ) ); ?>
            <?php if ( ! empty( $pagination ) ) : ?>
                <ul class="unstyled pagination">
                  <?php foreach ( $pagination as $key => $page_link ) : ?>
                    <li class="page-item <?php if ( strpos( $page_link, 'current' ) !== false ) { echo esc_attr( 'active' ); } ?>">
                    <?php echo str_replace('page-numbers','page-link',$page_link); ?>
                    </li>
                  <?php endforeach ?>
                </ul>
              <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
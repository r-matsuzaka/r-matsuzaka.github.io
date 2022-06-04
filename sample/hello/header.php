<?php $hello_get_global_var = hello_global_var(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
    <div class="preloader">
        <?php if ($hello_get_global_var['loading-icon']['url']): ?>
        <div class="anim"><img src="<?php echo esc_url($hello_get_global_var['loading-icon']['url']); ?>" alt="<?php echo esc_attr__('loading', 'hello'); ?>"></div>
        <?php endif ?>
    </div>
    <div class="preloader-left"></div>

    <div class="inline-menu-container animated fadeInDown">
        <?php if ($hello_get_global_var['status-title']): ?>
        <span class="status contact menu-item">
        <?php echo esc_html($hello_get_global_var['status-title']); ?>
        </span>
	    <?php endif ?> 
        <span class="mobile-menu"><i class="ion-navicon"></i></span>   
        <?php wp_nav_menu(array(
            'theme_location'  =>  'main-menu',
            'menu_class'       =>  'inline-menu',
            'container'       =>  'ul'
            )); ?>
    </div>
    
    <div class="content-home <?php if ($hello_get_global_var['background-type'] == 4) { echo 'video'; }  ?>" <?php if ($hello_get_global_var['background-type'] == 1 || $hello_get_global_var['background-type'] == 4): ?> style="background-color: <?php 
                if ($hello_get_global_var['cover-image']['background-color']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-color']);
                }
                else {
                     echo 'transparent';
                    } ?>; 
                background-repeat: <?php 
                if ($hello_get_global_var['cover-image']['background-repeat']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-repeat']);
                }
                else {
                    echo 'repeat';
                    } ?>; 
                background-size: <?php 
                if ($hello_get_global_var['cover-image']['background-size']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-size']);
                }
                else {
                    echo 'cover';
                    } ?>; 
                background-attachment: <?php 
                if ($hello_get_global_var['cover-image']['background-attachment']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-attachment']);
                }
                else {
                    echo 'scroll';
                    } ?>; 
                background-position: <?php 
                if ($hello_get_global_var['cover-image']['background-position']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-position']);
                }
                else {
                    echo 'left top';
                    } ?>; 
                background-image: url(<?php 
                if ($hello_get_global_var['cover-image']['background-image']) {
                    echo esc_url($hello_get_global_var['cover-image']['background-image']);
                } ?>)" <?php endif ?>>


        <?php if ($hello_get_global_var['background-type'] == 2): ?>
        <div class="bgScroll" style="background-color: <?php 
                if ($hello_get_global_var['cover-image']['background-color']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-color']);
                }
                else {
                     echo 'transparent';
                    } ?>; 
                background-repeat: <?php 
                if ($hello_get_global_var['cover-image']['background-repeat']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-repeat']);
                }
                else {
                    echo 'repeat';
                    } ?>; 
                background-size: <?php 
                if ($hello_get_global_var['cover-image']['background-size']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-size']);
                }
                else {
                    echo 'cover';
                    } ?>; 
                background-attachment: <?php 
                if ($hello_get_global_var['cover-image']['background-attachment']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-attachment']);
                }
                else {
                    echo 'scroll';
                    } ?>; 
                background-position: <?php 
                if ($hello_get_global_var['cover-image']['background-position']) {
                    echo esc_attr($hello_get_global_var['cover-image']['background-position']);
                }
                else {
                    echo 'left top';
                    } ?>; 
                background-image: url(<?php 
                if ($hello_get_global_var['cover-image']['background-image']) {
                    echo esc_url($hello_get_global_var['cover-image']['background-image']);
                } ?>)"></div>

        <?php elseif ($hello_get_global_var['background-type'] == 3): ?>
        <?php $slider_images_id = explode(",", $hello_get_global_var['slider-images']); ?>
        <div id="lionhero" class="owl-carousel owl-theme">
            <?php foreach ($slider_images_id as $image_id): ?>
            <div class="item">
                <div class="slide" style="background-image: url(<?php echo wp_get_attachment_url( $image_id ); ?>); background-position: center; background-size: cover;"></div>
            </div>
            <?php endforeach ?>
        </div>

        <?php elseif ($hello_get_global_var['background-type'] == 4): ?>
        <div id="video-wrapper"> </div>
        <a class="player" data-property="{videoURL:'<?php echo esc_url( $hello_get_global_var['video-url'] ); ?>'}"></a>
        <?php endif ?>

        <?php if ($hello_get_global_var['background-type'] != 3): ?>
        <div class="cover-overlay"></div>
        <?php endif ?>
        
        <div class="container">
            <div class="name-block reverse">
                <div class="name-block-container reverse">
                    <?php if ($hello_get_global_var['logo-upload']['url']): ?>
                    <img src="<?php echo esc_url($hello_get_global_var['logo-upload']['url']); ?>" alt="<?php echo esc_attr__('logo', 'hello'); ?>">
                    <?php endif ?>
                    <h1><span><?php echo ( class_exists( 'ReduxFramework' ) ) ? esc_html($hello_get_global_var['title1']) : esc_html__('Hi, I\'m', 'hello') ?></span><?php echo ( class_exists( 'ReduxFramework' ) ) ? esc_html($hello_get_global_var['title2']) : esc_html__('James Bond', 'hello') ?></h1>
                    <?php if ($hello_get_global_var['title3-animation'] == 1): ?>
                    <h2 id="element" data-string='<?php echo json_encode($hello_get_global_var['title3-multitext']); ?>'></h2>
                    <?php elseif ($hello_get_global_var['title3-animation'] == 2): ?>
                    <div id="liontextslider" class="owl-carousel owl-theme">
                        <?php foreach ($hello_get_global_var['title3-multitext'] as $title3text): ?>
                         <div class="item">
                            <h2><?php echo esc_html( $title3text ); ?></h2>
                        </div>                           
                        <?php endforeach ?>
                    </div>
                    <?php else: ?>
                    <h2><?php echo ( class_exists( 'ReduxFramework' ) ) ? esc_html($hello_get_global_var['title3']) : esc_html__('Designer & Developer', 'hello') ?></h2>
                    <?php endif ?>
                    <?php if ($hello_get_global_var['download-button-text']) : ?>
                    <a target="_blank" href="<?php echo esc_url($hello_get_global_var['resume-upload']['url']); ?>" class="btn btn-download"><?php echo esc_html($hello_get_global_var['download-button-text']); ?></a>
                    <?php endif ?>
                    <?php if ( $hello_get_global_var['social-links'] == 1 ) : ?>
                    <ul class="unstyled social">
                        <?php foreach ($hello_get_global_var['social-links-icon'] as $font_class => $url): ?>
                        <?php if ($url) : ?>
                        <li><a href="<?php if ( $font_class == 'email' ) { $email = sanitize_email( $url ); echo 'mailto:' . antispambot( $email, 1 ); } elseif ( $font_class == 'phone' ) { echo 'tel:' . esc_attr( $url ); } else { echo esc_url( $url ); } ?>" title="<?php echo esc_attr( $font_class ); ?>" target="<?php if ( $font_class == 'phone' ) { echo '_self'; } else { echo '_blank'; } ?>" rel="nofollow"><i class="<?php if ( $font_class == 'email' ) { echo 'ion-email'; } elseif ( $font_class == 'phone' ) { echo 'ion-android-call'; } else { echo 'ion-social-'.esc_attr( $font_class ); } ?>"></i></a></li>    
                        <?php endif; endforeach ?>
                    </ul>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <div id="page-content-block" class="content-blocks">
        <div id="page-content" class="content">
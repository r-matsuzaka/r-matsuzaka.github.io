<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "hello_options";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'hello' ),
        'page_title'           => __( 'Theme Options', 'hello' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => 'dashicons-admin-generic',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'     => ' ',                   
        // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'           => __( 'Loading Icon', 'hello' ),
        'icon'              => 'el el-refresh',
        'fields'          =>  array(                       
            array(
                'id'      => 'loading-icon',
                'type'    => 'media',
                'default' => array(
                    'url'=> get_template_directory_uri() . '/images/loading.png'
                )                
            )            
        )            
    ) );
    Redux::setSection( $opt_name, array(
        'title'           => __( 'Upload Logo', 'hello' ),
        'icon'              => 'el el-upload',
        'fields'          =>  array(                       
            array(
                'id'      => 'logo-upload',
                'type'    => 'media'                
            )            
        )            
    ) );
    Redux::setSection( $opt_name, array(
        'title'             => __( 'Background', 'hello' ),
        'icon'              => 'el el-photo',
        'fields'            => array(
            array(
                'id'        =>  'background-type',
                'type'      =>  'radio',                
                'title'     =>  __( 'Background Type', 'hello' ),
                'options'  => array(
                    '1' => 'Fixed Image',
                    '2' => 'Scrolling Image', 
                    '3' => 'Slider', 
                    '4' => 'Video'
                ),
                'default' => '1'
            ),
            array(
                'id'        =>  'video-url',
                'type'      =>  'text',
                'validate' => 'url',
                'title'     =>  __( 'Video URL', 'hello'),
                'default'   =>  'https://www.youtube.com/watch?v=EMy5krGcoOU',
                'required'  => array( 'background-type', '=', '4' )
            ),
            array(
                'id'            => 'cover-image',
                'type'          => 'background',
                'title'     =>  __( 'Cover Image', 'hello' ),
                'preview_media' => true,
                'preview'       => false,
                'default'       =>  array(
                    'background-color' => 'transparent',
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'left top',
                    'background-image' =>  get_template_directory_uri().'/images/bg/img-bg2.jpg',  
                ),
                'required'  => array( 'background-type', '!=', '3' )
            ),
            array(
                'id'      => 'cimg-overlay',
                'type'    => 'radio',
                'title'   => __('Cover Image Overlay', 'hello'),
                'options'  => array(
                    '1' => 'Color',
                    '2' => 'Gradient' 
                ),
                'default' => '1',
                'required'  => array( 'background-type', '!=', '3' )
            ),
            array(
                'id'      => 'cimgoverlay-color1',
                'type'    => 'color_rgba',
                'title'   => __('Set Color', 'hello'),
                'default'   => array(
                    'color'     => '#000000',
                    'alpha'     => 0.5
                ),
                'required'  => array( 'background-type', '!=', '3' )
            ),
            array(
                'id'      => 'cimgoverlay-color2',
                'type'    => 'color_rgba',
                'title'   => __('Set End Color', 'hello'),
                'default'   => array(
                    'color'     => '#EB3349',
                    'alpha'     => 0.5
                ),
                'required'  => array( 'cimg-overlay', '=', '2' )
            ),
            array(
                'id'      => 'slider-images',
                'type'    => 'gallery',
                'title'   => __('Slider Images', 'hello'),
                'required'  => array( 'background-type', '=', '3' )
            )
        )            
    ) );   
    Redux::setSection( $opt_name, array(
        'title'             => __( 'Status Title', 'hello' ),
        'icon'              => 'el el-smiley',
        'fields'            =>  array(
            array(
                'id'        =>  'status-title',
                'type'      =>  'text',
                'desc'    => __( 'Status title will not show in sidebar menu version', 'hello' ),                
                'default'   =>  'I am available for freelance'
            )                                   
        )            
    ) );     
    Redux::setSection( $opt_name, array(
        'title'             => __( 'Intro Title', 'hello' ),
        'icon'              => 'el el-briefcase',
        'fields'            =>  array(
            array(
                'id'        =>  'title1',
                'type'      =>  'text',                
                'title'     =>  __( 'Title 1', 'hello' ),
                'default'   =>  'Hi, I\'m'
            ),
            array(
                'id'        =>  'title2',
                'type'      =>  'text',                
                'title'     =>  __( 'Title 2', 'hello' ),
                'default'   =>  'James Bond'
            ),
            array(
                'id'        =>  'title3-animation',
                'type'      =>  'radio',                
                'title'     =>  __( 'Title 3 Animation', 'hello' ),
                'options'  => array(
                    '1' => 'Typed text', 
                    '2' => 'Text Rotator', 
                    '3' => 'None'
                ),
                'default' => '3'
            ),
            array(
                'id'        =>  'title3',
                'type'      =>  'text',                
                'title'     =>  __( 'Title 3', 'hello' ),
                'default'   =>  'Designer & Developer',
                'required'  => array( 'title3-animation', '=', '3' )
            ),
            array(
                'id'        =>  'title3-multitext',
                'type'      =>  'multi_text',                
                'title'     =>  __( 'Title 3', 'hello' ),
                'default'   => array('UX, UI Designer', 'Web App Developer', 'Social Animal!'),
                'required'  => array( 'title3-animation', '!=', '3' )
            )                                    
        )            
    ) );
    Redux::setSection( $opt_name, array(
        'title'           => __( 'Upload Resume', 'hello' ),
        'icon'              => 'el el-upload',
        'fields'          =>  array(
            array(
                'id'      => 'download-button-text',
                'type'    => 'text',
                'title'   => __('Button Text', 'hello'),
                'desc'    => __( 'If no text found, Button will be hidden', 'hello' ),
                'default' => 'Download Resume'
            ),                        
            array(
                'id'      => 'resume-upload',
                'type'    => 'media',
                'title'   => __('Upload Resume', 'hello'),
                'url'     => true,
                'preview' => false,
                'mode'    => false,
                'default' => array(
                    'url'=> get_template_directory_uri() . '/images/resume.pdf'
                )                
            )            
        )            
    ) );
    Redux::setSection( $opt_name, array(
        'title'           => __( 'Sidebar Menu', 'hello' ),
        'icon'              => 'el el-lines',
        'fields' => array(
            array(
                'id'       => 'sidebar-menu',
                'type'     => 'switch',
                'title'    => __( 'Sidebar Menu', 'hello' ),
                'subtitle' => __( 'Enable or disable.', 'hello' ),
                'desc'    => __( 'If sidebar menu is enabled, it will automatically override Menu Block options in Static Front page', 'hello' ),
                'on'        => __( 'Enabled', 'hello' ),
                'off'       => __( 'Disabled', 'hello' ),
                'default'   => false
            )                                                         
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'           => __( 'Social Links', 'hello' ),
        'icon'              => 'el el-network',
        'fields' => array(
            array(
                'id'       => 'social-links',
                'type'     => 'switch',
                'title'    => __( 'Social Links', 'hello' ),
                'subtitle' => __( 'Enable or disable.', 'hello' ),
                'on'        => __( 'Enabled', 'hello' ),
                'off'       => __( 'Disabled', 'hello' ),
                'default'   => false
            ),
            array(
                'id' => 'social-links-icon',
                'type' => 'sortable',                
                'title' => __('Social Links', 'hello'),
                'subtitle' => __( 'Define and reorder the social icons however you want.', 'hello' ),
                'desc'     => __( 'Leave any field blank if you don\'t want to display it .', 'hello' ),
                'label'    => true,
                'options'  => array(
                    'facebook'     => 'https://www.facebook.com/lioncoders',
                    'twitter'      => 'https://www.twitter.com/lioncoders',
                    'googleplus'  => 'https://www.googleplus.com/lioncoders',
                    'linkedin'     => 'https://www.linkedin.com/lioncoders',
                    'youtube'      => '',
                    'vimeo'        => '',
                    'pinterest'    => '',
                    'instagram'    => '',
                    'dribbble'     => '',
                    'email'        => 'hello@example.com',
                    'phone'        => '',
                ),
                'default'  => array(
                    'facebook'     => 'https://www.facebook.com/lioncoders',
                    'twitter'      => 'https://www.twitter.com/lioncoders',
                    'googleplus'  => 'https://www.googleplus.com/lioncoders',
                    'linkedin'     => 'https://www.linkedin.com/lioncoders',
                    'youtube'      => '',
                    'vimeo'        => '',
                    'pinterest'    => '',
                    'instagram'    => '',
                    'dribbble'     => '',
                    'email'        => '',
                    'phone'        => '',
                ),
                'required'  => array( 'social-links', "=", 1 )
            )                                                          
        )
    ) );
    Redux::setSection($opt_name, array(
        'title'             =>  __( 'Blog Page', 'hello' ),
        'icon'              => 'el el-list',
        'fields'            =>  array(
            array(
                'id'        =>  'blog-excerpt-length',
                'type'      =>  'text',
                'validate' => 'numeric',
                'title'     =>  __( 'Excerpt Length', 'hello'),
                'default'   =>  '35',
            ),
            array(
                'id'        =>  'blog-read-more',
                'type'      =>  'text',
                'title'     =>  __( 'Read More Text', 'hello'),
                'default'   =>  'Read More',
            )            
        )
    ) );    
    Redux::setSection( $opt_name, array(
        'title'             =>  __( 'Blog Single Page', 'hello' ),
        'icon'              => 'el el-edit',
        'fields'            =>  array(
            array(
                'id'       => 'fimg_tbg',
                'type'     => 'switch',
                'title'    => __( 'Featured Image as Title Background', 'hello' ),
                'subtitle' => __( 'Enable or disable.', 'hello' ),
                'on'        => __( 'Enabled', 'hello' ),
                'off'       => __( 'Disabled', 'hello' ),
                'default'   => false
            ),
            array(
                'id'       => 'sidebar',
                'type'     => 'switch',
                'title'    => __( 'Sidebar', 'hello' ),
                'subtitle' => __( 'Enable or disable.', 'hello' ),
                'on'        => __( 'Enabled', 'hello' ),
                'off'       => __( 'Disabled', 'hello' ),
                'default'   => false
            ),
            array(
                'id' => 'sidebar-button-text',
                'type' => 'text',
                'title' => __('Sidebar Button Text', 'hello'),
                'default' => 'Sidebar',
                'required'  => array( 'sidebar', '=', 1 )
            ),            
            array(
                'id'        => 'social_share_icon',
                'type'      => 'switch',
                'title'     => __( 'Share Icons', 'hello' ),
                'subtitle'  => __( 'Enable or disable.', 'hello' ),
                'on'        => __( 'Enabled', 'hello' ),
                'off'       => __( 'Disabled', 'hello' ),
                'default'   => false
            ),            
            array(
                'id' => 'social-share-title',
                'type' => 'text',
                'title' => __('Share Title', 'hello'),
                'default' => 'Share this :',
                'required'  => array( 'social_share_icon', '=', 1 )
            ),
            array(
                'id'       => 'share_multi_checkbox',
                'type'     => 'checkbox',
                'title'    => __( 'Share Icons Options', 'hello' ),
                'subtitle' => __( 'Select which share icons you want to display.', 'hello' ),
                'desc'     => __( 'Share icons are displayed just under the single posts content.', 'hello' ),
                'options'  => array(
                    '1' => '<i class="el el-facebook"></i> '.__('Facebook', 'hello'),
                    '2' => '<i class="el el-twitter"></i> '.__('Twitter', 'hello'),
                    '3' => '<i class="el el-googleplus"></i> '.__('Google Plus', 'hello'),
                    '4' => '<i class="el el-pinterest"></i> '.__('Pinterest', 'hello')
                ),             
                'default' => array(
                    '1' => '1', 
                    '2' => '1', 
                    '3' => '1',
                    '4' => '1'
                ),
                'required'  => array( 'social_share_icon', '=', 1 )
            )            
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'             => __( '404 Error Page', 'hello' ),
        'icon'              => 'el el-thumbs-down',
        'fields'            =>  array(
            array(
                'id'        =>  'error-title',
                'type'      =>  'text',
                'title'     =>  __( 'Title', 'hello'),
                'default'   =>  'Ooops! You are lost.'
            )
        )             
    ) );
    Redux::setSection( $opt_name, array(
        'title'           => __( 'Button Style', 'hello' ),
        'icon'              => 'el el-tint',
        'fields'          =>  array(
            array(
                'id'      => 'btn-bgcolor',
                'type'    => 'link_color',
                'title'   => __('Background Color', 'hello'),
                'active'  => false
            ),
            array(
                'id'      => 'btn-txtcolor',
                'type'    => 'link_color',
                'title'   => __('Text Color', 'hello'),
                'active'  => false
            ),
            array(
                'id'      => 'btn-brdrcolor',
                'type'    => 'link_color',
                'title'   => __('Border Color', 'hello'),
                'description'   => __('Not Support for resume download button', 'hello'),
                'active'  => false
            )                       
        )            
    ) );    
    /*
     * <--- END SECTIONS
     */

    /*
     * LOAD EXTENSIONS
     */    
    $ext_path = WP_PLUGIN_DIR . '/lc-theme-toolkit/demo-import/';
    Redux::setExtensions($opt_name, $ext_path);


    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'hello' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'hello' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }


<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
function business_express_setup() {
    global $content_width;

    if (!isset($content_width)) {
        $content_width = 640;
    }

    load_theme_textdomain('business-express', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    set_post_thumbnail_size(890, 510, true);
    
    register_default_headers(array(
        'homepage-image' => array(
            'url'           => '%s/assets/images/home_page_header.jpg',
            'thumbnail_url' => '%s/assets/images/home_page_header.jpg',
            'description'   => __('Homepage Header Image', 'business-express'),
        ),
        'default-image'  => array(
            'url'           => '%s/assets/images/page_header.jpg',
            'thumbnail_url' => '%s/assets/images/page_header.jpg',
            'description'   => __('Default Header Image', 'business-express'),
        ),
    ));
    
    add_theme_support('custom-header', apply_filters('business_express_custom_header_args', array(
        'default-image' => get_template_directory_uri() . "/assets/images/page_header.jpg",
        'width'         => 1920,
        'height'        => 800,
        'flex-height'   => true,
        'flex-width'    => true,
        'header-text'   => false,
    )));
    
    add_theme_support('custom-logo', array('height' => 70));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'business-express'),
    ));
}
add_action('after_setup_theme', 'business_express_setup');

function business_express_sanitize_checkbox($val){
    return (isset($val) && $val == true ? true : false);
}

function business_express_print_contact() {
    $business_express_contact_email = get_theme_mod("business_express_email", ''); 
    $business_express_contact_phone = get_theme_mod("business_express_phone", ''); 

    if (current_user_can('edit_theme_options')) {
        if ( empty( $business_express_contact_email )) {
            $business_express_contact_email = 'add email address';
        }

        if ( empty( $business_express_contact_phone )) {
            $business_express_contact_phone = 'add phone number';
        }
    }

    if ( !empty( $business_express_contact_email ) || !empty( $business_express_contact_phone )) {
      printf('<span class="span14"></span>', __("Any questions?&nbsp;", "business-express"));

      if ( !empty( $business_express_contact_phone )) {
        printf('<i  class="font-icon-9 fa fa-phone"></i><a href="%1$s" class="header-top-link">%2$s</a>', esc_url($business_express_contact_phone), wp_kses_post($business_express_contact_phone));
      }

      if ( !empty( $business_express_contact_email )) {
        printf(' <i  class="font-icon-9 fa fa-envelope-o"></i><a href="mailto:%1$s" class="header-top-link">%2$s</a>', esc_url($business_express_contact_email), wp_kses_post($business_express_contact_email));
      }
    }
  }

/**
 * Add customizer controls
 */
function business_express_customize_register_action($wp_customize) {
    $wp_customize->add_setting('business_express_homepage_header',
        array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . "/assets/images/home_page_header.jpg"));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'business_express_homepage_header',
        array(
            'label'    => __('Home page header', 'business-express'),
            'section'  => 'header_image',
            'settings' => 'business_express_homepage_header',
            'priority' => 10,
        )));


    $wp_customize->add_section( 'business_express_header', array(
        'title' => esc_html__( 'Header Options', 'business-express' ),
        'priority' => 20,
    ) );


    $wp_customize->add_setting( 'business_express_phone', array(
        'default'           => '#',
        'sanitize_callback' => 'wp_kses_post',
    ));


    $wp_customize->add_control( 'business_express_phone', array(
        'label'    => __('Phone', 'business-express'),
        'section'  => 'business_express_header',
        'priority' => 1,
    ));


     $wp_customize->add_setting( 'business_express_email', array(
        'default'           => '#',
        'sanitize_callback' => 'wp_kses_post',
    ) );


    $wp_customize->add_control( 'business_express_email', array(
        'label'    => __('Email', 'business-express'),
        'section'  => 'business_express_header',
        'priority' => 1,
    ) );

    $business_express_contact = array(
      'facebook' => __('Facebook url', 'business-express'),
      'twitter' => __('Twitter url', 'business-express'),
      'google-plus' => __('GooglePlus url', 'business-express'),
      'youtube' => __('Youtube url', 'business-express'),
      'skype' => __('Skype url', 'business-express'),
      'behance' => __('Behance url', 'business-express')
    );


    foreach ($business_express_contact as $name => $label) {
        $wp_customize->add_setting( 'business_express_'.$name, array(
            'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
        ) );


        $wp_customize->add_control( 'business_express_'.$name, array(
            'label'    => $label,
            'section'  => 'business_express_header',
            'priority' => 1,
        ) );
    }
}

add_action('customize_register', 'business_express_customize_register_action');

/**
* Add a pingback url auto-discovery header for singularly identifiable articles.
*/
function business_express_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
    }
}
add_action( 'wp_head', 'business_express_pingback_header' );

/**
 * Register sidebar
 */
function business_express_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar widget area', 'business-express'),
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'business_express_widgets_init');


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Read more' link.
 * @return string '... Read more'
 */
function business_express_excerpt_more($more) {
    if ( is_admin() ) {
        return $link;
    }
    return '&hellip; <a class="read-more" href="' . esc_url(get_permalink(get_the_ID())) . '">' . __('Read more', 'business-express') . '</a>';
}
add_filter('excerpt_more', 'business_express_excerpt_more');



/**
 * Gets logo as text or image, depending on user
 *
 * @param boolean $footer Use in footer
 * @return string Logo html
 */
function business_express_logo($footer = false) {
    $show_text = (!function_exists('the_custom_logo') || !has_custom_logo());

    if (!$show_text) {
        return get_custom_logo();
    }

    $acontent = get_bloginfo('name');

    if ($footer) {
        return '<h2 class="footer-logo">' . wp_kses_post($acontent) . '</h2>';
    }

    return '<a class="text-logo" href="' . esc_url(home_url('/')) . '">' . wp_kses_post($acontent) . '</a>';
}

/**
 * Enqueue scripts and styles.
 */
function business_express_scripts() {
    wp_enqueue_style('business_express_fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,900|Open+Sans:400,300,600,700|Source+Sans+Pro:200,normal,300,600,700');
    wp_enqueue_style('business_express_style', get_stylesheet_uri());
    wp_enqueue_style('business_express_font-awesome', get_template_directory_uri() . '/assets/font-awesome/font-awesome.min.css');
    wp_enqueue_script('business_express_ddmenu', get_template_directory_uri() . '/assets/js/drop_menu_selection.js', array('jquery-effects-slide'), false, true);
    wp_enqueue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'business_express_scripts');

/**
 * Footer copyright
 * @return string The footer copyright text.
 */
function business_express_copyright() {
    return '&copy;&nbsp;' . "&nbsp;" . date_i18n(__('Y','business-express')) . '&nbsp;' . esc_html(get_bloginfo('name')) . '.&nbsp;' . __('Built using WordPress and Business Express Theme.', 'business-express');
}


/**
 * Menu fallback used for wp_nav_menu
 * @return string The wp_page_menu generated html
 */
function business_express_nomenu_cb() {
    return wp_page_menu(array(
        "menu_class" => 'fm2_drop_mainmenu',
        "menu_id"    => 'drop_mainmenu_container',
        'before'     => '<ul id="drop_mainmenu" class="fm2_drop_mainmenu">',
    ));
}

/**
 * The title to be used in header depending on the current post and template
 * @return string The title to be used in header
 */
function business_express_title() {
    $title = array(
        'title' => '',
    );

    if (is_404()) {
        $title['title'] = __('Page not found', 'business-express');
    } elseif (is_search()) {
        $title['title'] = sprintf(__('Search Results for &#8220;%s&#8221;', 'business-express'), get_search_query());
    } elseif (is_home()) {
        if (is_front_page()) {
            $title['title'] = get_bloginfo('name');
        } else {
            $title['title'] = single_post_title();
        }
    } elseif (is_archive()) {
        $title['title'] = get_the_archive_title();
    } else {
        $title['title'] = get_the_title();
    }

    return $title['title'];
}


/**
 * Current homepage header
 * @return string The escaped url of homepage header image
 */
function business_express_homepage_header() {
    return esc_url(get_theme_mod('business_express_homepage_header', get_template_directory_uri() . "/assets/images/home_page_header.jpg"));
}
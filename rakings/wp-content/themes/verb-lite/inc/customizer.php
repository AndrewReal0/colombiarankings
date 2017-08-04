<?php
/**
 * understrap Theme Customizer
 *
 * @package themely framework
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function verb_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'verb_lite_customize_register' );

function verb_lite_theme_customize_register( $wp_customize ) {
    
    // Primary color //
    $wp_customize->add_setting(
        'verb_lite_primary_color',
        array(
            'default'     => '#0096e8',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        'verb_lite_primary_color',
        array(
            'label'       => esc_html__( 'Primary Color', 'verb-lite' ),
            'section'     => 'colors',
            'settings'   => 'verb_lite_primary_color'
        )
    ));
    
    // Secondary color //
    $wp_customize->add_setting(
        'verb_lite_secondary_color',
        array(
            'default'     => '#37bf91',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        'verb_lite_secondary_color',
        array(
            'label'       => esc_html__( 'Secondary Color', 'verb-lite' ),
            'section'     => 'colors',
            'settings'   => 'verb_lite_secondary_color'
        )
    ));

    // HOMEPAGE SECTION //
    $wp_customize->add_section( 'verb_lite_homepage_section' , 
        array(
            'title'       => __( 'Homepage Settings', 'verb-lite' ),
            'priority'    => 20,
            'description' => __( 'This section controls the homepage settings.', 'verb-lite' ),
    ) );

    $wp_customize->add_setting('verb_lite_homepage_featured_posts', 
        array(
            'default'        => 'uncategorized',
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'verb_lite_sanitize_text'
    ) );
    
    $wp_customize->add_control( 'verb_lite_homepage_featured_posts', 
        array(
            'settings' => 'verb_lite_homepage_featured_posts',
            'label'    => __( 'Featured Posts Category', 'verb-lite' ),
            'description' => __( 'Select a category to populate the featured posts. If you have not done so already, create a post category entitled Featured, and assign posts to that category. Then select it from this dropdown.', 'verb-lite' ),
            'section'  => 'verb_lite_homepage_section',
            'type'     => 'select',
            'choices'  => get_categories_select()
    ) );

    $wp_customize->add_setting( 'verb_lite_featured_toggle', array( 
        'sanitize_callback' => 'esc_attr',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'verb_lite_featured_toggle',
        array(
            'label'     => __( 'Featured Posts Section', 'verb-lite' ),
            'description' => __( 'Click to enable the featured posts section.', 'verb-lite' ),
            'section'   => 'verb_lite_homepage_section',
            'settings'  => 'verb_lite_featured_toggle',
            'type'      => 'checkbox',
        )
    ) );
    
    // TOP HEADER SOCIAL SECTION //

    $wp_customize->add_section( 'verb_lite_topbar_section' , 
        array(
            'title'       => __( 'Top Bar Settings', 'verb-lite' ),
            'priority'    => 20,
            'description' => __( 'This section controls the top bar which appears at the very top of the theme.', 'verb-lite' ),
    ) );
    
    $wp_customize->add_setting( 'verb_lite_social_facebook',
        array(
            'default'     => '',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'verb_lite_social_facebook', 
        array(
            'label'     => __( 'Facebook Profile URL', 'verb-lite' ),
            'section'   => 'verb_lite_topbar_section',
            'type'      => 'text',
            'settings'  => 'verb_lite_social_facebook',
            'description' => __( 'Enter the link to your Facebook profile page.', 'verb-lite' ),
    ));
    
    $wp_customize->add_setting( 'verb_lite_social_twitter',
        array(
            'default'     => '',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'verb_lite_social_twitter', 
        array(
            'label'     => __( 'Twitter Profile URL', 'verb-lite' ),
            'section'   => 'verb_lite_topbar_section',
            'type'      => 'text',
            'settings'  => 'verb_lite_social_twitter',
            'description' => __( 'Enter the link to your Twitter profile page.', 'verb-lite' ),
    ));
    
    $wp_customize->add_setting( 'verb_lite_social_linkedin',
        array(
            'default'     => '',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'verb_lite_social_linkedin', 
        array(
            'label'     => __( 'Linkedin Profile URL', 'verb-lite' ),
            'section'   => 'verb_lite_topbar_section',
            'type'      => 'text',
            'settings'  => 'verb_lite_social_linkedin',
            'description' => __( 'Enter the link to your Linkedin profile page.', 'verb-lite' ),
    ));
    
    $wp_customize->add_setting( 'verb_lite_social_pinterest',
        array(
            'default'     => '',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'verb_lite_social_pinterest', 
        array(
            'label'     => __( 'Pinterest Profile URL', 'verb-lite' ),
            'section'   => 'verb_lite_topbar_section',
            'type'      => 'text',
            'settings'  => 'verb_lite_social_pinterest',
            'description' => __( 'Enter the link to your Pinterest profile page.', 'verb-lite' ),
    ));
    
    $wp_customize->add_setting( 'verb_lite_social_google',
        array(
            'default'     => '',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'verb_lite_social_google', 
        array(
            'label'     => __( 'Google Plus Profile URL', 'verb-lite' ),
            'section'   => 'verb_lite_topbar_section',
            'type'      => 'text',
            'settings'  => 'verb_lite_social_google',
            'description' => __( 'Enter the link to your Google Plus profile page.', 'verb-lite' ),
    ));
    
    $wp_customize->add_setting( 'verb_lite_social_instagram',
        array(
            'default'     => '',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'verb_lite_social_instagram', 
        array(
            'label'     => __( 'Instagram Profile URL', 'verb-lite' ),
            'section'   => 'verb_lite_topbar_section',
            'type'      => 'text',
            'settings'  => 'verb_lite_social_instagram',
            'description' => __( 'Enter the link to your Instagram profile page.', 'verb-lite' ),
    ));
    
    $wp_customize->add_setting( 'verb_lite_social_youtube',
        array(
            'default'     => '',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'verb_lite_social_youtube', 
        array(
            'label'     => __( 'Youtube Profile URL', 'verb-lite' ),
            'section'   => 'verb_lite_topbar_section',
            'type'      => 'text',
            'settings'  => 'verb_lite_social_youtube',
            'description' => __( 'Enter the link to your Youtube profile page.', 'verb-lite' ),
    ));
    
    $wp_customize->add_setting( 'verb_lite_social_tumblr',
        array(
            'default'     => '',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'verb_lite_social_tumblr', 
        array(
            'label'     => __( 'Tumblr Profile URL', 'verb-lite' ),
            'section'   => 'verb_lite_topbar_section',
            'type'      => 'text',
            'settings'  => 'verb_lite_social_tumblr',
            'description' => __( 'Enter the link to your Tumblr profile page.', 'verb-lite' ),
    ));
    
    // Sanitize text
	function verb_lite_sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}
add_action( 'customize_register', 'verb_lite_theme_customize_register' );

/**
 * Get list of categories
 */
function get_categories_select() {
  $teh_cats = get_categories();
  $results;
 
  $count = count($teh_cats);
  for ($i=0; $i < $count; $i++) {
    if (isset($teh_cats[$i]))
      $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}

/**
 * Output the styles from the customizer
 */
function verb_lite_customizer_css() {
    ?>
    <style type="text/css">
        a:hover, a:focus {color:<?php echo esc_attr( get_theme_mod( 'verb_lite_primary_color' ) ); ?>;}
        .navbar-header .nav li:hover a, .navbar-header .nav .active a {border-bottom-color:<?php echo esc_attr( get_theme_mod( 'verb_lite_primary_color' ) ); ?>;}
        .widget-area .widget .widget-title {border-left-color: <?php echo esc_attr( get_theme_mod( 'verb_lite_primary_color' ) ); ?>;}
        .btn-primary.focus, .btn-primary:focus, .btn-primary:hover, .btn-primary, .post .cat-links a {background-color: <?php echo esc_attr( get_theme_mod( 'verb_lite_secondary_color' ) ); ?>;}
        .btn-primary.focus, .btn-primary:focus, .btn-primary:hover, .btn-primary {border-color: <?php echo esc_attr( get_theme_mod( 'verb_lite_secondary_color' ) ); ?>;}
        #wrapper-footer-full a:hover {color: <?php echo esc_attr( get_theme_mod( 'verb_lite_secondary_color' ) ); ?>;}
        #wrapper-footer aside .widget-title {border-bottom-color: <?php echo esc_attr( get_theme_mod( 'verb_lite_secondary_color' ) ); ?>;}
    </style>
    <?php
}
add_action( 'wp_head', 'verb_lite_customizer_css' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function verb_lite_customize_preview_js() {
	wp_enqueue_script( 'verb_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'verb_lite_customize_preview_js' );

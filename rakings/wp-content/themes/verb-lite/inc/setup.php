<?php

if ( ! function_exists( 'verb_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function verb_lite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on understrap, use a find and replace
	 * to change 'verb-lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'verb-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'verb-lite' ),
	) );
    
    /*
	 * Adding Thumbnail basic support
	 */
    add_theme_support( "post-thumbnails" );
    add_image_size( 'verb-lite-logo', 9999, 90, true );
    add_image_size( 'verb-lite-wide', 760, 280, true );
    add_image_size( 'verb-lite-square', 680, 500, true );
    add_image_size( 'verb-lite-rectangle', 800, 400, true );
    add_image_size( 'verb-lite-sidebar-thumbnail', 100, 75, true );
    add_image_size( 'verb-lite-featured1', 908, 700, true );
    add_image_size( 'verb-lite-featured2', 935, 700, true );

    // Set up the WordPress core custom logo feature.
    add_theme_support( 'custom-logo', array(
       'height'      => 90,
       'width'       => 300,
       'flex-width' => true,
       'flex-height' => true,
    ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'verb_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
}
endif; // verb_lite_setup

function update_user_notices(){
	//remove notice dismissal flags from all users that might have it.
	delete_metadata( 'user', null, 'verb_lite_welcome_admin_notice', null, true );
}

add_action( 'after_setup_theme', 'verb_lite_setup' );
add_action('switch_theme', 'update_user_notices');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function verb_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'verb_lite_content_width', 730 );
}
add_action( 'after_setup_theme', 'verb_lite_content_width', 0 );

/**
* Adding the Read more link to excerpts
*/
function verb_lite_custom_excerpt_more( $more ) {
	return ' ... ';
}
add_filter( 'excerpt_more', 'verb_lite_custom_excerpt_more' );

/* 
* Adds a custom read more link to all excerpts, manually or automatically generated 
*/
function verb_lite_all_excerpts_get_more_link($post_excerpt) {
    return $post_excerpt . '<p><a class="read-more btn btn-secondary" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">' . __('Read More', 'verb-lite') . '</a></p>';
}
add_filter('excerpt_more', 'verb_lite_all_excerpts_get_more_link');
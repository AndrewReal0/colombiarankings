<?php
/**
 * understrap enqueue scripts
 *
 * @package themely framework
 */

function verb_lite_scripts() {
    wp_enqueue_style( 'verb-lite-understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), '0.4.4');
    wp_enqueue_style( 'verb-lite-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i|Open+Sans:100,300,400,600,700,700italic,600italic,400italic');
    wp_enqueue_style( 'verb-lite-styles', get_stylesheet_directory_uri() . '/style.css', array(), '0.4.4');
    wp_enqueue_script( 'verb-lite-scripts', get_template_directory_uri() . '/js/theme.min.js', array('jquery'), '0.4.4', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'verb_lite_scripts' );
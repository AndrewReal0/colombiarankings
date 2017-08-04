<?php
/**
 * Declaring widgets
 *
 *
 * @package themely framework
 */

function verb_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'verb-lite' ),
		'id'            => 'sidebar-1',
		'description'   => 'Sidebar widget area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        
    register_sidebar( array(
        'name'          => __( 'Footer', 'verb-lite' ),
        'id'            => 'footer',
        'description'   => 'Widgets area in the footer',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Header Ad Spot', 'verb-lite' ),
        'id'            => 'header-adspot',
        'description'   => 'Widgets area in the footer',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'verb_lite_widgets_init' );
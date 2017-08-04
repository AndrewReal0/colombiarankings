<?php
/**
 * Add WooCommerce support
 *
 *
 * @package themely framework
 */

add_action( 'after_setup_theme', 'verb_lite_woocommerce_support' );
function verb_lite_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
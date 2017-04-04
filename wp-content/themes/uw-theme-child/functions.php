<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'uwmadison-fonts','uwmadison-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css' );

function dwwp_alter_movies_icon( $args ) {
# this does not work. He said he already set up a custom hook???
    $args['menu_icon'] = 'dashicons-tickets';
    return $args;
}

add_filter('dwwp_post_type_args', 'dwwp_alter_movies_icon');

function dwwp_change_label( $plural ) {
    $plural = 'Booookz';
    return $plural;
}

add_filter('dwwp_label_plural', 'dwwp_change_label');
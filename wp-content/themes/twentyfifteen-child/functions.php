<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'genericons' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

function twentyfourteen_child_theme_scripts() {

    wp_enqueue_script( 'extra js', get_stylesheet_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true  );

}

add_action( 'wp_enqueue_scripts', 'twentyfourteen_child_theme_scripts' );



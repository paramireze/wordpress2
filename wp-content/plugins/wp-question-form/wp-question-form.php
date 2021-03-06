<?php

/**
 * Plugin Name: wo-question-form
 * Plugin URI: https://github.com/paramireze/wordpress2
 * Description: build post type and taxonomies used for user questions
 * Author: Paul Ramirez
 * Author URI: https://github.com/paramireze/
 * Version: 0.0.1
 * License: GPLv2
 */

//Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// END ENQUEUE PARENT ACTION
function register_user_question_content_type() {

    $post_labels = array(
        'name' 			    => 'User Questions',
        'singular_name' 	=> 'User Question',
        'add_new' 		    => 'Add New',
        'add_new_item'  	=> 'Add New User Question',
        'edit'		        => 'Edit',
        'edit_item'	        => 'Edit User Question',
        'new_item'	        => 'New User Question',
        'view' 			    => 'View User Question',
        'view_item' 		=> 'View User Question',
        'search_term'   	=> 'Search User Questions',
        'parent' 		    => 'Parent User Question',
        'not_found' 		=> 'No User Questions found',
        'not_found_in_trash' 	=> 'No User Questions in Trash'
    );
    register_post_type( 'user_question', array( 'labels' => $post_labels, 'public' => true ) );
    $tax_labels = array(
        'name'              => _x( 'Products', 'text-domain' ),
        'singular_name'     => _x( 'Product', 'text-domain' ),
        'search_items'      => __( 'Search Products', 'text-domain' ),
        'all_items'         => __( 'All Products', 'text-domain' ),
        'parent_item'       => __( 'Parent Product', 'text-domain' ),
        'parent_item_colon' => __( 'Parent Product:', 'text-domain' ),
        'edit_item'         => __( 'Edit Product', 'text-domain' ),
        'update_item'       => __( 'Update Product', 'text-domain' ),
        'add_new_item'      => __( 'Add New Product', 'text-domain' ),
        'new_item_name'     => __( 'New Product Name', 'text-domain' ),
        'menu_name'         => __( 'Product', 'text-domain' ),
    );
    register_taxonomy( 'products', 'user_question', array( 'labels' => $tax_labels, 'rewrite' =>  array('slug' => 'location', 'with_front' => false) ) );
}



add_action( 'init', 'register_user_question_content_type' );
function process_user_generated_post() {

    if ( ! empty( $_POST[ 'submission' ] ) ) {
        wp_send_json_error( 'Honeypot Check Failed' );
    }

    if ( ! check_ajax_referer( 'user-submitted-question', 'security' ) ) {
        wp_send_json_error( 'Security Check failed' );
    }

    $question_data = array(
        'post_title' => sprintf( '%s-%s-%s',
            sanitize_text_field( $_POST[ 'data' ][ 'name' ] ),
            sanitize_text_field( $_POST[ 'data' ][ 'product' ] ),
            esc_attr( current_time( 'Y-m-d' ) )
        ),
        'post_status' => 'draft',
        'post_type' => 'user_question',
        'post_content' => sanitize_text_field( $_POST[ 'data' ][ 'product' ] )
    );

    $post_id = wp_insert_post( $question_data, true );

    if ( $post_id ) {
        wp_set_object_terms(
            $post_id,
            sanitize_text_field( $_POST[ 'data' ][ 'product' ] ),
            'products',
            true
        );
        update_post_meta( $post_id, 'contact_email', sanitize_email( $_POST[ 'data' ][ 'email' ] ) );
    }

    wp_send_json_success( $post_id );

}

add_action( 'wp_ajax_process_user_generated_post', 'process_user_generated_post' );
add_action( 'wp_ajax_nopriv_process_user_generated_post', 'process_user_generated_post' );

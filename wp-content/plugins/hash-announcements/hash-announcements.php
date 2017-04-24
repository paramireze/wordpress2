<?php

/**
 * Plugin Name: Hash Announcements
 * Plugin URI: https://github.com/paramireze/madisonh3
 * Description: This plugins allows you to add a simple job listing section to your wordpress website.
 * Author: Paul Ramirez
 * Author URI: https://github.com/paramireze/
 * Version: 0.0.1
 * License: GPLv2
 */


//Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

require_once ( plugin_dir_path(__FILE__) .  'hash-announcements-cpt.php' );
require_once ( plugin_dir_path(__FILE__) .  'hash-announcements-settings.php' );
require_once ( plugin_dir_path(__FILE__) .  'hash-announcements-fields.php' );
require_once ( plugin_dir_path(__FILE__) .  'hash-announcements-shortcode.php' );

function hash_admin_enqueue_scripts() {
    global $pagenow, $typenow;

    if ($typenow == 'announcement') {
        wp_enqueue_style('hash-admin-css', plugins_url('css/admin-announcements.css', __FILE__));
    }

    if (($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'announcement') {
        wp_enqueue_script('hash-announcement-js', plugins_url('js/admin-announcements.js', __FILE__), array('jquery', 'jquery-ui-datepicker'), '20170331', false );
        wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
        wp_enqueue_script('hash-custom-quicktags', plugins_url('js/hash-quicktags.js', __FILE__ ), array('quicktags'), '20170206', true);
    }

    if ($pagenow == 'edit.php' && $typenow == 'announcement') {
        wp_enqueue_script('reorder-js', plugins_url('js/reorder.js', __FILE__), array('jquery', 'jquery-ui-sortable'), '20170410', true);
        wp_localize_script( 'reorder-js', 'WP_ANNOUNCEMENT_LISTING', array(
            'security' => wp_create_nonce( 'wp-announcement-order' ),
            'success' => 'Announcements sort order has been saved',
            'failure' => 'failed to update order possibly due to improper permissions'
        ) );
    }

}
add_action('admin_enqueue_scripts', 'hash_admin_enqueue_scripts', 'jquery-style', 'hash-custom-quicktags');



<?php
/**
 * Plugin Name: WP Job Listing
 * Plugin URI: https://github.com/paramireze/wordpress2
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

require ( plugin_dir_path(__FILE__) .'wp-job-cpt.php' );
require ( plugin_dir_path(__FILE__) .'wp-job-settings.php' );
require ( plugin_dir_path(__FILE__) .'wp-job-fields.php' );

function dwwp_admin_enqueue_scripts() {
    global $pagenow, $typenow;

    if ($typenow == 'job') {
        wp_enqueue_style('dwwp-admin-css', plugins_url('css/admin-jobs.css', __FILE__));
    }

    if (($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'job') {
        wp_enqueue_script('dwwp-job-js', plugins_url('js/admin-jobs.js', __FILE__), array('jquery', 'jquery-ui-datepicker'), '20170331', false );
        wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
        wp_enqueue_script('dwwp-custom-quicktags', plugins_url('js/dwwp-quicktags.js', __FILE__ ), array('quicktags'), '20170206', true);
    }

    if ($pagenow == 'edit.php' && $typenow == 'job') {
        wp_enqueue_script('reorder-js', plugins_url('js/reorder.js', __FILE__), array('jquery', 'jquery-ui-sortable'), '20170410', true);
    }

}
add_action('admin_enqueue_scripts', 'dwwp_admin_enqueue_scripts', 'jquery-style', 'dwwp-custom-quicktags');




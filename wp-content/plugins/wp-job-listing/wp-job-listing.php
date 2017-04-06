<?php
/**
 * Plugin Name: WP Job Listing
 * Plugin URI: http://hatrackmedia.com
 * Description: This plugins allows you to add a simple job listing section to your wordpress website.
 * Author: Bobby Bryant
 * Author URI: http://hatrackmedia.com
 * Version: 0.0.1
 * License: GPLv2
 */

//Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

require ( plugin_dir_path(__FILE__) .'wp-job-cpt.php' );
require ( plugin_dir_path(__FILE__) .'wp-job-render-admin.php' );
require ( plugin_dir_path(__FILE__) .'wp-job-fields.php' );
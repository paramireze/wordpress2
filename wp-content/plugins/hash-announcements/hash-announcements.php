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

//require_once ( plugin_dir_path(__FILE__) .  'hash-announcements-cpt.php' );
//require_once ( plugin_dir_path(__FILE__) .  'hash-announcements-settings.php' );
//require_once ( plugin_dir_path(__FILE__) .  'hash-announcements-fields.php' );
require_once ( plugin_dir_path(__FILE__) .  'hash-announcements-shortcode.php' );



<?php

/**
 * Plugin Name: Hash News
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

require_once ( plugin_dir_path(__FILE__) .  'hash-news-cpt.php' );
require_once ( plugin_dir_path(__FILE__) .  'hash-news-fields.php' );
require_once ( plugin_dir_path(__FILE__) .  'hash-news-shortcode.php' );



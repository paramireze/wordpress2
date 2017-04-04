<?php
/**
 * Plugin Name: Basic Plugin
 * Plugin URI: https://github.com/paramireze/wordpress2
 * Description: This plugin with be displaying Job opportunities
 * Author: Paul Ramirez
 * Version: 0.0.1
 */

function dwwp_do_something_cool() {
    // do something
}

add_action('a_hook','dwwp_do_something_cool');
add_filter('a_hook','dwwp_do_something_cool');

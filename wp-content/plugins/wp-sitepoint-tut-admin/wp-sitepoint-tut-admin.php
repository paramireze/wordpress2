<?php
/*
Plugin Name: Example Easy Administration Plugin
Plugin URI: http://www.sitepoint.com/wordpress-easy-administration-plugin-1
Description: Simplifies WordPress administration panels. also removes wordpress logos
Version: 1.0
Author: Craig Buckler
Author URI: http://optimalworks.net/
License: GPL2
*/

// login page logo
function custom_login_logo() {
    echo '<style>h1 a, h1 a:hover, h1 a:focus { font-size: 1.4em; font-weight: normal; text-align: center; text-indent: 0; line-height: 1.1em; text-decoration: none; color: #dadada; text-shadow: 0 -1px 1px #666, 0 1px 1px #fff; background-image: none !important; }</style>';
}
add_action('login_head', 'custom_login_logo');

// change administration panel footer
function change_footer_admin() {
    echo 'For support, please call 123456 or email <a href="mailto:support@mysite.net">mailto:support@mysite.net</a>';
}
add_filter('admin_footer_text', 'change_footer_admin');


<?php

/**
 * Template Name: array_map()
 *
 * @package Wordpress
 * @subpackage Twenty_fifteen
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div style="width: 70%; margin: 0 auto;" >
            <form id="user-post">
                <?php wp_nonce_field( basename( __FILE__ ), 'user-submitted-question' ) ?>
                <input type="text" id="user-name" name="user-name" placeholder="Name" style="margin-bottom: 10px;">
                <input type="text" id="user-email" name="user-email" placeholder="Email" style="margin-bottom: 10px;">
                <select name="product" id="product" style="margin-bottom: 10px";>
                    <option value=""></option>
                    <option value="hosting">Hosting</option>
                    <option value="themes">Themes</option>
                    <option value="plugins">Plugins</option>
                    <option value="custom-dev">Custom Development</option>
                </select>
                <label for="user-entry-content">Write your Question here:</label>
                <textarea name="user-entry-content" id="user-entry-content" cols="30" rows="10" style="margin-bottom: 10px;"></textarea>
                <input type="text" id="xyq" name="<?php echo apply_filters( 'honeypot_name', 'date-submitted') ?>" value="" style="display:none">
                <input type="submit" id="user-submit-button" value="Submit Post">
            </form>
        </div>
    </main>
</div>

<?php get_footer(); ?>

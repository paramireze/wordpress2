<?php

function dwwp_add_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=job',
        'Reorder Jobs',
        'Reorder Jobs',
        'manage_options',
        'reorder_jobs',
        'reorder_admin_jobs_callback'
    );

}

add_action('admin_menu', 'dwwp_add_submenu_page');

function reorder_admin_jobs_callback() {
    $args = array(
//        'post_type' => 'job',
//        'orderby' => 'menu_order',
//        'order' => 'ASC',
//        'no_found_rows' => true,
//        'update_post_term_cache' => false,
//        'post_per_post' => 50
        'category_name' => 'cat-a'
    );

    $job_listing = new WP_Query($args);

    echo '<pre>';
    print_r($job_listing);
    echo '</pre>';
}


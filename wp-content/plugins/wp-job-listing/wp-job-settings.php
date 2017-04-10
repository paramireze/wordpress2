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
    ?>
    <div id="job-sort" class="wrap">
        <div id="icon-job-admin" class="icon32"><br /></div>
        <h2><?php _e('Sort Job Positions', 'wp-job-listings') ?> <img src="<?php echo esc_url( admin_url() . 'image/loading.gif'); ?>"></h2>
            <?php if ( $job_listing->have_posts()) :  ?>
                <p><?php _e('<strong>Note:</strong> this only affects the jobs listed using the shortcodes functions') ?></p>
                <ul id="custom-type-list">
                    <?php while ($job_listing->have_posts()) : $job_listing->the_post(); ?>
                        <li id="<?php the_id(); ?>"><?php the_title(); ?></li>
                    <?php endwhile; ?>
                </ul>
                <p><?php else: _e( 'You have no Jobs to sort.', 'wp-job-listing'); ?></p>
            <?php endif; ?>
    </div>
    <?php

}


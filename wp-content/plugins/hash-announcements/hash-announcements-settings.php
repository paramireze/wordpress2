<?php

function hash_add_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=announcement',
        'Reorder Announcements',
        'Reorder Announcements',
        'manage_options',
        'reorder_announcements',
        'reorder_admin_announcements_callback'
    );

}

add_action('admin_menu', 'hash_add_submenu_page');

function reorder_admin_announcements_callback() {
    global $typenow, $pagenow;
    $args = array(
        'post_type' => 'announcement',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'no_found_rows' => true,
        'update_post_term_cache' => false,
        'post_per_post' => 50
//        'category_name' => 'cat-a'
    );

    $announcements = new WP_Query($args);
    ?>
    <div id="announcement-sort" class="wrap">
        <div id="icon-announcement-admin" class="icon32"><br /></div>
        <h2><?php _e('Sort Announcement Positions', 'wp-announcement-listings') ?> <img id="loading-animation" src="<?php echo esc_url( admin_url() . 'image/loading.gif'); ?>"></h2>
        <?php if ( $announcements->have_posts()) :  ?>
            <p><?php _e('<strong>Note:</strong> this only affects the announcements listed using the shortcodes functions') ?></p>
            <ul id="custom-type-list">
                <?php while ($announcements->have_posts()) : $announcements->the_post(); ?>
                    <li id="<?php esc_attr(the_id()); ?>"><?php esc_html(the_title()); ?></li>
                <?php endwhile; ?>
            </ul>
            <p><?php else: _e( 'You have no Announcements to sort.', 'wp-announcements-listing'); ?></p>
        <?php endif; ?>
    </div>
    <?php
}

function hash_save_reorder() {

    if ( ! check_ajax_referer( 'wp-announcements-order', 'security' ) ) {
        return wp_send_json_error( 'Invalid Nonce' );
    }

    if ( ! current_user_can( 'manage_options' ) ) {
        return wp_send_json_error( 'You are not allowed to do this' );
    }

    $order = $_POST['order'];
    $counter = 0;

    foreach( $order as $item_id ) {

        $post = array(
            'ID' => (int)$item_id,
            'menu_order' => $counter
        );

        wp_update_post( $post );

        $counter++;

    }

    wp_send_json_success( 'Post Saved' );

}

add_action( 'wp_ajax_save_sort', 'hash_save_reorder' );
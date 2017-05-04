<?php

function hash_list_announcements( $atts, $content = null ) {

    $atts = shortcode_atts(array(
        'title' => 'Announcement',
        'count' => 5,
        'announcement_body' => '',
        'pagination' => 'off'
    ), $atts);

    if ( isset( $_GET['id'] ) ) {

        $announcementID = $_GET['id'];
        $args = array(
            'post_type' => 'announcements',
            'p' => $announcementID
        );

        return displayAnnouncement($args);

    } else {

        $args = array(
            'post_type' => 'announcements'
        );

        return displayAllAnnouncements($args);

    }
}

add_shortcode('hash_announcements', 'hash_list_announcements');

function displayAnnouncement($args) {
    $announcement = new WP_Query($args);

    if ($announcement->have_posts())  :

        $display_announcement = '';
        //$display_announcement = '<h4>' . esc_html__($atts["title"]) . '</h4>';

        while ($announcement->have_posts()) : $announcement->the_post();
            global $post;


            $announcement_body = get_post_meta(get_the_ID(), 'announcement_body', true);
            $title = get_the_title();
            $id = get_the_ID();
            $slug = get_permalink( get_page_by_path( 'announcements' ) );
            $announcement_body = get_the_content();
            $display_announcement .= '<div>';
            $display_announcement .= sprintf('<a href="%s">%s</a>&nbsp&nbsp', esc_url($slug . '?id=' . $id), esc_html__($title));
            $display_announcement .= '<div>' . get_the_ID() . ' '  . esc_html($announcement_body) . '</div>';
            $display_announcement .= '</div><hr />';

        endwhile;

        $display_announcement .= '</div>';

        wp_reset_postdata();

    endif;

    return $display_announcement;

}


function displayAllAnnouncements($args) {
    $announcement = new WP_Query($args);

    if ($announcement->have_posts())  :

        $display_announcement = '';
        //$display_announcement = '<h4>' . esc_html__($atts["title"]) . '</h4>';

        while ($announcement->have_posts()) : $announcement->the_post();
            global $post;


            $announcement_body = get_post_meta(get_the_ID(), 'announcement_body', true);
            $title = get_the_title();
            $id = get_the_ID();
            $slug = get_permalink( get_page_by_path( 'announcements' ) );
            $announcement_body = get_the_content();
            $display_announcement .= '<div>';
            $display_announcement .= sprintf('<a href="%s">%s</a>&nbsp&nbsp', esc_url($slug . '?id=' . $id), esc_html__($title));
//            $display_announcement .= '<div>' . get_the_ID() . ' '  . esc_html($announcement_body) . '</div>';
            $display_announcement .= '</div><hr />';

        endwhile;

        $display_announcement .= '</div>';

        wp_reset_postdata();

    endif;

    return $display_announcement;

}


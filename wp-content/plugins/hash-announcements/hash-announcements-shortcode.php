<?php

function dwwp_list_announcements( $atts, $content = null ) {

    $atts = shortcode_atts(array(
        'title' => 'Announcement',
        'count' => 5,
        'announcement_body' => '',
        'pagination' => 'off'
    ), $atts);

//    $pagination = $atts['pagination'] == 'on' ? false : true;

//    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'announcement',
//        'post_status' => 'publish',
//        'no_found_rows' => $pagination,
//        'posts_per_page' => $atts['count'],
//        'paged' => $paged,

    );

    $announcement = new WP_Query($args);

    if ($announcement->have_posts())  :

        $display_announcement .= '<h4>' . esc_html__($atts["title"]) . '&nbsp' . esc_html__(ucwords($location)) . '</h4>';
        $display_announcement .= '<ul>';

        while ($announcement->have_posts()) : $announcement->the_post();
            global $post;

            $announcement_body = get_post_meta(get_the_ID(), 'announcement_body', true);
            $title = get_the_title();
            $slug = get_permalink();

            $display_announcement .= '<li class="job-listing">';
            $display_announcement .= sprintf('<a href="%s">%s</a>&nbsp&nbsp', esc_url($slug), esc_html__($title));
            $display_announcement .= '<span>' . esc_html($announcement_body) . '</span>';
            $display_announcement .= '</li>';

        endwhile;

        $display_announcement .= '</ul>';
        $display_announcement .= '</div>';

        wp_reset_postdata();

//        if ( $announcement->max_num_pages > 1 && is_page() ) {
//
//            $display_announcement .= '<nav class="prev-next-posts">';
//            $display_announcement .= '<div class="nav-previous">';
//            $display_announcement .= get_next_posts_link(__( '<span class="meta-nav">&larr;</span> Previous' ), $announcement->max_num_pages );
//            $display_announcement .= '</div>';
//            $display_announcement .= '<nav class="next-posts-link">';
//            $display_announcement .= get_previous_posts_link(__( ' Next <span class="meta-nav">&rarr;</span>' ));
//            $display_announcement .= '</div>';
//            $display_announcement .='</nav>';
//
//        }

    endif;

    return $display_announcement;
}

add_shortcode('hash_announcement', 'dwwp_list_announcements');
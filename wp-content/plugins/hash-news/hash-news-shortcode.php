<?php

function hash_list_news( $atts, $content = null ) {

    $atts = shortcode_atts(array(
        'title' => 'Hash News',
        'count' => 5,
        'news_body' => '',
        'pagination' => 'off'
    ), $atts);

    if ( isset( $_GET['id'] ) ) {

        $newsID = $_GET['id'];
        $args = array(
            'post_type' => 'hash_news',
            'p' => $newsID
        );

        return displayNews($args);

    } else {

        $args = array(
            'post_type' => 'hash news'
        );

        return displayAllNews($args);

    }
}

add_shortcode('hash_news', 'hash_list_news');

function displayNews($args) {
    $news = new WP_Query($args);

    if ($news->have_posts())  :

        $display_news = '';
        //$display_news = '<h4>' . esc_html__($atts["title"]) . '</h4>';

        while ($news->have_posts()) : $news->the_post();
            global $post;


            $news_body = get_post_meta(get_the_ID(), 'news_body', true);
            $title = get_the_title();
            $id = get_the_ID();
            $slug = get_permalink( get_page_by_path( 'news' ) );
            $news_body = get_the_content();
            $display_news .= '<div>';
            $display_news .= sprintf('<a href="%s">%s</a>&nbsp&nbsp', esc_url($slug . '?id=' . $id), esc_html__($title));
            $display_news .= '<div>' . get_the_ID() . ' '  . esc_html($news_body) . '</div>';
            $display_news .= '</div><hr />';

        endwhile;

        $display_news .= '</div>';

        wp_reset_postdata();

    endif;

    return $display_news;

}


function displayAllNews($args) {
    $news = new WP_Query($args);

    if ($news->have_posts())  :

        $display_news = '';
        //$display_news = '<h4>' . esc_html__($atts["title"]) . '</h4>';

        while ($news->have_posts()) : $news->the_post();
            global $post;


            $news_body = get_post_meta(get_the_ID(), 'news_body', true);
            $title = get_the_title();
            $id = get_the_ID();
            $slug = get_permalink( get_page_by_path( 'news' ) );
            $news_body = get_the_content();
            $display_news .= '<div>';
            $display_news .= sprintf('<a href="%s">%s</a>&nbsp&nbsp', esc_url($slug . '?id=' . $id), esc_html__($title));
//            $display_news .= '<div>' . get_the_ID() . ' '  . esc_html($news_body) . '</div>';
            $display_news .= '</div><hr />';

        endwhile;

        $display_news .= '</div>';

        wp_reset_postdata();

    endif;

    return $display_news;

}


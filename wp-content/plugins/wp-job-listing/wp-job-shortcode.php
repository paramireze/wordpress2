<?php
function dwwp_sample_shortcode( $atts, $content = null ) {

    $atts = shortcode_atts(
        array(
            'title' => 'default title',
            'src' => 'www.google.com'
        ), $atts
    );

//    print_r($atts);
//    print_r($content);
    return '<h1>' . $atts['title'] . '</h1>';
}


add_shortcode( 'job_listing', 'dwwp_sample_shortcode' );

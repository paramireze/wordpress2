<?php
function dwwp_job_taxonomy_list( $atts, $content = null ) {

    $atts = shortcode_atts(
        array(
            'title' => 'Current job openings in...'
        ), $atts
    );

    $locations = get_terms( 'location' );

    if ( !empty( $locations ) && ! is_wp_error( $locations ) ) {

        $displayList  = '<div id="job-location-list">';
        $displayList .= '<h4>' . esc_html__( $atts['title'] ) . '</h4>';
        $displayList .= '<ul>';
        foreach( $locations as $location) {

            $displayList .= '<li class="job-location">';
            $displayList .= '<a href="' . esc_url(get_term_link( $location )) . '">';
            $displayList .= esc_html__( $location->name );
            $displayList .= '</a>';
            $displayList .= '</li>';

        }

        $displayList .= '</ul></div>';

    }

    return $displayList;
}

add_shortcode( 'job_location_list', "dwwp_job_taxonomy_list" );
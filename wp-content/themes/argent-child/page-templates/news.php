<?php

/**
* Template Name: News Page
*
* @package Argent
*/


$front_portfolio = get_theme_mod( 'argent_front_portfolio', 1 );

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php

        if ( isset( $_GET['id'] ) && get_post_type($_GET['id']) == 'news' ) {

            $newsID = $_GET['id'];

            $args = array(
                'post_type' => 'news',
                'p' => $newsID
            );

            $announcement = new WP_Query($args);

            if ($announcement->have_posts())  :

                echo '<div class="page-content">';

                while ($announcement->have_posts()) : $announcement->the_post();
                    global $post;

                    echo '<h4>' . get_the_title() . '</h4>';
                    echo '<div>' . get_the_content() . '</div>';
                endwhile;
                echo "</div>";
            endif;

        } else {

            $args = array(
                'post_type' => 'news'
            );

            $news = new WP_Query($args);


            while ($news->have_posts()) : $news->the_post();

                if ('' != get_the_content()) {

                    $title = get_the_title(); ?>

                    <div class="page-content">
                        <?php echo get_the_date() . ' - ' . sprintf('<a href="%s">%s</a>&nbsp&nbsp', esc_url($slug . '?id=' . $id), esc_html__($title)); ?>
                    </div>

                    <hr/><?php
                } ?>
            <?php endwhile; // end of the loop.
        } ?>


    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

?>
<?php
get_header(); 

if ( have_posts() ) {

    the_title();
    the_excerpt();
    the_permalink();
}

get_footer();
?>
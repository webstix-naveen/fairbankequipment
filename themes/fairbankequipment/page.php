<?php
get_header(); 

if ( have_posts() ) {

    the_title();
    the_content();
}

get_footer();
?>
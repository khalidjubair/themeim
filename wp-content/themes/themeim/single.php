<?php
/**
 * Blog Single Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themeim
 */

get_header();

while ( have_posts() ) :
	the_post();
	the_content();
endwhile; // End of the loop.

get_footer();

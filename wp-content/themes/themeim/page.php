<?php
/**
 * Theme Default Page Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themeim
 */

get_header();


while ( have_posts() ) :
	the_post();

	the_content();

endwhile;

get_footer();

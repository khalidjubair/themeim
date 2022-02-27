<?php
/**
 * Theme Search Result Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package themeim
 */

get_header();
	if ( have_posts() ) :
		?><ul><?php 
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
				?><li><?php the_title(); ?></li>
				
			<?php endwhile; ?>
		<ul>
	<?php endif;
get_footer();

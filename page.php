<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package boiler
 */

get_header(); ?>

	<section class="page_content_wrap">
	
		<article class="content">
			
			<?php if (get_field('hide_page_title')) : ?>
				<?php // Don't Show title ?>
			<?php else : ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>

				<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content', 'sections'); ?>
				
				<div class="container">	
					<?php the_content(); ?>
					
					<?php  get_template_part( 'content', 'promo'); ?>
				</div>
													
			<?php endwhile; // end of the loop. ?>
			
		</article>
				
	</section>

<?php get_footer(); ?>

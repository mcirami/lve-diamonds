<?php 
/**
*
* Template Name: Dark Background
*
* @package boiler
*
*/
get_header('dark'); ?>

	<section class="page_content_wrap">
		
		<?php get_template_part('content', 'page-hero'); ?>
		
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

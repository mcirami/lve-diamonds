<?php 
/**
*
* Template Name: Iframe Template
*
* @package boiler
*
*/
get_header('iframe'); ?>

	<section class="page_content_wrap">
				
		<article class="content">

				<?php while ( have_posts() ) : the_post(); ?>
								
				<div class="container">	
					<?php the_content(); ?>
				</div>
													
			<?php endwhile; // end of the loop. ?>
			
		</article>
				
	</section>

<?php get_footer('iframe'); ?>

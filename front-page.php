<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package boiler
 */

get_header('dark'); ?>

	<div class="home-hero">
		
		<?php get_template_part('content', 'hero'); ?>
		
	</div>	
		
	<div class="call-out-section">
		<div class="container">	
			<ul class="callouts">
				<?php if (have_rows('call_outs')) : ?>
					<?php while (have_rows('call_outs')) : the_row(); ?>
						<li>
							<?php 
								$theCat = get_sub_field('callout_link');
								$theCatImage = get_sub_field('callout_image');
								$theCatUrl = get_the_permalink($theCat->ID);
							?>
							<img class="callout_image" src="<?php echo $theCatImage['url']; ?>" />
							<h3><?php the_sub_field('callout_title'); ?></h3>
							<p><?php the_sub_field('callout_p'); ?></p>
							<a href="<?php echo $theCatUrl; ?>" class="callout_button"><?php the_sub_field('callout_button_text'); ?></a>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
	
			</ul><!-- end category_callouts -->
		</div>
	</div><!-- end of call out section -->
			
	<?php get_template_part('content', 'promo'); ?>		
 

<?php get_footer(); ?>
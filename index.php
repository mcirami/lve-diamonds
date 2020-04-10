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

get_header(); ?>

	<section class="container">
		<article class="content">
			<?php 
				$args = array(
					'post_type' => 'product',
				);
				query_posts($args);
			?>
			<?php if ( have_posts() ) : ?>
<!-- The searching text field -->
<input type="text" id="search" class="media-boxes-search" placeholder="Search By Title">
 
 
<!-- The filter bar -->
<ul class="media-boxes-filter" id="filter">
  <li><a class="selected" href="#" data-filter="*">All</a></li>
  <li><a href="#" data-filter=".category1">Category 1</a></li>
  <li><a href="#" data-filter=".category2">Category 2</a></li>
  <li><a href="#" data-filter=".category3">Category 3</a></li>
</ul>

<!-- The grid with media boxes -->
<div id="grid">
 				<?php $count=1; ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<!-- --------- MEDIA BOX MARKUP --------- -->      
				    <div class="media-box category<?php echo $count; $count++; ?>">
				    <div class="media-box-image">
				    	<?php if ($count % 2 == 0) : ?>
					    <div data-thumbnail="http://www.davidbo.dreamhosters.com/plugins/mediaBoxes/example/gallery/thumbnails/Gun%20powder.jpg"></div>
					    <div data-popup="http://www.davidbo.dreamhosters.com/plugins/mediaBoxes/example/gallery/thumbnails/Gun%20powder.jpg"></div>
					    <?php else : ?>
					    <div data-thumbnail="http://www.davidbo.dreamhosters.com/plugins/mediaBoxes/example/gallery/Blur.jpg"></div>
					    <div data-popup="http://www.davidbo.dreamhosters.com/plugins/mediaBoxes/example/gallery/Blur.jpg"></div>
					    <?php endif; ?>
					    <div class="thumbnail-overlay">
							<i class="fa fa-plus mb-open-popup"></i>
						</div>
				    </div>
				    <?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						//get_template_part( 'content', get_post_format() );
						
						//woocommerce_template_loop_product_thumbnail();
						//woocommerce_template_loop_add_to_cart();
						do_action( 'woocommerce_single_product_summary' );
						//echo do_shortcode('[yith_wcwl_add_to_wishlist]');
					?>
				    </div>
					
	
				<?php endwhile; ?>

</div>
	
				<?php boiler_content_nav( 'nav-below' ); ?>
	
			<?php else : ?>
	
				<?php get_template_part( 'no-results', 'index' ); ?>
	
			<?php endif; ?>
		</article>
				
	</section>
 

<?php get_footer(); ?>
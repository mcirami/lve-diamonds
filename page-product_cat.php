<?php 
/**
*
* Template Name: Product Category Page
*
* @package boiler
*
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
	
	<?php $pageTerm = single_cat_title( '', false ); ?>
	
	<?php get_template_part('content', 'hero'); ?>
	
			<?php
				if (get_field('category_or_occasion') === 'category') {
					$terms = get_field('select_category');
					$productCat = 'product_cat';
				} else {
					$terms = get_field('select_occasion');
					$productCat = 'occasion';
				}
			?>
			<?php 
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => $productCat,
							'field' => 'id',
							'terms' => $terms,
						),
					),
				);
				$loop = new WP_Query($args);
			?>
			<?php if ( $loop->have_posts() ) : ?>
<!-- The searching text field -->
<!-- <input type="text" id="search" class="media-boxes-search" placeholder="Search By Title"> -->

<?php get_template_part('content', 'filters'); ?>

<section class="container product_grid">
<!-- The grid with media boxes -->
<div id="grid">
	
 				<?php $count=1; ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					<?php get_template_part('content', 'mediabox'); ?>
				    	
				<?php endwhile; ?>

</div>
</section>
		
			<?php else : ?>
	
				<?php get_template_part( 'no-results', 'index' ); ?>
	
			<?php endif; ?>
				
	
	
<?php get_footer( 'shop' ); ?>
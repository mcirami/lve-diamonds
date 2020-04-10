<?php 
/**
*
* Template Name: Shop by Occasion
*
* @package boiler
*
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
	
	<?php $pageTerm = single_cat_title( '', false ); ?>
		<?php get_template_part('content', 'hero'); ?>
			<?php 
				$getTerms = get_terms('occasion');
				$terms = array();
				foreach ($getTerms as $term) {
					array_push($terms, $term->term_id);
				}

				$args = array(
					'post_type' => 'product',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'occasion',
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
				
<script>
	jQuery(document).ready(function($){
		$(window).load(function() {
			
		});
	});
</script>
	
<?php get_footer( 'shop' ); ?>
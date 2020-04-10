<?php 
/**
*
*
* @package boiler
*
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
	
	<?php $pageTerm = single_cat_title( '', false ); ?>
	<div class="container">
		<?php get_template_part('content', 'hero'); ?>
	</div>
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

<section class="filtering">
	<?php 
		$styles = get_terms('style');
		$shape = get_terms('shape');
		$pricesRange = get_terms('price');
	?>
	
	<!-- The filter bar -->
	<div class="container">
		<h1><?php echo $pageTerm; ?></h1>
		<ul class="media-boxes-filter" id="filter">
		  <?php if ($styles) : ?>
		  <li class="filter-group"><p>Style <i class="fa fa-angle-right"></i></p>
			  <ul class="sub-filters">
				  <?php foreach($styles as $styleTerm) : ?>
				  	<li><a href="#" data-filter=".<?php echo $styleTerm->slug; ?>"><?php echo $styleTerm->name; ?></a></li>
				  <?php endforeach; ?>
			  </ul>
		  </li>
		  <?php endif; ?>
		  <?php if (get_terms('shape')) : ?>
		  <li class="filter-group"><p>Shape <i class="fa fa-angle-right"></i></p>
			  <ul class="sub-filters">
				  <?php foreach($shape as $shapeTerm) : ?>
				  	<li><a href="#" data-filter=".<?php echo $shapeTerm->slug; ?>"><?php echo $shapeTerm->name; ?></a></li>
				  <?php endforeach; ?>
			  </ul>
		  </li>
		  <?php endif; ?>
		  <?php if (get_terms('price')) : ?>
		  <li class="filter-group"><p>Price <i class="fa fa-angle-right"></i></p>
			  <ul class="sub-filters">
				  <?php foreach($pricesRange as $pricesRangeTerm) : ?>
				  	<li><a href="#" data-filter=".<?php echo $pricesRangeTerm->slug; ?>"><?php echo $pricesRangeTerm->name; ?></a></li>
				  <?php endforeach; ?>
			  </ul>
		  </li>
		  <?php endif; ?>
		  <li class="filter-group"><p>Show all</p>
		  	<ul class="sub-filters always-on">
		  	<li><a class="all selected" href="#" data-filter="*">All</a></li>
		  	</ul>
		  </li>
		<!--
		  <li><a href="#" data-filter=".category1">Category 1</a></li>
		  <li><a href="#" data-filter=".category2">Category 2</a></li>
		  <li><a href="#" data-filter=".category3">Category 3</a></li>
		-->
		</ul>
	</div>
</section>
<section class="container product_grid">
<!-- The grid with media boxes -->
<div id="grid">
	
 				<?php $count=1; ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php 
						$product = get_product($loop->post);
						//add_action('woocommerce_single_product_summary', 'remove_everything_but_cart');
						$thePost = get_post();
						//$theThumbnail = wp_get_attachment_url( get_post_thumbnail_id() );
						$theThumbnail = get_field('category_image');
						$filters = '';
						$productStyle = get_the_terms($thePost->ID, 'style');
						$productShape = get_the_terms($thePost->ID, 'shape');
						$productPrice = get_the_terms($thePost->ID, 'price');

						if ($productStyle) {
							foreach ($productStyle as $styles) {
								$filters .= $styles->slug.' ';
							}
						}
						
						if ($productShape) {
							foreach ($productShape as $shapes) {
								$filters .= $shapes->slug.' ';
							}
						}
						
						if ($productPrice) {
							foreach ($productPrice as $price) {
								$filters .= $price->slug.' ';
							}
						}
						
						if ($productOccasion) {
							foreach ($productOccasion as $occasion) {
								$filters .= $occasion->slug.' ';
							}
						}
					?>
					
					<!-- --------- MEDIA BOX MARKUP --------- -->      
				     <div class="media-box <?php echo $filters; ?>">
					    <div class="media-box-image">
					    	
					    	<?php if ( get_field('category_image') ) : ?>
						    <div data-thumbnail="<?php echo $theThumbnail['sizes']['category_image']; ?>"></div>
						    <!-- <div data-popup="http://www.davidbo.dreamhosters.com/plugins/mediaBoxes/example/gallery/thumbnails/Gun%20powder.jpg"></div> -->
							<?php else : ?>
								<?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div data-thumbnail="%s" alt="Placeholder"></div>', wc_placeholder_img_src() ), $post->ID ); ?>
							<?php endif; ?>
						    <div class="thumbnail-overlay">
								<h3><?php the_title(); ?></h3>
								<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
								<div class="black_button"><a href="<?php the_permalink(); ?>">View Details</a></div>
								<div class="share custom_share_this"><span class="share_title">Share</span>
									<div class="addthis_toolbox addthis_default_style product_share_this" addthis:url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
										<a class="addthis_button_facebook"></a>
										<a class="addthis_button_twitter"></a>
										<a class="addthis_button_linkedin"></a>
										<a class="addthis_button_google_plusone_share"></a>
										<a class="addthis_button_email"></a>
										<a class="addthis_button_more"></a>
									</div>
								</div>
							</div>
					    </div>
										
				    </div>
				    	
				<?php endwhile; ?>

</div>
</section>
		
			<?php else : ?>
	
				<?php get_template_part( 'no-results', 'index' ); ?>
	
			<?php endif; ?>
				
	
	
<?php get_footer( 'shop' ); ?>
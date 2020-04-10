<?php
/**
 * @package boiler
 */
?>

<?php 
	$product = get_product($loop->post);
	//add_action('woocommerce_single_product_summary', 'remove_everything_but_cart');
	$thePost = get_post();
	//$theThumbnail = wp_get_attachment_url( get_post_thumbnail_id() );
	$theThumbnail = get_field('category_image');
	$filters = '';
	$productStyle = get_the_terms($thePost->ID, 'product_cat');
	$productShape = get_the_terms($thePost->ID, 'shape');
	$productPrice = get_the_terms($thePost->ID, 'price');
	$productOccasion = get_the_terms($thePost->ID, 'occasion');
	
	if (is_array($productStyle)) {
		foreach ($productStyle as $styles) {
			$filters .= $styles->slug.' ';
		}
	}
	
	if (is_array($productShape)) {
		foreach ($productShape as $shapes) {
			$filters .= $shapes->slug.' ';
		}
	}
	
	if (is_array($productPrice)) {
		foreach ($productPrice as $price) {
			$filters .= $price->slug.' ';
		}
	}
	
	if (is_array($productOccasion)) {
		foreach ($productOccasion as $occasion) {
			$filters .= $occasion->slug.' ';
		}
	}
?>

<!-- --------- MEDIA BOX MARKUP --------- -->      
<div class="media-box <?php echo $filters; ?>">
    <div class="media-box-image">
    	<?php if ( get_field('category_image') ) : ?>
	    <div data-thumbnail="<?php echo $theThumbnail['sizes']['category_image']; ?>" title="<?php echo get_the_title($thePost->ID); ?>"></div>
	    <!-- <div data-popup="http://www.davidbo.dreamhosters.com/plugins/mediaBoxes/example/gallery/thumbnails/Gun%20powder.jpg"></div> -->
		<?php else : ?>
			<?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div data-thumbnail="%s" alt="Placeholder"></div>', wc_placeholder_img_src() ), $post->ID ); ?>
		<?php endif; ?>
	    <div class="thumbnail-overlay">
	    	<!-- <div class="close_btn">x</div> -->
			<h3><?php the_title(); ?></h3>
			<?php echo substr(apply_filters( 'woocommerce_short_description', $post->post_excerpt ), 0, 150); ?>
			<div class="blue_button"><a href="<?php the_permalink(); ?>">View Details</a></div>
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
	
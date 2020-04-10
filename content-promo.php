<?php
/**
 * @package boiler
 */
?>


	<?php if (get_field('show_store_locator') === true) : ?>
		<?php $showStoreImage = get_field('find_a_store_background_image', 'options'); ?>
		<div class="store_locator_section" style="background-image: url('<?php echo $showStoreImage['url']; ?>');">
			<div class="container">
				<?php if ( get_field( 'find_a_store_title', 'options') ) : ?>
					<section class="store_locator_area">
						<div class="store_locator_content">
							<h2><?php the_field('find_a_store_title', 'options'); ?></h2>
							<?php the_field('find_a_store_content', 'options'); ?>
							<?php
								$link = get_field('store_internal_link', 'options');
							?>
							<div class="blue_button"><a href="<?php echo $link; ?>"><?php the_field('store_internal_link_copy', 'options'); ?></a></div>
						</div>
					</section><!-- end promotion_area -->
				<?php endif; ?>
			</div>
		</div>
	<?php endif; // ene of show store locator section ?>
	

	<?php if (get_field('show_promo') === true) : ?>
	
		<?php if ( get_field( 'promo_title', 'options') ) : ?>		
			<section class="promotional_area">
				<h2><?php the_field('promo_title', 'options'); ?></h2>
				<p><?php the_field('promo_copy'); ?></p>
				<?php $promoImage = get_field('promo_image', 'options'); ?>
				<img src="<?php echo $promoImage['url']; ?>" alt="<?php echo $promoImage['alt']; ?>" />
				<?php
					$linkType = get_field('promo_link_type', 'options');
					if ($linkType === 'internal') {
						$link = get_field('internal_link', 'options');
					} else {
						$link = get_field('external_link', 'options');
					}
				?>
				<div class="black_button"><a href="<?php echo $link; ?>"><?php the_field('link_copy', 'options'); ?></a></div>
			</section><!-- end promotion_area -->
		<?php endif; ?>
		
	<?php endif; ?>
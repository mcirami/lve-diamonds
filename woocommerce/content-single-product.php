<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 //do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<?php 
	$regular = get_post_meta($post->ID, '_regular_price', true);
?> 
<section itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="product_images">
			<?php
				/**
				 * woocommerce_before_single_product_summary hook
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
			?>
			<div class="hover_info">
				<p>+ Hover over image to zoom</p>
			</div>
		</div>
		<div class="product_info">
			
			<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				 
				<div class="product_price">
					<p>Price: $<?php echo $regular; ?> MSRP</p>
				</div>
				<?php add_action('remove_everything_but_cart', 'woocommerce_single_product_summary'); ?>
				<?php do_action( 'woocommerce_single_product_summary' ); ?>

			<p><a class="more_from" href="<?php the_field('more_from'); ?>"><?php the_field('more_from_text'); ?></a></p>
		</div>
	</div>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</section><!-- #product-<?php the_ID(); ?> -->
<?php if (get_field('related_products')) : ?>
<section class="related_products">  
	<div class="container">
		<h2>Matching Jewelry</h2>
		<div class="related_product">
		<?php $related = get_field('related_products'); ?>  
			<?php foreach( $related as $item ) : ?>
				<?php if ($item->post_status === 'publish') : ?>
				<div class="related_products_container">
					<div class="img_container">
						<?php $theThumbnail = get_field('category_image', $item->ID); ?>
						<a href="<?php echo get_the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><img class="related_prod_img" src="<?php echo $theThumbnail['url']; ?>"></a>
					</div>
			 		<!-- <?php echo get_the_post_thumbnail($item->ID, 'thumbnail'); ?> -->
					<p class="related_title"><a href="<?php echo get_the_permalink($item->ID); ?>" title="<?php echo $item->post_title; ?>"><?php echo $item->post_title; ?></a></p>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<img src="<?php bloginfo('template_url'); ?>/images/divider.png" alt="" />	
	</div>
</section>
<?php endif; ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>


<?php get_template_part( 'content', 'promo'); ?>

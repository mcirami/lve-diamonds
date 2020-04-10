<?php
/**
 * @package boiler
 */
?>

<?php if (is_archive()) {
	$termBySlug = get_term_by('slug', $term, $taxonomy);
	$termId = $termBySlug->term_id;
	$fieldId = $taxonomy.'_'.$termId;
} else {
	$fieldId = $post->ID;
} ?>

<?php if ( have_rows('hero', $fieldId) ) : ?>

	<div class="hero_slides">
		<ul class="heroes">
			<?php while ( have_rows('hero', $fieldId) ) : the_row(); ?>
			
				<?php if (get_row_layout() === 'image_right') : ?>
					
					<?php $heroImage = get_sub_field('hero_image'); ?>
					<li class="hero_right" style="background-image: url('<?php echo $heroImage['url']; ?>');">
						<div class="hero_copy <?php if(get_sub_field('center_copy')) { echo 'center_copy'; }; ?>" >
							<h2><?php the_sub_field('title'); ?></h2>
							<?php the_sub_field('copy'); ?>
							<a class="hero_cta" href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_copy'); ?></a>
						</div><!-- end hero_copy -->
					</li>
				
				<?php elseif (get_row_layout() === 'image_left') : ?>
				
					<?php $heroImage = get_sub_field('hero_image'); ?>
					<li class="hero_left" style="background-image: url('<?php echo $heroImage['url']; ?>');">
						<div class="hero_copy <?php if(get_sub_field('center_copy')) { echo 'center_copy'; }; ?>" >
							<h2><?php the_sub_field('title'); ?></h2>
							<?php the_sub_field('copy'); ?>
							<a class="hero_cta" href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_copy'); ?></a>
						</div><!-- end hero_copy -->
					</li>
					
				<?php elseif (get_row_layout() === 'video_left') : ?>
					
					<li class="hero_video_wrap">
						<div class="hero_copy video_copy">
							<h2><?php the_sub_field('title'); ?></h2>
							<?php the_sub_field('copy'); ?>
							<a class="hero_cta" href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_copy'); ?></a>
						</div><!-- end hero_copy -->
						
						<div class="hero_video">
							<?php echo apply_filters('the_content', get_sub_field('hero_video')); ?>
						</div>
					</li>
					
				<?php elseif (get_row_layout() === 'video_right') : ?>
					
					<li class="hero_right">
						<div class="hero_copy">
							<h2><?php the_sub_field('title'); ?></h2>
							<?php the_sub_field('copy'); ?>
							<a class="hero_cta" href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_copy'); ?></a>
						</div><!-- end hero_copy -->
						
						<div class="hero_image">
							<div class="hero_video"
								<?php echo apply_filters('the_content', get_sub_field('hero_video')); ?>
							</div>
						</div><!-- end hero_image -->
					</li>
				
				<?php endif; ?>
				
			<?php endwhile; ?>
	
		</ul>
	</div>
	
<?php endif; ?>
	
<?php
/**
 * @package boiler
 */
?>
<?php $sectionNum = 0; ?>
<?php while(has_sub_field('template_sections')) : ?>

	<?php 
		$numColumns = get_sub_field('number_columns');
		$customClass = get_sub_field('custom_class');
		$anchor 	= 'id="'.get_sub_field('anchor').'"';
		$bgColor	= get_sub_field('background_color');
		if (get_sub_field('custom_bg')) {
			$customBg	= 'background-color: '.get_sub_field('custom_bg').';';
		} else {
			$customBg	= '';
		}
		if (get_sub_field('image_layout') == 'full_image') {
			if (get_sub_field('background_image')) {
				$bgImage	= get_sub_field('background_image');
				$bgImageStr	= "background-image: url('".$bgImage['url']."')";
			} else {
				$bgImageStr = '';
			}
		}
		$textColor	= get_sub_field('text_color');
		$paddingTop = 'padding-top: '.get_sub_field('padding_top').'px;';
		$paddingBot = 'padding-bottom: '.get_sub_field('padding_bottom').'px;';
		
		$class 		= $bgColor.' '.$textColor.' '.$customClass;
		$style 		= 'style="'.$paddingTop.' '.$paddingBot.' '.$customBg.' '.$bgImageStr.'"';
	?>
	
	<?php if (get_row_layout() == 'column_section') : ?>
	
		<section <?php echo $anchor; ?> class="column_section section_<?php echo $sectionNum; ?> <?php echo $class; ?>" <?php echo $style; ?>>
		
			<div class="container">
			
			<?php if (get_sub_field('section_heading')) : ?>
				<div class="section_heading">
					<h2><?php the_sub_field('section_heading'); ?></h2>
				</div>
			<?php endif; ?>
				
				<article class="<?php echo $numColumns; ?>">
					
					<?php while (has_sub_field('columns')) : ?>
						<div class="column">
							<?php the_sub_field('column'); ?>
						</div>
					<?php endwhile; ?>
					
				</article><!-- end columns -->
				
			</div><!-- end container -->
			
		</section><!-- end column_section -->
		
	<?php elseif (get_row_layout() == 'graphic_section') : ?>
	
		<section <?php echo $anchor; ?> class="graphic_section section_<?php echo $sectionNum; ?> <?php echo $class; ?>" <?php echo $style; ?>>
		
			<div class="container">
			
			<?php if (get_sub_field('image_layout') == 'full_image') : ?>
				<div class="full_image">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
				<?php if (get_sub_field('section_heading')) : ?>
					<div class="section_heading <?php the_sub_field('copy_layout'); ?>">
						<h2><?php the_sub_field('section_heading'); ?></h2>
					</div>
				<?php endif; ?>
				
				<article class="graphic_copy <?php the_sub_field('copy_layout'); ?>">
						
					<?php the_sub_field('graphic_copy'); ?>
					
				</article><!-- end graphic_copy -->
			
			<?php else : ?>
			
				<?php 
					if (get_sub_field('image_layout') == 'image_left') {
						$push = 'push_right';
					} 
				?>
				
				<article class="graphic_copy side_image <?php echo $push; ?>">
					
					<?php if (get_sub_field('section_heading')) : ?>
						<div class="section_heading <?php the_sub_field('image_layout'); ?>">
							<h2><?php the_sub_field('section_heading'); ?></h2>
						</div>
					<?php endif; ?>
										
					<?php the_sub_field('graphic_copy'); ?>
					
				</article><!-- end graphic_copy -->
				
				<div class="side_image">
					<?php if (get_sub_field('side_background_image')) : ?>
						<?php $image = get_sub_field('side_background_image'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div><!-- end graphic_image -->

				
			<?php endif; ?>
			
			</div><!-- end container -->
			
		</section><!-- end graphic_section -->
		
	<?php elseif (get_row_layout() == 'video_section') : ?>
	
		<?php $vidImg = get_sub_field('video_placeholder'); ?>
		
		<section class="video_section">

			<div class="video_content">
				<article class="video">
					<section class="blackout" style="min-height: <?php the_sub_field('video_height'); ?>px;">
						<a class="close_btn" href="#">X</a>
					</section>
					<div class="container">
						<div id="video_pop" class="hero_video">
						<?php 
							$videoUrl = get_sub_field('video_url');
							$video = apply_filters('the_content', $videoUrl); 
						?>
						<?php echo $video; ?>
						</div>
					</div><!-- end container -->
				</article>
			</div><!-- end video_content -->
		</section><!-- end video_section -->
		
	<?php endif; ?>
	<?php $sectionNum++; ?>
<?php endwhile; ?>
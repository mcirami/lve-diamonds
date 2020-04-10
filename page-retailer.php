<?php 
/**
*
* Template Name: Retailer 
*
* @package boiler
*
*/
 
 
get_header(); ?>

<?php $currentUser = wp_get_current_user(); ?>

<?php if (is_user_logged_in() ) : ?>
	<?php if (current_user_can('retailer_downloads')) : ?>
	<section class="page_content_wrap">
	
		<article class="container">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<h1 class="retail_title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php if (get_field('show_download_all')) : ?>
					<div class="download_all">
						<?php $downloadAll = get_field('download_all'); ?>
						<h3>Download all materials at one time</h3>
						
						<div class="download_all_item">
							<a class="download_all_link" href="<?php echo $downloadAll['url']; ?>"><i class="fa fa-download"></i></a>
							<div class="download_all_text">
								<h4><?php the_field('all_title'); ?></h4>
								<p><?php the_field('all_description'); ?></p>
							</div>
						</div>
						<div class="download_trouble">
							<?php the_field('all_trouble'); ?>
						</div>
					</div>
				<?php else : ?>
					<div class="download_all">
						
						<div class="download_trouble">
							<?php the_field('all_trouble'); ?>
						</div>
					</div>
				<?php endif; ?>		
					
				<div class="retail_download">
					
					<?php if( have_rows('retailer_downloads') ): ?>
					
						<ul class="retail_section">
						
							<?php while ( have_rows('retailer_downloads') ) : the_row(); ?>
							
						        <?php if( get_row_layout() == 'download_section' ): ?>
						
						        	<li>
							        	<h2><?php the_sub_field('section_heading'); ?></h2>
							        	<ul class="sections_downloads">
								        	<?php if (have_rows('downloads')) : ?>
								        		<?php while (have_rows('downloads')) : the_row(); ?>
								        			<?php 
								        				$downloadThumb = get_sub_field('download_thumbnail');
								        				$downloadFile = get_sub_field('download_file');
								        			?>
													<li class="download_item">
														<?php if ($downloadThumb) : ?>
											        	<div class="thumbnail_image"><img src="<?php echo $downloadThumb['sizes']['download']; ?>" alt="<?php echo $downloadThumb['alt']; ?>" /></div>
											        	<?php endif; ?>
											        	<div class="file_description">
												        	<h3><?php the_sub_field('download_name'); ?></h3>
												        	<div><?php the_sub_field('download_description'); ?></div>
											        	</div>
											        	<div class="download_icon"><a href="<?php echo $downloadFile['url']; ?>"><i class="fa fa-download"></i></a></div>
										        	</li>
								        		<?php endwhile; ?>
								        	<?php endif; ?>
							        	</ul>
						        	</li>		
						
						        <?php endif; ?>
							
							<?php endwhile; ?>
						    
					<?php else : ?>

						</ul>
						
					<?php endif; ?>
					
					<?php  get_template_part( 'content', 'promo'); ?>
				</div>
													
			<?php endwhile; // end of the loop. ?>
			
		</article>
				
	</section>
	<?php else : ?>
	<section class="page_content_wrap">
	
		<article class="container">

			<h3>You do not have permission to access this page.</h3>
			
		</article>
				
	</section>
	<?php endif; ?>
<?php else : ?>
<section class="gray_bg">
	<div class="container">
		<div class="retail_login">
	 		<div class="retail_container">
		 		<h1>Retailer Login</h1>
		 			<?php the_field('retailer_login_description'); ?> 
		 	
					 	<?php 
							$args = array(
						        'echo'           => true,
						        'redirect'       => get_permalink(), 
						        'form_id'        => 'construction',
						        'label_username' => __( 'Username' ),
						        'label_password' => __( 'Password' ),
						        'label_remember' => __( 'Remember Me' ),
						        'label_log_in'   => __( 'Log In' ),
						        'id_username'    => 'user_login',
						        'id_password'    => 'user_pass',
						        'id_remember'    => 'rememberme',
						        'id_submit'      => 'wp-submit',
						        'remember'       => true,
						        'value_username' => NULL,
						        'value_remember' => false
							);
							wp_login_form( $args );
						?>						
					<p><a href="/my-account" title="Sign Up">SIGN UP</a></p>
					<p><a href="/my-account/lost-password/" title="Forgot your password?">FORGOT YOUR PASSWORD?</a></p>
	 		</div>
	 	</div> 
	</div>
</section>
	<section class="container">
		<?php get_template_part( 'content', 'promo'); ?>
	</section>
 
<?php endif; ?>

<?php get_footer(); ?>
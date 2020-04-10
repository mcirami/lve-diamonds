<?php 
/**
*
* Template Name: Login 
*
* @package boiler
*
*/
 
 
get_header(); ?>

<section class="gray_bg">
	<div class="container">
		<div class="retail_login">
	 		<div class="retail_container">
		 		<h1>Retailer Login</h1>
		 			<?php the_field('retailer_login_description'); ?> 
		 	
					 	<?php 
							$args = array(
						        'echo'           => true,
						        'redirect'       => site_url( '/retailer-downloads' ), 
						        'form_id'        => 'loginform',
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
					<?php 
						$url = site_url( '/my-account' );
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
 
 
 
<?php get_footer(); ?>
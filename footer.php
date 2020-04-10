<?php
/**
 * The template for displaying the footer.
 *
 * @package boiler
 */
?>
	</div><!-- end content_wrapper -->
</div><!-- page_wrap -->
	<footer id="global_footer" class="site_footer">
		<div class="container">
			<div class="menu_wrap">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer_menu' ) ); ?>
			</div>
			<div class="form_wrap">
				<?php gravity_form(1, true, false, false, '', true); ?>
			</div>
		</div>
		<div class="footer_bottom">
			<hr>
			<div class="container">
				<ul>
					<li><a href="<?php the_field('terms_conditions', 'options'); ?>">Terms &amp; Conditions</a></li>
					<li><a href="<?php the_field('privacy_policy','options'); ?>">Privacy Policy</a></li>
					<li><a href="<?php the_field('retailer_login', 'options'); ?>">Retailer Login</a></li>
					<li class="copywrite_text">&copy; <?php the_time('Y'); ?> Schachter &amp; Co. LVE, <img class="copyright-logo" src="<?php bloginfo('template_url'); ?>/images/lve-infinity.png" />, live love, Schachter &amp; Co. are trademarks exclusively licensed to Schachter &amp; Co.</li>
				</ul>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
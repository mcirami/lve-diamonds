<?php 
/**
*
* Template Name: Locator 
*
* @package boiler
*
*/
 
 
get_header(); ?>

	<section class="container">
	
		<article class="content locator-pg">
			
			<h1><?php the_title(); ?></h1>

				<?php while ( have_posts() ) : the_post(); ?>
			
					<?php the_content(); ?>
						
				<?php endwhile; // end of the loop. ?>
			
		</article>
				
	</section>
	
<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		function locatorUrl() {
			var pathname = window.location;
			var pathSearch = pathname.search;
			if (pathSearch.indexOf('?addressInput') > -1) {
				var zip = pathSearch.split("?addressInput=").pop().split("&").shift();
				var address = zip.replace(/%20/g, ' ');
				console.log(address);
				$('#addressInput').attr('value', address);
			}
		}
		
		locatorUrl();
		
	});
</script>

<?php get_footer(); ?>
<?php
/**
 * @package boiler
 */
?>
<?php global $terms; ?>

<?php if (is_page(196)) : // Shop by Occasion Page ?>

<section class="filtering">
	<?php 
		$engage = get_term_by('slug', 'engagement-rings', 'product_cat');
		$wed = get_term_by('slug', 'wedding-bands', 'product_cat');
		$earring = get_term_by('slug', 'earrings', 'product_cat');
		$pendant = get_term_by('slug', 'pendants', 'product_cat');
		$styleArgs = array(
			'include' => array($engage->term_id, $wed->term_id, $earring->term_id, $pendant->term_id),
		);
		$styles = get_terms('product_cat', $styleArgs);
		$shape = get_terms('shape');
		$type = get_terms('product_cat');
		$occasions = get_terms('occasion');
	?>
	<!-- The filter bar -->
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<ul class="media-boxes-filter" id="filter">
		  <?php if (get_terms('occasion') && (is_page(196))) : // only show on occasion page?>
		  <li class="filter-group occasion-filter open"><p>Occasion <i class="fa fa-angle-down"></i></p>
			  <ul class="sub-filters">
				  <?php foreach($occasions as $occasionType) : ?>
				  	<li><a href="#" data-filter=".<?php echo $occasionType->slug; ?>"><?php echo $occasionType->name; ?></a></li>
				  <?php endforeach; ?>
			  </ul>
		  </li>
		  <?php endif; ?>
		  <?php if (get_terms('shape')) : // make sure it only shows on Engagement Rings ?>
		  <li class="filter-group open"><p>Shape <i class="fa fa-angle-down"></i></p>
			  <ul class="sub-filters">
				  <?php foreach($shape as $shapeTerm) : ?>
				  	<li><a href="#" data-filter=".<?php echo $shapeTerm->slug; ?>"><?php echo $shapeTerm->name; ?></a></li>
				  <?php endforeach; ?>
			  </ul>
		  </li>
		  <?php endif; ?>
		  <?php if ($styles) : ?>
		  <li class="filter-group open"><p>Type <i class="fa fa-angle-down"></i></p>
			  <ul class="sub-filters">
				  <?php foreach($styles as $styleTerm) : ?>
				  	<li><a href="#" data-filter=".<?php echo $styleTerm->slug; ?>"><?php echo $styleTerm->name; ?></a></li>
				  <?php endforeach; ?>
			  </ul>
		  </li>
		  <?php endif; ?>
		  <li class="filter-group open"><p>Show all</p>
		  	<ul class="sub-filters always-on">
		  		<li><a class="all selected" href="#" data-filter="*">All</a></li>
		  	</ul>
		  </li>
		</ul>
	</div>
</section>

<?php else : ?>

<section class="filtering">
	<?php 
		$styleArgs = array(
			'child_of' => $terms[0],
		);
		$styles = get_terms('product_cat', $styleArgs);
		$shape = get_terms('shape');
		$type = get_terms('product_cat');
	?>
	<!-- The filter bar -->
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<ul class="media-boxes-filter" id="filter">
		  <?php if ($styles && get_field('show_style')) : ?>
		  <?php if (is_page(157)) {
			  $text = "Type";
		  } else {
			  $text = "Style";
		  } ?>
		  <li class="filter-group open"><p><?php echo $text; ?> <i class="fa fa-angle-down"></i></p>
			  <ul class="sub-filters">
				  <?php foreach($styles as $styleTerm) : ?>
				  	<li><a href="#" data-filter=".<?php echo $styleTerm->slug; ?>"><?php echo $styleTerm->name; ?></a></li>
				  <?php endforeach; ?>
			  </ul>
		  </li>
		  <?php endif; ?>
		  <?php if (get_terms('shape') && get_field('show_shape')) : // make sure it only shows on Engagement Rings ?>
		  <li class="filter-group open"><p>Shape <i class="fa fa-angle-down"></i></p>
			  <ul class="sub-filters">
				  <?php foreach($shape as $shapeTerm) : ?>
				  	<li><a href="#" data-filter=".<?php echo $shapeTerm->slug; ?>"><?php echo $shapeTerm->name; ?></a></li>
				  <?php endforeach; ?>
			  </ul>
		  </li>
		  <?php endif; ?>
		  <li class="filter-group open"><p>Show all</p>
		  	<ul class="sub-filters always-on">
		  		<li><a class="all selected" href="#" data-filter="*">All</a></li>
		  	</ul>
		  </li>
		</ul>
	</div>
</section>

<?php endif; ?>
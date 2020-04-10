<?php
/**
 * The Header for our theme.
 *
 * @package boiler
 */

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 dark_html" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 dark_html" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 dark_html" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js dark_html" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
<script type="text/javascript" src="http://google.com/maps/api/js?sensor=false&#038;language=en&#038;ver=4.1.18"></script>
<?php wp_head(); ?>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,200,100|Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53f7813a00198b87"></script>

</head>

<body <?php body_class('dark_background'); ?>>
	<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
<div class="page_wrap">
	<header class="global_header">
		<div class="container-960">
			<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" alt="LVE Diamonds" rel="home"><img src="<?php bloginfo('template_url'); ?>/images/logo-dark.png" alt="Discover LVE" /></a>
				<nav class="secondary_navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'secondary_menu' ) ); // remember to assign a menu in the admin to remove the container div ?>
				</nav>
				<div class="where_to_buy">
						<form>
							<label>Where to Buy</label>
							<input class="js-input_zip" type="text" placeholder="Zip or City, State" />
							<input class="js-enter_zip" type="submit" name="submit" />
						</form>
				</div><!-- end where_to_buy -->
			</div>
			<nav class="primary_navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'header_menu' ) ); // remember to assign a menu in the admin to remove the container div ?>
			</nav>
		</div>
		<div class="tracking_script">
			<?php $tracking = get_field('tracking'); // tracking tag ?>
			<?php echo $tracking; ?>
		</div>
	</header>
	
	<header id="mobile-menu" class="show-on-mobile">
		<div>
			<nav role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'mobile_menu' ) ); // remember to assign a menu in the admin to remove the container div ?>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'mobile_secondary_menu' ) ); // remember to assign a menu in the admin to remove the container div ?>
				<div class="where_to_buy">
					<form>
						<label>Where to Buy</label>
						<input class="js-input_zip" type="text" placeholder="Zip or City, State" />
						<input class="js-enter_zip" type="submit" name="submit" />
					</form>
				</div><!-- end where_to_buy -->
			</nav>
		</div>
	</header>
	
	<div class="content_wrapper">
		<div class="mobile-header show-on-mobile">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php $logo = get_field('logo_dark', 'options'); ?>
					<?php if ($logo) : ?>
						<img src="<?php echo $logo['url']; ?>" alt="Discover LVE" />
					<?php else : ?>
						<img src="<?php bloginfo('template_url'); ?>/images/logo-dark.png" alt="Discover LVE" />
					<?php endif; ?>
				</a>
			</div>
			<a class="dark-mobile-menu-button" href="#mobile-menu"></a>
		</div>
		<div class="addthis_wrapper">
			<div class="share_text"><div><span>Share</span></div></div>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<div class="addthis_custom_sharing"></div>
		</div>
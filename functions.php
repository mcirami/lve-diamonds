<?php
/**
 * boiler functions and definitions
 *
 * @package boiler
 */

if ( ! function_exists( 'boiler_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function boiler_setup() {

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'boiler' ),
	) );
	register_nav_menus( array(
		'secondary' => __( 'Secondary Menu', 'boiler' ),
	) );
	register_nav_menus( array(
		'footer' => __( 'Footer Menu', 'boiler' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // boiler_setup
add_action( 'after_setup_theme', 'boiler_setup' );

// add parent class to menu items 
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'parent-item'; 
		}
	}
	
	return $items;
}


	
/* remove some of the header bloat */

// EditURI link
remove_action( 'wp_head', 'rsd_link' );
// windows live writer
remove_action( 'wp_head', 'wlwmanifest_link' );
// index link
remove_action( 'wp_head', 'index_rel_link' );
// previous link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
// WP version
remove_action( 'wp_head', 'wp_generator' );

// remove pesky injected css for recent comments widget
add_filter( 'wp_head', 'boiler_remove_wp_widget_recent_comments_style', 1 );
// clean up comment styles in the head
add_action('wp_head', 'boiler_remove_recent_comments_style', 1);
// clean up gallery output in wp
add_filter('gallery_style', 'boiler_gallery_style');

// Thumbnail image sizes
// add_image_size( 'thumb-400', 400, 400, true );

// remove injected CSS for recent comments widget
function boiler_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function boiler_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function boiler_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function boiler_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'boiler' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'boiler_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function boiler_scripts_styles() {
	// Styles
	// style.css just initializes the theme. This is compiled from /sass
	
	//wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/vendor/flexslider.css');
	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/css/vendor/jquery.mmenu.all.css');
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style( 'mediaBoxes', get_template_directory_uri() . '/css/mediaBoxes.css');
	
	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/css/vendor/jquery.mmenu.all.css');
	
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css');
	
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css');
	
	// Scripts
	wp_enqueue_script( 'jquery' , array(), '', true );
	
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'), '', true );

	wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/vendor/jquery.mmenu.min.all.js', array(), '', true );
	
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js', array(), '', true );
	// Begin mediaBoxes Scripts
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/mediaboxes/jquery.isotope.min.js', array(), '', true );
	wp_enqueue_script( 'imagesLoaded', get_template_directory_uri() . '/js/mediaboxes/jquery.imagesLoaded.min.js', array(), '', true );
	wp_enqueue_script( 'transit', get_template_directory_uri() . '/js/mediaboxes/jquery.transit.min.js', array(), '', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/mediaboxes/jquery.easing.js', array(), '', true );
	wp_enqueue_script( 'modernizrCustom', get_template_directory_uri() . '/js/mediaboxes/modernizr.custom.min.js', array(), '', true );
	wp_enqueue_script( 'magnific', get_template_directory_uri() . '/js/mediaboxes/jquery.magnific-popup.min.js', array(), '', true );
	wp_enqueue_script( 'mediaBoxes', get_template_directory_uri() . '/js/mediaboxes/jquery.mediaBoxes.js', array(), '', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/mediaboxes/waypoints.min.js', array(), '', true );
	// End mediaBoxes scripts
	wp_enqueue_script( 'boiler-concat', get_template_directory_uri() . '/js/built.min.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'boiler_scripts_styles' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sections Custom Fields
 */
require get_template_directory() . '/inc/sections.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Post Types
 */
require get_template_directory() . '/inc/post-types.php';

// Auto wrap embeds with video container to make video responsive
function wrap_embed_with_div($html, $url, $attr) {
     return '<div class="video_container">' . $html . '</div>';
}

add_filter( 'excerpt_length', 'prod_shortdesc_product_custom_excerpt_length', 999 );
function prod_shortdesc_product_custom_excerpt_length( $length ) {
	global $post;
	if ($post->post_type == 'product') {
		return 150;
	}
}

add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);

// customize embed settings
function custom_youtube_settings($code){
	if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
		$videoId = getStringBetween($code, 'http://www.youtube.com/embed/', '?feature=oembed');
		return str_replace('?feature=oembed', '?feature=oembed&rel=0&?wmode=transparent&iv_load_policy=3&showinfo=0&vq=hd1080&controls=0&autoplay=1&loop=1&playlist='.$videoId.'', $code );
	}
	return $code;
}

add_filter('embed_handler_html', 'custom_youtube_settings');
add_filter('embed_oembed_html', 'custom_youtube_settings');

function getStringBetween($content, $start, $end) {
	$r = explode($start, $content);
	if (isset($r[1])) {
		$r = explode($end, $r[1]);
		return $r[0];
	}
	return '';
}


add_theme_support( 'woocommerce' );

function remove_everything_but_cart() {
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
}
// This is to resize the thumbnail images
if ( function_exists('add_image_size') ) { 
	add_image_size( 'thumbnail', 293, 244, true );
	add_image_size('category_image', 400, 400, false);
	add_image_size('download', 200, 200, true);
}

// Add options pages to ACF Pro
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Promotional Area');
}

if( function_exists('acf_add_options_page') ) {
 
	acf_add_options_page();
	acf_add_options_page('Logos');
}

function add_my_custom_code_to_head( $slidedeck, $preview ){
    // you can apply styles to a specific deck by wrapping your styles in a PHP conditional
    // this code only will be output if your SlideDeck ID is 571
    // you can get your SlideDeck ID from the Manage Page in your WordPress admin
    
    if( $slidedeck['id'] == 68 ){ 
    	
        echo '<style type="text/css">
            #SlideDeck-68-frame dt.spine_1.sd2-spine-title-color, #SlideDeck-68-frame dt.spine_3.sd2-spine-title-color, #SlideDeck-68-frame dt.spine_5.sd2-spine-title-color, #SlideDeck-68-frame dt.spine_7.sd2-spine-title-color, #SlideDeck-68-frame dt.spine_9.sd2-spine-title-color {
				background: rgb(50,50,50); /* Old browsers */
				background: -moz-linear-gradient(left,  rgba(50,50,50,1) 0%, rgba(12,12,12,1) 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(50,50,50,1)), color-stop(100%,rgba(12,12,12,1))); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(left,  rgba(50,50,50,1) 0%,rgba(12,12,12,1) 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(left,  rgba(50,50,50,1) 0%,rgba(12,12,12,1) 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(left,  rgba(50,50,50,1) 0%,rgba(12,12,12,1) 100%); /* IE10+ */
				background: linear-gradient(to right,  rgba(50,50,50,1) 0%,rgba(12,12,12,1) 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#323232", endColorstr="#0c0c0c",GradientType=1 ); /* IE6-9 */
			}
			
			#SlideDeck-68-frame dt.spine_2.sd2-spine-title-color, #SlideDeck-68-frame dt.spine_4.sd2-spine-title-color, #SlideDeck-68-frame dt.spine_6.sd2-spine-title-color, #SlideDeck-68-frame dt.spine_8.sd2-spine-title-color, #SlideDeck-68-frame dt.spine_10.sd2-spine-title-color {
				background: rgb(12,12,12); /* Old browsers */
				background: -moz-linear-gradient(left, rgba(12,12,12,1) 0%, rgba(50,50,50,1) 100%); /* FF3.6+ */
				background: -webkit-gradient(linear\, left top\, right top\, color-stop(0%\,rgba(12,12,12,1))\, color-stop(100%\,rgba(50,50,50,1))); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(left, rgba(12,12,12,1) 0%,rgba(50,50,50,1) 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(left, rgba(12,12,12,1) 0%,rgba(50,50,50,1) 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(left, rgba(12,12,12,1) 0%,rgba(50,50,50,1) 100%); /* IE10+ */
				background: linear-gradient(to right, rgba(12,12,12,1) 0%,rgba(50,50,50,1) 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#0c0c0c", endColorstr="#323232",GradientType=1 ); /* IE6-9 */
			}
        </style>';
     }
}
 
add_action( 'slidedeck_iframe_header', 'add_my_custom_code_to_head', 10, 2);

function reg_page ( $register_url ) { 
	// This allows users to go to a register page when they need to sign up for the site
	return home_url() . '/register/';
}
add_filter( 'register_url', 'reg_page' );

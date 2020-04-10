<?php 

/*
add_action( 'init', 'product_style' );

function product_style() {
	register_taxonomy(
		'style',
		'product',
		array(
			'label' => __( 'Style' ),
			'rewrite' => array( 'slug' => 'style' ),
			'hierarchical' => true,
			'query_var'  => true,
		)
	);
}
*/

/*
add_action( 'init', 'product_metal' );

function product_metal() {
	register_taxonomy(
		'metal',
		'product',
		array(
			'label' => __( 'Metal' ),
			'rewrite' => array( 'slug' => 'metal' ),
			'hierarchical' => true,
			'query_var'  => true,
			'has_archive' => false,
		)
	);
}
*/

add_action( 'init', 'product_shape' );

function product_shape() {
	register_taxonomy(
		'shape',
		'product',
		array(
			'label' => __( 'Shape' ),
			'rewrite' => array( 'slug' => 'shape' ),
			'hierarchical' => true,
			'query_var'  => true,
			'has_archive' => false,
		)
	);
}

add_action( 'init', 'product_occasion' );

function product_occasion() {
	register_taxonomy(
		'occasion',
		'product',
		array(
			'label' => __( 'Occasion' ),
			'rewrite' => array( 'slug' => 'occasion' ),
			'hierarchical' => true,
			'query_var'  => true,
			'has_archive' => false,
		)
	);
}

/*
add_action( 'init', 'product_price' );

function product_price() {
	register_taxonomy(
		'price',
		'product',
		array(
			'label' => __( 'Price Range' ),
			'rewrite' => array( 'slug' => 'price' ),
			'hierarchical' => true,
			'query_var'  => true,
			'has_archive' => false,
		)
	);
}
*/

?>
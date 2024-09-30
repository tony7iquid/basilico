<?php

$uri = get_template_directory_uri() . '/inc/admin/demo-data/demo-imgs/';
$pxl_server_info = apply_filters( 'pxl_server_info', ['demo_url' => ''] ) ;
// Demos
$demos = array(
	// Elementor Demos
	'basilico-main' => array(
		'title'       => 'Main',
		'description' => '',
		'screenshot'  => $uri . 'main.jpg',
		'preview'     => $pxl_server_info['demo_url'] . 'main',
	),
	'basilico-luxury' => array(
		'title'       => 'Luxury',
		'description' => '',
		'screenshot'  => $uri . 'luxury.jpg',
		'preview'     => $pxl_server_info['demo_url'] . 'luxury',
	),
	'basilico-coffee' => array(
		'title'       => 'Coffee',
		'description' => '',
		'screenshot'  => $uri . 'coffee.jpg',
		'preview'     => $pxl_server_info['demo_url'] . 'coffee',
	),
	'basilico-pizza' => array(
		'title'       => 'Pizza',
		'description' => '',
		'screenshot'  => $uri . 'pizza.jpg',
		'preview'     => $pxl_server_info['demo_url'] . 'pizza',
	),
	'basilico-fastfood' => array(
		'title'       => 'Fastfood',
		'description' => '',
		'screenshot'  => $uri . 'fastfood.jpg',
		'preview'     => $pxl_server_info['demo_url'] . 'fastfood',
	),
);
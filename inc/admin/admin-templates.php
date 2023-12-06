<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Basilico_Admin_Templates extends Basilico_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'basilico' ),
		    esc_html__( 'Templates', 'basilico' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Basilico_Admin_Templates;

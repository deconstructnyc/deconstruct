<?php 
	if(function_exists('register_nav_menus')){
		register_nav_menus( array('primary' => 'Header Navigation'));
	}
	add_theme_support( 'post-thumbnails' );
?>
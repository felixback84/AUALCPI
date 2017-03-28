<?php
/*
		===================================
		Includes Style and Js
		===================================
	*/
	
	function aualcpiTheme_script_enqueue () {
		//css
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' , 'all' );
		wp_enqueue_style( 'customstyleBoostrap', get_template_directory_uri() . '/css/bootstrap.vertical-tabs.min.css', array(), '1.0.0' , 'all' );
		wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/aualcpithemestyle.css', array(), '1.0.0' , 'all' );

		//js
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
		wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/aualcpithemejavascript.js', array(), '1.0.0', true );
	}
	
add_action( 'wp_enqueue_scripts', 'aualcpiTheme_script_enqueue' );

/*
		===================================
		Admin enqueue function
		===================================
	*/
function aualcpiTheme_load_admin_scripts(){
	wp_enqueue_media();
	wp_register_script( 'aualcpi_admin_js', get_template_directory_uri() . '/js/aualcpi.admin.js',array('jquery'),'1.0.0',true);
	wp_enqueue_script( 'aualcpi_admin_js');
}
add_action('admin_enqueue_scripts','aualcpiTheme_load_admin_scripts');
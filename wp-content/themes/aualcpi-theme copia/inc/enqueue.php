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

function events_styles() {
    global $post_type;
    if( 'investigacion' != $post_type )
        return;
    wp_enqueue_style('ui-datepicker', get_template_directory_uri() . '/css/jquery-ui-1.8.9.custom.css');
}
 
function events_scripts() {
    global $post_type;
    if( 'investigacion' != $post_type )
        return;
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'));
    wp_enqueue_script('ui-datepicker', get_template_directory_uri() . '/js/jquery.ui.datepicker.js');
    wp_enqueue_script('custom_script', get_template_directory_uri().'/js/pubforce-admin.js', array('jquery'));
}
 
add_action( 'admin_print_styles-post.php', 'events_styles', 1000 );
add_action( 'admin_print_styles-post-new.php', 'events_styles', 1000 );
 
add_action( 'admin_print_scripts-post.php', 'events_scripts', 1000 );
add_action( 'admin_print_scripts-post-new.php', 'events_scripts', 1000 );
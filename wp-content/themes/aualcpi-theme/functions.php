<?php
	
	/*
		===================================
		Includes Style and Js
		===================================
		
		
	*/
	
	function aualcpiTheme_script_enqueue () {
		
		
		//css
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' , 'all' );
		wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/myfirstheme.css', array(), '1.0.0' , 'all' );
		
		//js
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
		wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/myfirstheme.js', array(), '1.0.0', true );
	}
	
add_action( 'wp_enqueue_scripts', 'aualcpiTheme_script_enqueue' );

	/*
		===================================
		Custom Type
		===================================
	*/

function noticias_custom_post(){
	$labels = array(
		'name' => 'Investigación',
		'Singlular' => 'Investigación',
		'add_new' => 'Añadir investigación',
		'all_items' => 'Todos las investigaciones',
		'add_new_item' => 'Nueva investigación',
		'edit_item' => 'Editar investigación',
		'new_item' => 'Nueva investigación',
		'view_item' => 'Ver investigación',
		'search_item' => 'Buscar investigación',
		'not_found' => 'No se encuentra la investigación',
		'not_found_in_trash' => 'No se encuentra la investigación',
		'parent_item_colon' => 'Articulo principal'
		
	);
	
	$args = array(
		'labels' => $labels,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'supports' => array(
			'title',
			'editor',
			'autor',
			'thumbnail',
			'comments'
			
		),
		
		'menu_position' => 5,
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'exclude_from_search' => true
		
	);
	register_post_type( 'investigacion', $args );
}

add_action( 'init', 'noticias_custom_post' );

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
<?php
	
	/*
		===================================
		Includes Style and Js
		===================================
		
		
	*/
	
	function aualcpiTheme_script_enqueue () {
		
		
		//css
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' , 'all' );
		wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/aualcpithemestyle.css', array(), '1.0.0' , 'all' );
		
		//js
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
		//wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/myfirstheme.js', array(), '1.0.0', true );
	}
	
add_action( 'wp_enqueue_scripts', 'aualcpiTheme_script_enqueue' );



add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5',array('search-form'));

	/*
		===================================
		Activate menus Front End
		===================================
		
		
	*/

function aualcpiTheme_setup () {
	
		add_theme_support('menus');
		register_nav_menu('primary', 'Header navigation' );
		register_nav_menu('email', 'Header navigation email' );
		register_nav_menu('secondary', 'Footer navigation' );
		register_nav_menu('tertiary','Additional header menu');		
}		
	
	/*
		===================================
		Activate menus CMS
		===================================
		
		
	*/
add_action( 'init', 'aualcpiTheme_setup');

	/*
		===================================
		Custom Type
		===================================
	*/

	/*
		===================================
		Investigacion
		===================================
	*/

function investigacion_custom_post(){
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
	/*
		===================================
		Beca
		===================================
	*/

function beca_custom_post(){
	$labels = array(
		'name' => 'Becas',
		'Singlular' => 'Beca',
		'add_new' => 'Añadir beca',
		'all_items' => 'Todos las becas',
		'add_new_item' => 'Nueva beca',
		'edit_item' => 'Editar beca',
		'new_item' => 'Nueva beca',
		'view_item' => 'Ver beca',
		'search_item' => 'Buscar beca',
		'not_found' => 'No se encuentra la beca',
		'not_found_in_trash' => 'No se encuentra la beca',
		'parent_item_colon' => 'Articulo principal'

		// 'name'                  => _x( 'Becas', 'Post Type General Name', 'text_domain' ),
		// 'singular_name'         => _x( 'Beca', 'Post Type Singular Name', 'text_domain' ),
		// 'menu_name'             => __( 'Post Types', 'text_domain' ),
		// 'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		// 'archives'              => __( 'Item Archives', 'text_domain' ),
		// 'attributes'            => __( 'Item Attributes', 'text_domain' ),
		// 'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		// 'all_items'             => __( 'All Items', 'text_domain' ),
		// 'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		// 'add_new'               => __( 'Add New', 'text_domain' ),
		// 'new_item'              => __( 'New Item', 'text_domain' ),
		// 'edit_item'             => __( 'Edit Item', 'text_domain' ),
		// 'update_item'           => __( 'Update Item', 'text_domain' ),
		// 'view_item'             => __( 'View Item', 'text_domain' ),
		// 'view_items'            => __( 'View Items', 'text_domain' ),
		// 'search_items'          => __( 'Search Item', 'text_domain' ),
		// 'not_found'             => __( 'Not found', 'text_domain' ),
		// 'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		// 'featured_image'        => __( 'Featured Image', 'text_domain' ),
		// 'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		// 'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		// 'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		// 'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		// 'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		// 'items_list'            => __( 'Items list', 'text_domain' ),
		// 'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		// 'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		
	);
	
	$args = array(
		'labels' => $labels,
		'query_var' => true,
		'rewrite' => true,
		'supports'              => array( ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'becas', $args );
}

/*
		===================================
		Publicacion
		===================================
	*/

function publicacion_custom_post(){
	$labels = array(
		'name' => 'Publicaciones',
		'Singlular' => 'Publicación',
		'add_new' => 'Añadir publicacion',
		'all_items' => 'Todos las becas',
		'add_new_item' => 'Nueva publicacion',
		'edit_item' => 'Editar publicacion',
		'new_item' => 'Nueva publicacion',
		'view_item' => 'Ver publicacion',
		'search_item' => 'Buscar publicacion',
		'not_found' => 'No se encuentra la publicacion',
		'not_found_in_trash' => 'No se encuentra la publicacion',
		'parent_item_colon' => 'Articulo principal'
		
	);
	
	$args = array(
		'labels' => $labels,
		'query_var' => true,
		'rewrite' => true,
		'supports'              => array( ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'publicacion', $args );
}

add_action( 'init', 'investigacion_custom_post' );
add_action( 'init', 'beca_custom_post' );
add_action( 'init', 'publicacion_custom_post' );

/*
		===================================
		Call menu
		===================================
	*/

require get_template_directory().'/inc/walker.php';


/*
		===================================
		Widgets
		===================================
*/
// function aualcpiTheme_Search_widget_setup () {
// 	register_sidebar(
// 		array(			
// 			'name' => 'Search',
// 			'id' => 'sidebar-1',
// 			'class'         => 'custom',
// 		    'description'   => 'Sidebar for search',
// 			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</aside>',
// 			'before_title'  => '<h1 class="widget-title">',
// 			'after_title'   => '</h1>',
// 			)
// 	);
// }
	
// add_action ('widgets_init', 'aualcpiTheme_Search_widget_setup');
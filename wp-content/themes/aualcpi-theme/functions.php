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
		wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/aualcpithemejavascript.js', array(), '1.0.0', true );
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
			'comments',
			'custom-fields'
		),
		
		'menu_position' => 5,
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
		'menu_icon'           	=> 'dashicons-media-document',
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
	);
	
	$args = array(
		'labels' => $labels,
		'query_var' => true,
		'rewrite' => true,
		'supports' => array(
			'title',
			'editor',
			'autor',
			'comments',
			'custom-fields',
			'thumbnail'
		),
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
		'menu_icon'          	=> 'dashicons-welcome-learn-more',
		'capability_type'       => 'post',
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
		'all_items' => 'Todos las publicaciones',
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
		'supports' => array(
			'title',
			'editor',
			'autor',
			'thumbnail',
			'comments',
			'custom-fields'
		),
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
		'menu_icon'           	=> 'dashicons-format-aside',
		'capability_type'       => 'post',
	);
	register_post_type( 'publicacion', $args );
}

/*
		===================================
		Slider Home
		===================================
*/

// function slider_home_custom_post(){
// 	$labels = array(
// 		'name' => 'Slider',
// 		'Singlular' => 'Publicación',
// 		'add_new' => 'Añadir publicacion',
// 		'all_items' => 'Todos las publicaciones',
// 		'add_new_item' => 'Nueva publicacion',
// 		'edit_item' => 'Editar publicacion',
// 		'new_item' => 'Nueva publicacion',
// 		'view_item' => 'Ver publicacion',
// 		'search_item' => 'Buscar publicacion',
// 		'not_found' => 'No se encuentra la publicacion',
// 		'not_found_in_trash' => 'No se encuentra la publicacion',
// 		'parent_item_colon' => 'Articulo principal'
		
// 	);
	
// 	$args = array(
// 		'labels' => $labels,
// 		'query_var' => true,
// 		'rewrite' => true,
// 		'supports'              => array( ),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 7,
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'can_export'            => true,
// 		'has_archive'           => true,		
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
// 		'menu_icon'           	=> 'dashicons-format-aside',
// 		'capability_type'       => 'post',
// 	);
// 	register_post_type( 'publicacion', $args );
// }

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

/*
		===================================
		taxonomies - Becas
		===================================
*/

function awesome_custom_taxonomies_categorias() {
	
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Categorias',
		'singular_name' => 'Categoria',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Categorias'
	);
	
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'categoria' )
	);

	register_taxonomy('categoria', array('becas'), $args);

}	
add_action( 'init' , 'awesome_custom_taxonomies_categorias');



function awesome_custom_taxonomies_tipo_beca() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Tipos becas',
		'singular_name' => 'Tipo beca',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Tipo becas'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'becas' )
	);
	register_taxonomy('becas', array('becas'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_tipo_beca');


function awesome_custom_taxonomies_pais_ciudad() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Paises / Ciudades',
		'singular_name' => 'Pais / Ciudad',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Paises / Ciudades'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'ciudad_becas' )
	);
	register_taxonomy('ciudad_becas', array('becas'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_pais_ciudad');

function awesome_custom_taxonomies_becas_tag() {
	//add new taxonomy no hierarchical
	$labels = array(
		'name' => 'Tags',
		'singular_name' => 'Tag',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Tags'
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag_becas' )
	);
	register_taxonomy('tag_becas', array('becas'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_becas_tag');

/*
		===================================
		taxonomies - Investigaciones
		===================================
*/

function awesome_custom_taxonomies_areas() {
	
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Areas de Conocimiento',
		'singular_name' => 'Area de Conocimiento',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Areas de Conocimiento'
	);
	
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'areas' )
	);

	register_taxonomy('areas', array('investigacion'), $args);

}	
add_action( 'init' , 'awesome_custom_taxonomies_areas');

function awesome_custom_taxonomies_universidades() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Universidades',
		'singular_name' => 'Universidad',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Universidades'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'universidades' )
	);
	register_taxonomy('universidades', array('investigacion'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_universidades');


function awesome_custom_taxonomies_status() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Status',
		'singular_name' => 'Status',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Status'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'status' )
	);
	register_taxonomy('status', array('investigacion'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_status');

function awesome_custom_taxonomies_pais_ciudad_investigacion() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Paises / Ciudades',
		'singular_name' => 'Pais / Ciudad',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Paises / Ciudades'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'ciudad_investigacion' )
	);
	register_taxonomy('ciudad_investigacion', array('investigacion'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_pais_ciudad_investigacion');

function awesome_custom_taxonomies_investigacion_tag() {
	//add new taxonomy no hierarchical
	$labels = array(
		'name' => 'Tags',
		'singular_name' => 'Tag',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Tags'
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag_investigacion' )
	);
	register_taxonomy('tag_investigacion', array('investigacion'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_investigacion_tag');

/*
		===================================
		taxonomies - publicaciones
		===================================
*/

function awesome_custom_taxonomies_categoria_conocimiento() {
	
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Categorias del conocimiento',
		'singular_name' => 'Categoria del conocimiento',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Categorias del conocimiento'
	);
	
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'categoria_conocimiento' )
	);

	register_taxonomy('categoria_conocimiento', array('publicacion'), $args);

}	
add_action( 'init' , 'awesome_custom_taxonomies_categoria_conocimiento');



function awesome_custom_taxonomies_tipo_publicaciones() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Tipo publicaciones',
		'singular_name' => 'Tipo publicación',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Tipo publicaciones'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tipo_publicaciones' )
	);
	register_taxonomy('tipo_publicaciones', array('publicacion'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_tipo_publicaciones');


function awesome_custom_taxonomies_publicaciones_tag() {
	//add new taxonomy no hierarchical
	$labels = array(
		'name' => 'Tags',
		'singular_name' => 'Tag',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Tags'
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag_publicaciones' )
	);
	register_taxonomy('tag_publicaciones', array('publicacion'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_publicaciones_tag');

// function wpdocs_register_meta_boxes() {
//     add_meta_box( 'meta-box-id', 'metabox', 'wpdocs_my_display_callback', 'post' );
// }
// add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

/*
		===================================
		postThumbnails
		===================================
*/

if (class_exists('MultiPostThumbnails')) {

new MultiPostThumbnails(array(
'label' => 'Logo de universidad ',
'id' => 'secondary-image',
'post_type' => 'investigacion'
 ) );

 }


/*
		===================================
		functions
		===================================
*/

 function mostrarCategorias($lista,$division){
	$i=0;
		foreach ($lista as $term) {
				$i++;
				if($i>1){ echo ' '.$division.' ';}
				echo $term->name;
		}
}

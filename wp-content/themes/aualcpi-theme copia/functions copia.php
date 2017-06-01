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

/*
		===================================
		Slider Home
		===================================
*/
function aualcpiTheme_Noticias_widget_setup () {
	register_sidebar(
		array(			
			'name' => 'Noticias',
			'id' => 'sidebar-1',
			'class'         => 'custom',
		    'description'   => 'Sidebar for search',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			)
	);
}
	
add_action ('widgets_init', 'aualcpiTheme_Noticias_widget_setup');

function aualcpiTheme_Investigacion_widget_setup () {
	register_sidebar(
		array(			
			'name' => 'Investigaciones',
			'id' => 'sidebar-2',
			'class'         => 'custom',
		    'description'   => 'Sidebar for search',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			)
	);
}
	
add_action ('widgets_init', 'aualcpiTheme_Investigacion_widget_setup');

function aualcpiTheme_Becas_widget_setup () {
	register_sidebar(
		array(			
			'name' => 'Becas',
			'id' => 'sidebar-3',
			'class'         => 'custom',
		    'description'   => 'Sidebar for search',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			)
	);
}
	
add_action ('widgets_init', 'aualcpiTheme_Becas_widget_setup');


function aualcpiTheme_Publicaciones_widget_setup () {
	register_sidebar(
		array(			
			'name' => 'Publicaciones',
			'id' => 'sidebar-4',
			'class'         => 'custom',
		    'description'   => 'Sidebar for search',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
			)
	);
}
	
add_action ('widgets_init', 'aualcpiTheme_Publicaciones_widget_setup');
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



function awesome_custom_taxonomies_tipo_becas() {
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
		'rewrite' => array( 'slug' => 'tipo_beca' )
	);
	register_taxonomy('tipo_beca', array('becas'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_tipo_becas');


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

function awesome_custom_taxonomies_cantidad_becas() {
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Cantidad becas',
		'singular_name' => 'Cantidad beca',
		'search_items' => 'Search Types',
		'all_items' => 'All Types',
		'parent_item' => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item' => 'Edit Type',
		'update_item' => 'Update Type',
		'add_new_item' => 'Add New Work Type',
		'new_item_name' => 'New Type Name',
		'menu_name' => 'Cantidad becas'
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'cantidad_becas' )
	);
	register_taxonomy('cantidad_becas', array('becas'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_cantidad_becas');

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
		'rewrite' => array( 'slug' => 'universidades_investigacion' )
	);
	register_taxonomy('universidades_investigacion', array('investigacion'), $args);
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
		'rewrite' => array( 'slug' => 'status_investigacion' )
	);
	register_taxonomy('status_investigacion', array('investigacion'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_status');

function awesome_custom_taxonomies_pais_ciudad_investigaciones() {
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
		'rewrite' => array( 'slug' => 'ciudad_investigaciones' )
	);
	register_taxonomy('ciudad_investigaciones', array('investigacion'), $args);
}

add_action( 'init' , 'awesome_custom_taxonomies_pais_ciudad_investigaciones');

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
		functions term function
		===================================
*/

 function mostrarCategorias($lista,$division){
	$i=0;
	$imprimir='';
		foreach ($lista as $term) {
				$i++;
				if($i>1){ $imprimir.= $division.' ';}
				$imprimir.= '<a href="'.get_term_link($term).'" >'.$term->name.'</a>';
		}
	return $imprimir;
}

/*
array(2) { 
[0]=> object(WP_Term)#3706 (10) 
	{ ["term_id"]=> int(73) ["name"]=> string(7) "Bolivia" ["slug"]=> string(7) "bolivia" ["term_group"]=> int(0) ["term_taxonomy_id"]=> int(73) ["taxonomy"]=> string(12) "ciudad_becas" ["description"]=> string(0) "" ["parent"]=> int(0) ["count"]=> int(1) ["filter"]=> string(3) "raw" } 
[1]=> object(WP_Term)#3710 (10) 
	{ ["term_id"]=> int(74) ["name"]=> string(6) "La Paz" ["slug"]=> string(6) "la-paz" ["term_group"]=> int(0) ["term_taxonomy_id"]=> int(74) ["taxonomy"]=> string(12) "ciudad_becas" ["description"]=> string(0) "" ["parent"]=> int(73) ["count"]=> int(1) ["filter"]=> string(3) "raw" } }
*/

// determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}

// so once you have this function you can just loop over the results returned by wp_get_object_terms

function project_get_item_classes($taxonomy, $results = 1) {
    // get terms for current post
    $terms = wp_get_object_terms( get_the_ID(), 'work_type' );
    // set vars
    $top_parent_terms = array();
    foreach ( $terms as $term ) {
        //get top level parent
        $top_parent = get_term_top_most_parent( $term->term_id, 'work_type' );
        //check if you have it in your array to only add it once
        if ( !in_array( $top_parent, $top_parent_terms ) ) {
            $top_parent_terms[] = $top_parent;
        }
    }
    // build output (the HTML is up to you)

    foreach ( $top_parent_terms as $term ) {
        echo " " . $term->slug;
    }
}

// /**
//  * This function adds a meta box with a callback function of my_metabox_callback()
//  */
// function add_wpdocs_meta_box() {
//     $var1 = 'this';
//     $var2 = 'that';
//     add_meta_box(
//         'metabox_id','Metabox Title',
//         'wpdocs_metabox_callback',
//         'page',
//         'normal',
//         'low',
//         array( 'foo' => $var1, 'bar' => $var2 )
//     );
// }
 
// /**
//  * Get post meta in a callback
//  *
//  * @param WP_Post $post    The current post.
//  * @param array   $metabox With metabox id, title, callback, and args elements.
//  */
 
// function wpdocs_metabox_callback( $post, $metabox ) {
//     // Output last time the post was modified.
//     echo 'Last Modified: ' . $post->post_modified;
 
//     // Output 'this'.
//     echo $metabox['args']['foo'];
 
//     // Output 'that'.
//     echo $metabox['args']['bar'];
 
//     // Output value of custom field.
//     echo get_post_meta( $post->ID, 'wpdocs_custom_field', true );
// }

// class links_investigacion {

// 	public function __construct() {

// 		if ( is_admin() ) {
// 			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
// 			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
// 		}

// 	}

// 	public function init_metabox() {

// 		add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
// 		add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

// 	}

// 	public function add_metabox() {

// 		add_meta_box(
// 			'links-investigaciones',
// 			'Link de las investigaciones',
// 			array( $this, 'render_metabox' ),
// 			'investigacion',
// 			'normal'
// 		);

// 	}

// 	public function render_metabox( $post ) {

// 		// Add nonce for security and authentication.
// 		wp_nonce_field( 'car_nonce_action', 'car_nonce' );

// 		// Retrieve an existing value from the database.
// 		$investigacionLink = get_post_meta( $post->ID, 'investigacionLink', true );

// 		// Set default values.
// 		if( empty( $investigacionLink ) ) $investigacionLink = '';

// 		// Form fields.
// 		echo '<table class="form-table">';
// 		echo '	<tr>';
// 		echo '		<th><label for="investigacionLink" class="investigacionLink_label">' . 'Name' . '</label></th>';
// 		echo '		<td>';
// 		echo '			<input type="text" id="investigacionLink" name="investigacionLink" class="investigacionLink_field" value="' . esc_attr__( $investigacionLink ) . '">';
// 		echo '			<p class="description">' . 'Seller full name.'. '</p>';
// 		echo '		</td>';
// 		echo '	</tr>';
// 		echo '</table>';

// 	}

// 	public function save_metabox( $post_id, $post ) {

// 		// Add nonce for security and authentication.
// 		$nonce_name   = $_POST['car_nonce'];
// 		$nonce_action = 'car_nonce_action';

// 		// Check if a nonce is set.
// 		if ( ! isset( $nonce_name ) )
// 			return;

// 		// Check if a nonce is valid.
// 		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
// 			return;

// 		// Check if the user has permissions to save data.
// 		if ( ! current_user_can( 'edit_post', $post_id ) )
// 			return;

// 		// Check if it's not an autosave.
// 		if ( wp_is_post_autosave( $post_id ) )
// 			return;

// 		// Check if it's not a revision.
// 		if ( wp_is_post_revision( $post_id ) )
// 			return;

// 		// Sanitize user input.
// 		$new_investigacionLink = isset( $_POST[ 'investigacionLink' ] ) ? sanitize_text_field( $_POST[ 'investigacionLink' ] ) : '';

// 		// Update the meta field in the database.
// 		update_post_meta( $post_id, 'investigacionLink', $new_investigacionLink );

// 	}


// }

// new links_investigacion;
<?php

	
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

new MultiPostThumbnails(array(
'label' => 'Imagen destacada 2',
'id' => 'segunda-image-contribution',
'post_type' => 'contribuciones'
 ) );

new MultiPostThumbnails(array(
'label' => 'Imagen destacada 3',
'id' => 'tercera-image-contribution',
'post_type' => 'contribuciones'
 ) );


 }

 //-traer imagen destacada 2 y 3 de contricuciones
 function urlImagenMultiPostThumbnailsContribuciones($idMultiPostThumbnails,$idPost)
 {
 $custom = MultiPostThumbnails::get_post_thumbnail_id('contribuciones', $idMultiPostThumbnails, $idPost); 
	$custom=wp_get_attachment_image_src($custom,$idMultiPostThumbnails); 
	return $custom[0];
 }

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
		'name' => 'Retos',
		'Singlular' => 'Retos',
		'add_new' => 'Añadir reto',
		'all_items' => 'Todos las investigaciones',
		'add_new_item' => 'Nueva reto',
		'edit_item' => 'Editar reto',
		'new_item' => 'Nueva reto',
		'view_item' => 'Ver reto',
		'search_item' => 'Buscar reto',
		'not_found' => 'No se encuentra la reto',
		'not_found_in_trash' => 'No se encuentra la reto',
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
			'page-attributes'
		),
		
		'menu_position' => 9,
		'hierarchical'          => true,
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
		'capability_type' => array('post_investigacion','post_investigaciones'),
		'map_meta_cap' => true
		
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
			'thumbnail'
		),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
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
		'name' => 'Descargas',
		'Singlular' => 'Descarga',
		'add_new' => 'Añadir descarga',
		'all_items' => 'Todos las descargas',
		'add_new_item' => 'Nueva descarga',
		'edit_item' => 'Editar descarga',
		'new_item' => 'Nueva descarga',
		'view_item' => 'Ver descarga',
		'search_item' => 'Buscar descarga',
		'not_found' => 'No se encuentra la descarga',
		'not_found_in_trash' => 'No se encuentra la descarga',
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
			'comments'
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
		'show_admin_column' 	=> true,
		'menu_icon'           	=> 'dashicons-format-aside',
		'capability_type'       => 'post',

	);
	register_post_type( 'publicacion', $args );
}
/*
		===================================
		contribuciones
		===================================
	*/

function contribuciones_custom_post(){
	$labels = array(
        "name" => "Contribuciones",
        "singular_name" => "Contribucion",
        'add_new' => 'Añadir Contribucion',
		'all_items' => 'Todos las Contribuciones',
		'add_new_item' => 'Nueva Contribucion',
		'edit_item' => 'Editar Contribucion',
		'new_item' => 'Nueva Contribucion',
		'view_item' => 'Ver Contribucion',
		'search_item' => 'Buscar Contribucion',
		'not_found' => 'No se encuentra la Contribucion',
		'not_found_in_trash' => 'No se encuentra la Contribucion',
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
		),
		
		'menu_position' => 26,
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
		'menu_icon'  => 'dashicons-nametag',
		'capability_type' => array('post_contribucion','post_contribuciones'),
		'map_meta_cap' => true
    );

    register_post_type( "contribuciones", $args );
}

add_action( 'init', 'contribuciones_custom_post' );
add_action( 'init', 'investigacion_custom_post' );
add_action( 'init', 'beca_custom_post' );
add_action( 'init', 'publicacion_custom_post' );
/*
		===================================
		taxonomies - Becas
		===================================
*/

function aualcpi_custom_taxonomies_categorias() {
	
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
		'rewrite' => array( 'slug' => 'categoria' ),
	);

	register_taxonomy('categoria', array('becas'), $args);

}	
add_action( 'init' , 'aualcpi_custom_taxonomies_categorias');

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

function aualcpi_custom_taxonomies_investigaciones_areas() {
	
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
		'rewrite' => array( 'slug' => 'areas' ),
		'capabilities' => array(
	        'manage_terms' => 'manage_areas',
	        'edit_terms' => 'manage_areas',
	        'delete_terms' => 'manage_areas',
	        'assign_terms' => 'read'
	    ), 
	);

	register_taxonomy('areas', array('investigacion','user'), $args);
}
add_action( 'init' , 'aualcpi_custom_taxonomies_investigaciones_areas');
//flush_rewrite_rules();
function aualcpi_custom_taxonomies_investigaciones_universidades() {
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
		'rewrite' => array( 'slug' => 'universidades_investigacion' ),
		'capabilities' => array(
	        'manage_terms' => 'manage_investigacion',
	        'edit_terms' => 'manage_investigacion',
	        'delete_terms' => 'manage_investigacion',
	        'assign_terms' => 'read'
	    ), 
	);
	register_taxonomy('universidades_investigacion', array('investigacion'), $args);
}	
add_action( 'init' , 'aualcpi_custom_taxonomies_investigaciones_universidades');
flush_rewrite_rules();
function aualcpi_custom_taxonomies_investigaciones_status() {
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
		'rewrite' => array( 'slug' => 'status_inves' ),
		'capabilities' => array(
	        'manage_terms' => 'manage_investigacion',
	        'edit_terms' => 'manage_investigacion',
	        'delete_terms' => 'manage_investigacion',
	        'assign_terms' => 'read'
	    ), 
	);
	register_taxonomy('status_inves', array('investigacion'), $args);
}	
add_action( 'init' , 'aualcpi_custom_taxonomies_investigaciones_status');
flush_rewrite_rules();
function aualcpi_custom_taxonomies_investigaciones_ciudad() {
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
		'rewrite' => array( 'slug' => 'ciudad_investigaciones' ),
		'capabilities' => array(
	        'manage_terms' => 'manage_investigacion',
	        'edit_terms' => 'manage_investigacion',
	        'delete_terms' => 'manage_investigacion',
	        'assign_terms' => 'read'
	    ), 
	);
	register_taxonomy('ciudad_investigaciones', array('investigacion'), $args);
}	
add_action( 'init' , 'aualcpi_custom_taxonomies_investigaciones_ciudad');
flush_rewrite_rules();
function aualcpi_custom_taxonomies_investigaciones_tag() {
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
		'rewrite' => array( 'slug' => 'tag_investigacion' ),
		'capabilities' => array(
	        'manage_terms' => 'manage_investigacion',
	        'edit_terms' => 'manage_investigacion',
	        'delete_terms' => 'manage_investigacion',
	        'assign_terms' => 'read'
	    ), 
	);
	register_taxonomy('tag_investigacion', array('investigacion'), $args);

}	
add_action( 'init' , 'aualcpi_custom_taxonomies_investigaciones_tag');
flush_rewrite_rules();
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

/*
		===================================
		meta box - investigacion 
		===================================
*/
function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');

function add_custom_meta_boxes() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_attachment',
        'Archivos de la investigacion',
        'wp_custom_attachment',
        'investigacion',
        'side'
    );
 
} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'add_custom_meta_boxes');

function wp_custom_attachment() { 
	global $post;
	//echo $post->ID;
	$files = get_post_meta( $post->ID, 'investigacion_meta_files', true );
	//var_dump($files);
	$arrayFiles= explode(",",$files[0]);
	//var_dump($arrayFiles);?>
   	<label for="investigacion_meta_files">Seleccionar archivos:</label>
	<div id="investigacion_meta_files_show">
	<?php 

	if(is_array($arrayFiles)){
		foreach($arrayFiles as $file){?>
			<p><?php  echo basename($file); ?></p>
		<?php } 
		}else{ ?>
			<p><?php  echo basename($file); ?></p>
	<?php } ?>
	</div>
	<input type='button' id="upload-button-file" class="button-primary" value="Subir Archivos"/>
	<input  type="hidden" name="investigacion_meta_files[]" id="investigacion_meta_files" value="<?php echo $files[0]; ?>" class="regular-text" style="width: 200px;"/><br />
	<p class="description">Selecionar los archivos para la investigacion.</p>
<?php
} 

function save_custom_meta_data($id) {
 	global $post;
    if(!isset($_POST["investigacion_meta_files"])):
	return $post;
	endif;
	echo '<script language="javascript">alert("'.$id.'");</script>'; 
	$values = $_POST["investigacion_meta_files"];
	// foreach( $values as $value ) {
 	// add_post_meta( $post->ID, 'investigacion_meta_files', $value );
	// }
	update_post_meta($post->ID, "investigacion_meta_files",$values );
     
} // end save_custom_meta_data
add_action('save_post', 'save_custom_meta_data');


/*
		===================================
		meta box 2 - investigacion 
		===================================
*/

function add_custom_meta_boxes_informacion() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_text_investigacion',
        'Informacion de la investigacion',
        'wp_custom_text_investigacion',
        'investigacion',
        'normal'
    );
    
 
} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'add_custom_meta_boxes_informacion');

function wp_custom_text_investigacion() { 
	global $post;
	$custom = get_post_custom($post->ID);
	$RetroAlimentacion = $custom["RetroAlimentacion"][0];
	$Refinar = $custom["Refinar"][0];
	$RetroAlimentacion2 = $custom["RetroAlimentacion2"][0];
	$IdeasTop = $custom["IdeasTop"][0];
	$Impacto = $custom["Impacto"][0];
	$argsTextarea = array(
	    'textarea_rows' => 5,
	    'quicktags' => false,
	    'media_buttons' => false,
    	'tinymce' => true,
	);
	?>
			<label for="RetroAlimentacion"><h3>Informacion - Retro Alimentación</h3></label>
			<?php
				$content = $RetroAlimentacion;
				$editor_id = 'RetroAlimentacion';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>

			<label for="Refinar"><h3>Informacion - Refinar</h3></label>
			<?php
				$content = $Refinar;
				$editor_id = 'Refinar';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>

			<label for="RetroAlimentacion2"><h3>Informacion - 2 Retro Alimentacion</h3></label>
				<?php
				$content = $RetroAlimentacion2;
				$editor_id = 'RetroAlimentacion2';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
			<label for="IdeasTop"><h3>Informacion - Ideas Top</h3></label>
			<?php
				$content = $IdeasTop;
				$editor_id = 'IdeasTop';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>

			<label for="Impacto"><h3>Informacion - Impácto</h3></label>
			<?php
				$content = $Impacto;
				$editor_id = 'Impacto';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>

<?php 
}
 
add_action ('save_post', 'save_informacion_investigacion');
 
function save_informacion_investigacion(){
 
	global $post;
	//var_dump($_POST);
	// // - still require nonce
	 
	// if ( !current_user_can( 'edit_post', $post->ID ))
	//     return $post->ID;
	 
	// - convert back to unix & update post
	if(!isset($_POST["RetroAlimentacion"])):
	return $post;
	endif;
	update_post_meta($post->ID, "RetroAlimentacion",$_POST["RetroAlimentacion"] );
	 
	if(!isset($_POST["Refinar"])):
	return $post;
	endif;
	update_post_meta($post->ID, "Refinar",$_POST["Refinar"]);
	 
	if(!isset($_POST["RetroAlimentacion2"])):
	return $post;
	endif;
	update_post_meta($post->ID, "RetroAlimentacion2",$_POST["RetroAlimentacion2"]);
	 
	if(!isset($_POST["IdeasTop"])):
	return $post;
	endif;
	update_post_meta($post->ID, "IdeasTop",$_POST["IdeasTop"]);
	 
	if(!isset($_POST["Impacto"])):
	return $post;
	endif;
	update_post_meta($post->ID, "Impacto",$_POST["Impacto"]);
 
}


/*
		===================================
		meta box 3 - investigacion 
		===================================
*/

function add_custom_meta_boxes_dates() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_date_investigacion',
        'Fechas de investigacion',
        'wp_custom_date_investigacion',
        'investigacion',
        'normal'
    );
    
 
} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'add_custom_meta_boxes_dates');

function wp_custom_date_investigacion() { 
	global $post;
	$custom = get_post_custom($post->ID);
	$fechaIdeacion = $custom["investigacionFechaIdeacion"][0];
	$fechaRetroAlimentacion = $custom["investigacionFechaRetroAlimentacion"][0];
	$fechaRefinar = $custom["investigacionFechaRefinar"][0];
	$fechaRetroAlimentacion2 = $custom["investigacionFechaRetroAlimentacion2"][0];
	$fechaIdeasTop = $custom["investigacionFechaIdeasTop"][0];
	$fechaImpacto = $custom["investigacionFechaImpacto"][0];
	// - grab wp time format -
	 
	$date_format = get_option('date_format'); // Not required in my code
	$time_format = get_option('time_format');

	// - populate today if empty, 00:00 for time -
	 
	if ($fechaIdeacion == null) { $fechaIdeacion = time(); $fechaRetroAlimentacion = $fechaRefinar = $fechaRetroAlimentacion2 = $fechaIdeasTop = $fechaImpacto  = $fechaIdeacion;}
	// - convert to pretty formats -
	$clean_Ideacion = date("M d, Y", $fechaIdeacion);
	$clean_RetroAlimentacion = date("M d, Y", $fechaRetroAlimentacion);
	$clean_Refinar = date("M d, Y", $fechaRefinar);
	$clean_RetroAlimentacion2 = date("M d, Y", $fechaRetroAlimentacion2);
	$clean_IdeasTop = date("M d, Y", $fechaIdeasTop);
	$clean_Impacto = date("M d, Y", $fechaImpacto);
	// echo "fei".$fechaIdeacion;
	// echo "cle".$clean_Ideacion;
	// echo "cle".strtotime ( $clean_Ideacion);

?>
<table>
	<tr>
		<td>
			<input type="hidden" class="patch" value="<?php echo get_template_directory_uri() ?>">
			<label for="investigacionFechaIdeacion">Fecha - Ideación</label>
		</td>
		<td>
			<input type="text" name="investigacionFechaIdeacion" id="investigacionFechaIdeacion" class="tfdate" value="<?php echo $clean_Ideacion; ?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="investigacionFechaRetroAlimentacion">Fecha - Retro Alimentación</label>
		</td>
		<td>
			<input type="text" name="investigacionFechaRetroAlimentacion" id="investigacionFechaRetroAlimentacion"  class="tfdate" value="<?php echo $clean_RetroAlimentacion; ?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="investigacionFechaRefinar">Fecha - Refinar</label>
		</td>
		<td>
			<input type="text" name="investigacionFechaRefinar" id="investigacionFechaRefinar" class="tfdate" value="<?php echo $clean_Refinar; ?>">
		</td>

	</tr>
	<tr>
		<td>	
			<label for="investigacionFechaRetroAlimentacion2">Fecha - 2 Retro Alimentacion</label>
		</td>
		<td>
			<input type="text" name="investigacionFechaRetroAlimentacion2" id="investigacionFechaRetroAlimentacion2"  class="tfdate" value="<?php echo $clean_RetroAlimentacion2; ?>">
		</td>
	</tr>
	<tr>
		<td>
			<label for="investigacionFechaIdeasTop">Fecha - Ideas Top</label>
		</td>
		<td>
			<input type="text" name="investigacionFechaIdeasTop" id="investigacionFechaIdeasTop" class="tfdate" value="<?php echo $clean_IdeasTop; ?>">
		</td>
	</tr>
	<tr>
		<td>	
			<label for="investigacionFechaImpacto">Fecha - Impácto</label>
		</td>
		<td>
			<input type="text" name="investigacionFechaImpacto" id="investigacionFechaImpacto" class="tfdate" value="<?php echo $clean_Impacto; ?>">
		</td>
	</tr>
</table>
	
<?php 
}
 
add_action ('save_post', 'save_tf_events');
 
function save_tf_events(){
 
	global $post;
	//var_dump($_POST);
	// // - still require nonce
	 
	// if ( !current_user_can( 'edit_post', $post->ID ))
	//     return $post->ID;
	 
	// - convert back to unix & update post
	 
	if(!isset($_POST["investigacionFechaIdeacion"])):
	return $post;
	endif;
	$updatestartd = strtotime ( $_POST["investigacionFechaIdeacion"] );
	update_post_meta($post->ID, "investigacionFechaIdeacion", $updatestartd );
	 
	if(!isset($_POST["investigacionFechaRetroAlimentacion"])):
	return $post;
	endif;
	$updateendd = strtotime ( $_POST["investigacionFechaRetroAlimentacion"]);
	update_post_meta($post->ID, "investigacionFechaRetroAlimentacion", $updateendd );

	if(!isset($_POST["investigacionFechaRefinar"])):
	return $post;
	endif;
	$updateendd = strtotime ( $_POST["investigacionFechaRefinar"]);
	update_post_meta($post->ID, "investigacionFechaRefinar", $updateendd );

	if(!isset($_POST["investigacionFechaRetroAlimentacion2"])):
	return $post;
	endif;
	$updateendd = strtotime ( $_POST["investigacionFechaRetroAlimentacion2"]);
	update_post_meta($post->ID, "investigacionFechaRetroAlimentacion2", $updateendd );

	if(!isset($_POST["investigacionFechaIdeasTop"])):
	return $post;
	endif;
	$updateendd = strtotime ( $_POST["investigacionFechaIdeasTop"]);
	update_post_meta($post->ID, "investigacionFechaIdeasTop", $updateendd );

	if(!isset($_POST["investigacionFechaImpacto"])):
	return $post;
	endif;
	$updateendd = strtotime ( $_POST["investigacionFechaImpacto"]);
	update_post_meta($post->ID, "investigacionFechaImpacto", $updateendd );
 
}

/*
		===================================
		meta box - contribuciones
		===================================
*/

add_action('add_meta_boxes', 'add_meta_box_contribuciones');

function add_meta_box_contribuciones() {
    add_meta_box('contribucion-parent', 'Contribuciones investigacion', 'contribucion_attributes_meta_box', 'contribuciones', 'side', 'default');
}

function contribucion_attributes_meta_box($post) {
		$args =array('post_type' => 'investigacion', 'selected' => $post->post_parent, 'name' => 'parent_id', 'show_option_none' => __('(no parent)'), 'sort_column'=> 'menu_order, post_title', 'echo' => 0);
        $pages = wp_dropdown_pages($args);
        if ( ! empty($pages) ) {
            echo $pages;
        } // end empty pages check
}

/*
		===================================
		meta box 2 - contribuciones 
		===================================
*/

function add_custom_meta_boxes_contribucion_descripcion() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_text_contribucion',
        'Descripcion de la contribucion',
        'wp_custom_text_contribucion',
        'contribuciones',
        'normal'
    );
    
 
} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'add_custom_meta_boxes_contribucion_descripcion');

function wp_custom_text_contribucion() { 
	global $post;
	$custom = get_post_custom($post->ID);
	$Descripcion = $custom["Descripcion"][0];
	$argsTextarea = array(
	    'textarea_rows' => 10,
	    'quicktags' => false,
	    'media_buttons' => false,
    	'tinymce' => true,
	);

	?>
			<label for="Descripcion"><h3>Informacion:</h3></label>
			<?php
				$content = $Descripcion;
				$editor_id = 'Descripcion';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>


<?php 
}
 
add_action ('save_post', 'save_informacion_contribucion_descripcion');
 
function save_informacion_contribucion_descripcion(){
	global $post;
	//var_dump($_POST);
	// - convert back to unix & update post
	if(!isset($_POST["Descripcion"])):
	return $post;
	endif;
	update_post_meta($post->ID, "Descripcion",$_POST["Descripcion"] );
}
/*------others ------*/

/*
		===================================
		meta box - investigaciones 
		===================================
*/
//		ya esta declarada arriba 
//		function update_edit_form() {
//     echo ' enctype="multipart/form-data"';
// } // end update_edit_form
// add_action('post_edit_form_tag', 'update_edit_form');

function add_custom_meta_boxes_upload_publicacion() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_custom_attachment_upload_publicacion',
        'Archivos de la publicacion',
        'wp_custom_attachment_upload_publicacion',
        'publicacion',
        'side'
    );
 
} // end add_custom_meta_boxes_upload_publicacion
add_action('add_meta_boxes', 'add_custom_meta_boxes_upload_publicacion');

function wp_custom_attachment_upload_publicacion() { 
	global $post;
	//echo $post->ID;
	$files = get_post_meta( $post->ID, 'publicacion_meta_file', true );
	//var_dump($files);
	$arrayFiles= explode(",",$files[0]);
	//var_dump($arrayFiles);?>
   	<label for="publicacion_meta_file">Seleccionar archivos:</label>
	<div id="publicacion_meta_file_show">
	<?php 

	if(is_array($arrayFiles)){
		foreach($arrayFiles as $file){?>
			<p><?php  echo basename($file); ?></p>
		<?php } 
		}else{ ?>
			<p><?php  echo basename($file); ?></p>
	<?php } ?>
	</div>
	<input type='button' id="upload-button-file-publicacion" class="button-primary" value="Subir Archivos"/>
	<input  type="hidden" name="publicacion_meta_file[]" id="publicacion_meta_file" value="<?php echo $files[0]; ?>" class="regular-text" style="width: 200px;"/><br />
	<p class="description">Selecionar el archivo para publicacion.</p>
<?php
} 

function save_custom_meta_data_upload_publicidad($id) {
 	global $post;
    if(!isset($_POST["publicacion_meta_file"])):
	return $post;
	endif;
	echo '<script language="javascript">alert("'.$id.'");</script>'; 
	$values = $_POST["publicacion_meta_file"];
	// foreach( $values as $value ) {
 	// add_post_meta( $post->ID, 'publicacion_meta_file', $value );
	// }
	update_post_meta($post->ID, "publicacion_meta_file",$values );
     
} // end save_custom_meta_data_upload_publicidad
add_action('save_post', 'save_custom_meta_data_upload_publicidad');

/*
		===================================
		meta box - Pages
		===================================
*/

/*----- colocar meta boxes ------*/
add_action('admin_init','my_meta_init');
function my_meta_init(){
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	// checks for post/page ID
	if ($post_id == '61')
	{
	add_meta_box('my_meta_movilidad', 'Contenido de las pestañas negras', 'my_meta_movilidad', 'page', 'normal', 'high');
	}
	if ($post_id == '81')
	{
	add_meta_box('my_meta_nuestra_asociacion', 'Contenido de las pestañas negras', 'my_meta_nuestra_asociacion', 'page', 'normal', 'high');
	}
	if ($post_id == '85')
	{
	add_meta_box('my_meta_membresia', 'Contenido administrable', 'my_meta_membresia', 'page', 'normal', 'high');
	}
}

/*----- page movilidad ------*/
function my_meta_movilidad(){
 	global $post;
	$custom = get_post_custom($post->ID);
	//var_dump($custom);
	$Quienes = $custom["Quienes"][0];
	$Proceso = $custom["Proceso"][0];

	$argsTextarea = array(
	    'textarea_rows' => 10,
	    'quicktags' => false,
	    'media_buttons' => false,
    	'tinymce' => true,
	);
 ?>
<label for="Quienes"><h3>Quienes pueden aplicar a las becas</h3></label>
			<?php
				$content = $Quienes;
				$editor_id = 'Quienes';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Proceso"><h3>Proceso para aplicar a las becas</h3></label>
			<?php
				$content = $Proceso;
				$editor_id = 'Proceso';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
 <?php 
}
add_action('save_post','my_meta_movilidad_save');

function my_meta_movilidad_save(){
	global $post;
	if(isset($_POST["Quienes"])):
		update_post_meta($post->ID, "Quienes",$_POST["Quienes"] );
	endif;
	if(isset($_POST["Proceso"])):
		update_post_meta($post->ID, "Proceso",$_POST["Proceso"]);
	endif;
}

/*----- page movilidad ------*/
function my_meta_nuestra_asociacion(){
 	global $post;
	$custom = get_post_custom($post->ID);
	$Home = $custom["Home"][0];
	$Mision = $custom["Mision"][0];
	$Vision = $custom["Vision"][0];
	$UsuarioA = $custom["UsuarioA"][0];
	$UsuarioB = $custom["UsuarioB"][0];
	$UsuarioC = $custom["UsuarioC"][0];
	$UsuarioD = $custom["UsuarioD"][0];
	$UsuarioALabel = $custom["UsuarioALabel"][0];
	$UsuarioBLabel = $custom["UsuarioBLabel"][0];
	$UsuarioCLabel = $custom["UsuarioCLabel"][0];
	$UsuarioDLabel = $custom["UsuarioDLabel"][0];
	$Caja1 = $custom["Caja1"][0];
	//var_dump($UsuarioA);
	$argsTextarea = array(
	    'textarea_rows' => 10,
	    'quicktags' => false,
	    'media_buttons' => false,
    	'tinymce' => true,
	);

	$users = get_users( 'orderby=nicename&role=admin_aualcpi' );
// // Array of WP_User objects.
// foreach ( $users as $user ) {
// 	echo '<span>' . esc_html( $user->user_email ) . '</span>';
// }
?>
<label for="Home"><h3>Informacion en pestaña Home</h3></label>
			<?php
				$content = $Home;
				$editor_id = 'Home';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Mision"><h3>Informacion en pestaña Misión</h3></label>
			<?php
				$content = $Mision;
				$editor_id = 'Mision';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Vision"><h3>Informacion en pestaña Visión</h3></label>
			<?php
				$content = $Vision;
				$editor_id = 'Vision';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<div class="inside">
	

	<h3>Organigrama: Usuario 1</h3>	
	<p><label for="UsuarioALabel">Titulo tarjeta:</label>
	<input type="text" name="UsuarioALabel" value="<?php echo $UsuarioALabel; ?>"></p>
	<p><label for="UsuarioA">Seleccionar:</label>
	<select name="UsuarioA" id="input" class="form-control" required="required">';
	<option value="0">Selecionar persona</option>';
		<?php foreach ($users as $user) { ?>
			<option value="<?php echo $user->ID; ?>"  <?php if( $user->ID == $UsuarioA){ echo "selected";} ?>  ><?php echo $user->user_nicename; ?></option>
		<?php } ?>
	</select></p>
	<h4>Notas: Aqui podra selecionar un usuario con Rol Administrador Aualcpi.</h4>
	<h4>Este tambien sera el usuario que aparecera en el footer.</h4>
</div>
<div class="inside">
	<h3>Organigrama: Usuario 2</h3>	
	<p><label for="UsuarioBLabel">Titulo tarjeta:</label>
	<input type="text" name="UsuarioBLabel" value="<?php echo $UsuarioBLabel; ?>"></p>
	<p><label for="UsuarioB">Seleccionar:</label>
	<select name="UsuarioB" id="input" class="form-control" required="required">';
	<option value="0">Selecionar persona</option>';
		<?php foreach ($users as $user) { ?>
			<option value="<?php echo $user->ID; ?>"  <?php if( $user->ID == $UsuarioB){ echo "selected";} ?>  ><?php echo $user->user_nicename; ?></option>
		<?php } ?>
	</select>
	</p>
	<h4>Selecione un usuario con Rol Administrador Aualcpi.</h4>
</div>
<div class="inside">
	<h3>Organigrama: Usuario 3</h3>	
	<p><label for="UsuarioCLabel">Titulo tarjeta:</label>
	<input type="text" name="UsuarioCLabel" value="<?php echo $UsuarioCLabel; ?>"></p>
	<p><label for="UsuarioC">Seleccionar:</label>
	<select name="UsuarioC" id="input" class="form-control" required="required">';
	<option value="0">Selecionar persona</option>';
		<?php foreach ($users as $user) { ?>
			<option value="<?php echo $user->ID; ?>"  <?php if( $user->ID == $UsuarioC){ echo "selected";} ?>  ><?php echo $user->user_nicename; ?></option>
		<?php } ?>
	</select>
	<h4>Selecione un usuario con Rol Administrador Aualcpi.</h4>
</div>
<div class="inside">
	<h3>Organigrama: Usuario 4</h3>	
	<p><label for="UsuarioDLabel">Titulo tarjeta:</label>
	<input type="text" name="UsuarioDLabel" value="<?php echo $UsuarioDLabel; ?>"></p>
	<p><label for="UsuarioD">Seleccionar:</label>
	<select name="UsuarioD" id="input" class="form-control" required="required">';
	<option value="0">Selecionar persona</option>';
		<?php foreach ($users as $user) { ?>
			<option value="<?php echo $user->ID; ?>"  <?php if( $user->ID == $UsuarioD){ echo "selected";} ?>  ><?php echo $user->user_nicename; ?></option>
		<?php } ?>
	</select>
	<h4>Selecione un usuario con Rol Administrador Aualcpi.</h4>
</div>
<label for="Caja1"><h3>Caja 1</h3></label>
			<?php
				$content = $Caja1;
				$editor_id = 'Caja1';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<?php 
}
add_action('save_post','my_meta_nuestra_asociacion_save');

function my_meta_nuestra_asociacion_save(){
	global $post;
	if(isset($_POST["Home"])):
		update_post_meta($post->ID, "Home",$_POST["Home"] );
	endif;
	if(isset($_POST["Mision"])):
		update_post_meta($post->ID, "Mision",$_POST["Mision"]);
	endif;
	if(isset($_POST["Vision"])):
		update_post_meta($post->ID, "Vision",$_POST["Vision"]);
	endif;
	if(isset($_POST["UsuarioA"])):
		update_post_meta($post->ID, "UsuarioA",$_POST["UsuarioA"]);
	endif;
	if(isset($_POST["UsuarioB"])):
		update_post_meta($post->ID, "UsuarioB",$_POST["UsuarioB"]);
	endif;
	if(isset($_POST["UsuarioC"])):
		update_post_meta($post->ID, "UsuarioC",$_POST["UsuarioC"]);
	endif;
	if(isset($_POST["UsuarioD"])):
		update_post_meta($post->ID, "UsuarioD",$_POST["UsuarioD"]);
	endif;
	if(isset($_POST["UsuarioALabel"])):
		update_post_meta($post->ID, "UsuarioALabel",$_POST["UsuarioALabel"]);
	endif;
	if(isset($_POST["UsuarioBLabel"])):
		update_post_meta($post->ID, "UsuarioBLabel",$_POST["UsuarioBLabel"]);
	endif;
	if(isset($_POST["UsuarioCLabel"])):
		update_post_meta($post->ID, "UsuarioCLabel",$_POST["UsuarioCLabel"]);
	endif;
	if(isset($_POST["UsuarioDLabel"])):
		update_post_meta($post->ID, "UsuarioDLabel",$_POST["UsuarioDLabel"]);
	endif;
	if(isset($_POST["Caja1"])):
		update_post_meta($post->ID, "Caja1",$_POST["Caja1"]);
	endif;
}


/*----- page membresia ------*/
function my_meta_membresia(){
 	global $post;
	$custom = get_post_custom($post->ID);
	//var_dump($custom);
	$Caja1A = $custom["Caja1A"][0];
	$Caja1B = $custom["Caja1B"][0];
	$Caja2A = $custom["Caja2A"][0];
	$Caja2B = $custom["Caja2B"][0];
	$Estrella1 = $custom["Estrella1"][0];
	$Estrella2 = $custom["Estrella2"][0];
	$Estrella3 = $custom["Estrella3"][0];
	$Estrella4 = $custom["Estrella4"][0];

	$argsTextarea = array(
	    'textarea_rows' => 10,
	    'quicktags' => false,
	    'media_buttons' => false,
    	'tinymce' => true,
	);
 ?>
 <h1>Informacion de Caja 1</h1>
<label for="Caja1A"><h3>Contenido 1</h3></label>
			<?php
				$content = $Caja1A;
				$editor_id = 'Caja1A';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Caja1B"><h3>Contenido 2</h3></label>
			<?php
				$content = $Caja1B;
				$editor_id = 'Caja1B';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
 <h1>Informacion de Caja 2</h1>
<label for="Caja2A"><h3>Contenido 1</h3></label>
			<?php
				$content = $Caja2A;
				$editor_id = 'Caja2A';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Caja2B"><h3>Contenido 2</h3></label>
			<?php
				$content = $Caja2B;
				$editor_id = 'Caja2B';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Estrella1"><h3>Contenido cuadro estrella 1</h3></label>
			<?php
				$content = $Estrella1;
				$editor_id = 'Estrella1';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Estrella2"><h3>Contenido cuadro estrella 2</h3></label>
			<?php
				$content = $Estrella2;
				$editor_id = 'Estrella2';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Estrella3"><h3>Contenido cuadro estrella 3</h3></label>
			<?php
				$content = $Estrella3;
				$editor_id = 'Estrella3';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
<label for="Estrella4"><h3>Contenido cuadro estrella 4</h3></label>
			<?php
				$content = $Estrella4;
				$editor_id = 'Estrella4';
				wp_editor( $content, $editor_id ,$argsTextarea);
			?>
 <?php 
}
add_action('save_post','my_meta_membresia_save');

function my_meta_membresia_save(){
	global $post;
	if(isset($_POST["Caja1A"])):
		update_post_meta($post->ID, "Caja1A",$_POST["Caja1A"] );
	endif;
	if(isset($_POST["Caja1B"])):
		update_post_meta($post->ID, "Caja1B",$_POST["Caja1B"] );
	endif;
	if(isset($_POST["Caja2A"])):
		update_post_meta($post->ID, "Caja2A",$_POST["Caja2A"] );
	endif;
	if(isset($_POST["Caja2B"])):
		update_post_meta($post->ID, "Caja2B",$_POST["Caja2B"] );
	endif;
	if(isset($_POST["Estrella1"])):
		update_post_meta($post->ID, "Estrella1",$_POST["Estrella1"]);
	endif;
	if(isset($_POST["Estrella2"])):
		update_post_meta($post->ID, "Estrella2",$_POST["Estrella2"]);
	endif;
	if(isset($_POST["Estrella3"])):
		update_post_meta($post->ID, "Estrella3",$_POST["Estrella3"]);
	endif;
	if(isset($_POST["Estrella4"])):
		update_post_meta($post->ID, "Estrella4",$_POST["Estrella4"]);
	endif;
}

/*------ post mas popular --*/

function sitePlus(){
    global $post;

    if(is_single()){
        $count_key = 'view_post';
        $count = get_post_meta($post->ID, $count_key, true);
        if(empty($count)){
          delete_post_meta($post->ID, $count_key);
          add_post_meta($post->ID, $count_key,  1);
        }else{
           $count++;
           update_post_meta($post->ID, $count_key, $count);
        }   
    }
}

add_action('wp_footer','sitePlus');
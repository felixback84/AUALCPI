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
			'page-attributes'
		),
		
		'menu_position' => 5,
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
        "labels" => $labels,
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
		'menu_position' => 10,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => true,
        "query_var" => true,
        "supports" => array( 
			'title',
			'editor',
			'autor',
			'thumbnail',
			'comments' ),
		'menu_icon'  => 'dashicons-nametag',
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
		'rewrite' => array( 'slug' => 'categoria' )
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
		'rewrite' => array( 'slug' => 'areas' )
	);

	register_taxonomy('areas', array('investigacion','user'), $args);
}	
add_action( 'init' , 'aualcpi_custom_taxonomies_investigaciones_areas');
flush_rewrite_rules();
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
		'rewrite' => array( 'slug' => 'universidades_investigacion' )
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
		'rewrite' => array( 'slug' => 'status_inves' )
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
		'rewrite' => array( 'slug' => 'ciudad_investigaciones' )
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
		'rewrite' => array( 'slug' => 'tag_investigacion' )
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
	$files = esc_attr(get_option('user_meta_files'));?>
   	<label for="user_meta_files">Seleccionar archivos:</label>
	<p id="user_meta_files_show"><?php echo esc_url( get_the_author_meta( 'user_meta_files', $user->ID ) ); ?></p><br />
	<input type='button' id="upload-button-file" class="button-primary" value="Subir Archivos"/>
	<input  type="text" name="user_meta_files[]" id="user_meta_files" value="<?php echo esc_url( get_the_author_meta( 'user_meta_files', $user->ID ) ); ?>" class="regular-text" style="width: 200px;"/><br />
	<p class="description">Selecionar una archivos para la investigacion.</p>
<?php
} 

function save_custom_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], 'wp_custom_attachment_nonce_action')) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('investigacion' == $_POST['post_type']) {
      if(!current_user_can('edit_page', $id)) {
        return $id;
      } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
     
    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_custom_attachment']['name'])) {
         
        // Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('application/pdf');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($id, 'wp_custom_attachment', $upload);
                update_post_meta($id, 'wp_custom_attachment', $upload);     
            } // end if/else
 			unset( $_FILES['wp_custom_attachment'] );
        } else {
            wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else
         
    } // end if
     
} // end save_custom_meta_data
add_action('save_post', 'save_custom_meta_data');

function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');

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


/*------others ------*/

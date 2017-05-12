<?php
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
		custom profile
		===================================
*/
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { 
	$picture = esc_attr(get_option('user_meta_image'));?>
	<h3>Extra informacion del usuario</h3>
	<table class="form-table">
		<tr>
			<th><label for="twitter">Twitter</label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Por favor escriba su Twitter username.</span>
			</td>
		</tr>
		<tr>
			<th><label for="linkedin">Linkedin</label></th>
			<td>
				<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br/>
				<span class="description">Por favor escriba su Linkedin username.</span>
			</td>
		</tr>
		<tr>
            <th><label for="user_meta_image">Seleccionar imagen:</label></th>
            <td>
                <img id="user_meta_image_show" src="<?php echo esc_url( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" style="width:150px;"><br />
                <input type='button' id="upload-button" class="button-primary" value="Upload Image" />
                <input  type="text" name="user_meta_image" id="user_meta_image" value="<?php echo esc_url( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Selecionar una imagen para la portada.</span>
            </td>
        </tr>
        <?php $tax = get_taxonomy( 'areas' );
		if ( !current_user_can( $tax->cap->assign_terms ) )
			return;

		$terms = get_terms( 'areas', array( 'hide_empty' => false ) );
		?>
        <tr>
			<th><label for="areas"><?php _e( 'Seleccione área de investigación' ); ?></label></th>
			<td><?php if ( !empty( $terms ) ) {
				foreach ( $terms as $term ) { ?>
					<input type="radio" name="areas" id="areas-<?php echo esc_attr( $term->slug ); ?>" value="<?php echo esc_attr( $term->slug ); ?>" <?php checked( $term->slug, get_the_author_meta( 'areas', $user->ID )); ?> /> <label for="areas-<?php echo esc_attr( $term->slug ); ?>"><?php echo $term->name; ?></label> <br />

					<?php $termsChields = get_terms( 'areas' , array( 'orderby' => 'name','parent' => $term->term_id,'hide_empty' => false)); 
					if ( !empty( $termsChields ) ) {
					foreach ( $termsChields as $termChield ) {?>
							<input type="radio" name="areas" id="areas-<?php echo esc_attr( $termChield->slug ); ?>" value="<?php echo esc_attr( $termChield->slug ); ?>" <?php  checked( $termChield->slug, get_the_author_meta( 'areas', $user->ID )); ?> /> <label for="areas-<?php echo esc_attr( $termChield->slug ); ?>"><?php echo $termChield->name; ?></label> <br />
				<?php 	}
					}
				}
			}

			else {
				_e( 'No hay disponibles areas de investigaciones' );
			}?>
			</td>
		</tr>
		<?php $tax = get_taxonomy( 'universidades_user' );
		if ( !current_user_can( $tax->cap->assign_terms ) )
			return;

		$terms = get_terms( 'universidades_user', array( 'hide_empty' => false ) );
		?>
        <tr>
			<th><label for="universidades_user"><?php _e( 'Seleccione su universidad' ); ?></label></th>
			<td><?php if ( !empty( $terms ) ) {
				foreach ( $terms as $term ) { ?>
					<input type="radio" name="universidades_user" id="universidades_user-<?php echo esc_attr( $term->slug ); ?>" value="<?php echo esc_attr( $term->slug ); ?>" <?php checked( $term->slug, get_the_author_meta( 'universidades_user', $user->ID )); ?> /> <label for="universidades_user-<?php echo esc_attr( $term->slug ); ?>"><?php echo $term->name; ?></label> <br />
				<?php }
			}
			else {
				_e( 'No hay universidades disponibles.' );
			}?>
			</td>
		</tr>
		<?php $tax = get_taxonomy( 'ciudad_user' );
		if ( !current_user_can( $tax->cap->assign_terms ) )
			return;

		$terms = get_terms( 'ciudad_user' , array( 'orderby' => 'name','parent' => 0,'hide_empty' => false));
		?>
        <tr>
			<th><label for="ciudad_user"><?php _e( 'Seleccione su ciudad' ); ?></label></th>
			<td><?php if ( !empty( $terms ) ) {
				foreach ( $terms as $term ) { ?>
					<h4><?php echo $term->name; ?></h4>
					<?php $termsChields = get_terms( 'ciudad_user' , array( 'orderby' => 'name','parent' => $term->term_id,'hide_empty' => false)); 
					if ( !empty( $termsChields ) ) {
					foreach ( $termsChields as $termChield ) {?>
							<input type="radio" name="ciudad_user" id="ciudad_user-<?php echo esc_attr( $termChield->slug ); ?>" value="<?php echo esc_attr( $termChield->slug ); ?>" <?php  checked( $termChield->slug, get_the_author_meta( 'ciudad_user', $user->ID )); ?> /> <label for="ciudad_user-<?php echo esc_attr( $termChield->slug ); ?>"><?php echo $termChield->name; ?></label> <br />
				<?php 	}
					}
				}
			}
			else {
				_e( 'No hay ciudad / Pais disponibles.' );
			}?>
			</td>
		</tr>
	</table>
<?php 
_e( 'Si alguno de los alguno de las selecciones anteriores no encuentras tu área de investigación comunicate con nosotros.');
}

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
	update_usermeta( $user_id, 'user_meta_image', $_POST['user_meta_image'] );
	update_usermeta( $user_id, 'areas', $_POST['areas'] );
	update_usermeta( $user_id, 'universidades_user', $_POST['universidades_user'] );
	update_usermeta( $user_id, 'ciudad_user', $_POST['ciudad_user'] );

}

/*
		===================================
		permite una variable por url para mostrar perfil usuario
		===================================
*/
function theme_query_vars( $qvars ) {
  $qvars[] = 'pageUser';
  return $qvars;
}
add_filter( 'query_vars', 'theme_query_vars' );
/* Adds the taxonomy page in the admin. */
add_action( 'admin_menu', 'my_add_profession_admin_page' );

/*
		===================================
		adding taxonomies a user submenu
		===================================
*/
function my_add_profession_admin_page() {

	// $tax = get_taxonomy( 'areas' );

	// add_users_page(
	// 	esc_attr( $tax->labels->menu_name ),
	// 	esc_attr( $tax->labels->menu_name ),
	// 	$tax->cap->manage_terms,
	// 	'edit-tags.php?taxonomy=' . $tax->name
	// );

	$tax = get_taxonomy( 'universidades_user' );

	add_users_page(
		esc_attr( $tax->labels->menu_name ),
		esc_attr( $tax->labels->menu_name ),
		$tax->cap->manage_terms,
		'edit-tags.php?taxonomy=' . $tax->name
	);

	$tax = get_taxonomy( 'ciudad_user' );

	add_users_page(
		esc_attr( $tax->labels->menu_name ),
		esc_attr( $tax->labels->menu_name ),
		$tax->cap->manage_terms,
		'edit-tags.php?taxonomy=' . $tax->name
	);
}

/*
		===================================
		adding taxonomies a table users
		===================================
*/
/* Create custom columns for the manage profession page. */
add_filter( 'manage_edit-profession_columns', 'my_manage_profession_user_column' );

/**
 * Unsets the 'posts' column and adds a 'users' column on the manage profession admin page.
 *
 * @param array $columns An array of columns to be shown in the manage terms table.
 */
function my_manage_profession_user_column( $columns ) {

	unset( $columns['posts'] );

	$columns['users'] = __( 'Users' );

	return $columns;
}

/* Customize the output of the custom column on the manage professions page. */
add_action( 'manage_profession_custom_column', 'my_manage_profession_column', 10, 3 );

/**
 * Displays content for custom columns on the manage professions page in the admin.
 *
 * @param string $display WP just passes an empty string here.
 * @param string $column The name of the custom column.
 * @param int $term_id The ID of the term being displayed in the table.
 */
function my_manage_profession_column( $display, $column, $term_id ) {

	if ( 'users' === $column ) {
		$term = get_term( $term_id, 'areas' );
		echo $term->count;
	}
}

/*
		===================================
		taxonomie user
		===================================
*/

function aualcpi_custom_taxonomies_user() {
	
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
		'rewrite' => array( 'slug' => 'universidades_user' ),
		'capabilities' => array(
			'manage_terms' => 'manage_edit_users', // Using 'edit_users' cap to keep this simple.
			'edit_terms'   => 'manage_edit_users',
			'delete_terms' => 'manage_edit_users',
			'assign_terms' => 'read',
		)
	);
	register_taxonomy('universidades_user', array('user'), $args);

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
		'rewrite' => array( 'slug' => 'ciudad_user' ),
		'capabilities' => array(
			'manage_terms' => 'manage_edit_users', // Using 'edit_users' cap to keep this simple.
			'edit_terms'   => 'manage_edit_users',
			'delete_terms' => 'manage_edit_users',
			'assign_terms' => 'read',
		)
	);
	register_taxonomy('ciudad_user', array('user'), $args);

}	
add_action( 'init' , 'aualcpi_custom_taxonomies_user');

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
		crear roles
		===================================
*/

add_role( 'Investigador', 
'Investigador',
array(
'read' => true, // true allows this capability
'manage_investigacion' =>true,
'manage_areas' =>true,
'manage_edit_users' =>true,
'upload_files' =>true,
'edit_attachments' =>true,
'delete_attachments' =>true,


)
);

function add_menu_investigador_caps() {
    // gets the administrator role
    $admins = get_role( 'Investigador' );

    $admins->add_cap( 'edit_post_investigaciones' ); 
    $admins->add_cap( 'edit_post_investigaciones' ); 
    $admins->add_cap( 'publish_post_investigaciones' ); 
    $admins->add_cap( 'delete_post_investigaciones' ); 
    $admins->add_cap( 'edit_published_post_investigaciones' ); 
    $admins->add_cap( 'delete_published_post_investigaciones' );

    $admins->add_cap( 'edit_post_contribuciones' ); 
    $admins->add_cap( 'publish_post_contribuciones' ); 
    $admins->add_cap( 'delete_post_contribuciones' ); 
    $admins->add_cap( 'edit_published_post_contribuciones' ); 
    $admins->add_cap( 'delete_published_post_contribuciones' ); 
}
add_action( 'admin_init', 'add_menu_investigador_caps');


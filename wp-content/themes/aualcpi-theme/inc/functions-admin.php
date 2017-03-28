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
	$picture = esc_attr(get_option('user_meta_image'));
	?>

	<h3>Extra profile information</h3>
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
			<th><label for="biografia">Biografía</label></th>
			<td>
				<textarea type="text" name="biografia" id="biografia" value="" class="regular-text" ><?php echo esc_attr( get_the_author_meta( 'biografia', $user->ID ) ); ?></textarea><br/>
				<span class="description">Por favor escriba su Biografía.</span>
			</td>
		</tr>
		<tr>
            <th><label for="user_meta_image">Seleccionar imagen:</label></th>
            <td>
                <img id="user_meta_image_show" src="<?php echo esc_url( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" style="width:150px;"><br />
                <input type='button' id="upload-button" class="button-primary" value="Upload Image" id="uploadimage"/>
                <input  type="text" name="user_meta_image" id="user_meta_image" value="<?php echo esc_url( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Selecionar una imagen para la portada.</span>
            </td>
        </tr>
	</table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
	update_usermeta( $user_id, 'biografia', $_POST['biografia'] );
	update_usermeta( $user_id, 'user_meta_image', $_POST['user_meta_image'] );
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


<?php get_header(); ?>
<!-- paquina inicio sesion-->
<!-- <div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (111,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php } ?>
				<div class="container">
					<div class="carousel-caption">
						<?php
							$post = get_post(111); 
							$contenido = $post->post_content;
							echo $contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<div class="container espacioBotton espacioTop">
	<div class="row">
		<h1 class="text-center">Iniciar sesión</h1>
	<div id="loginUser" class="col-xs-12 col-sm-8 col-xs-push-0 col-sm-push-2">		
		<?php if (is_user_logged_in()) {               
		    echo '<div class="logout"> <p>Hola usuario!<div class="logout_user">Tu ya estas logeado.</div></p><br /><p><a id="wp-submit" class="logout" href="', wp_logout_url(home_url()), '" title="Logout">Cerrar sesión</a></p></div>';
		} else { 
			$redirect = admin_url('/profile.php'); 
		    $args = array(
		        'echo'           => true,
		        'redirect'       => $redirect,
		        'label_log_in'   => __( 'Log in' ),
		        'form_id'        => 'seminar-login',
		        'label_username' => __( 'Username' ),
		        'label_password' => __( 'Password' ),
		        'label_remember' => __( 'Remember Me' ),
		        'id_username'    => 'user_login',
		        'id_password'    => 'user_pass',
		        'id_submit'      => 'wp-submit',
		        'remember'       => true,
		        'value_username' => NULL,
		        'value_remember' => true
		    );
		    wp_login_form($args); 
		?><a href="<?php echo home_url('/wp-login.php?action=lostpassword'); ?>">¿Has perdido tu contraseña?</a><?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
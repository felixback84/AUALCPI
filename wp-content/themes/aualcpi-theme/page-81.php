<?php get_header(); ?>
<!-- pagina nuestra asociacion-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide espacioBotton" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (81,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php }?>
				<div class="container">
					<div class="carousel-caption">
						<?php
						$post = get_post(81); 
						$contenido = $post->post_content;
						echo $contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container espacioBotton">
	<div id="cajaNegraAsociacion" class="row bordetabVerticalNegro espacioBotton tabVerticalNegro ElementoPadre sombraInferior">
      <ul class="nav nav-tabs tabs-right ElementoHijo col-xs-3">
        <li class="active"><a href="#home-r" data-toggle="tab">Home</a></li>
        <li><a href="#mision-r" data-toggle="tab">Misión</a></li>
        <li><a href="#vision-r" data-toggle="tab">Visión</a></li>
        <li><a href="#organigrama-r" data-toggle="tab"><span class="hidden-sm">Organigrama</span><span class="visible-sm">Organigra..</span></a></li>
      </ul>
      <div class="tab-content col-xs-9 quitarPadding">
        <div class="tab-pane active" id="home-r">
			<p><?php echo get_post_meta($post->ID,'Home')[0]; ?></p>
        </div>
        <div class="tab-pane" id="mision-r">
        	<p><?php echo get_post_meta($post->ID,'Mision')[0]; ?></p>
        </div>
        <div class="tab-pane" id="vision-r">
        	<p><?php echo get_post_meta($post->ID,'Vision')[0]; ?></p>
        </div>
        <div class="tab-pane" id="organigrama-r">
	        <div class="hidden-xs hidden-sm">
	        	<div class="col-xs-12 col-sm-6">
		        	<?php  $usuarioId = false;
		        	$cargo = '';
		        	//echo 'es'.$usuarioId; 
		        	$usuarioId=get_post_meta($post->ID,'UsuarioA')[0];
		        	$cargo=get_post_meta($post->ID,'UsuarioALabel')[0];
		        	//echo 'pm'.$usuarioId; ?>
		        	<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
		        		<?php set_query_var( 'usuarioId', $usuarioId ) ?>	
		        		<?php set_query_var( 'cargo', $cargo ) ?>	
		        		<?php get_template_part('targetas-miembrosQuienes'); ?>
		        	<?php } ?>
	        	</div>
	        	<div class="col-xs-12 col-sm-6">
		        	<?php  $usuarioId = false;
		        	$cargo = '';
		        	//echo 'es'.$usuarioId; 
		        	$usuarioId=get_post_meta($post->ID,'UsuarioB')[0];
		        	$cargo=get_post_meta($post->ID,'UsuarioBLabel')[0];
		        	//echo 'pm'.$usuarioId; ?>
		        	<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
		        		<?php set_query_var( 'usuarioId', $usuarioId ) ?>	
		        		<?php set_query_var( 'cargo', $cargo ) ?>	
		        		<?php get_template_part('targetas-miembrosQuienes'); ?>
		        	<?php } ?>
	        	</div>
	        	<div class="col-xs-12 col-sm-6">
		        	<?php  $usuarioId = false;
		        	$cargo = '';
		        	//echo 'es'.$usuarioId; 
		        	$usuarioId=get_post_meta($post->ID,'UsuarioC')[0];
		        	$cargo=get_post_meta($post->ID,'UsuarioCLabel')[0];
		        	//echo 'pm'.$usuarioId; ?>
		        	<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
		        		<?php set_query_var( 'usuarioId', $usuarioId ) ?>	
		        		<?php set_query_var( 'cargo', $cargo ) ?>	
		        		<?php get_template_part('targetas-miembrosQuienes'); ?>
		        	<?php } ?>
	        	</div>
	        	<div class="col-xs-12 col-sm-6">
		        	<?php  $usuarioId = false;
		        	$cargo = '';
		        	//echo 'es'.$usuarioId; 
		        	$usuarioId=get_post_meta($post->ID,'UsuarioD')[0];
		        	$cargo=get_post_meta($post->ID,'UsuarioDLabel')[0];
		        	//echo 'pm'.$usuarioId; ?>
		        	<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
		        		<?php set_query_var( 'usuarioId', $usuarioId ) ?>	
		        		<?php set_query_var( 'cargo', $cargo ) ?>	
		        		<?php get_template_part('targetas-miembrosQuienes'); ?>
		        	<?php } ?>
	        	</div>
        	</div>
        	<div class="visible-xs visible-sm">
        		<div id="carousel-id" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
									<div class="col-xs-12 col-sm-12 col-md-6 quitarEspacio">
							        	<?php  $usuarioId = false;
							        	$cargo = '';
							        	//echo 'es'.$usuarioId; 
							        	$usuarioId=get_post_meta($post->ID,'UsuarioA')[0];
							        	$cargo=get_post_meta($post->ID,'UsuarioALabel')[0];
							        	//echo 'pm'.$usuarioId; ?>
							        	<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
						        		<?php set_query_var( 'usuarioId', $usuarioId ) ?>	
						        		<?php set_query_var( 'cargo', $cargo ) ?>
						        		<?php get_template_part('targetas-miembrosQuienes'); ?>
						        		<?php } ?>
						        	</div>
						</div>
						<div class="item">
									<div class="col-xs-12 col-sm-12 col-md-6 quitarEspacio">
						        	<?php  $usuarioId = false;
						        	$cargo = '';
						        	//echo 'es'.$usuarioId; 
						        	$usuarioId=get_post_meta($post->ID,'UsuarioB')[0];
						        	$cargo=get_post_meta($post->ID,'UsuarioBLabel')[0];
						        	//echo 'pm'.$usuarioId; ?>
						        	<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
						        		<?php set_query_var( 'usuarioId', $usuarioId ) ?>	
						        		<?php set_query_var( 'cargo', $cargo ) ?>
						        		<?php get_template_part('targetas-miembrosQuienes'); ?>
						        		<?php } ?>
						        	</div>
						</div>
						<div class="item">
									<div class="col-xs-12 col-sm-12 col-md-6 quitarEspacio">
							        	<?php  $usuarioId = false;
							        	$cargo = '';
							        	//echo 'es'.$usuarioId; 
							        	$usuarioId=get_post_meta($post->ID,'UsuarioC')[0];
							        	$cargo=get_post_meta($post->ID,'UsuarioCLabel')[0];
							        	//echo 'pm'.$usuarioId; ?>
							        	<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
							        		<?php set_query_var( 'usuarioId', $usuarioId ) ?>	
							        		<?php set_query_var( 'cargo', $cargo ) ?>
						        		<?php get_template_part('targetas-miembrosQuienes'); ?>
						        		<?php } ?>
						        	</div>
						</div>
						<div class="item">
									<div class="col-xs-12 col-sm-12 col-md-6 quitarEspacio">
							        	<?php  $usuarioId = false;
							        	$cargo = '';
							        	//echo 'es'.$usuarioId; 
							        	$usuarioId=get_post_meta($post->ID,'UsuarioD')[0];
							        	$cargo=get_post_meta($post->ID,'UsuarioDLabel')[0];
							        	//echo 'pm'.$usuarioId; ?>
							        	<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
							        		<?php set_query_var( 'usuarioId', $usuarioId ) ?>	
							        		<?php set_query_var( 'cargo', $cargo ) ?>
						        		<?php get_template_part('targetas-miembrosQuienes'); ?>
						        		<?php } ?>
						        	</div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
        	</div>
        </div>
      </div>
	</div>
</div>

<div class="container quitarPadding espacioBotton">
		<div id="contenidoBlanco" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 quitarPadding">
			<div class="thumbnail">
				<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/imageContenidoNosotros.jpg" alt="" width="" height="" /> -->
				<div id="contenidoTextAzulNuestra">
					<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis quam voluptas repellat fugiat facilis explicabo excepturi mollitia nesciunt voluptatibus ratione at itaque pariatur minus, libero minima, iusto amet commodi cupiditate.</h1>
				</div>
			</div>
		</div>
</div>
<div class="container quitarPadding">
	<div class="espacioBotton">
		<div class="col-xs-12">
			<h1>Los miembros de nuestra Asocición</h1>
		</div>
		<div class="col-xs-12 ">
			<div class="google-maps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254508.3928105967!2d-74.24789151416464!3d4.648625932411766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2zQm9nb3TDoQ!5e0!3m2!1ses!2sco!4v1489598353928" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>	
	</div>
</div>
<div class="container quitarPadding">
	<div class="divAsociados">
		<h1 class="text-center">Nuestras alianzas internacionales</h1>	
		<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
			</a>
		</div>
	</div>
</div>
<?php get_footer(); ?>
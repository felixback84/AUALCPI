<?php get_header(); ?>
<!-- pagina nuestra asociacion-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide espacioBotton" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (81,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fondoPerfil.png" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
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

<!-- inicio aliados-->
<?php  $tituloAliados='Nuestras alianzas internacionales'; ?>
<div class="hidden-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-xs-12 quitarEspacio">
				<h1><?php echo $tituloAliados; ?></h1>
				<div id="carousel-aliados" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" style="text-align: center;">
						<div class="item active">
							<div class="col-xs-3"><a href="http://geaci.com"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/GeaciLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="http://www.iesalc.unesco.org.ve/"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/IESALCLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="https://www.facebook.com/opcion.brasil/"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/OPCAOLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="http://www.iesalc.unesco.org.ve/index.php?option=com_content&view=article&id=3177:el-observatorio-regional-de-responsabilidad-social-para-america-latina-y-el-caribe-continua-apoyando-los-proyectos-educacionales-en-america-latina&catid=100&Itemid=449&lang=es"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ORSALCLogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">
							<div class="col-xs-3"><a href="http://iesalc.unesco.org.ve/index.php?option=com_content&view=article&id=3515:convocatoria-premio-gabriel-betancourt-mejia&catid=11&Itemid=466&lang=en"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/PremioGBMLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="http://www.udca.edu.co/"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/UDCALogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="http://virtualeduca.org/"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/VirtualeducaLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ApiceLogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">	
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/CABLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/EQUAALogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/Escueladeguerracolombia.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ICDL.jpg"></div>
							</a></div>
						</div>
						<div class="item">	
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ILTOLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/oui-ioheLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ParlamentoLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/Uniondeuniversidadesdeamericalatinayelcaribelogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">	
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/UniversidadnacionaldeRosarioLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/UnleaLogo.jpg"></div>
							</a></div>
							<div class="col-xs-3"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/usemexfusionLogo.jpg"></div>
							</a></div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-aliados" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-aliados" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="visible-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-xs-12 quitarEspacio">
				<h1><?php echo $tituloAliados; ?></h1>
				<div id="carousel-aliados-2" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" style="text-align: center;">
						<div class="item active">
							<div class="col-xs-6"><a href="http://geaci.com"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/GeaciLogo.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="http://www.iesalc.unesco.org.ve/"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/IESALCLogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">
							<div class="col-xs-6"><a href="https://www.facebook.com/opcion.brasil/"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/OPCAOLogo.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="http://www.iesalc.unesco.org.ve/index.php?option=com_content&view=article&id=3177:el-observatorio-regional-de-responsabilidad-social-para-america-latina-y-el-caribe-continua-apoyando-los-proyectos-educacionales-en-america-latina&catid=100&Itemid=449&lang=es"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ORSALCLogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">
							<div class="col-xs-6"><a href="http://iesalc.unesco.org.ve/index.php?option=com_content&view=article&id=3515:convocatoria-premio-gabriel-betancourt-mejia&catid=11&Itemid=466&lang=en"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/PremioGBMLogo.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="http://www.udca.edu.co/"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/UDCALogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">
							<div class="col-xs-6"><a href="http://virtualeduca.org/"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/VirtualeducaLogo.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ApiceLogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">	
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/CABLogo.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/EQUAALogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/Escueladeguerracolombia.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ICDL.jpg"></div>
							</a></div>
						</div>
						<div class="item">	
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ILTOLogo.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/oui-ioheLogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/ParlamentoLogo.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/Uniondeuniversidadesdeamericalatinayelcaribelogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/UniversidadnacionaldeRosarioLogo.jpg"></div>
							</a></div>
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/UnleaLogo.jpg"></div>
							</a></div>
						</div>
						<div class="item">
							<div class="col-xs-6"><a href="#"  target="_blank">
								<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/aliados/usemexfusionLogo.jpg"></div>
							</a></div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-aliados-2" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-aliados-2" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- fin aliados-->
<?php get_footer(); ?>
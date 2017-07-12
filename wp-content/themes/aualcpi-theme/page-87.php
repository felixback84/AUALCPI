<?php get_header(); ?>
<!-- pagina que es red lisi?-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (87,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fondoPerfil.png" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php } ?>
				<div class="container">
					<div class="carousel-caption">
						<p><?php
						$post = get_post(87); 
						$contenido = $post->post_content;
						echo $contenido;
						?></p>
						<a href="<?php echo home_url('/suscribirme/');?>" class="btn btnSuscribirme">Quiero ser miembro</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container espacioTop espacioBotton">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<div class="youtube">
				<iframe width="1280" height="720" src="https://www.youtube.com/embed/C85nRB-NnsU" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<div id="ultimasInvestigaciones" class="container quitarPadding espacioBotton">
		<div class="col-xs-12 quitarPadding">
			<h1 class="text-center">Conoce nuestra Red Lisi</h1>
			<?php $args = array(
		      'post_type' => 'investigacion',
		      'post_status' => 'publish',
		      'order'=> 'DESC',
			  'posts_per_page' => 6, 
		      'orderby' => 'date',
		    ); 
			$lastBlog = new WP_Query ($args);
			$cont=0;
			if($lastBlog->have_posts()):
			while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
					<div class="col-xs-12 col-sm-6 col-md-4 quitarPadding">
							<?php get_template_part('targetas-inves-inves'); ?>
					</div>
				 <?php $cont++; 
				 endwhile;
			endif;	
		    wp_reset_postdata(); ?>
		</div>	
</div>
<div id="contenidoBlanco" class="container quitarPadding espacioBotton">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="thumbnail">
				<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/imageContenidoQueeslisi.jpg" alt="" width="" height="" /> -->
				<div id="contenidoTextAzulRedLisi">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis quam voluptas repellat fugiat facilis explicabo excepturi mollitia nesciunt voluptatibus ratione at itaque pariatur minus, libero minima, iusto amet commodi cupiditate.</p>
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
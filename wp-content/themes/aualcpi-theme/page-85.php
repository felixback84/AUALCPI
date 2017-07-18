<?php get_header(); ?>
<!-- paquina membresia-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide espacioBotton" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (85,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fondoPerfil.png" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php } ?>
				<div class="container">
					<div class="carousel-caption">
						<?php
							$post = get_post(85); 
							$contenido = $post->post_content;
							echo $contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row espacioBotton">
		<h1 class="text-center">Descubre todos los beneficios que tenemos para ti</h1>
		<div id="carousel-members" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-xs-8 col-xs-push-2 fichaCentral" style="">
						<div class="col-xs-2 fichaLateralIzquierda" style=""></div>
						
							<?php echo get_post_meta(get_the_ID(),'Caja1A',true); ?>
						<div class="col-xs-2 fichaLateralDerecha" style=""></div>
					</div>
				</div>
				<div class="item">
					<div class="col-xs-8 col-xs-push-2 fichaCentral" style="">
						<div class="col-xs-2 fichaLateralIzquierda" style=""></div>
						<?php echo get_post_meta(get_the_ID(),'Caja1B',true); ?>
						<div class="col-xs-2 fichaLateralDerecha" style=""></div>
					</div>
				</div>	
			</div>
			<a class="left carousel-control" href="#carousel-members" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-members" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
</div>
<div class="container">
	<div class="row espacioBotton">
		<div id="carousel-dual-members" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="thumbnail">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco1.png" alt="imagen slider member 1" width="" height="" class="hidden-xs hidden-sm"/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco2.png" alt="imagen slider member 1" width="" height="" class="visible-sm"/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco3.png" alt="imagen slider member 1" width="" height="" class="visible-xs"/>
					</div>
					<div class="carousel-caption">
						<?php echo get_post_meta(get_the_ID(),'Caja2A',true); ?>
						<a href="<?php echo home_url('/suscribirme/');?>" class="btn btnSuscribirme">SUSCRIBIRME</a>
					</div>
				</div>
				<div class="item">
					<div class="thumbnail">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco1.png" alt="imagen slider member 1" width="" height="" class="hidden-xs hidden-sm"/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco2.png" alt="imagen slider member 1" width="" height="" class="visible-sm"/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco3.png" alt="imagen slider member 1" width="" height="" class="visible-xs"/>
					</div>
					<div class="carousel-caption">
						<?php echo get_post_meta(get_the_ID(),'Caja2B',true); ?>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-dual-members" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-dual-members" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-push-2">
			<h1 class="text-center">La mejor manera de integrar tu</h1>
			<h1 class="text-center">Universidad en una comunidad global</h1>
		</div>
	</div>
	<div class="row espacioBotton">
		<div class="col-xs-12 col-sm-6">
			<div class="targetaEstrellas">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estrellas.png" alt="">
						<?php echo get_post_meta(get_the_ID(),'Estrella1',true); ?>
					</div>
				</div>
			</div>
			<div class="targetaEstrellas">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estrellas.png" alt="">
						<?php echo get_post_meta(get_the_ID(),'Estrella2',true); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="targetaEstrellas">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estrellas.png" alt="">
						<?php echo get_post_meta(get_the_ID(),'Estrella3',true); ?>
					</div>
				</div>
			</div>
			<div class="targetaEstrellas">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estrellas.png" alt="">
						<?php echo get_post_meta(get_the_ID(),'Estrella4',true); ?>
					</div>
				</div>
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
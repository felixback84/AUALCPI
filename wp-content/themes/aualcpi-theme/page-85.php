<?php get_header(); ?>
<!-- paquina membresia-->
<?php
	// $post = get_post(85); 
	// $contenido = $post->post_content;
	// echo $contenido;
?>
<?php 
//$idPost = 388; 
$urlImagenTop=get_stylesheet_directory_uri().'/images/fondoPerfil.png';
 //if(!empty(get_the_post_thumbnail ($idPost,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image'])))	{ 
 		//$urlImagenTop =get_the_post_thumbnail_url($idPost); } 
 if(!empty(get_the_post_thumbnail ()))	{ $urlImagenTop =get_the_post_thumbnail_url(); 		} 
 		?>
<div class="hidden-xs">
	<div class="jumbotron" style="background-image: url('<?php echo $urlImagenTop; ?>');">
		<div class="container">
			<p>
		  	<?php
			//$post = get_post($idPost); 
			$post = get_post(); 
			//var_dump($post);
			$contenido = $post->post_content;
			echo $contenido;
			?>
			</p>
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

<?php get_template_part('targetas-aliados'); ?>
<?php get_footer(); ?>
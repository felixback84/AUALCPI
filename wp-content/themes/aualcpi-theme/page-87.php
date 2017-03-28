<?php get_header(); ?>
<!-- pagina que es red lisi?-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?></div>
				<div class="container">
					<div class="carousel-caption">
						<?php
						$post = get_post(87); 
						$contenido = $post->post_content;
						echo $contenido;
						?>
						<a href="#" class="btn btn-default">SUSCRIBIRME</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-sm-push-2">
			<div class="youtube">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/C85nRB-NnsU" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="targetasRedLisi">
			<div class="col-xs-12">
				<h4>Conoce nuestra Red Lisi</h4>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="thumbnail">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imageContenidoQueeslisi.jpg" alt="" width="" height="" />
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="divAsociados">
			<div class="col-xs-12">
				<h4>Nuestras alianzas internacionales</h4>	
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
					<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
					<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
					<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
					<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
					<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
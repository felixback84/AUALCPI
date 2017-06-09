<?php get_header(); ?>
<!-- pagina que es red lisi?-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (87,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
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
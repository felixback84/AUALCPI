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
						<a href="<?php echo home_url('/membresia/');?>" class="btn btnSuscribirme">SUSCRIBIRME</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-sm-push-2">
			<div class="youtube sombraInferior">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/C85nRB-NnsU" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row espacioBotton">
		<div class="col-xs-12">
			<h1 class="text-center espacioBotton">Conoce nuestra Red Lisi</h1>
			<?php $args = array(
		      'post_type' => 'investigacion',
		      'post_status' => 'publish',
		      'order'=> 'ASC',
			  'posts_per_page' => 6, 
		      'orderby' => 'date',
		    ); 
			$lastBlog = new WP_Query ($args);
			$cont=0;
			if($lastBlog->have_posts()):
			while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
			<?php if($cont == 0){ ?><div class="item active"><?php }else{ ?><div class="item"><?php } ?> 
					<div class="col-xs-12 col-sm-6 col-md-4">
							<?php get_template_part('targetas-inves-inves'); ?>
					</div>
				</div>
				 <?php $cont++; 
				 endwhile;
			endif;	
		    wp_reset_postdata(); ?>
		</div>	
	</div>
</div>
<div class="container">
	<div class="row espacioBotton">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="thumbnail">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imageContenidoQueeslisi.jpg" alt="" width="" height="" />
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row espacioBotton">
		<div class="divAsociados">
			<div class="col-xs-12">
				<h1 class="text-center">Nuestras alianzas internacionales</h1>	
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
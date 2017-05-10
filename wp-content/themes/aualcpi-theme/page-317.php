<?php get_header(); ?>
<!-- paquina membresia-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (317,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php } ?>
				<div class="container">
					<div class="carousel-caption">
						<?php
							$post = get_post(317); 
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
	<div class="row espacioBotton">
		<h1 class="text-center">Quieres ser miembro</h1>
		
	</div>
</div>
<?php get_footer(); ?>
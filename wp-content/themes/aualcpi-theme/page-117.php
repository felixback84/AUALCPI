<?php get_header(); ?>
<!-- paquina email-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (117,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php } ?>
				<div class="container">
					<div class="carousel-caption">
						<?php
							$post = get_post(117); 
							global $post;
							$contenido = $post->post_content;
							echo $contenido;
						?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="container espacioBotton espacioTop">
	<div class="row">
		<h1 class="text-center">E-mail</h1>
		<div class="col-sx-12 Fpadding">
			<div class="contactForm">
				<?php echo do_shortcode('[contact-form-7 id="353" title="Contact form 1"]'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
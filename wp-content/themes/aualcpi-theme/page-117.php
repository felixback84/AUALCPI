<?php get_header(); ?>
<!-- paquina email-->
						<?php
							// $post = get_post(117); 
							// global $post;
							// $contenido = $post->post_content;
							// echo $contenido;
						?>
<?php 
//$idPost = 388;  //local 
//$idPost = 600; 	//en vivo
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
<div class="container espacioBotton espacioTop">
	<div class="row">
		<h1 class="text-center">Contáctanos</h1>
		<div class="col-sx-12 Fpadding">
			<div class="contactForm">
				<?php echo do_shortcode('[contact-form-7 id="353" title="Contact form 1"]'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
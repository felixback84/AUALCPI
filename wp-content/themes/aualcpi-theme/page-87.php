<?php get_header(); ?>
<!-- pagina que es red lisi?-->
<?php
// $post = get_post(87); 
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
<div class="container espacioTop espacioBotton">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
		<?php //echo get_post_meta(get_the_ID(),'videoYoutube',true); ?>
		<?php $link = get_post_meta(get_the_ID(),'videoYoutube',true); 
		$link = str_replace('https://www.youtube.com/watch?v=','https://www.youtube.com/embed/',$link);
		//echo $link;
		?>
			<div class="youtube">
				<iframe width="1280" height="720" src="<?php echo $link; ?>" frameborder="0" allowfullscreen></iframe>
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
				<div id="contenidoTextAzulNuestra">
					<h1><?php echo get_post_meta(get_the_ID(),'Caja1',true); ?></h1>
				</div>
			</div>
		</div>
</div>
<?php get_template_part('targetas-aliados'); ?>
<?php get_footer(); ?>
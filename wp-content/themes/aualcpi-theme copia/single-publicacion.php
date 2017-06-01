<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<?php if( have_posts() ):
			while( have_posts() ): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
						<p>
							<?php if (class_exists('MultiPostThumbnails')) { 
								MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', get_the_ID(), array(100,100));
							} ?>
							<?php $terms_list=wp_get_post_terms($post->ID,'categoria_conocimiento');
							if(count($terms_list)!=0) { echo 'Categoria: ';
							echo mostrarCategorias($terms_list,'|'); }
							$terms_list= NULL; ?> 
							<?php $terms_list=wp_get_post_terms($post->ID,'tipo_publicaciones');
							if(count($terms_list)!=0) { echo ' || Tipo de publicacion: ';
							echo mostrarCategorias($terms_list,'|'); }
							$terms_list= NULL; ?>  
							<?php $terms_list=wp_get_post_terms($post->ID,'tag_publicaciones');
							if(count($terms_list)!=0) { echo ' || Tag: ';
							echo mostrarCategorias($terms_list,'|'); }
							$terms_list= NULL; ?>
							<?php if( current_user_can('manage_options') ) {
							//echo '|| ';  edit_post_link(); 
							} ?>
						</p>
						<?php if( has_post_thumbnail() ): ?>
							<div class="thumbnail"><?php the_post_thumbnail('full'); ?></div>
						<?php endif; ?>
						<h4>Descargable de la publicacion:</h4>
						<?php $linkPublicacion = get_post_meta(get_the_ID(),'publicacion_meta_file',true)[0];  //var_dump($linkPublicacion); ?>
						-<a class="" href="<?php echo $linkPublicacion; ?> " target="_blank" ><?php echo basename($linkPublicacion); ?></a>
					<div class="styleSingle">
						<?php the_content(); ?>

					</div>
				</article>
				<div class="row">
					<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
					<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
				</div>
				<div class="row">
					<?php if( comments_open() ){ 
						//comments_template(); 
					} else {
						//echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
					} ?>
				</div>
			<?php endwhile;
			endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
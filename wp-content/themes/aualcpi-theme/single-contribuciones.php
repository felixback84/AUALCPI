<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<?php if( have_posts() ):
			while( have_posts() ): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="styleSingle">
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
						<?php the_content(); ?>
					</div>
				</article>

				<!-- Your like button code -->
				<div class="fb-like" data-href="http://pruebas.aualcpi.net/contribuciones/aporte-social-a-investigacion-1/" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
  <div class="fb-like" 
    data-href="<?php echo esc_url(get_permalink()); ?>" 
    data-layout="standard" 
    data-action="like" 
    data-show-faces="true">
  </div>
<?php echo esc_url(get_permalink()); ?>
  <div class="fb-like" data-href="<?php echo esc_url(get_permalink()); ?>" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>

<!--   <div class="fb-like" data-href="http://www.google.com" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false"></div> -->

  <div class="fb-like espacioLinkTarjeta" data-href="<?php echo esc_url(get_permalink()); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false" ></div>


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
<?php get_header(); ?>

<?php if( have_posts() ):
while( have_posts() ): the_post(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-8 col-md-push-2">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="topContribuciones">
					<?php  //var_dump($post);
					the_title('<h1 class="entry-title">','</h1>' ); ?>
					<?php the_content(); ?>
					<?php $author_obj = get_user_by( 'email',get_the_author_meta( 'user_email')); 
					//var_dump($author_obj);
					$userId=$author_obj->ID; ?>  	
					<div id="datosInfoContenido" class="col-xs-12">					  	
						<a href="<?php echo home_url(); ?>/author/<?php echo $author_obj->user_login; ?>/" >
							<div class="organizar-linea" style="width: 70px;">
								<?php echo get_avatar( $userId, '60' ,'','logo usurio',array('class' => 'img-circle')); ?>
							</div>
							<div class="organizar-linea">
								<p><?php the_author(); ?></p>
								<p>Última actualización: <?php the_modified_date('G:i F j'); ?> de <?php the_modified_date('Y'); ?></p>
							</div>
						</a>
						
						<span class="spanContador">
							<div class="fb-like espacioLinkContribuciones" data-href="<?php echo esc_url(get_permalink()); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false" ></div>
					  		<span><?php comments_number( '0', '1', '%' ); ?> <span class="icon icon-comments"></span></span>	
				  		</span>
					</div>
					<?php //echo get_post_meta(get_the_ID(), 'Descripcion', true); ?>
				</div>
			</article>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-6 col-md-push-3 quitarPadding" >
			<article>
				<div id="carousel-id" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
						<?php if( has_post_thumbnail() ): ?><div class="thumbnail"><?php the_post_thumbnail('full'); ?></div><?php endif; ?>
						</div>
						<div class="item">
							<div class="thumbnail"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'segunda-image-contribution', get_the_ID(), array(1200,500));
									endif; ?></div>
						</div>
						<div class="item">
							<div class="thumbnail"><?php if (class_exists('MultiPostThumbnails')) : 
									MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'tercera-image-contribution', get_the_ID(), array(1200,500));
									endif; ?></div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</article>

		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-8 col-md-push-2">
			<article>
				<div class="styleSingle detalleContrubucion">
					<?php echo get_post_meta(get_the_ID(), 'Descripcion', true); ?>
				</div>
				
  <!-- <div class="fb-like" data-href="<?php echo esc_url(get_permalink()); ?>" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div> -->
				<!-- Your like button code -->
				<!-- <div class="fb-like" data-href="http://pruebas.aualcpi.net/contribuciones/aporte-social-a-investigacion-1/" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
  <div class="fb-like" 
    data-href="<?php //echo esc_url(get_permalink()); ?>" 
    data-layout="standard" 
    data-action="like" 
    data-show-faces="true">
  </div> -->
<?php //echo esc_url(get_permalink()); ?>

<!--   <div class="fb-like" data-href="http://www.google.com" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false"></div> -->

  <!-- <div class="fb-like espacioLinkTarjeta" data-href="<?php //echo esc_url(get_permalink()); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false" ></div> -->
				<div class="row">
					<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
					<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
				</div>
				<div class="row">
					<div class="col-xs-12">						
					<?php if( comments_open() ){ 
						comments_template(); 
					} else {
						echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
					} ?>
					</div>
				</div>
			
			</article>
		</div>
	</div>
</div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>
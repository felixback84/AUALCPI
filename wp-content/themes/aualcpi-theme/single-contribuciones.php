<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<?php if( have_posts() ):
			while( have_posts() ): the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="styleSingle">
						<?php  //var_dump($post);
						the_title('<h1 class="entry-title">','</h1>' ); ?>
						<?php $author_obj = get_user_by( 'email',get_the_author_meta( 'user_email')); 
						$userId=$author_obj->ID; ?>  	
						<div class="col-xs-12">					  	
							<div class="organizar-linea" style="width: 70px;">
								<?php echo get_avatar( $userId, '60' ,'','logo usurio',array('class' => 'img-circle')); ?>
							</div>
							<div class="organizar-linea">
								<p><?php the_author(); ?></p>
								<p>Última actualización: <?php the_modified_date('G:i F j'); ?> de <?php the_modified_date('Y'); ?></p>
							</div>
							<span class="spanContador">
								<div class="fb-like espacioLinkContribuciones" data-href="<?php echo esc_url(get_permalink()); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false" ></div>
						  		<span><?php comments_number( '0', '1', '%' ); ?> <span class="icon icon-comments"></span></span>	
					  		</span>
						</div>
							
						
						<?php if( has_post_thumbnail() ): ?>
							<div class="thumbnail"><?php the_post_thumbnail('full'); ?></div>
						<?php endif; ?>
						<?php the_content(); ?>
					</div>
				</article>
				<!-- Your like button code -->
				<!-- <div class="fb-like" data-href="http://pruebas.aualcpi.net/contribuciones/aporte-social-a-investigacion-1/" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
  <div class="fb-like" 
    data-href="<?php //echo esc_url(get_permalink()); ?>" 
    data-layout="standard" 
    data-action="like" 
    data-show-faces="true">
  </div> -->
<?php //echo esc_url(get_permalink()); ?>
  <div class="fb-like" data-href="<?php echo esc_url(get_permalink()); ?>" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>

<!--   <div class="fb-like" data-href="http://www.google.com" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false"></div> -->

  <!-- <div class="fb-like espacioLinkTarjeta" data-href="<?php //echo esc_url(get_permalink()); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false" ></div> -->


				<div class="row">
					<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
					<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
				</div>
				<div class="row">

					<?php if( comments_open() ){ 
						comments_template(); 
					} else {
						echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
					} ?>
				</div>
			<?php endwhile;
			endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
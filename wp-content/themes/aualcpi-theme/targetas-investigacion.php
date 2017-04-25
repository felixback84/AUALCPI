<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<div class="bloqueTargeta">
		<div class="row">
			<div class="col-xs-8 col-sm-12 col-xs-push-2 col-sm-push-0">
				<div class="panel panel-default">
					<div class="panel-header">
					<?php //$idPost=$post->ID; 
						//echo $idPost; ?>
						<?php if( has_post_thumbnail( )): ?>
							<div class="thumbnail"><?php the_post_thumbnail ('full'); ?></div>
						<?php else: ?>
							<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="imagen de defecto" width="" height="" /></div>
						<?php endif; ?>
					</div>
					<div class="panel-body">
						<div class="contenidoP">
							<h4><a href="<?php echo esc_url(get_permalink()); ?> "><?php "titulos:".the_title(); ?></a></h4>
							<p><?php if (class_exists('MultiPostThumbnails')) : 
							MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', get_the_ID(), array(100,100));
							endif; ?></p>

							<p><?php $terms_list=wp_get_post_terms($post->ID,'universidades_investigacion');
							if(count($terms_list)!=0) { echo ('Universidad: ');}
							echo mostrarCategorias($terms_list,'\\');
							?></p>

							<p><?php $terms_list=wp_get_post_terms($post->ID,'status_inves');
							if(count($terms_list)!=0) { echo ('Status: ');}
							echo mostrarCategorias($terms_list,'\\');
							?></p>
						</div>
						<a class="pull-right" href="<?php echo esc_url(get_permalink()); ?> ">Ver más</a> 			
					</div><p class="linea"></p>
				</div>
			</div>
		</div>
	</div>
</article>	
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<!-- <header class= "entry-header">
		<?php the_title( sprintf('<h4 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h4>'); ?>
		<small> Publicado el: <?php  the_time('F j, Y'); ?> a las <?php the_time('g:i a') ?>, in <?php the_category(); ?> </small>
	</header> -->
	<div class="bloqueTargeta">
		<div class="row">
			<div class="col-xs-8 col-sm-12 col-xs-push-2 col-sm-push-0">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php if( has_post_thumbnail( )): ?>
							<div class="thumbnail"><?php the_post_thumbnail ('full'); ?></div>
						<?php else: ?>
							<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="imagen de defecto" width="" height="" /></div>
						<?php endif; ?>
						<h4><?php the_title(); ?></h4>
						<p><span class="textoGrisClaro">Por: <?php the_author(); ?></span></p>
						<p><span class="textoGrisClaro"><?php "Categoria: ".$terms_list=wp_get_post_terms($post->ID,'tipo_publicaciones');
							echo mostrarCategorias($terms_list,'|');
						?></span></p>
						<p><?php  echo wp_trim_words(get_the_content(),30,'...'); ?></p>
						<?php the_meta(); ?>
						<a class="pull-right" href="<?php echo esc_url(get_permalink()); ?> ">Descargar</a> 
					</div>
				</div>
			</div>
		</div>
	</div>
</article>	
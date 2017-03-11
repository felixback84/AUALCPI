<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<!-- <header class= "entry-header">
		<?php the_title( sprintf('<h4 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h4>'); ?>
		<small> Publicado el: <?php  the_time('F j, Y'); ?> a las <?php the_time('g:i a') ?>, in <?php the_category(); ?> </small>
	</header> -->
	<?php 
		// mostrarCategorias function ($lista){
		// 	$i=0;
		// 		foreach ($lista as $term) {
		// 				$i++;
		// 				if($i>1){ echo ', ';}
		// 				echo $term->name;
		// 		}
		// }
	?>
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
						<h4><?php "titulos:".the_title(); ?></h4>
						<p><?php $terms_list=wp_get_post_terms($post->ID,'categoria');
							mostrarCategorias($terms_list,'|');
						?></p>
						
						<p><?php $terms_list=wp_get_post_terms($post->ID,'ciudad_becas');
							mostrarCategorias($terms_list,'\\');
						?></p>
						<p><?php $terms_list=wp_get_post_terms($post->ID,'becas');
						if(count($terms_list)!=0) { echo ('Tipo de beca: ');}
							mostrarCategorias($terms_list,',');
						?></p>
						<?php the_meta(); ?>
						<a class="pull-right" href="<?php echo esc_url(get_permalink()); ?> ">Aplicar</a> 
					</div>
				</div>
			</div>
		</div>
	</div>
</article>	
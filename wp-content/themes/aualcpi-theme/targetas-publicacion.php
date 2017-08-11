<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<!-- <header class= "entry-header">
		<?php the_title( sprintf('<h4 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h4>'); ?>
		<small> Publicado el: <?php  the_time('F j, Y'); ?> a las <?php the_time('g:i a') ?>, in <?php the_category(); ?> </small>
	</header> -->
	<div class="bloqueTargeta bloqueTargetaFormatoPublicacion">
		<div class="row">
			<div class="col-xs-10 col-sm-12 col-xs-push-1 col-sm-push-0">
				<div class="panel panel-default" style="border:none;box-shadow:none;">
					<div class="panel-body">
						<?php if( has_post_thumbnail( )): ?>
							<div class="thumbnail"><?php the_post_thumbnail ('medium'); ?></div>
						<?php else: ?>
							<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cuadroPost.png" alt="imagen de defecto" width="" height="" /></div>
						<?php endif; ?>
						<h4><a href="<?php echo esc_url(get_permalink()); ?> "><?php echo wp_trim_words(get_the_title(),8,'...'); ?></a></h4>
						<!-- <p><span class="textoGrisClaro">Por: <?php //the_author(); ?></span></p> -->
						<p><span class="textoGrisClaro"><?php $terms_list=wp_get_post_terms($post->ID,'author_publicaciones');
							echo "Autor: ".mostrarCategorias($terms_list,'|');
						?></span></p>
						<p class="categoriasAzules"><?php $terms_list=wp_get_post_terms($post->ID,'tipo_publicaciones');
							if(count($terms_list)!=0) { echo ('Categoria: ');} ?>
							<span class="textoAzul">
							<?php
							 if(!empty($terms_list[0])){
							 	echo '<a href="'.get_term_link($terms_list[0]).'" >'.$terms_list[0]->name.'</a>';
							 }
							 if(!empty($terms_list[1])){
							 	echo ' | <a href="'.get_term_link($terms_list[1]).'" >'.$terms_list[1]->name.'</a>';
							 }
						?>
						<p><?php  echo wp_trim_words(get_the_content(),30,'...'); ?></p>
						<?php $linkPublicacion = get_post_meta(get_the_ID(),'publicacion_meta_file',true)[0];  //var_dump($linkPublicacion); ?>
						<a class="pull-right" href="<?php echo $linkPublicacion; ?> " target="_blank" >Descargar</a> 
					</div>
				</div>
			</div>
		</div>
	</div>
</article>	
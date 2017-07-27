<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<div class="bloqueTargeta bloqueTargetaFormato">
		<div class="row">
			<div class="col-xs-10 col-sm-12 col-xs-push-1 col-sm-push-0">
				<div class="panel panel-default">

					<div class="panel-body">
						<?php if( has_post_thumbnail( )): ?>
							<div class="thumbnail"><?php the_post_thumbnail ('full'); ?></div>
						<?php else: ?>
							<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cuadroPost.png" alt="imagen de defecto" width="" height="" /></div>
						<?php endif; ?>
						<h4><a href="<?php echo esc_url(get_permalink()); ?> "><?php echo wp_trim_words(get_the_title(),9,'...'); ?></a></h4>
						<p class="categoriasAzules"><span class="textoAzul"><?php $terms_list=wp_get_post_terms($post->ID,'categoria');
							if(count($terms_list)!=0) { echo ('Categoria: ');}
							 if(!empty($terms_list[0])){
							 	echo '<a href="'.get_term_link($terms_list[0]).'" >'.$terms_list[0]->name.'</a>';
							 }
							 if(!empty($terms_list[1])){
							 	echo ' | <a href="'.get_term_link($terms_list[1]).'" >'.$terms_list[1]->name.'</a>';
							 }
							 // <a href="'.get_term_link($term).'" >'.$term->name.'</a>'
							//echo mostrarCategorias($terms_list,'|');
							if(count($terms_list)!=0) { 
						?><a href="#"  class="iconoModal" data-toggle="modal" data-target="#myModalBeca2">?</a></p></span>
						<?php } ?>
						<p><?php $terms_list=wp_get_post_terms($post->ID,'ciudad_becas');
							if(count($terms_list)!=0) { echo ('Ciudad/Pais: ');}
							echo mostrarCategorias($terms_list,'/');
						?></p>
						<p><?php $terms_list=wp_get_post_terms($post->ID,'cantidad_becas');
							if(count($terms_list)!=0) { echo ('Becas disponibles: ');}
							echo mostrarCategorias($terms_list,'\\');
						?></p>
						<p><?php $terms_list=wp_get_post_terms($post->ID,'tipo_beca');
						if(count($terms_list)!=0) { echo ('Tipo de beca: ');}
							echo mostrarCategorias($terms_list,'\\');
							if(count($terms_list)!=0) { 
						?><a href="#"  class="iconoModal" data-toggle="modal" data-target="#myModalBeca1">?</a><?php } ?></p>
						<a class="pull-right" href="#" data-toggle="modal" data-target="#myModalBecaAplicar">Aplicar</a> 
					</div><p class="linea"></p>
				</div>
			</div>
		</div>
	</div>
</article>	
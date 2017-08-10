<article id="post-<?php the_ID(); ?>" class="BloqueArchive"  <?php post_class(); ?>>
	<header class="entry-header">
	</header>
	<div class="row">
		<?php if( has_post_thumbnail() ): ?>
			<div class="col-xs-12 col-sm-4">
				<div class="thumbnail"><?php the_post_thumbnail('medium'); ?></div>
			</div>
			<div class="contenidoArchive col-xs-12 col-sm-8">
				<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
				
				<?php $becasDisponibles = get_post_meta(get_the_ID(),'becasDisponibles',true); 
						if(!empty($becasDisponibles )){ ?>
						<p><em><strong>Total becas disponibles:</strong></em>
						<?php echo $becasDisponibles; }?></p>
						
						<?php $categoriaA = get_post_meta(get_the_ID(),'categoriaA',true); 
						if(!empty($categoriaA )){ ?>
						<p><em><strong>Categoría I (estudiantil):</strong></em>
						<?php echo $categoriaA; }?></p>

						<?php $categoriaB = get_post_meta(get_the_ID(),'categoriaB',true); 
						if(!empty($categoriaB )){ ?>
						<p><em><strong>Categoría II (investigadores y docentes):</strong></em>
						<?php echo $categoriaB; }?></p> 

						<?php $categoriaC = get_post_meta(get_the_ID(),'categoriaC',true);  
						if(!empty($categoriaC )){ ?>
						<p><em><strong>Categoría III (gestores institucionales):</strong></em>
						<?php echo $categoriaC; }?></p>
			</div>
		<?php else: ?>
			<div class="contenidoArchive col-xs-12">
				<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
				
				<?php $becasDisponibles = get_post_meta(get_the_ID(),'becasDisponibles',true); 
						if(!empty($becasDisponibles )){ ?>
						<p><em><strong>Total becas disponibles:</strong></em>
						<?php echo $becasDisponibles; }?></p>
						
						<?php $categoriaA = get_post_meta(get_the_ID(),'categoriaA',true); 
						if(!empty($categoriaA )){ ?>
						<p><em><strong>Categoría I (estudiantil):</strong></em>
						<?php echo $categoriaA; }?></p>

						<?php $categoriaB = get_post_meta(get_the_ID(),'categoriaB',true); 
						if(!empty($categoriaB )){ ?>
						<p><em><strong>Categoría II (investigadores y docentes):</strong></em>
						<?php echo $categoriaB; }?></p> 

						<?php $categoriaC = get_post_meta(get_the_ID(),'categoriaC',true);  
						if(!empty($categoriaC )){ ?>
						<p><em><strong>Categoría III (gestores institucionales):</strong></em>
						<?php echo $categoriaC; }?></p>
			</div>
		<?php endif; ?>
	</div>
</article>
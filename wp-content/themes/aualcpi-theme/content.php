<!--
	Archivo que configura de una manera más detallada las publicaciones del sitio
	este archivo por jerarquia se suporpone al index.php
	
	-->
<div class="container">
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
		<div class="row">
			<?php if( has_post_thumbnail( )): ?>
				<div class="col-xs-12 col-sm-4">
					<div class="thumbnail"><?php the_post_thumbnail ('medium'); ?></div>
				</div>
				<div class="col-xs-12 col-sm-8">
					<?php the_title( sprintf('<h4 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h4>'); ?>
					<small> Publicado el: <?php  the_time('F j, Y'); ?> a las <?php the_time('g:i a') ?></small>
					<?php the_content(); ?>
			    </div>
			<?php else: ?>
				<div class="col-xs-12">
						<?php the_title( sprintf('<h4 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h4>'); ?>
						<small> Publicado el: <?php  the_time('F j, Y'); ?> a las <?php the_time('g:i a') ?></small>
						<?php the_content(); ?>
				 </div>
			<?php endif; ?>
		</div>
		<div class="row">
			<?php if(comments_open()){ comments_template();
				}else{ echo '<h5 class"text-center">No hay comentarios</h5>'; } ?>
		</div>
</article>
</div>	
		
		
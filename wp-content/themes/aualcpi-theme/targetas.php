<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<header class= "entry-header">
		<?php the_title( sprintf('<h4 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h4>'); ?>
		<small> Publicado el: <?php  the_time('F j, Y'); ?> a las <?php the_time('g:i a') ?>, in <?php the_category(); ?> </small>
	</header>
		<div class="row">
			<?php if( has_post_thumbnail( )): ?>
				<div class="col-xs-12 col-sm-4">
					<div class="thumbnail"><?php the_post_thumbnail ('medium'); ?></div>
				</div>
				<div class="col-xs-12 col-sm-8">
					<?php "titulo:".the_title(); ?>
					<?php the_content(); ?>
			    </div>
			<?php else: ?>
				<div class="col-xs-12">
						<?php "titulos:".the_title(); ?>
						<?php the_content(); ?>
				 </div>
			<?php endif; ?>
		</div>
</article>	
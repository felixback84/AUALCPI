<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<!-- <header class= "entry-header">
		<?php the_title( sprintf('<h4 class="entry-title"><a href="%s">', esc_url(get_permalink() )),'</a></h4>'); ?>
		<small> Publicado el: <?php  the_time('F j, Y'); ?> a las <?php the_time('g:i a') ?>, in <?php the_category(); ?> </small>
	</header> -->
	<div class="bloqueTargeta bloqueTargetaFormatoContribucionAutor">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php if( has_post_thumbnail( )): ?>
							<div class="thumbnail"><?php the_post_thumbnail ('full'); ?></div>
						<?php else: ?>
							<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cuadroPost.png" alt="imagen de defecto" width="" height="" /></div>
						<?php endif; ?>
						<!-- <p>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></p> -->
						<h4><a href="<?php echo esc_url(get_permalink()); ?> "><?php echo wp_trim_words(get_the_title(),9,'...'); ?></a></h4>
						<p><?php  echo wp_trim_words(get_the_content(),30,'...'); ?></p> 
						<?php $author_obj = get_user_by( 'email',get_the_author_meta( 'user_email')); 
						$userId=$author_obj->ID; ?>
						<p class=""><?php echo get_avatar( $userId, '60' ,'','logo usurio',array(
											'class' => 'img-circle',
										)); ?> <?php the_author(); ?></p>
						<div style="margin-top: 10px;">
							<div class="fb-like espacioLinkTarjeta" data-href="<?php echo esc_url(get_permalink()); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false" ></div>
							<span class="pull-right"><?php comments_number( '0', '1', '%' ); ?> <span class="icon icon-comments"></span></span>
						</div>
					</div><p class="linea"></p>
				</div>
			</div>
		</div>
	</div>
</article>	
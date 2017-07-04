<?php if( has_post_thumbnail( )): ?>
	<div class="thumbnail"><?php the_post_thumbnail ('full'); ?></div>
<?php else: ?>
	<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="imagen de defecto" width="" height="" /></div>
<?php endif; ?>
<div class="carousel-caption">
	<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
				<h4><a href="<?php echo esc_url(get_permalink()); ?> "><?php echo wp_trim_words(get_the_title(),9,'...'); ?></a></h4>
				<p><?php  echo wp_trim_words(get_the_content(),50,'...'); ?>(<a href="<?php echo esc_url(get_permalink()); ?> ">Ver más</a>) <span><?php the_time('F j, Y'); ?> a las <?php the_time('g:i a'); ?></span></p>
	</article>
</div>

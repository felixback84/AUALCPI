<li>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
    <?php the_title(); ?></a>,
    <?php the_time('d M Y'); ?> in <?php the_category('&');?>
    <div class="col-xs-12">
						<?php "titulos:".the_title(); ?>
						<?php the_excerpt(); ?>
				 </div>
</li>
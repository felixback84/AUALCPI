<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
			<?php if( have_posts() ):
			while( have_posts() ): the_post(); ?>
				<?php if( has_post_thumbnail() ): ?>
							<div class="thumbnail" style="margin-top: 20px;"><?php the_post_thumbnail('full'); ?></div>
				<?php endif; ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="styleSingleEventos">
						<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile;
			endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
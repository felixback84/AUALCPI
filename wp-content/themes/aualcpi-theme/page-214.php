<?php get_header(); ?>
<!-- pagina calendario-->
<div class="container">
	<div class="row">
		<div class="col-xs-12" style="margin:30px 0;">
			<?php if(have_posts()):
				while( have_posts() ): the_post();?>
						<div class="stylePagCalendario">
							<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
								<header class= "entry-header">
									<?php the_title( '<h4 class="entry-title">','</h4>'); ?>
								</header>
									<div class="row">
										<?php if( has_post_thumbnail( )): ?>
											<div class="col-xs-12 col-sm-4">
												<div class="thumbnail"><?php the_post_thumbnail ('medium'); ?></div>
											</div>
											<div class="col-xs-12 col-sm-8">
												<?php the_content(); ?>
										    </div>
										<?php else: ?>
											<div class="col-xs-12">
													<?php the_content(); ?>
											 </div>
										<?php endif; ?>
									</div>
							</article>
						</div>	
				<?php endwhile;
			endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
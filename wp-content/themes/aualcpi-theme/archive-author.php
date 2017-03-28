<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="row text-center no-margin">
			<h4>Archivos investigaciones</h4>
			<?php if( have_posts() ): ?>
				<header class="page-header">
					<?php 
						the_archive_title('<h1 class="page-title">', '</h1>');
						the_archive_description('<div class="taxonomy-description">', '</div>');
					?>
				</header>
				<?php while( have_posts() ): the_post(); ?>
					<?php get_template_part('content', 'archive'); ?>
				<?php endwhile; ?>
				<div class="col-xs-12 text-center">
					<?php the_posts_navigation(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<?php //get_sidebar('investigaciones'); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
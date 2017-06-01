<?php get_header(); ?>
<div class="container">s
	<div class="row">
		<div class="col-xs-12">
			<?php 
				if(have_posts()):
					while( have_posts() ): the_post();?>
					<?php get_template_part('content','search'); ?>
					 <?php endwhile;
				endif;	
				?>
		</div>	
	 </div>	
 </div>
<?php get_footer(); ?>

<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<?php 
				if(have_posts()):
					while( have_posts() ): the_post();?>
					<?php get_template_part('content',get_post_format ()); ?>
					 <?php endwhile;
				endif;	
				?>
		</div>	
	 </div>	
 </div>
<?php get_footer(); ?>

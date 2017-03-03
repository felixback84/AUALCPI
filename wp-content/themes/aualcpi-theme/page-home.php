<?php get_header(); ?>

<div class="row">

			<?php $args = array (
				'type' => 'investigacion',
				'posts_per_page' => 3, 
				
				
			);
			
			
			
			$lastBlog = new WP_Query ($args);
			
			if($lastBlog->have_posts()):
				 
				while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
				
				
			
				
				<div class="col-xs-12 col-sm-4"
				
					<?php get_template_part('content','featured'); ?>
					
				</div>	
				
				 <?php endwhile;
				
			endif;	
			
			/*
			
			este hook resetea el loop cada que se hace una petición mediante
			un loop se debe aplicar esto
				
			*/
			
		    wp_reset_postdata();	
		    
		?>
		
 </div>
 


<?php get_footer(); ?>
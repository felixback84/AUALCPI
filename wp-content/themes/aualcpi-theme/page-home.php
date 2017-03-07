<?php 
get_header(); ?>
<div class="row">
<div id="carousel-example-generic-a" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox"> 
			<?php $args = array (
				'post_type' => 'investigacion',
				'posts_per_page' => 6, 
			);
			$lastBlog = new WP_Query ($args);
			$cont=0;
			if($lastBlog->have_posts()):
				while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
				<?php if($cont%3 == 0 and $cont != 0)  { ?>
							</div>
			    		</div>
					<?php }	?>
					<?php if($cont == 0){ ?>
						<div class="item active">
			    			<div class="row">
					<?php } elseif($cont%3 == 0 and $cont != 0){ ?>
						<div class="item">
			    			<div class="row">
					<?php } ?> 
								<div class="col-xs-12 col-sm-4">
									<?php get_template_part('content'); ?>
								</div>
			    	
				 <?php $cont++; endwhile;
			endif;	
		    wp_reset_postdata();?>
		    	</div>
			</div>
		</div>
		<!-- Controls -->
		  <div class="carousel-nav">
			<a class="controlcarousel pull-right " href="#carousel-example-generic-a" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			  <a class="pull-right controlcarousel" href="#carousel-example-generic-a" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			</a>
		</div>	    
	</div>
</div>
<div class="row">
	<div class="">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
			    <div class="row">
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
			    </div>
		    </div>
		    <div class="item">
			    <div class="row">
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
			    </div>
		    </div>
		    <div class="item">
			    <div class="row">
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
				    <div class="col-sm-4">
				    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="logo">
				    </div>	
			    </div>
		    </div>
		  </div>

		  <!-- Controls -->
		  <div class="carousel-nav">
			<a class="controlcarousel pull-right " href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			  <a class="pull-right controlcarousel" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			</a>
		</div>
	</div>
 </div>
<?php get_footer(); ?>
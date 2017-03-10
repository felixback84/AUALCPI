<?php 
get_header(); $ini=$fin=0; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
						'post_type' => 'becas',
						'posts_per_page' => 6, 
						'orderby' => 'id',
						'order'   => 'DESC',
					);
					$lastBlog = new WP_Query ($args);
					$cont=0;
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
						<?php if($cont%3 == 0 and $cont != 0)  {  $fin+=2; ?>
						
									</div>
					    		</div>
							<?php }	?>
							<?php if($cont == 0){ ?>
								<div class="item active">
					    			<div class="row">
					    			
							<?php $ini+=2;  } elseif($cont%3 == 0 and $cont != 0){  $ini+=2;?>
								<div class="item">
					    			<div class="row">
							<?php } ?> 
										<div class="col-xs-12 col-sm-4">
											<?php get_template_part('targetas'); ?>
										</div>
					    	
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); 
//				     $fin+=2; ?>
			   
						</div>
					</div>
				</div>
				<!-- Controls -->
				<div class="carousel-nav">
					<a class="controlcarousel pull-right " href="#carousel-example-generic-beca" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="pull-right controlcarousel" href="#carousel-example-generic-beca" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<p class="tituloNavegacionCarousel pull-right" >MAS BECAS</p>
				</div>	    
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="carousel-example-generic-a" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
						'post_type' => 'investigacion',
						'posts_per_page' => 6, 
						'orderby' => 'id',
						'order'   => 'DESC',
					);
					$lastBlog = new WP_Query ($args);
					$cont=0;
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
						<?php if($cont%3 == 0 and $cont != 0)  {  $fin+=2; ?>
						
									</div>
					    		</div>
							<?php }	?>
							<?php if($cont == 0){ ?>
								<div class="item active">
					    			<div class="row">
					    			
							<?php $ini+=2;  } elseif($cont%3 == 0 and $cont != 0){  $ini+=2;?>
								<div class="item">
					    			<div class="row">
							<?php } ?> 
										<div class="col-xs-12 col-sm-4">
											<?php get_template_part('targetas'); ?>
										</div>
					    	
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); 
//				     $fin+=2; ?>
			   
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
					<p class="tituloNavegacionCarousel pull-right" >MAS INVESTIGACIONES</p>
				</div>	    
			</div>
		</div>
	</div>
</div>
<?php //echo "ini".$ini." fin ".$fin;
get_footer(); ?>
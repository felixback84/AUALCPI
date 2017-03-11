<?php 
get_header(); $ini=$fin=0; ?>
<script>
var tamano ="q";
var variablejs = jQuery( document ).width();
// if(variablejs > 782){
// 	tamano ="grande";
// }else{
// 	tamano ="pequeño";
// }
</script>
<?php $anchoPantalla= "<script> document.write(tamano) </script>"; 
//echo "--".intval($anchoPantalla,10);
//printf($anchoPantalla);
// var_dump($anchoPantalla);

$anchoPantalla = $anchoPantalla."hola";
// var_dump($anchoPantalla);
// echo intval(preg_replace('/[^0-9]+/', '', $anchoPantalla), 10);

$cadena = "El 10 y el número 20 con menores que el 30"; 
 
$resultado = intval(preg_replace('/[^0-9]+/', '', $cadena), 10); 
 
//echo $resultado; // resultado: 102030
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h4>Becas de movilidad (EMANUEL)</h4>
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
					$numeroElementos=3;
					
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
						<?php if($cont%$numeroElementos == 0 and $cont != 0)  {  $fin+=2; ?>
									</div>
					    		</div>
							<?php }	?>
							<?php if($cont == 0){ ?>
								<div class="item active">
					    			<div class="row">
					    			
							<?php $ini+=2;  } elseif($cont%$numeroElementos == 0 and $cont != 0){  $ini+=2;?>
								<div class="item">
					    			<div class="row">
							<?php }else{ ?> 
									
							<?php } ?> 
										<div class="col-xs-12 col-sm-4">
											<?php get_template_part('targetas-beca'); ?>
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
					$numeroElementos=3;
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
						<?php if($cont%$numeroElementos == 0 and $cont != 0)  {  $fin+=2; ?>
						
									</div>
					    		</div>
							<?php }	?>
							<?php if($cont == 0){ ?>
								<div class="item active">
					    			<div class="row">
					    			
							<?php $ini+=2;  } elseif($cont%$numeroElementos == 0 and $cont != 0){  $ini+=2;?>
								<div class="item">
					    			<div class="row">
							<?php } ?> 
										<div class="col-xs-12 col-sm-4">
											<?php get_template_part('targetas-investigacion'); ?>
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

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="carousel-example-generic-a" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox"> 
					<div class="item active">
							<div class="col-xs-12 col-sm-4">
								<?php get_template_part('targetas'); ?>
							</div>
					</div>
					<div class="item">
							<div class="col-xs-12 col-sm-4">
								<?php get_template_part('targetas'); ?>
							</div>
					</div>
					<div class="item">
							<div class="col-xs-12 col-sm-4">
								<?php get_template_part('targetas'); ?>
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
----
<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
  <div class="carousel-inner">
    <div class="item active">
      <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/e499e4/fff&amp;text=1" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/e477e4/fff&amp;text=2" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/eeeeee&amp;text=3" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/f4f4f4&amp;text=4" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/f566f5/333&amp;text=5" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/f477f4/fff&amp;text=6" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/eeeeee&amp;text=7" class="img-responsive"></a></div>
    </div>
    <div class="item">
      <div class="col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/fcfcfc/333&amp;text=8" class="img-responsive"></a></div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
<?php //echo "ini".$ini." fin ".$fin;
get_footer(); ?>
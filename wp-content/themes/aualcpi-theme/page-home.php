<?php 
get_header();?>
<div class="hidden-xs">
		<?php echo do_shortcode("[huge_it_slider id='1']"); ?>
</div>
<script>
	jQuery(".slider-loader-1").css({ 'display': "none" });
</script>
<div class="container">
	<div class="row">
		<div class="col-sm-12"><h4>Actualidad AUALCPI</h4></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 quitarEspacio" >
			<div id="carousel-example-generic-noticias" class="carousel slide quitarEspacio" data-ride="carousel">
				<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
						'post_type' => 'post',
						'posts_per_page' => 6, 
						'orderby' => 'id',
						'order'   => 'DESC',
					);
					$lastBlog = new WP_Query ($args);
					$cont = 0;
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
							<?php if($cont == 0){ ?>
							<div class="item active quitarEspacio" cont="<?php echo $cont+1; ?>">
							<?php }else{ ?> 
							<div class="item quitarEspacio" cont="<?php echo $cont+1; ?>">
							<?php } ?> 
								<div class="col-xs-12 quitarEspacio">
									<?php get_template_part('targetas-noticias'); ?>
								</div>
							</div> 
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); ?>
				</div>
				<div class="carousel-nav">
					<a class="controlcarousel pull-right " href="#carousel-example-generic-noticias" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="pull-right controlcarousel" href="#carousel-example-generic-noticias" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagN"></span> de 6 </p>
				</div>	    
			</div>
		</div>
		<div id="tabsEventoTwitter" class="hidden-xs hidden-sm col-md-4 col-lg-4" style="">
			  <ul  class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#Eventos" aria-controls="Eventos" role="tab" data-toggle="tab">Eventos</a></li>
			    <li role="presentation"><a href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab">Twitter</a></li>
			  </ul>
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="Eventos">
					<div class="contenido-tabs">
						<?php echo do_shortcode('[ai1ec view="monthly"]'); ?>
					</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="twitter">
			     	<div class="contenido-tabs">
						<a class="twitter-timeline" href="https://twitter.com/aualcpi">Twitter Aualcpi</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			     	</div>
			    </div>
			  </div>
		</div>
	</div>
</div>
<!-- <div class="container">
	<a tabindex="0"
	   class="btn btn-lg btn-primary" 
	   role="button" 
	   data-html="true" 
	   data-toggle="popover" 
	   data-trigger="focus" title="Tipos de Becas" data-content="<div class='descripcionPequeña'>
		<p>-<strong>Beca completa:</strong> Incluye hospedaje, alimentación y transporte durante el periodo de estudios.</p>
		<p>-<strong>Beca completa:</strong> Incluye únicamente hospedaje / alimentación / transporte durante el periodo de estudio. *</p>
		<p>*Las condiciones deben ser consultadas con la Oficina de Relaciones Internacionales ORI o a través de <a href='#'>Aualcpi</a>.</p>
	</div>">Toggle popover</a>

</div>
<a href="#" data-toggle="modal" data-target="#myModal">modal</a>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tipos de Becas</h4>
      </div>
      <div class="modal-body">
         <p>-<strong>Beca completa:</strong> Incluye hospedaje, alimentación y transporte durante el periodo de estudios.</p>
		<p>-<strong>Beca completa:</strong> Incluye únicamente hospedaje / alimentación / transporte durante el periodo de estudio. *</p>
		<p>*Las condiciones deben ser consultadas con la Oficina de Relaciones Internacionales ORI o a través de <a href="#">Aualcpi</a>.</p>
      </div>
      
    </div>
  </div>
</div> -->


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h4>Becas de movilidad (EMANUEL)</h4>
			<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi">
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
							<?php if($cont == 0){ ?>
								<div class="item active">
							<?php }else{ ?> 
									<div class="item">
							<?php } ?> 
								<div class="col-xs-12 col-sm-4">
									<?php get_template_part('targetas-beca'); ?>
								</div>
							</div> 
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); ?>
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
			<h4>Investigación regional (RED LISI)</h4>	
			<div id="carousel-example-generic-a" class="carousel slide" data-ride="carousel"  data-type="multi">
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
						<?php if($cont == 0){ ?>
								<div class="item active">
							<?php }else{ ?> 
									<div class="item">
							<?php } ?> 
										<div class="col-xs-12 col-sm-4">
											<?php get_template_part('targetas-investigacion'); ?>
										</div>
									</div>
					    	
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); 
//				     $fin+=2; ?>
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
			<h4>Publicaciones</h4>	
			<div id="carousel-example-generic-a" class="carousel slide" data-ride="carousel"  data-type="multi">
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
						'post_type' => 'publicacion',
						'posts_per_page' => 6, 
						'orderby' => 'id',
						'order'   => 'DESC',
					);
					$lastBlog = new WP_Query ($args);
					$cont=0;
					$numeroElementos=3;
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
						<?php if($cont == 0){ ?>
								<div class="item active">
							<?php }else{ ?> 
									<div class="item">
							<?php } ?> 
										<div class="col-xs-12 col-sm-4">
											<?php get_template_part('targetas-publicacion'); ?>
										</div>
									</div>
						 	<?php $cont++; endwhile;
						endif;	
				    wp_reset_postdata(); 
//				     $fin+=2; ?>
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
					<p class="tituloNavegacionCarousel pull-right" >MAS PUBLICACIONES</p>
				</div>	    
			</div>
		</div>
	</div>
</div>

<div id="myModalBeca1" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tipos de Becas</h4>
      </div>
      <div class="modal-body">
         <p>-<strong>Beca completa:</strong> Incluye hospedaje, alimentación y transporte durante el periodo de estudios.</p>
		<p>-<strong>Beca completa:</strong> Incluye únicamente hospedaje / alimentación / transporte durante el periodo de estudio. *</p>
		<p>*Las condiciones deben ser consultadas con la Oficina de Relaciones Internacionales ORI o a través de <a href="#">Aualcpi</a>.</p>
      </div>
      
    </div>
  </div>
</div>
<div id="myModalBeca2" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Categorias de becas</h4>
      </div>
      <div class="modal-body">
         
      </div>
      
    </div>
  </div>
</div>
<div id="myModalBecaAplicar" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">¡Estás muy cerca de dar un gran paso en tu vida personal y profesional!</h4>
      </div>
      <div class="modal-body">
         <p>Descarga el <a href="">Formulario de inscripción</a>  y envíalo al correo aualcpi@udca.edu.co.</p>
         <p>Tambien puedes contactárte con la Oficina de Relaciones Internacionales de tu Universidad:</p>
         <div class="row">
         <div class="col-sm-8 col-sm-push-2">
         	<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/iconosModalBecasSkype.png" style="" alt="" width="" height="" style="color:#1eafd2;"/> ORI.UPiloto</p>
         	<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/iconosModalBecasWhatsApp.png" style="" alt="" width="" height="" style="color:#1eafd2;"/> +571 5678903</p>
         </div>
         </div>
      </div>
      
    </div>
  </div>
</div>
<?php //echo "ini".$ini." fin ".$fin;
get_footer(); ?>
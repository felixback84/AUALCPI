<?php get_header();?>
<div class="hidden-xs">
		<?php echo do_shortcode("[huge_it_slider id='1']"); ?>
</div>
<div class="container paginaHome">
	<div class="row">
		<div class="col-sm-12 quitarEspacio titutloActualizadad"><h1>Actualidad AUALCPI</h1></div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 quitarEspacio" >
			<div id="carousel-example-generic-noticias" class="carousel slide quitarEspacio sombraInferior" data-ride="carousel">
				<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
						'post_type' => 'post',
						'posts_per_page' => 5, 
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
				</div><div class="contador"  cont="<?php echo $cont; ?>"></div>
				<div class="carousel-nav">
					  <a class="left carousel-control" href="#carousel-example-generic-noticias" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic-noticias" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					
					<p class="tituloNavegacionCarousel" ><a href="<?php echo home_url('/noticias/')?>">Más noticias</a></p>
					<p class="tituloNavegacionCarousel pull-right"  style="margin-top: -35px;">Página <span id="pagN"></span> de <span id="pagNC"></span> </p>
				</div>	    
			</div>
		</div>
		<div id="tabsEventoTwitter" class="hidden-xs hidden-sm col-md-4 col-lg-4 " style="">
			  <ul  class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active">
			    	<a href="#Eventos" aria-controls="Eventos" role="tab" data-toggle="tab">Eventos</a>
			    	<div class="triangulo"></div>
			    </li>
			    <li role="presentation">
			    	<a href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab"><span class="icon icon-twitter" style="font-size: 15px;"> </span>Twitter</a>
			    	<div class="triangulo"></div>
			    </li>
			  </ul>
			  <div class="tab-content sombraInferior">
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
<div class="triangulo"></div>
<!-- inicio becas-->
<?php $tituloBecas= "Becas de movilidad recientes"; ?>
<?php $linkBecas= home_url('/becas/'); ?>
<div class="hidden-xs hidden-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloBecas; ?></h1>
				<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="mulsti" >
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
								'post_type' => 'becas',
								'posts_per_page' => 15, 
								'orderby' => 'id',
								'order'   => 'DESC',
							);
							$lastBlog = new WP_Query ($args);
							$cont=0;
							$numeroElementos=3;
							if($lastBlog->have_posts()):
								while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
									<?php if($cont== 0){ ?>
										<div class="item active" cont="1">
									<?php } ?> 
									<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
										</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
									<?php } ?> 
											<div class="col-xs-12 col-sm-6 col-md-4">
												<?php get_template_part('targetas-beca'); ?>
											</div>	
									<?php if($cont%$numeroElementos == 0){ ?> 
										
									<?php } ?> 								
								 	<?php $cont++; endwhile;
								endif;	
							wp_reset_postdata(); 
							//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo round($cont/$numeroElementos); ?>"></div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic-beca" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic-beca" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					 </a>
				</div>
			</div>
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkBecas;?>">Más becas</a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagB"></span>  de <span id="pagBC"></span></p>
		</div>
	</div>
</div>
<div class="visible-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloBecas; ?></h1>
				<div id="carousel-example-generic-beca-2" class="carousel slide" data-ride="carousel" data-type="mulsti" >
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
								'post_type' => 'becas',
								'posts_per_page' => 15, 
								'orderby' => 'id',
								'order'   => 'DESC',
							);
							$lastBlog = new WP_Query ($args);
							$cont=0;
							$numeroElementos=2;
							if($lastBlog->have_posts()):
								while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
									<?php if($cont== 0){ ?>
										<div class="item active" cont="1">
									<?php } ?> 
									<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
										</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
									<?php } ?> 
											<div class="col-xs-12 col-sm-6 col-md-4">
												<?php get_template_part('targetas-beca'); ?>
											</div>	
									<?php if($cont%$numeroElementos == 0){ ?> 
										
									<?php } ?> 								
								 	<?php $cont++; endwhile;
								endif;	
							wp_reset_postdata(); 
							//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo round($cont/$numeroElementos); ?>"></div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic-beca-2" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic-beca-2" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					 </a>
				</div>
			</div>
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkBecas;?>">Más becas</a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagB-2"></span>  de <span id="pagBC-2"></span></p>
		</div>
	</div>
</div>
<div class="visible-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloBecas; ?></h1>
				<div id="carousel-example-generic-beca-3" class="carousel slide" data-ride="carousel" data-type="mulsti" >
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
								'post_type' => 'becas',
								'posts_per_page' => 15, 
								'orderby' => 'id',
								'order'   => 'DESC',
							);
							$lastBlog = new WP_Query ($args);
							$cont=0;
							$numeroElementos=1;
							if($lastBlog->have_posts()):
								while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
									<?php if($cont== 0){ ?>
										<div class="item active" cont="1">
									<?php } ?> 
									<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
										</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
									<?php } ?> 
											<div class="col-xs-12 col-sm-6 col-md-4">
												<?php get_template_part('targetas-beca'); ?>
											</div>	
									<?php if($cont%$numeroElementos == 0){ ?> 
										
									<?php } ?> 								
								 	<?php $cont++; endwhile;
								endif;	
							wp_reset_postdata(); 
							//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo round($cont/$numeroElementos); ?>"></div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic-beca-3" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic-beca-3" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					 </a>
				</div>
			</div>
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkBecas;?>">Más becas</a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagB-3"></span>  de <span id="pagBC-3"></span></p>
		</div>
	</div>
</div>
<!-- fin becas-->
<!-- inicio invesgacion-->
<?php $tituloInvestigacion = 'Retos regionales recientes'; ?>
<?php $linkInvestigacion = home_url('/investigacion/'); ?>
<div class="hidden-xs hidden-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloInvestigacion; ?></h1>	
				<div id="carousel-example-generic-investigacion" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
								'post_type' => 'investigacion',
								'posts_per_page' => 15, 
								'orderby' => 'id',
								'order'   => 'DESC',
							);$lastBlog = new WP_Query ($args);
								$cont=0;
								$numeroElementos=3;
								if($lastBlog->have_posts()):
									while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
										<?php if($cont== 0){ ?>
											<div class="item active" cont="1">
										<?php } ?> 
										<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
											</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
										<?php } ?> 
												<div class="col-xs-12 col-sm-6 col-md-4">
													<?php get_template_part('targetas-investigacion'); ?>
												</div>	
										<?php if($cont%$numeroElementos == 0){ ?> 
											
										<?php } ?> 								
									 	<?php $cont++; endwhile;
									endif;	
								wp_reset_postdata(); 
								//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo round($cont/$numeroElementos); ?>"></div>
					<!-- Controls -->
					<a class="right carousel-control" href="#carousel-example-generic-investigacion" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="left carousel-control" href="#carousel-example-generic-investigacion" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkInvestigacion;?>">Más retos</a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI"></span>  de <span id="pagIC"></span></p>
		</div>
	</div>
</div>
<div class="visible-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloInvestigacion; ?></h1>	
				<div id="carousel-example-generic-investigacion-2" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
								'post_type' => 'investigacion',
								'posts_per_page' => 15, 
								'orderby' => 'id',
								'order'   => 'DESC',
							);$lastBlog = new WP_Query ($args);
								$cont=0;
								$numeroElementos=2;
								if($lastBlog->have_posts()):
									while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
										<?php if($cont== 0){ ?>
											<div class="item active" cont="1">
										<?php } ?> 
										<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
											</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
										<?php } ?> 
												<div class="col-xs-12 col-sm-6 col-md-4">
													<?php get_template_part('targetas-investigacion'); ?>
												</div>	
										<?php if($cont%$numeroElementos == 0){ ?> 
											
										<?php } ?> 								
									 	<?php $cont++; endwhile;
									endif;	
								wp_reset_postdata(); 
								//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo round($cont/$numeroElementos); ?>"></div>
					<!-- Controls -->
					<a class="right carousel-control" href="#carousel-example-generic-investigacion-2" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="left carousel-control" href="#carousel-example-generic-investigacion-2" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkInvestigacion;?>">Más retos</a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI-2"></span>  de <span id="pagIC-2"></span></p>
		</div>
	</div>
</div>
<div class="visible-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloInvestigacion; ?></h1>	
				<div id="carousel-example-generic-investigacion-3" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
								'post_type' => 'investigacion',
								'posts_per_page' => 15, 
								'orderby' => 'id',
								'order'   => 'DESC',
							);$lastBlog = new WP_Query ($args);
								$cont=0;
								$numeroElementos=1;
								if($lastBlog->have_posts()):
									while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
										<?php if($cont== 0){ ?>
											<div class="item active" cont="1">
										<?php } ?> 
										<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
											</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
										<?php } ?> 
												<div class="col-xs-12 col-sm-6 col-md-4">
													<?php get_template_part('targetas-investigacion'); ?>
												</div>	
										<?php if($cont%$numeroElementos == 0){ ?> 
											
										<?php } ?> 								
									 	<?php $cont++; endwhile;
									endif;	
								wp_reset_postdata(); 
								//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo round($cont/$numeroElementos); ?>"></div>
					<!-- Controls -->
					<a class="right carousel-control" href="#carousel-example-generic-investigacion-3" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="left carousel-control" href="#carousel-example-generic-investigacion-3" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkInvestigacion;?>">Más retos</a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI-3"></span>  de <span id="pagIC-3"></span></p>
		</div>
	</div>
</div>
<!-- fin invesgacion-->
<!-- inicio esctadisticas-->
<?php $tituloEstadisticas = 'Estadisticas recientes'; ?>
<?php $linkEstadisticas = home_url('/#/'); ?>
<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloEstadisticas; ?></h1>
				<div class="thumbnail"><img alt="logo Aliado" src="<?php echo get_stylesheet_directory_uri(); ?>/images/Estadisticas.jpg"></div>
			</div>
		</div>
	</div>
<div class="carousel-nav sombraInferior">
	<div class="container quitarPadding">
		<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkEstadisticas;?>">Más estadisticas</a></p>
		<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagE">1</span>  de <span id="pagIE">1</span></p>
	</div>
</div>
<!-- fin esctadisticas-->
<!-- inicio descarga-->
<?php  $tituloDescargas='Descargas recientes'; ?>
<?php  $linkDescargas= home_url('/publicacion/'); ?>
<div class="hidden-xs hidden-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloDescargas; ?></h1>	
				<div id="carousel-example-generic-publicacion" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
							'post_type' => 'publicacion',
							'posts_per_page' => 15, 
							'orderby' => 'id',
							'order'   => 'DESC',
						);
						$lastBlog = new WP_Query ($args);
						$cont=0;
						$numeroElementos=3;
						if($lastBlog->have_posts()):
							while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
								<?php if($cont== 0){ ?>
									<div class="item active" cont="1">
								<?php } ?> 
								<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
									</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
								<?php } ?> 
										<div class="col-xs-12 col-sm-6 col-md-4">
											<?php get_template_part('targetas-publicacion'); ?>
										</div>	
								<?php if($cont%$numeroElementos == 0){ ?> 
									
								<?php } ?> 								
							 	<?php $cont++; endwhile;
							endif;	
						wp_reset_postdata(); 
						//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo $cont; ?>"></div>
					<!-- Controls -->
						<a class="right carousel-control" href="#carousel-example-generic-publicacion" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						  <a class="left carousel-control" href="#carousel-example-generic-publicacion" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
				</div>
			</div>
		</div>
	</div>
		<div class="carousel-nav sombraInferior">
			<div class="container quitarPadding">
				<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkDescargas;?>">Más descargas</a></p>
				<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagP"></span>  de <span id="pagPC"></span></p>
			</div>
		</div>
</div>
<div class="visible-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloDescargas; ?></h1>	
				<div id="carousel-example-generic-publicacion-2" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
							'post_type' => 'publicacion',
							'posts_per_page' => 15, 
							'orderby' => 'id',
							'order'   => 'DESC',
						);
						$lastBlog = new WP_Query ($args);
						$cont=0;
						$numeroElementos=2;
						if($lastBlog->have_posts()):
							while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
								<?php if($cont== 0){ ?>
									<div class="item active" cont="1">
								<?php } ?> 
								<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
									</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
								<?php } ?> 
										<div class="col-xs-12 col-sm-6 col-md-4">
											<?php get_template_part('targetas-publicacion'); ?>
										</div>	
								<?php if($cont%$numeroElementos == 0){ ?> 
									
								<?php } ?> 								
							 	<?php $cont++; endwhile;
							endif;	
						wp_reset_postdata(); 
						//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo $cont; ?>"></div>
					<!-- Controls -->
						<a class="right carousel-control" href="#carousel-example-generic-publicacion-2" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						  <a class="left carousel-control" href="#carousel-example-generic-publicacion-2" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
				</div>
			</div>
		</div>
	</div>
		<div class="carousel-nav sombraInferior">
			<div class="container quitarPadding">
				<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkDescargas;?>">Más descargas</a></p>
				<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagP-2"></span>  de <span id="pagPC-2"></span></p>
			</div>
		</div>
</div>
<div class="visible-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloDescargas; ?></h1>	
				<div id="carousel-example-generic-publicacion-3" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
							'post_type' => 'publicacion',
							'posts_per_page' => 15, 
							'orderby' => 'id',
							'order'   => 'DESC',
						);
						$lastBlog = new WP_Query ($args);
						$cont=0;
						$numeroElementos=1;
						if($lastBlog->have_posts()):
							while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
								<?php if($cont== 0){ ?>
									<div class="item active" cont="1">
								<?php } ?> 
								<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
									</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
								<?php } ?> 
										<div class="col-xs-12 col-sm-6 col-md-4">
											<?php get_template_part('targetas-publicacion'); ?>
										</div>	
								<?php if($cont%$numeroElementos == 0){ ?> 
									
								<?php } ?> 								
							 	<?php $cont++; endwhile;
							endif;	
						wp_reset_postdata(); 
						//$fin+=2; ?></div>
					</div><div class="contador"  cont="<?php echo $cont; ?>"></div>
					<!-- Controls -->
						<a class="right carousel-control" href="#carousel-example-generic-publicacion-3" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						  <a class="left carousel-control" href="#carousel-example-generic-publicacion-3" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
				</div>
			</div>
		</div>
	</div>
		<div class="carousel-nav sombraInferior">
			<div class="container quitarPadding">
				<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkDescargas;?>">Más descargas</a></p>
				<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagP-3"></span>  de <span id="pagPC-3"></span></p>
			</div>
		</div>
</div>
<!-- fin descarga-->
<?php get_template_part('targetas-aliados'); ?>
<div id="myModalBeca1" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1 class="modal-title">Tipos de Becas</h1>
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
        <h1 class="modal-title">¡Estás muy cerca de dar un gran paso en tu vida personal y profesional!</h1>
      </div>
      <div class="modal-body">
         <p>Descarga el <a href="">Formulario de inscripción</a>  y envíalo al correo aualcpi@udca.edu.co.</p>
         <p>Tambien puedes contactárte con la Oficina de Relaciones Internacionales de tu Universidad:</p>
         <div class="row">
         <div class="col-sm-8 col-sm-push-2">
         	<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/skype.svg" style="" alt="icono de skype" width="50" height="50" style="color:#1eafd2;"/> ORI.UPiloto</p>
         	<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svg/whatsapp.svg" style="" alt="icono de whatsapp" width="50" height="50" style="color:#1eafd2;"/> +571 5678903</p>
         </div>
         </div>
      </div>
    </div>
  </div>
</div>
<?php //echo "ini".$ini." fin ".$fin;
get_footer(); ?>
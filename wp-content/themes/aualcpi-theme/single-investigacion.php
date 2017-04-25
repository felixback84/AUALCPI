<?php get_header(); 
$idPost;?>
<div class="container">
	<div class="row espacioBotton">
		<div class="col-xs-12" style="">
			<?php if( have_posts() ):
				while( have_posts() ): the_post(); ?>
				<?php //$idPost=$post->ID; 
				//echo $idPost; ?>
					<div class="singleInvestigaciones">
						<div id="carousel-id" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<?php if( has_post_thumbnail() ): ?>
										<div class="thumbnail"><?php the_post_thumbnail('full'); ?></div>
									<?php endif; ?>
									<div class="container">
										<div class="carousel-caption">
											<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<p>
							<?php $terms_list=wp_get_post_terms($post->ID,'areas');
							if(count($terms_list)!=0) { echo ('Areas de conocimiento: ');
							echo mostrarCategorias($terms_list,'\\'); }
							$terms_list= null;
							?>
							<?php $terms_list=wp_get_post_terms($post->ID,'universidades_investigacion');
							if(count($terms_list)!=0) { echo (' || Universidad: ');
							echo mostrarCategorias($terms_list,'\\'); }
							$terms_list= null;
							?>
							<?php $terms_list=wp_get_post_terms($post->ID,'status_inves');
							if(count($terms_list)!=0) { echo (' || Status: ');
							echo mostrarCategorias($terms_list,'\\');}
							$terms_list= null;
							?>
							<?php $terms_list=wp_get_post_terms($post->ID,'ciudad_investigaciones');
							if(count($terms_list)!=0) { echo (' || Pais/Ciudad: ');
							echo mostrarCategorias($terms_list,' |');}
							$terms_list= null;
							?>
							<?php $terms_list=wp_get_post_terms($post->ID,'tag_investigacion');
							if(count($terms_list)!=0) { echo (' || Tag: ');
							echo mostrarCategorias($terms_list,'\\');}
							$terms_list= null;
							?>
							<?php if( current_user_can('manage_options') ) {
							//echo '|| ';  edit_post_link(); 
							} ?>
						</p>
					</div>
				<?php endwhile;
			endif; ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div id="" class="col-xs-12">
			 <ul  class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#Ideacion" aria-controls="Ideacion" role="tab" data-toggle="tab">Ideación</a></li>
			    <li role="presentation"><a href="#RetroAlimentacion" aria-controls="RetroAlimentacion" role="tab" data-toggle="tab">Retro Alimentacion</a></li>
			    <li role="presentation"><a href="#Refinar" aria-controls="Refinar" role="tab" data-toggle="tab">Refinar</a></li>
			    <li role="presentation"><a href="#2daRetroAlimentación" aria-controls="2daRetroAlimentación" role="tab" data-toggle="tab">2daRetro Alimentación</a></li>
			    <li role="presentation"><a href="#IdeasTop" aria-controls="IdeasTop" role="tab" data-toggle="tab">Ideas Top</a></li>
			    <li role="presentation"><a href="#Impacto" aria-controls="Impacto" role="tab" data-toggle="tab">Impácto</a></li>
			  </ul>
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="Ideacion">
					<div class="contenido-tabs">
						<!--inicion ideacion-->
						<div class="col-xs-12">
							<?php if( have_posts() ):
							while( have_posts() ): the_post(); ?>
							<?php $idPost=$post->ID; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="singleInvestigaciones">										
										<div class="row">
											<div class="col-sx-12 col-md-7">
												<h2>Ideas</h2>
												<?php the_content(); ?>
											</div>
											<div class="col-sx-12 col-md-4 col-md-push-1">
												<div class="singleInvestigacionPanelIzquierdo">
													<h4>Información adicional</h4>
													<?php //var_dump(get_post_meta(get_the_ID(), 'wp_custom_attachment', true));
														$pdf_info = get_post_meta(get_the_ID(), 'wp_custom_attachment', true); 
														$pdf_file = $pdf_info['file'];
														$pdf_link = $pdf_info['url'];
														echo '- <a href="'.$pdf_link = $pdf_info['url'].'" target="_blank">'.basename($pdf_info['url']).'</a>';
													?>
												</div>
												<div class="singleInvestigacionPanelIzquierdo">
													<h5>Apoyado por:</h5>
													<?php if (class_exists('MultiPostThumbnails')) : 
													MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', get_the_ID(), array(100,100));
													endif; ?>
												</div>
											</div>
										</div>
									</div>
								</article>
							<?php endwhile;
							endif; ?>
						</div>
						<div class="col-sm-12">
							<h1>Contribuciones recientes a retos regionales</h1>
							<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
							<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox"> 
								<?php $args = array(
									'post_type' => 'contribuciones',
									'post_parent' => $idPost,
									'posts_per_page' => 6, 
									'orderby' => 'id',
									'order'   => 'DESC'
									);
									$custom_posts = new WP_Query( $args );
									$cont=0;
									if ( $custom_posts->have_posts() ): 
										while ( $custom_posts->have_posts() ) : $custom_posts->the_post(); ?>
									<?php if($cont == 0){ ?>
												<div class="item active">
											<?php }else{ ?> 
													<div class="item">
											<?php } ?> 
												<div class="col-xs-12 col-sm-4">
													<?php get_template_part('targetas-author-contribuciones'); ?>
												</div>
											</div> 
								<?php $cont++; endwhile;
								endif;	
						    	wp_reset_postdata(); ?>
						    	</div>
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
					<!--fin ideacion-->
					</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="RetroAlimentacion">
			     	<div class="contenido-tabs">
						RetroAlimentacion
			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="Refinar">
			     	<div class="contenido-tabs">
						Refinar
			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="2daRetroAlimentación">
			     	<div class="contenido-tabs">
						2daRetroAlimentación
			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="IdeasTop">
			     	<div class="contenido-tabs">
						IdeasTop
			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="Impacto">
			     	<div class="contenido-tabs">
						Impacto
			     	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<div class="espacioBotton">
	<div class="carousel-nav sombraInferior">
		<div class="container row">
			<p class="tituloNavegacionCarousel pull-right" >MAS CONTRIBUCIONES</p>
		</div>
	</div>
</div>	 
<?php get_footer(); ?>
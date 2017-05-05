<?php get_header(); 
$idPost;?>

<?php if( have_posts() ):
	while( have_posts() ): the_post(); ?>
	<?php //$idPost=$post->ID; 
	//echo $idPost; ?>
		<div class="singleInvestigaciones espacioBotton">
			<div id="imagenTop" class="carousel slide" data-ride="carousel">
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
			<div class="container">
				<div class="row">
					<div class="col-xs-12" style="">
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
				</div>
			</div>
		</div>
	<?php endwhile;
endif; ?>

<div class="container">
	<div class="row espacioBotton">
		<div id="cuadroHazteMiembro" class="col-xs-12 col-sm-8 col-sm-push-2">
			<h4 class="text-center">La Red Lisi es una plataforma de investigación regional <a href="<?php echo home_url('/membresia/');  ?>">Házte miembro</a></h4>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
	<?php if( have_posts() ):
		while( have_posts() ): the_post(); ?>
				<?php $hoy=date("M d, Y", time()); //echo 'hoy2'.$hoy; ?>

			   
		<div id="" class="col-xs-12">
			 <ul id="tabsInvestigacion" class="nav nav-tabs" role="tablist">
			 	<?php $fechaInicio1 = date("M d, Y", get_post_meta(get_the_ID(), 'investigacionFechaIdeacion', true)); 
				$fechaFin1 = date("M d, Y", get_post_meta(get_the_ID(), 'investigacionFechaRetroAlimentacion', true));  //echo $fechaInicio1.'-'.$fechaFin1; 
				$fechaInicio2 = $fechaFin1; 
				$fechaFin2 = date("M d, Y", get_post_meta(get_the_ID(), 'investigacionFechaRefinar', true));
				$fechaInicio3 = $fechaFin2; 
				$fechaFin3 = date("M d, Y", get_post_meta(get_the_ID(), 'investigacionFechaRetroAlimentacion2', true));
				$fechaInicio4 = $fechaFin3; 
				$fechaFin4 = date("M d, Y", get_post_meta(get_the_ID(), 'investigacionFechaIdeasTop', true));
				$fechaInicio5 = $fechaFin4; 
				$fechaFin5 = date("M d, Y", get_post_meta(get_the_ID(), 'investigacionFechaImpacto', true));
				$fechaInicio6 = $fechaFin5; 
				?>
			    <li role="presentation"  <?php  if(($fechaFin1 > $hoy) || (empty($fechaInicio1))){ echo 'class="active"';}?> >
			    	<a href="#Ideacion" aria-controls="Ideacion" role="tab" data-toggle="tab">
			    		<p class="text-center">Ideación</p>
			    		<p id="lineaIdeacion"></p>
			    		<p><?php if($fechaInicio1 <= $hoy){ echo '<p class="contribuciones1 text-center"></p><p class="text-center">contribuciones</p>'; }else{echo '<p class="text-center">Empieza en</p><p class="text-center">'.$fechaInicio1.'</p>';} ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio2 <= $hoy)&&($fechaFin2 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#RetroAlimentacion" aria-controls="RetroAlimentacion" role="tab" data-toggle="tab">
			    		<p class="text-center">Retro Alimentacion</p>
			    		<p id="lineaRetroAlimentacion"></p>
			    		<p><?php if($fechaInicio2 <= $hoy){ echo '<p class="contribuciones2 text-center"></p><p class="text-center">contribuciones</p>'; }else{echo '<p class="text-center">Empieza en</p><p class="text-center">'.$fechaInicio2.'</p>';} ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio3 <= $hoy)&&($fechaFin3 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#Refinar" aria-controls="Refinar" role="tab" data-toggle="tab">
			    		<p class="text-center">Refinar</p>
			    		<p id="lineaRefinar"></p>
			    		<p><?php if($fechaInicio3 <= $hoy){ echo '<p class="contribuciones3 text-center"></p><p class="text-center">contribuciones</p>'; }else{echo '<p class="text-center">Empieza en</p><p class="text-center">'.$fechaInicio3.'</p>';} ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio4 <= $hoy)&&($fechaFin4 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#2daRetroAlimentación" aria-controls="2daRetroAlimentación" role="tab" data-toggle="tab">
			    		<p class="text-center">2da Retroalimentación</p>
			    		<p id="lineaRetroAlimentacion2" ></p>
			    		<p><?php if($fechaInicio4 <= $hoy){ echo '<p class="contribuciones4 text-center"></p><p class="text-center">contribuciones</p>'; }else{echo '<p class="text-center">Empieza en</p><p class="text-center">'.$fechaInicio4.'</p>';} ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio5 <= $hoy)&&($fechaFin5 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#IdeasTop" aria-controls="IdeasTop" role="tab" data-toggle="tab">
			    		<p class="text-center">Ideas Top</p>
			    		<p id="lineaIdeasTop"></p>
			    		<p><?php if($fechaInicio5 <= $hoy){ echo '<p class="contribuciones5 text-center"></p><p class="text-center">contribuciones</p>'; }else{echo '<p class="text-center">Empieza en</p><p class="text-center">'.$fechaInicio5.'</p>';} ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio6 <= $hoy)&&($fechaInicio1 <= $hoy)){ echo 'class="active"';}?> >
			    	<a href="#Impacto" aria-controls="Impacto" role="tab" data-toggle="tab">
			    		<p class="text-center">Impácto</p>
			    		<p id="lineaImpacto"></p>
			    		<p><?php if($fechaInicio6 <= $hoy){ echo '<p class="contribuciones6 text-center"></p><p class="text-center">contribuciones</p>'; }else{echo '<p class="text-center">Empieza en</p><p class="text-center">'.$fechaInicio6.'</p>';} ?></p>
			    	</a></li>
			  </ul>
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane <?php if(($fechaFin1 > $hoy) || (empty($fechaInicio1))){ echo ' active';}?> " id="Ideacion">
					<div class="contenido-tabs">
						<!--inicion ideacion-->
						<div class="col-xs-12">
							<?php $idPost=$post->ID; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="singleInvestigaciones">										
										<div class="row">
											<div class="col-sx-12 col-md-7">
												<h2>Ideas</h2>
												<?php the_content(); ?>
												<?php if($fechaInicio1 <= $hoy){ echo '<p><span class="contribuciones1" ></span><span> contribuciones</span></p>'; }else{echo '<p>Empieza en '.$fechaInicio1.'</p>';} ?>
												<a href="http://localhost/AUALCPI/AUALCPI/wp-admin/post-new.php?post_type=contribuciones" class="btn btnAporteIdeas">Aportar una idea</a>
											</div>
											<div class="col-sx-12 col-md-4 col-md-push-1">
												<div class="singleInvestigacionPanelIzquierdo">
													<h4>Información adicional</h4>
													<?php //var_dump(get_post_meta(get_the_ID(), 'investigacion_meta_files', true));
														$files = get_post_meta(get_the_ID(), 'investigacion_meta_files', true); 
														$arrayFiles= explode(",",$files[0]);
														if(is_array($arrayFiles)){
															foreach($arrayFiles as $file){?>
																<p>
																	<?php  echo '- <a href="'.$file.'" target="_blank">'.basename($file).'</a>'; ?>
																</p>
															<?php } }else{ ?>
																<p><?php  echo '- <a href="'.$files.'" target="_blank">'.basename($files).'</a>'; ?></p>
														<?php } ?>
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
						</div>
						<div class="col-sm-12">
							<h1>Contribuciones recientes a retos regionales</h1>
							<?php $contContribuciones=0; ?>
							<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
								<div class="carousel-inner" role="listbox"> 
								<?php $args = array(
										'post_type' => 'contribuciones',
										'post_parent' => $idPost,
										'posts_per_page' => 6, 
										'orderby' => 'id',
										'order'   => 'DESC',
										'date_query' => array(
										array(
											'after'     => $fechaInicio1,
											'before'    => $fechaFin1,
											'inclusive' => true,
										),
									),
									);
									$custom_posts = new WP_Query( $args );
									$cont=0;
									
									if ( $custom_posts->have_posts() ){ 
										while ( $custom_posts->have_posts() ) : $custom_posts->the_post(); 
										$contContribuciones++; ?>
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
								}else{
									echo '<p class="text-center">no hay contribuciones</p>';
								};
									
						    	wp_reset_postdata(); ?>
						    	</div>
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
						<?php echo '<input type="hidden" id="contContribuciones1" value="'.$contContribuciones.'" />';?>

					</div>
			    </div>
			    <div role="tabpanel" class="tab-pane <?php if(($fechaInicio2 <= $hoy)&&($fechaFin2 > $hoy)){ echo ' active';}?>" id="RetroAlimentacion">
			     	<div class="contenido-tabs">
						
						<div class="col-xs-12">
							<?php $idPost=$post->ID; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="singleInvestigaciones">										
										<div class="row">
											<div class="col-sx-12 col-md-7">
												<h2>Retro Alimentación</h2>
												<?php $contenido = get_post_meta(get_the_ID(), 'RetroAlimentacion', true); echo '<h4>'.$contenido.'</h4>'?>
												<?php if($fechaInicio2 <= $hoy){ echo '<p><span class="contribuciones2" ></span><span> contribuciones</span></p>'; }else{echo '<p>Empieza en '.$fechaInicio2.'</p>';} ?>
											</div>
											<div class="col-sx-12 col-md-4 col-md-push-1">
												<div class="singleInvestigacionPanelIzquierdo">
													<h4>Información adicional</h4>
													<?php //var_dump(get_post_meta(get_the_ID(), 'investigacion_meta_files', true));
														
														$files = get_post_meta(get_the_ID(), 'investigacion_meta_files', true); 
														$arrayFiles= explode(",",$files[0]);
														if(is_array($arrayFiles)){
															foreach($arrayFiles as $file){?>
																<p>
																	<?php  echo '- <a href="'.$file.'" target="_blank">'.basename($file).'</a>'; ?>
																</p>
															<?php } }else{ ?>
																<p><?php  echo '- <a href="'.$files.'" target="_blank">'.basename($files).'</a>'; ?></p>
														<?php } ?>
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
						</div>
						<div class="col-sm-12">
							<h1>Contribuciones recientes a retos regionales</h1>
							<?php $contContribuciones=0; ?>
							<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
								<div class="carousel-inner" role="listbox"> 
								<?php $args = array(
										'post_type' => 'contribuciones',
										'post_parent' => $idPost,
										'posts_per_page' => 6, 
										'orderby' => 'id',
										'order'   => 'DESC',
										'date_query' => array(
										array(
											'after'     => $fechaInicio2,
											'before'    => $fechaFin2,
											'inclusive' => true,
										),
									),
									);
									$custom_posts = new WP_Query( $args );
									$cont=0;
									if ( $custom_posts->have_posts() ){ 
										while ( $custom_posts->have_posts() ) : $custom_posts->the_post(); 
										$contContribuciones++; ?>
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
								
								}else{
									echo '<p class="text-center">no hay contribuciones</p>';
								};	
						    	wp_reset_postdata(); ?>
						    	</div>
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
						<?php echo '<input type="hidden" id="contContribuciones2" value="'.$contContribuciones.'" />';?>

			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane <?php if(($fechaInicio3 <= $hoy)&&($fechaFin3 > $hoy)){ echo ' active';}?>" id="Refinar">
			     	<div class="contenido-tabs">
						
						<div class="col-xs-12">
							<?php $idPost=$post->ID; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="singleInvestigaciones">										
										<div class="row">
											<div class="col-sx-12 col-md-7">
												<h2>Refinar</h2>
												<?php $contenido = get_post_meta(get_the_ID(), 'Refinar', true); echo '<h4>'.$contenido.'</h4>'?>
												<?php if($fechaInicio3 <= $hoy){ echo '<p><span class="contribuciones3" ></span><span> contribuciones</span></p>'; }else{echo '<p>Empieza en '.$fechaInicio3.'</p>';} ?>
											</div>
											<div class="col-sx-12 col-md-4 col-md-push-1">
												<div class="singleInvestigacionPanelIzquierdo">
													<h4>Información adicional</h4>
													<?php //var_dump(get_post_meta(get_the_ID(), 'investigacion_meta_files', true));
														
														$files = get_post_meta(get_the_ID(), 'investigacion_meta_files', true); 
														$arrayFiles= explode(",",$files[0]);
														if(is_array($arrayFiles)){
															foreach($arrayFiles as $file){?>
																<p>
																	<?php  echo '- <a href="'.$file.'" target="_blank">'.basename($file).'</a>'; ?>
																</p>
															<?php } }else{ ?>
																<p><?php  echo '- <a href="'.$files.'" target="_blank">'.basename($files).'</a>'; ?></p>
														<?php } ?>
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
						</div>
						<div class="col-sm-12">
							<h1>Contribuciones recientes a retos regionales</h1>
							<?php $contContribuciones=0; ?>
							<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
								<div class="carousel-inner" role="listbox"> 
								<?php $args = array(
										'post_type' => 'contribuciones',
										'post_parent' => $idPost,
										'posts_per_page' => 6, 
										'orderby' => 'id',
										'order'   => 'DESC',
										'date_query' => array(
										array(
											'after'     => $fechaInicio3,
											'before'    => $fechaFin3,
											'inclusive' => true,
										),
									),
									);
									$custom_posts = new WP_Query( $args );
									$cont=0;
									if ( $custom_posts->have_posts() ){ 
										while ( $custom_posts->have_posts() ) : $custom_posts->the_post(); 
										$contContribuciones++; ?>
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
								}else{
									echo '<p class="text-center">no hay contribuciones</p>';
								};	
						    	wp_reset_postdata(); ?>
						    	</div>
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
						<?php echo '<input type="hidden" id="contContribuciones3" value="'.$contContribuciones.'" />';?>

			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane <?php if(($fechaInicio4 <= $hoy)&&($fechaFin4 > $hoy)){ echo ' active';}?>" id="2daRetroAlimentación">
			     	<div class="contenido-tabs">
						
						<div class="col-xs-12">
							<?php $idPost=$post->ID; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="singleInvestigaciones">										
										<div class="row">
											<div class="col-sx-12 col-md-7">
												<h2>2 Retro Alimentación</h2>
												<?php $contenido = get_post_meta(get_the_ID(), 'RetroAlimentacion2', true); echo '<h4>'.$contenido.'</h4>'?>
												<?php if($fechaInicio4 <= $hoy){ echo '<p><span class="contribuciones4" ></span><span> contribuciones</span></p>'; }else{echo '<p>Empieza en '.$fechaInicio4.'</p>';} ?>
											</div>
											<div class="col-sx-12 col-md-4 col-md-push-1">
												<div class="singleInvestigacionPanelIzquierdo">
													<h4>Información adicional</h4>
													<?php //var_dump(get_post_meta(get_the_ID(), 'investigacion_meta_files', true));
														
														$files = get_post_meta(get_the_ID(), 'investigacion_meta_files', true); 
														$arrayFiles= explode(",",$files[0]);
														if(is_array($arrayFiles)){
															foreach($arrayFiles as $file){?>
																<p>
																	<?php  echo '- <a href="'.$file.'" target="_blank">'.basename($file).'</a>'; ?>
																</p>
															<?php } }else{ ?>
																<p><?php  echo '- <a href="'.$files.'" target="_blank">'.basename($files).'</a>'; ?></p>
														<?php } ?>
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
						</div>
						<div class="col-sm-12">
							<h1>Contribuciones recientes a retos regionales</h1>
							<?php $contContribuciones=0; ?>
							<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
								<div class="carousel-inner" role="listbox"> 
								<?php $args = array(
										'post_type' => 'contribuciones',
										'post_parent' => $idPost,
										'posts_per_page' => 6, 
										'orderby' => 'id',
										'order'   => 'DESC',
										'date_query' => array(
										array(
											'after'     => $fechaInicio4,
											'before'    => $fechaFin4,
											'inclusive' => true,
										),
									),
									);
									$custom_posts = new WP_Query( $args );
									$cont=0;
									if ( $custom_posts->have_posts() ){ 
										while ( $custom_posts->have_posts() ) : $custom_posts->the_post();  
										$contContribuciones++; ?>
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
								}else{
									echo '<p class="text-center">no hay contribuciones</p>';
								};	
						    	wp_reset_postdata(); ?>
						    	</div>
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
						<?php echo '<input type="hidden" id="contContribuciones4" value="'.$contContribuciones.'" />';?>

			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane <?php if(($fechaInicio5 <= $hoy)&&($fechaFin5 > $hoy)){ echo ' active';}?>" id="IdeasTop">
			     	<div class="contenido-tabs">
						
						<div class="col-xs-12">
							<?php $idPost=$post->ID; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="singleInvestigaciones">										
										<div class="row">
											<div class="col-sx-12 col-md-7">
												<h2>Ideas Top</h2>
												<?php $contenido = get_post_meta(get_the_ID(), 'IdeasTop', true); echo '<h4>'.$contenido.'</h4>'?>
												<?php if($fechaInicio5 <= $hoy){ echo '<p><span class="contribuciones5" ></span><span> contribuciones</span></p>'; }else{echo '<p>Empieza en '.$fechaInicio5.'</p>';} ?>
											</div>
											<div class="col-sx-12 col-md-4 col-md-push-1">
												<div class="singleInvestigacionPanelIzquierdo">
													<h4>Información adicional</h4>
													<?php //var_dump(get_post_meta(get_the_ID(), 'investigacion_meta_files', true));
														
														$files = get_post_meta(get_the_ID(), 'investigacion_meta_files', true); 
														$arrayFiles= explode(",",$files[0]);
														if(is_array($arrayFiles)){
															foreach($arrayFiles as $file){?>
																<p>
																	<?php  echo '- <a href="'.$file.'" target="_blank">'.basename($file).'</a>'; ?>
																</p>
															<?php } }else{ ?>
																<p><?php  echo '- <a href="'.$files.'" target="_blank">'.basename($files).'</a>'; ?></p>
														<?php } ?>
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
						</div>
						<div class="col-sm-12">
							<h1>Contribuciones recientes a retos regionales</h1>
							<?php $contContribuciones=0; ?>
							<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
								<div class="carousel-inner" role="listbox"> 
								<?php $args = array(
										'post_type' => 'contribuciones',
										'post_parent' => $idPost,
										'posts_per_page' => 6, 
										'orderby' => 'id',
										'order'   => 'DESC',
										'date_query' => array(
										array(
											'after'     => $fechaInicio5,
											'before'    => $fechaFin5,
											'inclusive' => true,
										),
									),
									);
									$custom_posts = new WP_Query( $args );
									$cont=0;
									if ( $custom_posts->have_posts() ){ 
										while ( $custom_posts->have_posts() ) : $custom_posts->the_post();  
										$contContribuciones++; ?>
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
								}else{
									echo '<p class="text-center">no hay contribuciones</p>';
								};	
						    	wp_reset_postdata(); ?>
						    	</div>
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
						<?php echo '<input type="hidden" id="contContribuciones5" value="'.$contContribuciones.'" />';?>

			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane <?php if(($fechaInicio6 <= $hoy)&&($fechaInicio1 <= $hoy)){ echo ' active';}?>" id="Impacto">
			     	<div class="contenido-tabs">
						
						<div class="col-xs-12">
							<?php $idPost=$post->ID; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="singleInvestigaciones">										
										<div class="row">
											<div class="col-sx-12 col-md-7">
												<h2>Impácto</h2>
												<?php $contenido = get_post_meta(get_the_ID(), 'Impacto', true); echo '<h4>'.$contenido.'</h4>'?>
												<?php if($fechaInicio6 <= $hoy){ echo '<p><span class="contribuciones6" ></span><span> contribuciones</span></p>'; }else{echo '<p>Empieza en '.$fechaInicio6.'</p>';} ?>
											</div>
											<div class="col-sx-12 col-md-4 col-md-push-1">
												<div class="singleInvestigacionPanelIzquierdo">
													<h4>Información adicional</h4>
													<?php //var_dump(get_post_meta(get_the_ID(), 'investigacion_meta_files', true));
														
														$files = get_post_meta(get_the_ID(), 'investigacion_meta_files', true); 
														$arrayFiles= explode(",",$files[0]);
														if(is_array($arrayFiles)){
															foreach($arrayFiles as $file){?>
																<p>
																	<?php  echo '- <a href="'.$file.'" target="_blank">'.basename($file).'</a>'; ?>
																</p>
															<?php } }else{ ?>
																<p><?php  echo '- <a href="'.$files.'" target="_blank">'.basename($files).'</a>'; ?></p>
														<?php } ?>
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
						</div>
						<div class="col-sm-12">
							<h1>Contribuciones recientes a retos regionales</h1>
							<?php $contContribuciones=0; ?>
							<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
								<div class="carousel-inner" role="listbox"> 
								<?php $args = array(
										'post_type' => 'contribuciones',
										'post_parent' => $idPost,
										'posts_per_page' => 6, 
										'orderby' => 'id',
										'order'   => 'DESC',
										'date_query' => array(
										array(
											'after'     => $fechaInicio6,
											'inclusive' => true,
										),
									),
									);
									$custom_posts = new WP_Query( $args );
									$cont=0;
									if ( $custom_posts->have_posts() ){ 
										while ( $custom_posts->have_posts() ) : $custom_posts->the_post();  
										$contContribuciones++; ?>
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
								}else{
									echo '<p class="text-center">no hay contribuciones</p>';
								};	
						    	wp_reset_postdata(); ?>
						    	</div>
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
						<?php echo '<input type="hidden" id="contContribuciones6" value="'.$contContribuciones.'" />';?>

			     	</div>
			    </div>
			</div>
		</div>
		<?php endwhile;
		endif; ?>
	</div>
</div>
<div class="espacioBotton">
	<div class="carousel-nav sombraInferior">
		<div class="container row">
			<p class="tituloNavegacionCarousel alinear-derecha" >MAS CONTRIBUCIONES</p>
		</div>
	</div>
</div>	 
<?php get_footer(); ?>
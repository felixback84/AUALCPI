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
				$fechaFin4 = date("M d, Y", get_post_meta(get_the_ID(), 'investigacionFechaImpacto', true));
				$fechaInicio5 = $fechaFin4; 
				$fechaFin5 = date("M d, Y", get_post_meta(get_the_ID(), 'investigacionFechaIdeasTop', true));
				$fechaInicio6 = $fechaFin5; 
				?>
			    <li role="presentation"  <?php if(($fechaInicio1 <= $hoy)&&($fechaFin1 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#Ideacion" aria-controls="Ideacion" role="tab" data-toggle="tab">
			    		<p>Ideación</p>
			    		<p id="" class="lineasInvestigacion"></p>
			    		<p><?php echo 'empieza en '.$fechaInicio1; ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio2 <= $hoy)&&($fechaFin2 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#RetroAlimentacion" aria-controls="RetroAlimentacion" role="tab" data-toggle="tab">
			    		<p>Retro Alimentacion</p>
			    		<p id="lineaRetroAlimentacion"></p>
			    		<div class="puntoInvestigacion"></div>
			    		<p><?php echo 'empieza en '.$fechaInicio2; ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio3 <= $hoy)&&($fechaFin3 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#Refinar" aria-controls="Refinar" role="tab" data-toggle="tab">
			    		<p>Refinar</p>
			    		<p id=" "  class="lineasInvestigacion"></p>
			    		<p><?php echo 'empieza en '.$fechaInicio3; ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio4 <= $hoy)&&($fechaFin4 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#2daRetroAlimentación" aria-controls="2daRetroAlimentación" role="tab" data-toggle="tab">
			    		<p>2daRetro Alimentación</p>
			    		<div id=" "  class="lineasInvestigacion"></div>
			    		<div class="puntoInvestigacion"></div>
			    		<p><?php echo 'empieza en '.$fechaInicio4; ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio5 <= $hoy)&&($fechaFin5 > $hoy)){ echo 'class="active"';}?> >
			    	<a href="#IdeasTop" aria-controls="IdeasTop" role="tab" data-toggle="tab">
			    		<p>Ideas Top</p>
			    		<p id=" "  class="lineasInvestigacion"></p>
			    		<p><?php echo 'empieza en '.$fechaInicio5; ?></p>
			    	</a></li>
			    <li role="presentation"  <?php if(($fechaInicio6 <= $hoy)){ echo 'class="active"';}?> >
			    	<a href="#Impacto" aria-controls="Impacto" role="tab" data-toggle="tab">
			    		<p>Impácto</p>
			    		<p id=" "  class="lineasInvestigacion"></p>
			    		<p><?php echo 'empieza en '.$fechaInicio6; ?></p>
			    	</a></li>
			  </ul>
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane <?php if(($fechaInicio1 <= $hoy)&&($fechaFin1 > $hoy)){ echo ' active';}?> " id="Ideacion">
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

			     	</div>
			    </div>
			    <div role="tabpanel" class="tab-pane <?php if(($fechaInicio6 <= $hoy)){ echo ' active';}?>" id="Impacto">
			     	<div class="contenido-tabs">
						
						<div class="col-xs-12">
							<?php $idPost=$post->ID; ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="singleInvestigaciones">										
										<div class="row">
											<div class="col-sx-12 col-md-7">
												<h2>Impácto</h2>
												<?php $contenido = get_post_meta(get_the_ID(), 'Impacto', true); echo '<h4>'.$contenido.'</h4>'?>
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
			<p class="tituloNavegacionCarousel pull-right" >MAS CONTRIBUCIONES</p>
		</div>
	</div>
</div>	 
<?php get_footer(); ?>
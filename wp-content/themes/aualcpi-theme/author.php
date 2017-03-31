<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<?php $userId = get_queried_object_id(); //var_dump($userId);?>
				<!-- This sets the $curauth variable -->
			    <?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));  ?>
				<div id="carousel-dual-perfil" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<div class="thumbnail sliderPerfilAltura">
								<?php 
								$imagenPortada = get_the_author_meta('user_meta_image',$userId);
								if(!empty($imagenPortada)){
									echo '<img src="'.$imagenPortada.'" alt="Imagen portada del perfil del usuario">';
								}else{
									echo '<img src="'.get_stylesheet_directory_uri().'/images/imagenesTop.jpg" alt="Imagen portada del perfil del usuario">';
								}?>	
							</div>
							<div class="container">
								<div class="carousel-caption">
									<?php if ($userId == wp_get_current_user()->ID){ echo '<h3>Mi cuenta</h3>';}else{ echo '<h3>Perfil profesional</h3>';}?>
									<div class="col-xs-12 col-md-4">
										<?php echo get_avatar( $userId, '100' ,'','logo usurio',array(
											'class' => 'img-circle',
										)); ?>
									</div>
									<div class="col-xs-12 col-md-8">
										<h4><?php the_author_meta('display_name',$userId); ?></h4>
										<?php 
										$date=formatoFechaEnEspañol($userId);
										?>
										<p><?php echo 'Miembro desde el '.$date; ?></p>
										<p><?php $term=mostrarTermsPorIdUsuario($userId,'universidades_user'); 

										echo $term->name;?>
										</p>
										<p><?php $term=mostrarTermsPorIdUsuario($userId,'ciudad_user'); echo $term->name;?>
										</p>
										<p><?php $term=mostrarTermsPorIdUsuario($userId,'areas'); echo 'Área de investigacion: '.$term->name;?></p>
										<p class="ico-pag"><span class="icon icon-twitter"> </span><?php the_author_meta('twitter',$userId); ?></p>
										<p class="ico-pag"><span class="icon icon-linkedin"> </span><?php the_author_meta('linkedin',$userId); ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="thumbnail sliderPerfilAltura">
								<?php 
								$imagenPortada = get_the_author_meta('user_meta_image',$userId);
								if(!empty($imagenPortada)){
									echo '<img src="'.$imagenPortada.'" alt="Imagen portada del perfil del usuario">';
								}else{
									echo '<img src="'.get_stylesheet_directory_uri().'/images/imagenesTop.jpg" alt="Imagen portada del perfil del usuario">';
								}?>	
							</div>
							<div class="container">
								<div class="carousel-caption">
									<h4>Biografia</h4>
									<p><?php the_author_meta('description',$userId); ?></p>
								</div>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-dual-perfil" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-dual-perfil" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			   <?php //var_dump(get_term_by('name',get_the_author_meta( 'ciudad_user', $userId ),'ciudad_user'));?>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h4>Contribuciones recientes a retos regionales</h4>	
			<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox"> 
					<?php $args = array('post_type' => 'contribuciones' ,
						'author' => $userId ,
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
									<?php get_template_part('targetas-author'); ?>
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
					<p class="tituloNavegacionCarousel pull-right" >MAS CONTRIBUCIONES</p>
				</div>	    
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
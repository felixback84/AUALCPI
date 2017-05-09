<?php get_header(); ?>
<!-- <div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="row"> -->
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
								<div class="carousel-caption container">
									<div class="col-xs-12">
										<?php if ($userId == wp_get_current_user()->ID){ echo '<h1 class="TituloAutor">Mi cuenta </h1>';}else{ echo '<h1 class="TituloAutor">Perfil profesional</h1>';}?>
									</div>
									
									<div class="col-xs-12 col-md-3">
										<?php echo get_avatar( $userId, '150' ,'','logo usurio',array(
											'class' => 'img-circle',
										)); ?>
									</div>
									<div class="col-xs-12 col-md-9">
										<h1><?php the_author_meta('display_name',$userId); ?> <a href="<?php echo home_url('wp-admin/profile.php');?>"><span class="icon icon-pencil"></span></a></h1>
										<?php 
										$date=formatoFechaEnEspañol($userId);
										?>
										<h3><?php echo 'Miembro desde el '.$date; ?></h3>
										<h3><?php $term=mostrarTermsPorIdUsuario($userId,'universidades_user'); 

										echo $term->name;?>
										</h3>
										<h3><?php $term=mostrarTermsPorIdUsuario($userId,'ciudad_user'); echo $term->name;?>
										</h3>
										<h3><?php $term=mostrarTermsPorIdUsuario($userId,'areas'); echo 'Área de investigacion: '.$term->name;?></h3>
										<h4 class="ico-pag" style="margin-top: 20px;"><span class="icon icon-twitter"> </span>
										<a href="https://twitter.com/<?php the_author_meta('twitter',$userId); ?>" target="_blank"><?php the_author_meta('twitter',$userId); ?></a></h4>
										<h4 class="ico-pag"><span class="icon icon-linkedin"> </span><a href="https://www.linkedin.com/in/<?php the_author_meta('linkedin',$userId); ?>" target="_blank"><?php the_author_meta('linkedin',$userId); ?></a></h4>
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
								<div class="carousel-caption container">
								<div class="col-xs-12">
								<?php if ($userId == wp_get_current_user()->ID){ echo '<h1 class="TituloAutor">Mi cuenta</h1>';}else{ echo '<h1 class="TituloAutor">Perfil profesional</h1>';}?>
									</div>
									<div class="col-xs-12 col-md-3">
										<?php echo get_avatar( $userId, '150' ,'','logo usurio',array(
											'class' => 'img-circle',
										)); ?>
									</div>
									<div class="col-xs-12 col-md-9">
										<h1>Biografia</h1>
										<h3><?php the_author_meta('description',$userId); ?></h3>
									</div>
								</div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-dual-perfil" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-dual-perfil" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			   <?php //var_dump(get_term_by('name',get_the_author_meta( 'ciudad_user', $userId ),'ciudad_user'));?>
			<!-- </div> 
		</div>
	</div>
</div> -->
<div class="container quitarPadding">
	<div class="row">
		<div class="col-sm-12" >
			<h1>Contribuciones recientes a retos regionales</h1>	
			<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi" >
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox"> 
					<?php $args = array('post_type' => 'contribuciones' ,
						'author' => $userId ,
						'posts_per_page' => 10, 
						'orderby' => 'id',
						'order'   => 'DESC'
						);
					$custom_posts = new WP_Query( $args );
					$cont=0;
					if ( $custom_posts->have_posts() ): 
						while ( $custom_posts->have_posts() ) : $custom_posts->the_post(); ?>
							<?php if($cont == 0){ ?>
								<div class="item active" cont="<?php echo $cont+1; ?>">
							<?php }else{ ?> 
									<div class="item" cont="<?php echo $cont+1; ?>">
							<?php } ?> 
								<div class="col-xs-12 col-sm-4">
									<?php get_template_part('targetas-author-contribuciones'); ?>
								</div>
							</div> 
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); ?>
				</div><div class="contador" cont="<?php echo $cont; ?>"></div>
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
		<p class="tituloNavegacionCarousel" ><a href="<?php echo home_url('/contribuciones/');?>">MAS CONTRIBUCIONES</a></p>
		<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagB"></span>  de <span id="pagBC"></span></p>
	</div>
</div>	
<div class="container  quitarPadding">
	<div class="row">
		<div class="col-sm-12">
			<h4>Comentarios Resientes</h4>
			<div id="carousel-example-generic-comments" class="carousel slide" data-ride="carousel" >
				<div class="carousel-inner" role="listbox"> 
					<?php 
					//echo ' el user'.$userId;
					$args = array(
						'user_id' => $userId, 
					    'number'  => '9',
					    'orderby' => 'comment_date',
						'order' => 'DESC',
					);
					$comments = get_comments($args);
					$cont=0;
					$numeroElementos=3;
					if(!empty($comments)){
					foreach($comments as $comment) :
					?>
					<?php if($cont%$numeroElementos == 0 and $cont != 0)  { ?>
					    		</div>
						<?php }	?>
					<?php 

					if($cont == 0){  ?>
						<div class="item active">
					<?php } elseif($cont%$numeroElementos == 0 and $cont != 0){ ?> 
							<div class="item">
					<?php  } ?> 
						<div class="col-xs-12">
							<?php  echo($comment->comment_author . ' comentado en <a href="' . get_post_permalink($comment->comment_post_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a><br />' . formatoFechaEnEspañolComentarios($comment->comment_date ) . '<br /><p class="tabulacionContenidoComentarios">' .$comment->comment_content  . '</p>'); ?>
								</div>

					<?php $cont++; endforeach; ?> 
					</div><div class="contador"  cont="<?php echo $cont; ?>"></div>
					<?php }else{ echo ('<p class="text-center">No hay comentarios</p>'); } ?>
					
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic-comments" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic-comments" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>    
			</div>
		</div>
	</div>
</div>
<div class="espacioBotton">
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
		</div>
	</div>
</div>
<?php get_footer(); ?>
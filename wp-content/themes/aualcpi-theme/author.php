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
										<p class="ico-pag"><span class="icon icon-twitter"> </span>
										<a href="https://twitter.com/<?php the_author_meta('twitter',$userId); ?>" target="_blank"><?php the_author_meta('twitter',$userId); ?></a></p>
										<p class="ico-pag"><span class="icon icon-linkedin"> </span><a href="https://www.linkedin.com/in/<?php the_author_meta('linkedin',$userId); ?>" target="_blank"><?php the_author_meta('linkedin',$userId); ?></a></p>
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
		<div class="col-sm-12 contenerdorGris " >
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
									<?php get_template_part('targetas-author-contribuciones'); ?>
								</div>
							</div> 
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); ?>
				</div>
				<!-- Controls -->
				<div class="carousel-nav sombraInferior">
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
<div class="container">
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
					</div>
					<?php }else{ echo ('<p class="text-center">No hay comentarios</p>'); } ?>
					
				</div>
				<!-- Controls -->
				<div class="carousel-nav sombraInferior">
					<a class="controlcarousel pull-right " href="#carousel-example-generic-comments" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="pull-right controlcarousel" href="#carousel-example-generic-comments" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<p class="tituloNavegacionCarousel pull-right" >MAS CONTRIBUCIONES</p>
				</div>	    
			</div>
		</div>
	</div>
</div>
<div id="carousel-id" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carousel-id" data-slide-to="0" class=""></li>
		<li data-target="#carousel-id" data-slide-to="1" class=""></li>
		<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
	</ol>
	<div class="carousel-inner">
		<div class="item">
			<img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzc3NyI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojN2E3YTdhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Rmlyc3Qgc2xpZGU8L3RleHQ+PC9zdmc+">
			<div class="container">
				<div class="carousel-caption">
					<h1>Example headline.</h1>
					<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
				</div>
			</div>
		</div>
		<div class="item">
			<img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNmE2YTZhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+U2Vjb25kIHNsaWRlPC90ZXh0Pjwvc3ZnPg==">
			<div class="container">
				<div class="carousel-caption">
					<h1>Another example headline.</h1>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
				</div>
			</div>
		</div>
		<div class="item active">
			<img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzU1NSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNWE1YTVhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+VGhpcmQgc2xpZGU8L3RleHQ+PC9zdmc+">
			<div class="container">
				<div class="carousel-caption">
					<h1>One more for good measure.</h1>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<?php get_footer(); ?>
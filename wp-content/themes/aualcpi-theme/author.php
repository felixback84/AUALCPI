<?php get_header(); ?>
<!-- <div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="row"> -->
				<?php $userId = get_queried_object_id(); //var_dump($userId);?>
				<!-- This sets the $curauth variable -->
			    <?php  //$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));  ?>
				<div id="carousel-dual-perfil" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-dual-perfil" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-dual-perfil" data-slide-to="1" class=""></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<div class="thumbnail sliderPerfilAltura">
								<?php 
								$imagenPortada = get_the_author_meta('user_meta_image',$userId);
								if(!empty($imagenPortada)){
									echo '<img src="'.$imagenPortada.'" alt="Imagen portada del perfil del usuario">';
								}else{
									echo '<img src="'.get_stylesheet_directory_uri().'/images/fondoPerfil.png" alt="Imagen portada del perfil del usuario">';
								}?>	
							</div>
								<div class="carousel-caption container">
									<div class="col-xs-12">
										<?php if ($userId == wp_get_current_user()->ID){ echo '<h1 class="TituloAutor">Mi cuenta </h1>';}else{ echo '<h1 class="TituloAutor">Perfil profesional</h1>';}?>
									</div>
									<div class="col-xs-12 col-md-3">
										<div class="thumbnail">
										<?php echo get_avatar( $userId, '150' ,'','logo usurio',array(
											'class' => 'img-circle',
										)); ?>
										</div>
									</div>
									<div class="col-xs-12 col-md-9">
										<h1><?php the_author_meta('display_name',$userId); ?> <a href="<?php echo home_url('/suscribirme/?sr='.$userId);?>"><span class="icon icon-pencil"></span></a></h1>
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
										<?php if ($userId == wp_get_current_user()->ID){ ?>
											<a id="wp-submit" class="btn btn-default btn-cerrar" href="<?php echo wp_logout_url(home_url());?>" title="Logout">Cerrar sesión</a>
										<?php } ?>
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
									echo '<img src="'.get_stylesheet_directory_uri().'/images/fondoPerfil.png" alt="Imagen portada del perfil del usuario">';
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
						<!-- <a class="left carousel-control" href="#carousel-dual-perfil" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
						<a class="right carousel-control" href="#carousel-dual-perfil" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> -->
				</div>
			   <?php //var_dump(get_term_by('name',get_the_author_meta( 'ciudad_user', $userId ),'ciudad_user'));?>
			<!-- </div> 
		</div>
	</div>
</div> -->

<!-- inicio contribuciones-->
<?php  $tituloContribuciones='Contribuciones recientes a retos regionales'; ?>
<?php  $linkContribuciones= home_url('/contribuciones/'); ?>
<div class="hidden-xs hidden-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloContribuciones; ?></h1>	
				<div id="carousel-example-generic-publicacion" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
							'post_type' => 'contribuciones' ,
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
											<?php get_template_part('targetas-author-contribuciones'); ?>
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
				<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkContribuciones;?>">Más contribuciones</a></p>
				<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagP"></span>  de <span id="pagPC"></span></p>
			</div>
		</div>
</div>
<div class="visible-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloContribuciones; ?></h1>	
				<div id="carousel-example-generic-publicacion-2" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
							'post_type' => 'contribuciones' ,
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
											<?php get_template_part('targetas-author-contribuciones'); ?>
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
				<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkContribuciones;?>">Más contribuciones</a></p>
				<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagP-2"></span>  de <span id="pagPC-2"></span></p>
			</div>
		</div>
</div>
<div class="visible-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloContribuciones; ?></h1>	
				<div id="carousel-example-generic-publicacion-3" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
						<?php $args = array (
							'post_type' => 'contribuciones' ,
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
											<?php get_template_part('targetas-author-contribuciones'); ?>
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
				<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkContribuciones;?>">Más contribuciones</a></p>
				<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagP-3"></span>  de <span id="pagPC-3"></span></p>
			</div>
		</div>
</div>
<!-- fin de contribuciones-->
<div class="container  quitarPadding">
	<div class="row">
		<div class="col-sm-12">
			<h4>Comentarios Recientes</h4>
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
					<?php wp_reset_postdata(); ?>
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
<div class="">
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
		</div>
	</div>
</div>
<?php 
$userCurrent =get_currentuserinfo();
//var_dump($userCurrent);
//verificamos que solo usuarios logeados  puedan contribuir
if($userCurrent->ID != 0){
//var_dump($userCurrent->user_login);
//var_dump($dataPost);
//-trae el id de post a contribuir
	$postContribucionId = 0; 
	$padreIdReto = 0;
	if(isset($_GET['sr'])){
	    $postContribucionId=$_GET['sr'];
		$dataPost=get_post($postContribucionId);
		$padreIdReto = $dataPost->post_parent;
	}
	if(isset($_GET['srp'])){
	    $padreIdReto=$_GET['srp'];
	}
	$status = '';
	if(isset($_GET['status'])){
	    $status= $_GET['status'];
	}

$action_slug = home_url('/author/'.$userCurrent->user_login.'/?sr='.$postContribucionId);

if ( isset($_POST['postSubmit']) ) {

	$postTitulo = $_POST['postTitulo'];
	$postSubtitulo = $_POST['postSubtitulo'];
	$postContenido = $_POST['postContenido'];
	$thumbnailUrlA = $_POST['Mthumbnail'];
	$thumbnailIDA = $_POST['Mthumbnailid'];
	$thumbnailUrlB = $_POST['ImageB'];
	$thumbnailIDB = $_POST['ImageBId'];
	$thumbnailUrlC = $_POST['imageC'];
	$thumbnailIDC = $_POST['imageIdC'];

	//-verifica el select
	if (isset($_POST['postParentId']) && !empty($_POST['postParentId'])){
		$padreIdReto = $_POST['postParentId'];
	}
	if(empty($thumbnailUrlA)){
		$thumbnailIDA = 0;
	}
	if(empty($thumbnailUrlB)){
		$thumbnailIDB = 0;
	}
	if(empty($thumbnailUrlC)){
		$thumbnailIDC = 0;
	}

	if($postContribucionId == 0 ){
		$post_arr = array(
		    'post_title'   => esc_attr($postTitulo),
		    'post_content' => esc_attr($postSubtitulo),
		    'post_status'  => 'publish',
		    'post_type'    => 'contribuciones',
		    'post_author'  => get_current_user_id(),
		    'post_parent'  => $padreIdReto,
		    'meta_input'   => array(
		        'Descripcion' => esc_attr($postContenido),
			    ),
			);
			$idNewPost = wp_insert_post( $post_arr );
			update_post_meta($idNewPost,'_thumbnail_id',$thumbnailIDA);
			update_post_meta($idNewPost,'contribuciones_segunda-image-contribution_thumbnail_id',$thumbnailIDB);
			update_post_meta($idNewPost,'contribuciones_tercera-image-contribution_thumbnail_id',$thumbnailIDC);
			//echo "id new post: ".$idNewPost;
			 wp_redirect(home_url('/author/'.$userCurrent->user_login.'/?sr='.$idNewPost.'&status=OR'));
	}else{

		$post_arr = array(
			'ID'		   => $postContribucionId,
		    'post_title'   => esc_attr($postTitulo),
		    'post_content' => esc_attr($postSubtitulo),
		    'post_status'  => 'publish',
		    'post_type'    => 'contribuciones',
		    'post_author'  => get_current_user_id(),
		    'post_parent'  => $padreIdReto,
		    'meta_input'   => array(
		        'Descripcion' => esc_attr($postContenido),
			    ),
			);
			$idUpdate = wp_update_post( $post_arr );
			echo "iU $idUpdate";
			update_post_meta($postContribucionId,'_thumbnail_id',$thumbnailIDA);
			update_post_meta($postContribucionId,'contribuciones_segunda-image-contribution_thumbnail_id',$thumbnailIDB);
			update_post_meta($postContribucionId,'contribuciones_tercera-image-contribution_thumbnail_id',$thumbnailIDC);
			//echo "id update post: ".$postContribucionId;
			wp_redirect(home_url('/author/'.$userCurrent->user_login.'/?sr='.$postContribucionId.'&status=OU'));
	}
}
// echo 'id:'.get_the_ID();
//echo 'conid:'.$postContribucionId;

// 	if($postContribucionId == 0){
// 		//clear_global_post_cache(get_the_ID());
// 	}
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-push-2">
		<br/>
<div class="alert alert-success" <?php if($status == 'OR'){ echo 'style="display: block;"';}else{echo 'style="display: none;"';} ?> >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <p class="text-center">La contribución fue registrada</p>
</div>
<div class="alert alert-success" <?php if($status == 'OU'){ echo 'style="display: block;"';}else{echo 'style="display: none;"';} ?> >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <p class="text-center">La contribución fue actualizada</p>
</div>
<h2>Nueva contribución</h2>
<div id="formContribucion">
<form id="contribucion" action="<?php echo $action_slug; ?>" method="post" name="contribucion">
	<fieldset class="required<?php echo $form_username_class; ?>">
	 	<label>Titulo</label><span class="req">*</span>
	 	<input id="postTitulo" type="text" name="postTitulo" value="<?php echo $dataPost->post_title; ?>" />
		<div class="mini-faq"><?php echo $name_msg; ?></div>
	</fieldset>
	<fieldset>
	    <label>Subtitulo</label>
	    <input id="postSubtitulo" type="text" name="postSubtitulo" value="<?php echo $dataPost->post_content; ?>" />
	</fieldset>
	<fieldset>
	    <label>Contenido</label>
	    <textarea name="postContenido" id="postContenido" cols="30" rows="10"><?php echo get_post_meta($postContribucionId,'Descripcion',true); ?></textarea>
	 </fieldset>
	<fieldset>
	    <label>Asignar a un reto</label>
	    <?php $args =array('post_type' => 'investigacion', 'selected' => $padreIdReto, 'name' => 'postParentId', 'show_option_none' => __('(No asignar a un reto)'), 'sort_column'=> 'menu_order, post_title', 'echo' => 0);
		    $pages = wp_dropdown_pages($args);
		    if ( ! empty($pages) ) {
		        echo $pages;
		    } // end empty pages check ?>
	</fieldset>
	<fieldset>
		<label for="user_meta_thumbnail">Seleccionar imagen destacada:</label>
		<div class="thumbnail">
		<?php //if($postContribucionId != 0){ ?>
	    	<img id="Mthumbnailshow" src="<?php echo esc_url(get_the_post_thumbnail_url($postContribucionId)); ?>" style="width:150px; <?php if($postContribucionId == 0){	echo 'display: none;'; } ?> ">
	    <?php //} ?>

		</div>
	    <input type='button' id="uploadthumbnail" class="button-primary" value="Cargar imagen" />
	    <input  type="text" name="Mthumbnail" id="Mthumbnail" value="<?php if($postContribucionId != 0){ 
	    	echo esc_url(get_the_post_thumbnail_url($postContribucionId)); 
	    	}?>" class="regular-text" />
	    <input  type="hidden" name="Mthumbnailid" id="Mthumbnailid" value="<?php echo get_post_meta($postContribucionId,'_thumbnail_id',true); ?>" class="regular-text" />
	</fieldset> 
	<fieldset>
		<label>Seleccionar imagen destacada 2:</label>
		<div class="thumbnail">
	    	<img id="ImageBShow" src="<?php echo urlImagenMultiPostThumbnailsContribuciones('segunda-image-contribution',$postContribucionId); ?>" style="width:150px;">
		</div>
	    <input type='button' id="uploadImageB" class="button-primary" value="Cargar imagen" />
	    <input  type="text" name="ImageB" id="ImageB" value="<?php echo urlImagenMultiPostThumbnailsContribuciones('segunda-image-contribution',$postContribucionId); ?>" class="regular-text" />
	    <input  type="hidden" name="ImageBId" id="ImageBId" value="<?php echo get_post_meta($postContribucionId,'contribuciones_segunda-image-contribution_thumbnail_id',true); ?>" class="regular-text" />
	</fieldset>  
	<fieldset>
		<label>Seleccionar imagen destacada 3:</label>
		<div class="thumbnail">
	    	<img id="imageShowC" src="<?php echo urlImagenMultiPostThumbnailsContribuciones('tercera-image-contribution',$postContribucionId); ?>" style="width:150px;">
		</div>
	    <input type='button' id="uploadImageC" class="button-primary" value="Cargar imagen" />
	    <input  type="text" name="imageC" id="imageC" value="<?php echo urlImagenMultiPostThumbnailsContribuciones('tercera-image-contribution',$postContribucionId); ?>" class="regular-text" />
	    <input  type="hidden" name="imageIdC" id="imageIdC" value="<?php echo get_post_meta($postContribucionId,'contribuciones_tercera-image-contribution_thumbnail_id',true); ?>" class="regular-text" />
	</fieldset> 
	<fieldset>
			<input id="postSubmit" class="btn btn-primary" type="submit" name="postSubmit" value="<?php if($postContribucionId == 0){ echo 'Crear'; }else{ echo 'Actualizar';} ?>" />
	</fieldset>
</form>
</div>
		</div>
	</div>
</div>
<?php } //fin formulario ?>
<?php get_footer(); ?>
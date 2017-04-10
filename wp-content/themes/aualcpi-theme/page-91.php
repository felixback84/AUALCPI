<?php get_header(); ?>
<!-- pagina base de datos investigadores-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?></div>
				<div class="container">
					<div class="carousel-caption">
						<?php
						$post = get_post(91); 
						$contenido = $post->post_content;
						echo $contenido;
						?>
						<a href="#" class="btn btn-default">SUSCRIBIRME</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php
			$now = get_terms( 'ciudad_investigaciones', array( 'orderby' => 'name','fields' => 'ids','parent' => 0));
			$select = llenarSeleccion($now,'filterCiudades[]','Todos los paises');
			echo $select;
			$now = get_terms( 'status_inves', array( 'orderby' => 'name','fields' => 'ids'));
			$select = llenarSeleccion($now,'filterStatus[]');
			echo $select;
			$now = get_terms( 'areas',array( 'orderby' => 'name','fields' => 'ids'));
			$select = llenarSeleccion($now,'filterAreas[]', 'Todos las areas');
			echo $select;
			?>
			<select name="filterComentarios[]" id="inputFilterComentarios" class="form-control" required="required">
				<option value="Contribuciones">Seleccionar...</option>
				<option value="ConContribuciones">Con Contribuciones</option>
				<option value="SinContribuciones">Sin Contribuciones</option>
			</select>
			<button class="btn-cargar-investigacion btn btn-default" data-url="<?php echo admin_url('admin-ajax.php'); ?>">buscar</button>	
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Loading_icon.gif" style="display:none;" class="loaderwp" style="" width="125px" height="100px">
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<div id="carousel-example-generic-autores" class="carousel slide" data-ride="carousel" data-type="multi" >
				<div id="the-posts-user" class="carousel-inner" role="listbox"> 
				<?php 

				$args = array(
			      'post_type' => 'investigacion',
			      'post_status' => 'publish',
			      'order'=> 'ASC',
			      'orderby' => 'date',
			    );

			    $posts =  query_posts($args);
				$idsUsuarios= array();

			    foreach ($posts as $post){
			    	//if(!in_array($post->post_author,$idsUsuarios)){ array_push($idsUsuarios,$post->post_author);}
					$args = array(
				      'post_type' => 'contribuciones',
				      'post_status' => 'publish',
				      'post_parent' => $post->ID,
				      'order'=> 'ASC',
				      'orderby' => 'date',
				    );
				    $postContribuciones =  query_posts($args);
		 	   ( is_array($postContribuciones) && !empty($postContribuciones)) ? $nContribuciones = '1': $nContribuciones = '0';
			 	 	//echo $nContribuciones;
				
			 		foreach ($postContribuciones as $postContribucion){
				 	 	if($nContribuciones != '0'){
							//echo 'idAutho'.$postContribucion->post_author;
							if(!in_array($postContribucion->post_author,$idsUsuarios)){ array_push($idsUsuarios,$postContribucion->post_author);}
							$cont++;
						}
				    }  
			    }
			    //var_dump($idsUsuarios);
			    $cont=0;
			    foreach ($idsUsuarios as $id) {
			    	$usuario = get_user_by('ID',$id);
					//var_dump($usuario); ?>
					<?php if($cont == 0){ ?><div class="item active"><?php }else{ ?><div class="item"><?php } ?>
					<div class="col-xs-12 col-sm-4">
						<?php set_query_var('user',$usuario);
						get_template_part('targetas-autores'); ?>
					</div></div>
				<?php $cont++; } wp_reset_postdata();?>
				</div>
				<div class="carousel-nav">
					<a class="controlcarousel pull-right " href="#carousel-example-generic-autores" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="pull-right controlcarousel" href="#carousel-example-generic-autores" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<p class="tituloNavegacionCarousel pull-right" >MAS AUTORES</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div id="carousel-example-generic-inves" class="carousel slide" data-ride="carousel" data-type="multi" >
			<!-- Wrapper for slides -->
				<div id="the-posts-inves" class="carousel-inner" role="listbox"> 
						<?php $args = array(
					      'post_type' => 'investigacion',
					      'post_status' => 'publish',
					      'order'=> 'ASC',
					      'orderby' => 'date',
					    ); 
						$lastBlog = new WP_Query ($args);
						$cont=0;
						if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
						<?php if($cont == 0){ ?><div class="item active"><?php }else{ ?><div class="item"><?php } ?> 
								<div class="col-xs-12 col-sm-4">
										<?php get_template_part('targetas-inves-inves'); ?>
								</div>
							</div>
							 <?php $cont++; 
							 endwhile;
						endif;	
					    wp_reset_postdata(); ?>
				</div>
				<!-- Controls -->
				<div class="carousel-nav">
					<a class="controlcarousel pull-right " href="#carousel-example-generic-inves" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="pull-right controlcarousel" href="#carousel-example-generic-inves" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<p class="tituloNavegacionCarousel pull-right" >MAS INVESTIGACIONES</p>
				</div>
			</div>
		</div>	
	</div>
</div>
<?php get_footer(); ?>
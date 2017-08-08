<?php get_header(); ?>
<!-- pagina publicaciones-->
<?php
// $post = get_post(63); 
// $contenido = $post->post_content;
// echo $contenido;
?>
<?php 
//$idPost = 388;  
$urlImagenTop=get_stylesheet_directory_uri().'/images/fondoPerfil.png';
 //if(!empty(get_the_post_thumbnail ($idPost,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image'])))	{ 
 		//$urlImagenTop =get_the_post_thumbnail_url($idPost); } 
 if(!empty(get_the_post_thumbnail ()))	{ $urlImagenTop =get_the_post_thumbnail_url(); 		} 
 		?>
<div class="hidden-xs">
	<div class="jumbotron" style="background-image: url('<?php echo $urlImagenTop; ?>');">
		<div class="container">
			<p>
		  	<?php
			//$post = get_post($idPost); 
			$post = get_post(); 
			//var_dump($post);
			$contenido = $post->post_content;
			echo $contenido;
			?>
			</p>
		</div>
	</div>
</div> 
<div class="container quitarPadding">
	<div class="collapse sombraInferior espacioBotton  espacioTop" id="collapseExample-2" >
		<div class="well">
				<div class="row">
					<button id="btn-cerrar" class="btn pull-right glyphicon glyphicon-remove" type="button" data-toggle="collapse" data-target="#collapseExample-1" aria-expanded="false" aria-controls="collapseExample-1">
					</button>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h4>Busqueda de documentos, publicaciones y formatos de aplicacion</h4>
					</div>
					<div class="col-sm-4">
						<h5>Categoria:</h5>
						<?php
							$now = get_terms( 'categoria_conocimiento', array( 'orderby' => 'name','fields' => 'ids','parent' => 0));
							$select = llenarSeleccion($now,'filterCategorias[]','Todos las areas de conocimiento');
							echo $select; 
						?>
					</div> 
					<div class="col-sm-4">
						<h5>Tipo:</h5>
						<?php
							$now = get_terms( 'tipo_publicaciones', array( 'orderby' => 'name','fields' => 'ids','parent' => 0));
							$select = llenarSeleccion($now,'filterTipos[]','Todos los tipos');
							echo $select; 
						?>
					</div> 
				</div><br/>
				<div class="row">
					<div class="col-sm-12">
						<a class="btn-cargar-publicacion btn btn-default" data-url="<?php echo admin_url('admin-ajax.php'); ?>">Buscar</a>
					<a href="<?php home_url('/descargas/'); ?>" class="btn btn-default">Limpiar filtros</a>		
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Loading_icon.gif" style="display:none;" class="loaderwp" style="" width="25px" height="25px">
					</div>
				</div>
		</div>
	</div>
</div>
<div class="container quitarPadding">
	<div  class="collapse in sombraInferior espacioBotton  espacioTop" id="collapseExample-1">
		<div class="well">
			<div class="row">
				<button id="btn-abrir" class="btn" type="button" data-toggle="collapse" data-target="#collapseExample-2" aria-expanded="false" aria-controls="collapseExample-2">
				 ¿Qué descargas estás buscando? <span class="pull-right glyphicon glyphicon-search" > </span>
				</button>
			</div>
		</div>
	</div>
</div>
<!-- inicio descargas-->
<div class="container quitarPadding">
	<div class="col-sm-12  quitarPadding">
		<h1>Descargas</h1>
	</div>
</div>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?> 
<?php 
$data = new WP_Query(array(
    'post_type'=>'publicacion', // your post type name
    'posts_per_page' => 6, // post per page
    'post_status' => 'publish',
    'paged' => $paged,
));?> 
<div id="the-posts-publicacion">
	<?php if($data->have_posts()) : ?>
	<div class="container quitarPadding">
		<div class="col-sm-12  quitarPadding">
		  <?php  while($data->have_posts())  : $data->the_post();?>
			<div class="col-xs-12 col-sm-6 col-md-4">
		          <?php get_template_part('targetas-publicacion'); ?>
			</div>
		    <?php endwhile;?> 
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" >
				<a href="<?php echo home_url('/publicacion/');?>">Más descargas</a>
			</p>
	       	<p class="tituloNavegacionCarousel pull-right">
	       	<?php $total_pages = $data->max_num_pages;
		    if ($total_pages > 1){
		        $current_page = max(1, get_query_var('paged'));
						$arrayPagination =array(
		            'base' => get_pagenum_link(1) . '%_%',
		            'format' => '/page/%#%',
		            'current' => $current_page,
		            'total' => $total_pages,
		            'prev_text'    => __('« prev'),
		            'next_text'    => __('next »'),
		        ); ?> 
	       		<?php echo paginate_links($arrayPagination); ?> 
	       	<?php } ?>
	       	</p>
		</div>  
	</div> 
	<?php else :?>
		<h3><?php _e('404 Error&#58; Not Found', ''); ?></h3>
	<?php endif; ?>
</div>
<?php wp_reset_postdata();?>
<!-- fin descargas-->
<!-- inicio descarga-->
<?php $tituloDescarga = 'Los más visto'; ?>
<?php $tituloFooterDescarga = 'Más descargas'; ?>
<?php $linkDescarga = home_url('/publicacion/'); ?>
<div class="hidden-xs hidden-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloDescarga; ?></h1>	
				<div id="carousel-example-generic-investigacion" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
					'post_type' => 'publicacion',
					'posts_per_page' => 10, 
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
													<?php get_template_part('targetas-publicacion'); ?>
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
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkDescarga;?>"><?php echo $tituloFooterDescarga; ?></a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI"></span>  de <span id="pagIC"></span></p>
		</div>
	</div>
</div>
<div class="visible-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloDescarga; ?></h1>	
				<div id="carousel-example-generic-investigacion-2" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
					'post_type' => 'publicacion',
					'posts_per_page' => 10, 
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
													<?php get_template_part('targetas-publicacion'); ?>
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
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkDescarga;?>"><?php echo $tituloFooterDescarga; ?></a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI-2"></span>  de <span id="pagIC-2"></span></p>
		</div>
	</div>
</div>
<div class="visible-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloDescarga; ?></h1>	
				<div id="carousel-example-generic-investigacion-3" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
					'post_type' => 'publicacion',
					'posts_per_page' => 10, 
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
													<?php get_template_part('targetas-publicacion'); ?>
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
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkDescarga;?>"><?php echo $tituloFooterDescarga; ?></a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI-3"></span>  de <span id="pagIC-3"></span></p>
		</div>
	</div>
</div>
<!-- fin descarga-->
<?php get_footer(); ?>
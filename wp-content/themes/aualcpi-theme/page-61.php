<?php get_header(); ?>
<!-- pagina movilidad-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (61,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fondoPerfil.png" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php }?>
				<div class="container">
					<div class="carousel-caption">
						<p><?php
						$post = get_post(61); 
						$contenido = $post->post_content;
						echo $contenido;
						?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container espacioBotton  espacioTop">
	<div id="tabVerticalNegroMovilidad" class="row bordetabVerticalNegro sombraInferior tabVerticalNegro ElementoPadre">
		<ul class="col-xs-5 nav nav-tabs tabs-right listaMovilidad ElementoHijo ">
			<li class="active">
			<a href="#programaMovilidad-quien-r" data-toggle="tab">
				<p class="visible-xs visible-sm" >¿Puedo aplicar movilidad EMUAL?</p>
				<p class="hidden-xs hidden-sm">¿Quíenes pueden aplicar al</p><p class="hidden-xs hidden-sm"> programa de movilidad  EMUAL?</p>
			</a></li>
			<li><a href="#categoriasMovilidad-r" data-toggle="tab"><p>Categorías disponibles</p></a></li>
			<li><a href="#programaMovilidad-aplicar-r" data-toggle="tab">
			<p class="visible-xs visible-sm" >¿Como aplicar movilidad EMAUL?</p>
			<p class="hidden-xs hidden-sm">¿Cuál es el proceso para aplicar al</p><p class="hidden-xs hidden-sm"> programa de movilidad EMUAL?</p>
			</a></li>
		</ul>
		<div class="col-xs-7 tab-content ">
			<div class="tab-pane active" id="programaMovilidad-quien-r">
				<?php echo get_post_meta($post->ID,'Quienes')[0]; ?>
			</div>
			<div class="tab-pane" id="categoriasMovilidad-r">
				<?php $terms = get_terms(array(
				    'taxonomy' => 'categoria',
				    'hide_empty' => false,
					'posts_per_page' => 3, 
					'orderby' => 'name',
					'order'   => 'DESC',
				));
					if ( $terms ) {
						//echo aualcpi_mostrarCategorias_movilidad($terms,'</br>');
						$i=0;
						$iRomano='';
						$imprimir='';
							foreach ($terms as $term) {
								$i++;
								if($i==1){$iRomano='I';}
								if($i==2){$iRomano='II';}
								if($i==3){$iRomano='III';}
								$imprimir.= '<div class="row"><div class="TitulosCategoriasMovilidad text-center col-xs-8 col-sm-6 col-xs-push-2 col-sm-push-3" ><h4>Categoría '.$iRomano.'</h4></div></div><div class="row"><div class="categoriasDisponiblesMovilidad text-center col-xs-8 col-sm-6 col-xs-push-2 col-sm-push-3" ><a href="#modal-id'.$i.'" data-toggle="modal"><h4>'.$term->name.'</h4></a></div></div>';
									?>
	<div class="modal fade" id="modal-id<?php echo $i; ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><?php echo $term->name; ?></h4>
				</div>
				<div class="modal-body">
					<?php echo $term->description; ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
								<?php
							}
						echo $imprimir;
					}
				?>
			</div>
			<div class="tab-pane" id="programaMovilidad-aplicar-r">
			<?php echo get_post_meta($post->ID,'Proceso')[0]; ?>
			</div>
		</div>
	</div>
</div>
<div class="container quitarPadding ">
	<div class="collapse sombraInferior espacioBotton" id="collapseExample-3" >
		<div class="well">
			<div class="row">
				<button id="btn-cerrar" class="btn pull-right glyphicon glyphicon-remove" type="button" data-toggle="collapse" data-target="#collapseExample-1" aria-expanded="false" aria-controls="collapseExample-1">
				</button>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h4>Busqueda de becas</h4>
				</div>
				<div class="col-sm-4">
					
					<h5>País</h5>
					<?php
						$now = get_terms( 'ciudad_becas', array( 'orderby' => 'name','fields' => 'ids','parent' => 0));
						$select = llenarSeleccion($now,'filterCiudades[]','Todos los paises');
						echo $select; 
					?>
				</div> 
				<div class="col-sm-4">
					<h5>Categoría</h5>
					<?php
						$now = get_terms( 'categoria', array( 'orderby' => 'name','fields' => 'ids','parent' => 0));
						$select = llenarSeleccion($now,'filterCategorias[]','Todos las categorias');
						echo $select; 
					?>
				</div> 
				<div class="col-sm-4">
					<a class="btn-cargar-becas btn btn-default" data-url="<?php echo admin_url('admin-ajax.php'); ?>">Buscar</a>
					<a href="<?php home_url('/movilidad/'); ?>" class="btn-cargar-becas btn btn-default">Limpiar filtros</a>	
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Loading_icon.gif" style="display:none;" class="loaderwp" style="" width="25px" height="25px">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container quitarPadding">
	<div  class="collapse in sombraInferior espacioBotton" id="collapseExample-1">
		<div class="well">
			<div class="row">
				<button id="btn-abrir" class="btn" type="button" data-toggle="collapse" data-target="#collapseExample-3" aria-expanded="false" aria-controls="collapseExample-3">
				 ¿Qué becas estás buscando hoy? <span class="pull-right glyphicon glyphicon-search" > </span>
				</button>
			</div>
		</div>
	</div>
</div>

<!-- inicio becas-->
<div class="container quitarPadding">
	<div class="col-sm-12  quitarPadding">
		<h1>Oferta de becas y programas disponibles</h1>
	</div>
</div>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?> 
<?php 
$data = new WP_Query(array(
    'post_type'=>'becas', // your post type name
    'posts_per_page' => 1, // post per page
    'paged' => $paged,
));?> 
<div id="the-posts-becas">
	<?php if($data->have_posts()) : ?>
	<div class="container quitarPadding">
		<div class="col-sm-12  quitarPadding">
		  <?php  while($data->have_posts())  : $data->the_post();?>
			<div class="col-xs-12 col-sm-6 col-md-4">
		          <?php get_template_part('targetas-beca'); ?>
			</div>
		    <?php endwhile;?> 
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" >
				<a href="<?php echo home_url('/becas/');?>">Más becas</a>
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
<!-- fin becas-->
<!-- inicio descarga-->
<?php $tituloDescarga = 'Descargas'; ?>
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
<div id="myModalBeca1" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tipos de Becas</h4>
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
        <h1 class="modal-title">Categorias de becas</h1>
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
        <h4 class="modal-title">¡Estás muy cerca de dar un gran paso en tu vida personal y profesional!</h4>
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
<?php get_footer(); ?>
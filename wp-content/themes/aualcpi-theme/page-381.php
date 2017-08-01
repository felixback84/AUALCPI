<?php get_header(); ?>
<!-- pagina investigadores-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (89,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fondoPerfil.png" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php }?>
				<div class="container">
					<div class="carousel-caption">
						<p><?php
						$post = get_post(89); 
						$contenido = $post->post_content;
						echo $contenido;
						?></p>
						<a href="<?php echo home_url('/suscribirme/');?>" class="btn btnSuscribirme">Quiero ser miembro</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container quitarPadding">
	<div class="collapse sombraInferior espacioTop espacioBotton" id="collapseExample-2" >
		<div class="well">
				<div class="row">
					<button id="btn-cerrar" class="btn pull-right glyphicon glyphicon-remove" type="button" data-toggle="collapse" data-target="#collapseExample-1" aria-expanded="false" aria-controls="collapseExample-1">
					</button>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h4>Busqueda de retos, proyectos e investigadores regionales</h4>
						<h5>Seleccionar país</h5>
					</div>
					<div class="col-sm-4">
						<?php
							$now = get_terms( 'ciudad_investigaciones', array( 'orderby' => 'name','fields' => 'ids','parent' => 0));
							$select = llenarSeleccion($now,'filterCiudades[]','Todos los paises');
							echo $select; 
						?>
					</div> 
				</div>
				<div class="row espacioBotton">
					<div class="col-sm-12">
						<h5>Filtrar por:</h5>
					</div>
					<div class="col-sm-4">
						<?php
							$now = get_terms( 'status_inves', array( 'orderby' => 'name','fields' => 'ids'));
							$select = llenarSeleccion($now,'filterStatus[]');
							echo $select;
						?>
					</div> 
					<div class="col-sm-4">
						<?php
							$now = get_terms( 'areas',array( 'orderby' => 'name','fields' => 'ids'));
							$select = llenarSeleccion($now,'filterAreas[]', 'Todos las areas');
							echo $select;
						?>
					</div>
					<div class="col-sm-4">
						<select name="filterComentarios[]" id="inputFilterComentarios" class="form-control" required="required">
							<option value="Contribuciones">Seleccionar...</option>
							<option value="ConContribuciones">Con Contribuciones</option>
							<option value="SinContribuciones">Sin Contribuciones</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<a class="btn-cargar-investigacion btn btn-default" data-url="<?php echo admin_url('admin-ajax.php'); ?>">Buscar</a>	
						<a href="<?php home_url('/retos-regionales/'); ?>" class="btn-cargar-becas btn btn-default">Limpiar filtros</a>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Loading_icon.gif" style="display:none;" class="loaderwp" style="" width="25px" height="25px">
					</div>
				</div>
		</div>
	</div>
</div>
<div class="container quitarPadding">
	<div  class="collapse in sombraInferior  espacioTop espacioBotton" id="collapseExample-1">
		<div class="well">
			<div class="row">
				<button id="btn-abrir" class="btn" type="button" data-toggle="collapse" data-target="#collapseExample-2" aria-expanded="false" aria-controls="collapseExample-2">				
				 ¿Qué retos estás buscando hoy? <span class="pull-right glyphicon glyphicon-search" > </span>
				</button>
			</div>
		</div>
	</div>
</div>

<!-- inicio Retos-->
<div class="container quitarPadding paginaHome">
	<div class="col-sm-12  quitarPadding">
		<h1 id="text-retos">investigadores</h1>
	</div>
</div>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?> 
<?php 
$data = new WP_Query(array(
    'post_type'=>'investigacion', // your post type name
    'posts_per_page' => 6, // post per page
    'post_status' => 'publish',
    'paged' => $paged,
));?> 
<div id="the-posts-inves">
	<?php if($data->have_posts()) : ?>
	<div class="container quitarPadding">
		<div class="col-sm-12  quitarPadding">
		  <?php  while($data->have_posts())  : $data->the_post();?>
			<div class="col-xs-12 col-sm-6 col-md-4">
		         <?php get_template_part('targetas-inves-inves'); ?>
			</div>
		    <?php endwhile;?> 
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" >
				<a href="<?php echo home_url('/investigacion/');?>">Más retos regionales</a>
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
<!-- fin retos-->

<!-- inicio Investigadores-->
<?php $tituloInvestigadores = 'Investigadores regionales'; ?>
<div class="hidden-xs hidden-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloInvestigadores; ?></h1>	
				<div id="carousel-example-generic-investigacion" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php 
					$cont=0;
					$numeroElementos=3;
					$args = array(
					'role'         => 'Investigador',
					'orderby'      => 'ID',
					'order'        => 'DESC',
					'number'       => 10,
					); 
	   				$users = get_users( $args ); 
					if(!empty($users)){
    				foreach ($users as $usuario) { ?>
							<?php if($cont== 0){ ?>
								<div class="item active" cont="1">
							<?php } ?> 
							<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
								</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
							<?php } ?> 
									<div class="col-xs-12 col-sm-6 col-md-4">
										<?php set_query_var('user',$usuario);
										get_template_part('targetas-autores'); ?>
									</div>	
							<?php if($cont%$numeroElementos == 0){ ?> 
								
							<?php } ?> 								
						 	<?php $cont++;
					?></div><?php 
					} }
					wp_reset_postdata(); 
					//$fin+=2; ?>
					</div><div class="contador"  cont="<?php echo round($cont/$numeroElementos)+1; ?>"></div>
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
	<div class="espacioBotton">
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel  alinear-derecha" >Página <span id="pagI"></span>  de <span id="pagIC"></span></p>
		</div>
	</div>
	</div>
</div>
<div class="visible-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloInvestigadores; ?></h1>	
				<div id="carousel-example-generic-investigacion-2" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php 
					$cont=0;
					$numeroElementos=2;
					$args = array(
					'role'         => 'Investigador',
					'orderby'      => 'ID',
					'order'        => 'DESC',
					'number'       => 10,
					); 
	   				$users = get_users( $args ); 
					if(!empty($users)){
    				foreach ($users as $usuario) { ?>
										<?php if($cont== 0){ ?>
											<div class="item active" cont="1">
										<?php } ?> 
										<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
											</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
										<?php } ?> 
												<div class="col-xs-12 col-sm-6 col-md-4">
													<?php set_query_var('user',$usuario);
													get_template_part('targetas-autores'); ?>
												</div>	
										<?php if($cont%$numeroElementos == 0){ ?> 
											
										<?php } ?> 								
									 	<?php $cont++; 
									 	?></div><?php 
									}
								}
								wp_reset_postdata(); 
								//$fin+=2; ?>
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
	<div class="espacioBotton">
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel  alinear-derecha" >Página <span id="pagI-2"></span>  de <span id="pagIC-2"></span></p>
		</div>
	</div>
	</div>
</div>
<div class="visible-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloInvestigadores; ?></h1>	
				<div id="carousel-example-generic-investigacion-3" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php 
					$cont=0;
					$numeroElementos=1;
					$args = array(
					'role'         => 'Investigador',
					'orderby'      => 'ID',
					'order'        => 'DESC',
					'number'       => 10,
					); 
	   				$users = get_users( $args ); 
					if(!empty($users)){
    				foreach ($users as $usuario) { ?>
										<?php if($cont== 0){ ?>
											<div class="item active" cont="1">
										<?php } ?> 
										<?php if($cont%$numeroElementos == 0 && $cont!= 0){ ?> 
											</div><div class="item" cont="<?php echo (round($cont/$numeroElementos))+1; ?>">
										<?php } ?> 
												<div class="col-xs-12 col-sm-6 col-md-4">
													<?php set_query_var('user',$usuario);
													get_template_part('targetas-autores'); ?>
												</div>	
										<?php if($cont%$numeroElementos == 0){ ?> 
											
										<?php } ?> 								
									 	<?php $cont++; 
									 	?></div><?php 
									 }
								}
								wp_reset_postdata(); 
								//$fin+=2; ?>
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
	<div class="espacioBotton">
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel  alinear-derecha" >Página <span id="pagI-3"></span>  de <span id="pagIC-3"></span></p>
		</div>
	</div>
	</div>
</div>
<!-- fin Investigadores-->

<?php get_footer(); ?>
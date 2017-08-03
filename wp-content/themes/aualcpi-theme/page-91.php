<?php get_header(); ?>
<!-- pagina base de datos investigadores-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (91,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fondoPerfil.png" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php }?>
				<div class="container">
					<div class="carousel-caption">
						<p><?php
						$post = get_post(91); 
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
<div class="container  quitarPadding">
	<div class="collapse sombraInferior  espacioTop espacioBotton" id="collapseExample-2" >
		<div class="well">
				<div class="row">
					<button id="btn-cerrar" class="btn pull-right glyphicon glyphicon-remove" type="button" data-toggle="collapse" data-target="#collapseExample-1" aria-expanded="false" aria-controls="collapseExample-1">
					</button>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h4>Busqueda de investigadores que pariticiparon retos, proyectos e investigadores regionales</h4>
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
						<a class="btn-cargar-investigadores btn btn-default" data-url="<?php echo admin_url('admin-ajax.php'); ?>">Buscar</a>	
						<a href="<?php home_url('/bases-de-datos-investigadoras/'); ?>" class="btn-cargar-becas btn btn-default">Limpiar filtros</a>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Loading_icon.gif" style="display:none;" class="loaderwp" style="" width="25px" height="25px">
					</div>
				</div>
		</div>
	</div>
</div>
<div class="container quitarPadding">
	<div  class="collapse in sombraInferior espacioTop espacioBotton" id="collapseExample-1">
		<div class="well">
			<div class="row">
				<button id="btn-abrir" class="btn" type="button" data-toggle="collapse" data-target="#collapseExample-2" aria-expanded="false" aria-controls="collapseExample-2">
				 ¿Qué investigador buscas hoy? <span class="pull-right glyphicon glyphicon-search" > </span>
				</button>
			</div>
		</div>
	</div>
</div>


<!-- inicio investigadores-->
<div class="container quitarPadding paginaHome">
	<div class="col-sm-12  quitarPadding">
		<h1 id="text-investigador">Investigadores regionales</h1>
	</div>
</div>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?> 
<?php 
$cont=0;
$numeroShowPorPagina = 6;
$numeroElementos=3;
$idsUsuarios= array();
$args = array(
'role'         => 'Investigador',
'orderby'      => 'ID',
'order'        => 'DESC',
); 
	$users = get_users( $args ); 
if(!empty($users)){
foreach ($users as $usuario) { 
	if(!in_array($usuario->ID,$idsUsuarios)){ array_push($idsUsuarios,$usuario->ID);
		$cont++;
	}
//var_dump($usuario->ID); ?>
<?php  } } wp_reset_postdata();  ?>
<?php 
//$args = array(
//  'post_type' => 'investigacion',
//   'post_status' => 'publish',
//   'order'=> 'DESC',
//   'orderby' => 'date',
// );
// $posts =  query_posts($args);
// foreach ($posts as $post){
// 	$author_obj = get_user_by('ID',$postContribucion->post_author);
// 				//var_dump($author_obj); 
// 				if($author_obj->roles['0']== 'Investigador'){
// 		if(!in_array($post->post_author,$idsUsuarios)){ array_push($idsUsuarios,$post->post_author);
// 			$cont++;
// 		}

// 		}
// 	$args = array(
//       'post_type' => 'contribuciones',
//       'post_status' => 'publish',
//       'post_parent' => $post->ID,
//       'order'=> 'DESC',
//       'orderby' => 'date',
//     );
//     $postContribuciones =  query_posts($args);
//     //var_dump($postContribuciones);
//    		( is_array($postContribuciones) && !empty($postContribuciones)) ? $nContribuciones = '1': $nContribuciones = '0';
// 	 	//echo $nContribuciones;

// 		foreach ($postContribuciones as $postContribucion){
//  	 	if($nContribuciones != '0'){
// 			//echo 'idAutho'.$postContribucion->post_author;
// 			$author_obj = get_user_by('ID',$postContribucion->post_author);
// 			//var_dump($author_obj); 
// 			if($author_obj->roles['0']== 'Investigador'){
//     			//var_dump($postContribucion->post_author);
// 				//var_dump($author_obj->roles['0']);
// 				if(!in_array($postContribucion->post_author,$idsUsuarios)){ array_push($idsUsuarios,$postContribucion->post_author);
// 							$cont++;
// 					}
// 			}
			
// 		}
//     }  
// }
 ?>			

<?php  //echo "cont :$cont";
$total_pages = round($cont /$numeroShowPorPagina) ;
//var_dump($total_pages);
//echo "hola";
//var_dump($idsUsuarios); 
$limitShowPaged=$numeroShowPorPagina*$paged;
$initShowPaged=$numeroShowPorPagina*($paged-1);
//var_dump($limitShowPaged,$initShowPaged);
//echo "page: $paged";
//echo "limit: $limitShowPaged";
//echo "init: $initShowPaged";
?>

<div id="the-posts-user">
<?php if(!empty($idsUsuarios)){ ?>
<div class="container quitarPadding">
		<div class="col-sm-12  quitarPadding">
			<?php foreach ($idsUsuarios as $key => $id) {
				if($key<$limitShowPaged && $key >= $initShowPaged){
				//echo "id: $id";
				$usuario = get_user_by('ID',$id);?>
				<div class="col-xs-12 col-sm-6 col-md-4">
			         <?php set_query_var('user',$usuario);
							get_template_part('targetas-autores'); ?>
				</div>
		    <?php } } ?> 
		</div>
	</div>
	<div class="carousel-nav sombraInferior">
		<div class="container quitarPadding">
			<p class="tituloNavegacionCarousel" >
				<a href="<?php echo home_url('/investigadores/');?>">Más investigadores</a>
			</p>
	       	<p class="tituloNavegacionCarousel pull-right">
	       	<?php //$total_pages = $data->max_num_pages;
	       	//var_dump($total_pages);
		    if ($total_pages > 1){
		       	//$current_page = max(1, get_query_var('paged'));
		        //echo "current: $current_page";
		        //echo home_url('/bases-de-datos-investigadoras/');
				$arrayPagination =array(
		            'base' => home_url('/bases-de-datos-investigadoras/') . '%_%',
		            'format' => '/page/%#%',
		            //'current' => $paged,
		            'current' => max(1,$paged),
		            'total' => $total_pages,
		            'prev_text'    => __('« prev'),
		            'next_text'    => __('next »'),
		        ); 
		       //var_dump($arrayPagination); ?> 
	       		<?php echo paginate_links($arrayPagination); ?> 
	       	<?php } ?>
	       	</p>
		</div>  
	</div> 
<?php }else{ ?>
	<h3><?php _e('No hay usuarios con estas descripciones', ''); ?></h3>
<?php } wp_reset_postdata();?>
</div>

<!-- fin investigadores-->

<!-- inicio Retosregionales-->
<?php $tituloRetos = 'Retos regionales'; ?>
<?php $tituloFooterRetos = 'Más Retos regionales'; ?>
<?php $linkRetos = home_url('/investigacion/'); ?>
<div class="hidden-xs hidden-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloRetos; ?></h1>	
				<div id="carousel-example-generic-investigacion" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
					'post_type' => 'investigacion',
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
													<?php get_template_part('targetas-inves-inves'); ?>
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
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkRetos;?>"><?php echo $tituloFooterRetos; ?></a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI"></span>  de <span id="pagIC"></span></p>
		</div>
	</div>
</div>
<div class="visible-sm">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloRetos; ?></h1>	
				<div id="carousel-example-generic-investigacion-2" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
					'post_type' => 'investigacion',
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
													<?php get_template_part('targetas-inves-inves'); ?>
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
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkRetos;?>"><?php echo $tituloFooterRetos; ?></a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI-2"></span>  de <span id="pagIC-2"></span></p>
		</div>
	</div>
</div>
<div class="visible-xs">
	<div class="container paginaHome">
		<div class="row">
			<div class="col-sm-12 quitarEspacio">
				<h1><?php echo $tituloRetos; ?></h1>	
				<div id="carousel-example-generic-investigacion-3" class="carousel slide" data-ride="carousel"  data-type="mulsti">
				<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
					'post_type' => 'investigacion',
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
													<?php get_template_part('targetas-inves-inves'); ?>
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
			<p class="tituloNavegacionCarousel" ><a href="<?php echo $linkRetos;?>"><?php echo $tituloFooterRetos; ?></a></p>
			<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagI-3"></span>  de <span id="pagIC-3"></span></p>
		</div>
	</div>
</div>
<!-- fin Retosregionales-->
<?php get_footer(); ?>
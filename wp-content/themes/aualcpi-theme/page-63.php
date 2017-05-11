<?php get_header(); ?>
<!-- pagina publicaciones-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (63,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php }?>
				<div class="container">
					<div class="carousel-caption">
						<p><?php
						$post = get_post(63); 
						$contenido = $post->post_content;
						echo $contenido;
						?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container  quitarPadding">
	<div class="collapse sombraInferior" id="collapseExample-2" >
		<div class="well">
				<div class="row">
					<button id="btn-cerrar" class="btn pull-right glyphicon glyphicon-remove" type="button" data-toggle="collapse" data-target="#collapseExample-1" aria-expanded="false" aria-controls="collapseExample-1">
					</button>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h4>Busqueda de documentos, publicaciones y</h4>
						<h4>formatos de aplicacion</h4>
						<h5>Categorias</h5>
					</div>
					<div class="col-sm-4">
						<?php
							$now = get_terms( 'categoria_conocimiento', array( 'orderby' => 'name','fields' => 'ids','parent' => 0));
							$select = llenarSeleccion($now,'filterCiudades[]','Todos los paises');
							echo $select; 
						?>
					</div> 
				</div><br/>
				<div class="row">
					<div class="col-sm-12">
						<a class="btn-cargar-publicacion btn btn-default" data-url="<?php echo admin_url('admin-ajax.php'); ?>">Buscar</a>	
					
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Loading_icon.gif" style="display:none;" class="loaderwp" style="" width="125px" height="100px">
					</div>
				</div>
		</div>
	</div>
</div>
<div class="container quitarPadding">
	<div  class="collapse in sombraInferior" id="collapseExample-1">
		<div class="well">
			<div class="row">
				<button id="btn-abrir" class="btn pull-right glyphicon glyphicon-search" type="button" data-toggle="collapse" data-target="#collapseExample-2" aria-expanded="false" aria-controls="collapseExample-2">
				</button>
			</div>
		</div>
	</div>
</div>
<div class="container quitarPadding">
	<div class="row">
		<div class="col-xs-12">
			<h1 id="text-retos">Publicaciones</h1>
			<div id="carousel-example-generic-publicacion" class="carousel slide" data-ride="carousel" data-type="multi" >
				<div id="the-posts-inves" class="carousel-inner" role="listbox"> 
						<?php $args = array(
					      'post_type' => 'publicacion',
					      'post_status' => 'publish',
					      'order'=> 'DESC',
					      'orderby' => 'date',
						  'posts_per_page' => 10, 
					    );
						$lastBlog = new WP_Query ($args);
						$cont=0;
						if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
						<?php if($cont == 0){ ?><div class="item active"  cont="<?php echo $cont+1; ?>"><?php }else{ ?><div class="item"  cont="<?php echo $cont+1; ?>"><?php } ?> 
								<div class="col-xs-12 col-sm-6 col-md-4">
										<?php get_template_part('targetas-publicacion'); ?>
								</div>
							</div>
							 <?php $cont++; 
							 endwhile;
						endif;	
					    wp_reset_postdata(); ?>
				</div><div class="contador"  cont="<?php echo $cont; ?>"></div>
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
<div class="espacioBotton">
	<div class="carousel-nav sombraInferior">
	<div class="container quitarPadding">
		<p class="tituloNavegacionCarousel" ><a href="<?php echo home_url('/publicacion/');?>">MAS PUBLICACIONES</a></p>
		<p class="tituloNavegacionCarousel pull-right" >Página <span id="pagP"></span>  de <span id="pagPC"></span></p>
	</div>
	</div>
</div>
<?php get_footer(); ?>
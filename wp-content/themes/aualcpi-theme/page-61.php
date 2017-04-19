<?php get_header(); ?>
<!-- pagina movilidad-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (61,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php }?>
				<div class="container">
					<div class="carousel-caption">
						<?php
						$post = get_post(61); 
						$contenido = $post->post_content;
						$contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container espacioBotton">
	<div class="row bordetabVerticalNegro sombraInferior tabVerticalNegro ElementoPadre">
		<div class="col-xs-7 tab-content ">
			<div class="tab-pane active" id="programaMovilidad-quien-r">
				<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam vitae voluptatum tempore laudantium error officiis impedit illum rerum corrupti qui iste, maiores, voluptate dignissimos recusandae distinctio eum voluptatibus quae dicta.</div>
				<div>Voluptatem numquam voluptatibus recusandae atque nobis sed quidem, possimus quasi suscipit. Ipsa est asperiores ullam, porro sapiente dolor. Rem quidem beatae similique maiores odio nobis corporis? Animi repellat, dicta ab?</div>
				<div>Qui unde ducimus nihil assumenda earum fugiat facere. Saepe blanditiis dignissimos, placeat nulla ea dolor, nesciunt aspernatur, fuga pariatur minus nihil! Illo iusto ipsa sequi aut ab neque accusamus rem?</div>
				<div>Suscipit porro molestias, necessitatibus sint ut blanditiis impedit sunt distinctio officia, doloremque eaque hic molestiae dolores deleniti autem voluptatem natus laborum tenetur eum eveniet ipsam, recusandae illo. Impedit, doloribus, ducimus.</div>
				<div>Non quasi, commodi at voluptatem dolorem ut optio eveniet assumenda minus animi maiores alias iusto consequatur soluta, ex vero autem. Praesentium porro mollitia laboriosam, vel repellendus voluptatum dolore facilis impedit.</div>
			</div>
			<div class="tab-pane" id="categoriasMovilidad-r">
				<?php $terms = get_terms('categoria');
					if ( $terms ) {
						echo aualcpi_mostrarCategorias_movilidad($terms,'</br>');
						//var_dump($terms);
					}
				?>
			</div>
			<div class="tab-pane" id="programaMovilidad-aplicar-r">
				<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, assumenda odio tempora corporis animi ipsa neque. Commodi provident nulla, nobis sint! Voluptas nulla ratione, necessitatibus doloremque facilis ut nemo error!</div>
				<div>Deserunt suscipit nemo saepe, earum quae adipisci officia sit deleniti cumque delectus at molestiae dolorem esse, fugit doloribus error facere. Neque quibusdam nesciunt, reprehenderit mollitia et porro. Accusantium, atque, delectus?</div>
				<div>Odit dolore aliquid pariatur inventore autem officiis. Enim libero ipsa ab voluptas quasi voluptatibus quia culpa, pariatur, mollitia repellat incidunt voluptatem rerum praesentium ullam quo quidem modi nemo recusandae adipisci.</div>
				<div>Harum corporis nisi numquam eligendi delectus voluptates deleniti earum pariatur, nemo temporibus sint cum eius odit suscipit rerum doloribus iste tenetur aut quibusdam, rem! Pariatur velit nihil fugit, dolorem iusto.</div>
				<div>Quae, tempore possimus. Modi eius assumenda iure ad corrupti impedit blanditiis, consequatur tenetur deleniti quam fugiat, corporis nisi inventore. Reiciendis magni ex, tempore nam delectus incidunt earum omnis. Adipisci, labore!</div>
			</div>
		</div>
		<ul class="col-xs-5 nav nav-tabs tabs-right listaMovilidad ElementoHijo ">
			<li class="active"><a href="#programaMovilidad-quien-r" data-toggle="tab">
			<span class="visible-xs" >¿Puedo aplicar movilidad EMUAL?</span><span class="hidden-xs">¿Quíenes pueden aplicar al programa de movilidad  EMUAL?</span>
			</a></li>
			<li><a href="#categoriasMovilidad-r" data-toggle="tab">Categorías disponibles</a></li>
			<li><a href="#programaMovilidad-aplicar-r" data-toggle="tab"><span class="visible-xs" >¿Como aplicar movilidad EMAUL?</span><span class="hidden-xs">¿Cuál es el proceso para aplicar al programa de movilidad EMUAL?</span></a></li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="collapse sombraInferior" id="collapseExample-2" >
		<div class="well">
			<div class="row">
				<button id="btn-cerrar" class="btn pull-right glyphicon glyphicon-remove" type="button" data-toggle="collapse" data-target="#collapseExample-1" aria-expanded="false" aria-controls="collapseExample-1">
				</button>
			</div>
			<div class="row">
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
						$select = llenarSeleccion($now,'filterCategorias[]','Todos los paises');
						echo $select; 
					?>
				</div> 
				<div class="col-sm-4">
					<a class="btn-cargar-becas btn btn-default" data-url="<?php echo admin_url('admin-ajax.php'); ?>" style="margin-top: 25px;">Buscar</a>	
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Loading_icon.gif" style="display:none;" class="loaderwp" style="" width="125px" height="100px">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div  class="collapse in sombraInferior" id="collapseExample-1">
		<div class="well">
			<div class="row">
				<button id="btn-abrir" class="btn pull-right glyphicon glyphicon-search" type="button" data-toggle="collapse" data-target="#collapseExample-2" aria-expanded="false" aria-controls="collapseExample-2">
				</button>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row espacioBotton">
		<div class="col-sm-12">
			<h1>Oferta de becas y programas disponibles</h1>
			<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi">
			<!-- Wrapper for slides -->
				<div id="the-posts-becas" class="carousel-inner" role="listbox"> 
					<?php $args = array (
						'post_type' => 'becas',
						'posts_per_page' => 6, 
						'orderby' => 'id',
						'order'   => 'DESC',
					);
					$lastBlog = new WP_Query ($args);
					$cont=0;
					$numeroElementos=3;
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
							<?php if($cont == 0){ ?>
								<div class="item active">
							<?php }else{ ?> 
									<div class="item">
							<?php } ?> 
								<div class="col-xs-12 col-sm-4">
									<?php get_template_part('targetas-beca'); ?>
								</div>
							</div> 
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); ?>
				</div>
				<!-- Controls -->
			<a class="right carousel-control" href="#carousel-example-generic-beca" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			  <a class="left carousel-control" href="#carousel-example-generic-beca" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			</a>
			</div>
		</div>
	</div>
</div>

<div class="carousel-nav sombraInferior">
	<div class="container row">		
		<p class="tituloNavegacionCarousel pull-right" >MAS BECAS</p>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Publicaciones</h1>	
			<div id="carousel-example-generic-a" class="carousel slide" data-ride="carousel"  data-type="multi">
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox"> 
					<?php $args = array (
						'post_type' => 'publicacion',
						'posts_per_page' => 6, 
						'orderby' => 'id',
						'order'   => 'DESC',
					);
					$lastBlog = new WP_Query ($args);
					$cont=0;
					$numeroElementos=3;
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
						<?php if($cont == 0){ ?>
								<div class="item active">
							<?php }else{ ?> 
									<div class="item">
							<?php } ?> 
										<div class="col-xs-12 col-sm-4">
											<?php get_template_part('targetas-publicacion'); ?>
										</div>
									</div>
						 	<?php $cont++; endwhile;
						endif;	
				    wp_reset_postdata(); 
//				     $fin+=2; ?>
				</div>
				<!-- Controls -->
				<a class="right carousel-control" href="#carousel-example-generic-a" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				  <a class="left carousel-control" href="#carousel-example-generic-a" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>   
			</div>
		</div>
	</div>
</div>
<div class="espacioBotton">
	<div class="carousel-nav sombraInferior">
	<div class="container row">
		<p class="tituloNavegacionCarousel pull-right" >MAS PUBLICACIONES</p>
	</div>
	</div>
</div>	
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
         	<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/iconosModalBecasSkype.png" style="" alt="" width="" height="" style="color:#1eafd2;"/> ORI.UPiloto</p>
         	<p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/iconosModalBecasWhatsApp.png" style="" alt="" width="" height="" style="color:#1eafd2;"/> +571 5678903</p>
         </div>
         </div>
      </div>
      
    </div>
  </div>
</div>
<?php get_footer(); ?>
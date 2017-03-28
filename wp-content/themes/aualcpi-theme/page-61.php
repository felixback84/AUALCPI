<?php get_header(); ?>
<!-- pagina movilidad-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?></div>
				<div class="container">
					<div class="carousel-caption">
						<?php
						$post = get_post(61); 
						$contenido = $post->post_content;
						echo $contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row bordetabVerticalNegro">
		<div class="tabVerticalNegro">
	        <div class="col-xs-7">
	          <!-- Tab panes -->
	          <div class="tab-content">
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
	        </div>

	        <div class="col-xs-5"> <!-- required for floating -->
	          <!-- Nav tabs -->
	          <ul class="nav nav-tabs tabs-right listaMovilidad">
	            <li class="active"><a href="#programaMovilidad-quien-r" data-toggle="tab">
	            <span class="visible-xs" >¿Puedo aplicar movilidad EMUAL?</span><span class="hidden-xs">¿Quíenes pueden aplicar al programa de movilidad  EMUAL?</span>
	            
	            </a></li>
	            <li><a href="#categoriasMovilidad-r" data-toggle="tab">Categorías disponibles</a></li>
	            <li><a href="#programaMovilidad-aplicar-r" data-toggle="tab"><span class="visible-xs" >¿Como aplicar movilidad EMAUL?</span><span class="hidden-xs">¿Cuál es el proceso para aplicar al programa de movilidad EMUAL?</span></a></li>
	          </ul>
	        </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h4>Oferta de becas y programas disponibles</h4>
			<div id="carousel-example-generic-beca" class="carousel slide" data-ride="carousel" data-type="multi">
			<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox"> 
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
				<div class="carousel-nav">
					<a class="controlcarousel pull-right " href="#carousel-example-generic-beca" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="pull-right controlcarousel" href="#carousel-example-generic-beca" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<p class="tituloNavegacionCarousel pull-right" >MAS BECAS</p>
				</div>	    
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h4>Publicaciones</h4>	
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
				<div class="carousel-nav">
					<a class="controlcarousel pull-right " href="#carousel-example-generic-a" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					  <a class="pull-right controlcarousel" href="#carousel-example-generic-a" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<p class="tituloNavegacionCarousel pull-right" >MAS PUBLICACIONES</p>
				</div>	    
			</div>
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
        <h4 class="modal-title">Categorias de becas</h4>
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
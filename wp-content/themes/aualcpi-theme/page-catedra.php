<?php get_header(); ?>
<!-- pagina nuestra asociacion-->
<?php 
//$idPost = 388;  //local 
//$idPost = 600; 	//en vivo

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
<?php //echo $urlImagenTop; ?>
<?php $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ; ?>
<?php echo $post_id; ?>
<div class="container espacioBotton">
	<div id="tabVerticalNegroCatedra" class="row bordetabVerticalNegro tabVerticalNegro ElementoPadre sombraInferior">
      <ul class="nav nav-tabs tabs-right ElementoHijo col-xs-3">
        <li class="active"><a href="#home-r" data-toggle="tab">Presentación de la Cátedra</a></li>
        <li><a href="#mision-r" data-toggle="tab">Definición</a></li>
        <li><a href="#vision-r" data-toggle="tab">Objetivos</a></li>
        <li><a href="#Metodologia-r" data-toggle="tab">Metodologia</a></li>
      </ul>
      <div class="tab-content col-xs-9 quitarPadding">
        <div class="tab-pane active" id="home-r">
			<p><?php echo get_post_meta($post->ID,'Presentacion')[0]; ?></p>
        </div>
        <div class="tab-pane" id="mision-r">
        	<p><?php echo get_post_meta($post->ID,'Definicion')[0]; ?></p>
        </div>
        <div class="tab-pane" id="vision-r">
        	<p><?php echo get_post_meta($post->ID,'Objetivos')[0]; ?></p>
        </div>
        <div class="tab-pane" id="Metodologia-r">
	        <p><?php echo get_post_meta($post->ID,'Metodologia')[0]; ?></p>	
        </div>
      </div>
	</div>
</div>

<!-- inicio categorias-->
<div class="container quitarPadding paginaHome">
	<div class="col-sm-12  quitarPadding">
		<h1>Versiones de Cátedra de integración</h1>
	</div>
</div>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?> 
<?php 
$data = new WP_Query(array(
    'post_type'=>'publicacion', // your post type name
    'posts_per_page' => 6, // post per page
    'post_status' => 'publish',
    'paged' => $paged,
    'tax_query' => array(
		array(
			'taxonomy' => 'tipo_publicaciones',
			'field'    => 'slug',
			'terms'    => 'catedra-de-integracion',
		),
	),
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
	       	<p class="tituloNavegacionCarousel alinear-derecha">
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
	<div class="container"><h3><?php _e('404 Error&#58; Not Found', ''); ?></h3></div>
	<?php endif; ?>
</div>
<?php wp_reset_postdata();?>
<!-- fin catedra-->







<?php get_footer(); ?>
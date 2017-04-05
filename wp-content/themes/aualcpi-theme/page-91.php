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
		<ul>
<?php wp_list_authors('exclude_admin=0&hide_empty=0'); ?>
</ul>
			<ul>
			<?php


			$usuarios = get_users('orderby=id');
			//var_dump($usuarios);
			foreach ($usuarios as $usuario) {
			    echo '<li><a href="'.home_url().'/pagina-usuario/?pageUser=' . $usuario->ID . '">' . $usuario->display_name . '</a></li>';
			}
			?>
			</ul>
			<p class="author-description author-bio">
			<?php the_author_meta('user_email'); ?>
		</p>
		</div>
		<div class="col-xs-12">
<?php
$now = get_terms( 'ciudad_investigaciones', array( 'orderby' => 'name','fields' => 'ids','parent' => 0));
$select = llenarSeleccion($now,'filterCiudades[]','Todos los paises');
echo $select;

$now = get_terms( 'areas',array( 'orderby' => 'name','fields' => 'ids'));
$select = llenarSeleccion($now,'filterAreas[]', 'Todos las areas');
echo $select;
?>
<select name="filterComentarios[]" id="inputFilterComentarios" class="form-control" required="required">
	<option value="LosComentarios">Seleccionar...</option>
	<option value="ConComentarios">Con Comentarios</option>
	<option value="SinComentarios">Sin Comentarios</option>
</select>
<button class="btn-cargar-investigacion btn btn-default" data-url="<?php echo admin_url('admin-ajax.php'); ?>">buscar</button>	
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/idiom.png" style="display:none;" class="loaderwp">
			<div id="the-posts">
			</div>

			----
			<?php $args = array(
		      'post_type' => 'investigacion',
		      'post_status' => 'publish',
		      'order'=> 'ASC',
		      'orderby' => 'date',
		      'tax_query' => array(
		      		'relation' => 'AND',
					array(
						'taxonomy' => 'ciudad_investigaciones',
						'terms'    => 64,
					),
					array(
						'taxonomy' => 'areas',
						'terms' => 11,
					),
				),
		    ); 
    $lastBlog = new WP_Query ($args);
					if($lastBlog->have_posts()):
						while( $lastBlog->have_posts() ): $lastBlog->the_post();?>
							<div class="item active quitarEspacio" cont="<?php echo $cont+1; ?>">
							<div class="item quitarEspacio" cont="<?php echo $cont+1; ?>">
								<div class="col-xs-12 quitarEspacio">
									<?php get_template_part('targetas-noticias'); ?>
								</div>
							</div> 
						 <?php $cont++; endwhile;
					endif;	
				    wp_reset_postdata(); ?>
		</div>	
	</div>
</div>
<?php get_footer(); ?>
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
	</div>
</div>
<?php get_footer(); ?>
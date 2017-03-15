<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<div class="tarjetasQuienes">
		<div class="row">
			<div class="col-xs-8 col-sm-12 col-xs-push-2 col-sm-push-0">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-sm-12 col-md-6">
							<h4><?php "Cargo:"?></h4>
							<p>Nombre Usuario</p>
							<p class="correo">Correo usuario</p>
							<p class="ico-pag ico-twitter">twitter</p>
							<p class="ico-pag ico-in">in</p>
						</div>
						<div class="col-sm-12 col-md-6">
							<?php if( has_post_thumbnail( )): ?>
								<div class="thumbnail"><?php //the_post_thumbnail ('full'); ?>

								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/usuario.jpeg" alt="imagen de defecto" width="" height="" />

								</div>
							<?php else: ?>
								<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/usuario.jpeg" alt="imagen de defecto" width="" height="" /></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>	
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<div class="bloqueTargeta">
		<div class="row">
			<div class="col-xs-12">
			<a href="<?php echo home_url(); ?>/author/<?php echo $user->user_login; ?>/">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-xs-12">
<?php $avatar= get_avatar( $user->ID, '150' ,'','logo usurio',array('class' => 'img-circle',)); ?> 
							<?php 
							//var_dump($user); 
							if( !empty($avatar)): ?>
								<div class="thumbnail">
									<?php echo $avatar;?>
								</div>
							<?php else: ?>
								<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/usuario.jpeg" alt="imagen de defecto" width="" height="" /></div>
							<?php endif; ?>
						</div>
						<div class="col-xs-12">
							<h4><?php echo $user->display_name; ?></h4>
							<p><?php $term=mostrarTermsPorIdUsuario($user->ID,'universidades_user'); 
										echo $term->name; ?></p>
							<p class="correo"><?php echo $user->user_email; ?></p>
							<p><?php $term=mostrarTermsPorIdUsuario($user->ID,'areas'); echo 'Área de investigacion: '.$term->name;?></p>
							<p class="ico-pag"><span class="icon icon-twitter"></span><?php  echo ' '.get_user_meta($user->ID,'twitter')[0]; ?> </p>
							<p class="ico-pag"><span class="icon icon-linkedin"></span><?php echo ' '.get_user_meta($user->ID,'linkedin')[0]; ?></p>
						</div>
						
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
</article>	
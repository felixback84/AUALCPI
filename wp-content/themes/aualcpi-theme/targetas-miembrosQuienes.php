<?php  //echo $usuarioId; ?>
<?php  $user = get_user_by('ID',$usuarioId); //var_dump($usuario); ?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
	<div class="tarjetasQuienes">
		<div class="row">
			<div class="col-xs-10 col-sm-8 col-md-12 col-xs-push-1 col-sm-push-2 col-md-push-0">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-sm-12 col-md-6">
							<h4 class="dobleLinea2"><?php echo $cargo; ?></h4>
							<p><?php echo $user->display_name; ?></p>
							<p class="correo"><?php echo $user->user_email; ?></p>
						</div>
						<div class="col-sm-12 col-md-6">
							<div class="thumbnail">
								<?php $avatar= get_avatar( $user->ID, '150' ,'','logo usurio',array('class' => 'img-circle sombraInferior' ,)); ?> 
								<?php 
								if( !empty($avatar)): ?>
									<div class="thumbnail">
										<?php echo $avatar;?>
									</div>
								<?php else: ?>
									<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/usuario.jpeg" alt="imagen de defecto" width="" height="" /></div>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-sm-12">
							<p class="ico-pag"><span class="icon icon-twitter"> </span><?php  echo ' '.get_user_meta($user->ID,'twitter')[0]; ?></p>
							<p class="ico-pag dobleLinea"><span class="icon icon-linkedin"> </span><?php echo ' '.get_user_meta($user->ID,'linkedin')[0]; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>	
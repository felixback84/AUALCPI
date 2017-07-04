<!--
	Footer, los menus se crean en el CMS pero se llaman desde aqui.
	
	-->
	<footer>
		<div id="footer1">
			<div class="container quitarPadding">
				<div id="redes" class="row">
					<div class="col-xs-6 col-sm-3 col-md-2 quitarPadding">
						<div class="thumbnail ">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logoBlanco.png" alt="" width="" height="" />
						</div>
					</div>
					<div class="col-xs-6 col-sm-9 col-md-10  quitarPadding" >
						<div id="iconosRedes" class="col-xs-11 col-sm-4 col-md-3 col-lg-2 col-lg-push-10 col-md-push-9 col-sm-push-8 col-xs-push-0">
							<div class="row">
								<div class="redes">
									<a href="https://www.facebook.com/aualcpi.reduniversitaria" target="_blank">
										<span class="icon icon-facebook"></span>
									</a>
								</div>
								<div class="redes">
									<a href="https://twitter.com/aualcpi" target="_blank"> 
										<span class="icon icon-twitter"></span>
									</a>
								</div>
								<div class="redes">
									<a href="https://www.youtube.com/channel/UCIOGSj0E41KoIVk2u4TPbtg" target="_blank"> 
										<span class="icon icon-youtube2"></span>
									</a>
								</div>
								<div class="redes">
									<a href="#" target="_blank"> 
										<span class="icon icon-skype"></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-4  quitarPadding" style="color: white;">
		        	<div class="col-xs-6 col-sm-6 datosFooter quitarPadding">
						<?php  $usuarioId = false; $user1 = false;?>
			        	<?php  	$usuarioId=get_post_meta(81,'UsuarioA')[0];
			        			$cargo1=get_post_meta(81,'UsuarioALabel')[0];
			        			//echo 'pm'.$usuarioId; ?>
		        		<?php if(!empty($usuarioId) && $usuarioId != false ){ ?>
			        		<?php  $user1 = get_user_by('ID',$usuarioId); ?>
							<h4 class="dobleLinea2"><?php echo $cargo1; ?></h4>
							<p><?php echo $user1->display_name; ?></p>
							<p class="correo"><?php echo $user1->user_email; ?></p>
			        	<?php } ?>
		        	</div>
					<div class="col-xs-6 col-sm-6 avatarFooter">
			        	<?php if(!empty($user1) && $user1 != false ){ ?>
			        		<div class="thumbnail pull-right">
								<?php $avatar= get_avatar( $user1->ID, '150' ,'','logo usurio',array('class' => 'img-circle sombraInferior' ,)); ?> 
								<?php 
								if( !empty($avatar)): ?>
									<div class="thumbnail">
										<?php echo $avatar;?>
									</div>
								<?php else: ?>
									<div class="thumbnail"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/usuario.jpeg" alt="imagen de defecto" width="" height="" /></div>
								<?php endif; ?>
							</div>
			        	<?php } ?>
		        	</div>
				</div>
			</div>
		</div>
		<div id="footer2" class="col-xs-12">
			<p>Designed by: Geaci: Human Centered Design®, 2017</p>
		</div>
		<?php wp_footer(); ?>
	</footer>
</body>
</html>
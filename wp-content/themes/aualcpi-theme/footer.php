<!--
	Footer, los menus se crean en el CMS pero se llaman desde aqui.
	
	-->
	<footer>
		<div id="footer1">
			<div class="container">
				<div id="redes" class="row">
					<div class="col-xs-12 col-sm-3 col-md-2 ">
						<div class="thumbnail ">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logoBlanco.png" alt="" width="" height="" />
						</div>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<div id="iconosRedes" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-md-push-9 col-sm-push-8 col-xs-push-4">
							<div class="row">
								<div class="redes">
									<a href="#" target="_blank">
										<span class="icon icon-facebook"></span>
									</a>
								</div>
								<div class="redes">
									<a href="#" target="_blank"> 
										<span class="icon icon-tumblr"></span>
									</a>
								</div>
								<div class="redes">
									<a href="#" target="_blank"> 
										<span class="icon icon-pinterest"></span>
									</a>
								</div>
								<div class="redes">
									<a href="#" target="_blank"> 
										<span class="icon icon-twitter"></span>
									</a>
								</div>
							</div>
							<div class="row">
								<div class="redes">
									<a href="#" target="_blank"> 
										<span class="icon icon-youtube2"></span>
									</a>
								</div>
								<div class="redes">
									<a href="#" target="_blank"> 
										<span class="icon icon-linkedin2"></span>
									</a>
								</div>
								<div class="redes">
									<a href="#" target="_blank"> 
										<span class="icon icon-vimeo"></span>
									</a>
								</div>
								<div class="redes">
									<a href="#" target="_blank"> 
										<span class="icon icon-google-plus"></span>
									</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div id="menuFooter" class="row">
					<?php wp_nav_menu(array('theme_location'=>'secondary',
								'container' => false,
								'menu_class' => 'nav navbar-nav navFooter')); ?>
					<?php wp_footer(); ?>
				</div>
				<div class="FooterAdmin col-xs-12 col-sm-8 col-md-6 col-lg-4 pull-right" style="color: white;">
		        	<div class="col-xs-6 col-sm-6 datosFooter ">
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
		<div id="footer2" class="col-xs-12"></div>
	</footer>
</body>
</html>
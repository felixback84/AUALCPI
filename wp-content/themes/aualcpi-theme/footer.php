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
				
			</div>
		</div>
		<div id="footer2" class="col-xs-12"></div>
	</footer>
</body>
</html>
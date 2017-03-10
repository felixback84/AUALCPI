<!--
	Footer, los menus se crean en el CMS pero se llaman desde aqui.
	
	-->
		<footer>
			<div id="footer1" class="col-xs-12">
			<div class="container">
				<div id="redes" class="row">
					<div class="col-xs-12 col-sm-3 col-md-2 ">
						<a class="thumbnail ">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logoBlanco.png" alt="" width="" height="" />
						</a>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-push-8 col-sm-push-6 col-xs-push-4">
						<div class="row">
							<div class="redes">
								<a href="#" target="_blank"> 
									<div class="redFacebook"></div>
								</a>
							</div>
							<div class="redes">
								<a href="#" target="_blank"> 
									<div class="redtwiter"></div>
								</a>
							</div>
							<div class="redes">
								<a href="#" target="_blank"> 
									<div class="redFacebook"></div>
								</a>
							</div>
						</div>
						<div class="row">
							<div class="redes">
								<a href="#" target="_blank"> 
									<div class="redFacebook"></div>
								</a>
							</div>
							<div class="redes">
								<a href="#" target="_blank"> 
									<div class="redtwiter"></div>
								</a>
							</div>
							<div class="redes">
								<a href="#" target="_blank"> 
									<div class="redFacebook"></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div id="menuFooter" class="row">
				<?php wp_nav_menu(array('theme_location'=>'secondary',
										'container' => false,
									    'menu_class' => 'nav navbar-nav navFooter')); ?>
			
		 		<!-- .container -->
				<?php wp_footer(); ?>
				</div>
			</div>
			</div>
			<div id="footer2" class="col-xs-12"></div>
		</footer>
</body>
</html>
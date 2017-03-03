<!--
	Footer, los menus se crean en el CMS pero se llaman desde aqui.
	
	-->
	<footer>
	<div id="footer1" class="col-xs-12">
		<div class="row">
			<p>Logo y redes sociales</p>
		</div>
		<div class="row">
		<?php wp_nav_menu(array('theme_location'=>'secondary',
								'container' => false,
							    'menu_class' => 'nav navbar-nav navFooter')); ?>
	
 		<!-- .container -->
		<?php wp_footer(); ?>
		</div>
	</div>
	<div id="footer2" class="col-xs-12"></div>
</footer>
</body>
</html>
<!--
	Footer, los menus se crean en el CMS pero se llaman desde aqui.
	
	-->


	<footer>
		
		<p>
			This is my footer
		</p>
		<?php wp_nav_menu(array('theme_location'=>'secondary')); ?>
	
	</footer>

</div> <!-- .container -->

<?php wp_footer(); ?>
</body>
</html>
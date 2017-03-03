<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> My Fisrt Theme</title>
	<?php wp_head(); ?>
</head>
<?php
		if( is_front_page()): 
		    $aualcpiTheme_classes = array( 'aualcpiTheme-class', 'my-class' ); 
		else:
			$aualcpiTheme_classes = array( 'no-aualcpiTheme-class', 'my-class' ); 
		endif;
?>

<!--
		Esta es la configuración del componente bootstrap para el menu
		incluyendo posición en la UI
		-->
<body <?php body_class($aualcpiTheme_classes)?> >
	<div class="container">
		<div class="row">
			<div class ="col-xs-12 col-md-8"></div>
			<div class ="col-xs-12 col-md-4">
				<div class="row">
					<?php 
					wp_nav_menu(array(
						'theme_location'=> 'tertiary',
						'container' => false,
						'menu_class' => 'nav nav-pills nav-justified'
						)
					); 
					?>
				</div>
				<div id="sidebar-1" class="widgets-area">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		</div>
		<div class="row">	
			<div class= "col-xs-12">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						      <!--<a class="navbar-brand" href="#">AUALCPI.ORG</a>-->
						    </div>
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						      <?php 
							      wp_nav_menu(array(
							      'theme_location' => 'primary',
							       'container' => false,
							       'menu_class' => 'nav navbar-nav',
							       'walker' => new menu_primary()
							       )							       
							    ); 
							  ?>	
						    </div>
						</div>	
					</nav>
			</div>
		</div>
		<?php echo( get_header_image()."hola" ); ?>
		<img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
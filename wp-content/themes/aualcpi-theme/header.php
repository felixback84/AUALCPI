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
			
			<div class ="col-xs-12 col-md-7 ">
				<a id="logoAualcpi" class="thumbnail pull-left">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="" width="" height="" />
				</a>
			</div>
			<div class ="col-xs-12 col-md-5">
				<div id="idiomas1" class="blockquote-reverse">
					
				</div>
				<div class="pull-right">
					<nav class="navbar navbar-default menuAdicional">
						<div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Menu aditional</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						      <!--<a class="navbar-brand" href="#">AUALCPI.ORG</a>-->
						    </div>
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<?php 
							wp_nav_menu(array(
								'theme_location'=> 'tertiary',
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
				<div id="Search1" class="pull-right">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<div class="row">	
			<div class= "col-xs-12">
					<nav class="navbar navbar-default menuPrimary">
						<div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Menu Primary</span>
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
							  <?php 
								wp_nav_menu(array(
									'theme_location'=> 'email',
									'container' => false,
									'menu_class' => 'nav navbar-nav navbar-right',
							       	'walker' => new menu_primary()
									)
								); 
								?>	
						    </div>
						</div>	
					</nav>
			</div>
		</div>
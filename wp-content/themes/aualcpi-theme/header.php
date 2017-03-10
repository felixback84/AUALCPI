<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aualcpi</title>
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
			<div class ="col-sm-12 col-md-7 col-md-pull-1 col-xs-pull-0">
				<a id="logoAualcpi" class="thumbnail col-md-push-3 col-xs-push-0">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="" width="" height="" />
				</a>
			</div>
			<div class ="col-xs-12 col-sm-12 col-md-5">
			<div class="row">
					<div id="idiomas1" class="col-xs-1 col-sm-1 col-md-1 col-xs-push-8 col-sm-push-10 col-md-push-8 col-lg-push-9">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/idiom.png" alt="" width="" height="" />
					</div>
					</div>
					<nav class="navbar navbar-default menuAdicional col-sm-6 col-md-11 col-lg-9 col-sm-push-0 col-md-push-3 col-lg-push-5">
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
							<?php  wp_nav_menu(array(
								'theme_location'=> 'tertiary',
								'container' => false,
								'menu_class' => 'nav navbar-nav',
								'walker' => new menu_primary()
								)
							); ?>
							</div>
						</div>	
					</nav>
					<div id="Search1" class="col-xs-12 col-sm-5 col-md-8 col-md-push-4 col-sm-push-1 col-xs-push-0">
						<?php get_search_form(); ?>
					</div>
					</br>
			</div>
		</div>
	</div>
	</div>
		<div class="row">	
			<div class= "col-xs-12">
					<nav class="navbar navbar-default menuPrimary">
						<div class="container">
							<div class="container-fluid">
							    <!-- Brand and toggle get grouped for better mobile display -->
							    <div class="navbar-header">
							      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
							        <span class="sr-only">Menu Primary</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							      </button>
							      <!--<a class="navbar-brand" href="#">AUALCPI.ORG</a>-->
							    </div>
							    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
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
						</div>
					</nav>
			</div>
		</div>
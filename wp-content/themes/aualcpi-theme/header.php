

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> My Fisrt Theme</title>
	<?php wp_head(); ?>
</head>

<!--
	
	Esto asigna una clase única al home, no estoy muy seguro
	
	-->

	<?php
	
		if( is_front_page()): 
		    $myfirstheme_classes = array( 'myfirstheme-class', 'my-class' ); 
		    
		else:
			$myfirstheme_classes = array( 'no-myfirsttheme-class', 'my-class' ); 
		endif;
	
	 
	?>
	
	<!--
		
		Esta es la configuración del componente bootstrap para el menu
		incluyendo posición en la UI
		
		-->

<body <?php body_class( $myfirstheme_classes )?>>
	
	<div class="container">
		
		<div class="row">	
		
			<div class= "col-xs-12"
			
									
										
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
						      <a class="navbar-brand" href="#">AUALCPI.ORG</a>
						      
						      
						    </div>
						    
						    						  
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							    
							    
						      
						      <?php 
							      
							      wp_nav_menu(array(
							      
							      'theme_location' => 'primary',
							       'container' => false,
							       'menu_class' => 'nav navbar-nav navbar-right'
							       )
							       
							    ); 
							       
							  ?>	
				
						    </div>
						    
						    
	
						</div>	
			
					</nav>
			
		</div>
		
		
		
	</div>		
			
			
	
	<!--<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()-> height; ?>" width="<?php echo 
		get_custom_header()-> width; ?>" alt=""/>-->
		
		
		
		
	


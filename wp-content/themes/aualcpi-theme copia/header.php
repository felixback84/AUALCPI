<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aualcpi</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	 <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url"           content="<?php echo esc_url(get_permalink()); ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Aualcpi" />
  <meta property="og:description"   content="<?php the_title(); ?>" />
  <meta property="og:image"         content="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" />
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
<!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">
	<div class="row">
		<input id="urlHome" type="hidden" value="<?php echo wp_logout_url(home_url()); ?>" />
		<input id="urlLogin" type="hidden" value="<?php echo home_url('/iniciar-de-sesion/'); ?>" />
		<div id="" class="col-xs-4 col-xs-push-5 visible-xs visible-sm">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/idiom.png" alt="" width="" height=""  style=""/>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-7">
			<a id="logoAualcpi" href="<?php echo home_url('');?>" class="thumbnail">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_aualcpi.png" alt="" width="" height="" />
			</a>
		</div>
		<div class ="col-sm-6 visible-sm" style="">
			<div class="Search1">
				<?php get_search_form(); ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-5 col-sm-push-0">
			<div class="row">
				<div id="idiomas1" class="col-xs-6 col-sm-1 col-md-1 col-md-push-5 col-lg-push-8 hidden-xs hidden-sm">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/idiom.png" alt="" width="" height=""  style="margin-right:20px;"/>
				</div>
			</div>
			<nav class="navbar navbar-default menuAdicional col-lg-7 col-lg-push-5">
				<?php  wp_nav_menu(array(
					'theme_location'=> 'tertiary',
					'container' => false,
					'menu_class' => 'nav navbar-nav',
					'walker' => new menu_primary()
					)
				); ?>
			</nav>
			<div class ="hidden-xs hidden-sm col-md-12 col-lg-12 col-md-pull-1 col-lg-pull-0" >
				<div class="Search1"  style="margin-right:20px;">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<div class ="col-xs-12 col-sm-6 col-md-6 visible-xs" style="">
			<div class="Search1">
				<?php get_search_form(); ?>
				</br>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-default menuPrimary ">
	<div class="container">
		<div class="row">	
			<div class= "col-xs-12">
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
		</div>
	</div></nav>

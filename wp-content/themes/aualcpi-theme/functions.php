<?php

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5',array('search-form'));


/*
		Call styles and js
*/
require_once get_template_directory().'/inc/enqueue.php';/*
		Call menus 
*/
require_once get_template_directory().'/inc/functions-admin.php';
/*
		Call post type, taxonomies and postThumbnails
*/
require_once get_template_directory().'/inc/functions-posttype.php';
/*
		Call menu walker
*/
require get_template_directory().'/inc/walker.php';

/*
		===================================
		functions verificar url para pagina usuario
		===================================
*/
function formatoFechaEnEspañol($userId){
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$date=date_format(date_create(get_the_author_meta('user_registered',$userId)),'d').' de '. $meses[date_format(date_create(get_the_author_meta('user_registered',$userId)),'n')-1].' de '.date_format(date_create(get_the_author_meta('user_registered',$userId)),'Y');
	return $date;
}



// add_action('init', 'reiniciarThemeInvestigacion');
// function reiniciarThemeInvestigacion(){
	
// 	flush_rewrite_rules();
//}
/*
		===================================
		functions verificar url para pagina usuario
		===================================
*/
function mostrarTermsPorIdUsuario($userId,$taxonomiaSlug){
	$term=get_term_by('slug',get_the_author_meta( $taxonomiaSlug, $userId ),$taxonomiaSlug);
	return $term;
}
// /*
// 		===================================
// 		functions verificar url para pagina usuario
// 		===================================
// */

// function verificarPathPageUser(){	
// 	$IDUSER= NULL;
// 	$userId = get_query_var('pageUser'); 
// 	//echo 'id user'.var_dump($userId);  
// 	if(!empty($userId)){
// 			$IDUSER=$userId;
// 	}else{
// 		if (is_user_logged_in()){
// 			$cu = wp_get_current_user();
// 			$IDUSER=$cu->ID;
// 		}else{
// 			wp_redirect( home_url(), 301 ); exit; 
// 		}
// 	}
// 	return $IDUSER;
// }

// /*
// 		===================================
// 		functions verificar usuario logeado es el mismo que esta viendo el perfil
// 		===================================
// */

// function verificarAuthorAndUser($userAutor){	
	
// 	$userId = $userAutor; 
// 	$cu = wp_get_current_user();
// 	$cu = $cu->ID;

// 	if($cu == $userId){
// 			return true;
// 	}
// 	return false;
// }		
/*
		===================================
		functions term function
		===================================
*/
/*---mostrar categorias para targetas-----*/
 function mostrarCategorias($lista,$division){
	$i=0;
	$imprimir='';
		foreach ($lista as $term) {
				$i++;
				if($i>1){ $imprimir.= $division.' ';}
				$imprimir.= '<a href="'.get_term_link($term).'" >'.$term->name.'</a>';
		}
	return $imprimir;
}


/*---mostrar categorias para movilidad-----*/
 function aualcpi_mostrarCategorias_movilidad($lista,$division){
	$i=0;
	$imprimir='';
		foreach ($lista as $term) {
				$i++;
				if($i>1){ $imprimir.= $division.' ';}
				$imprimir.= '<div class="row"><div class="categoriasDisponiblesMovilidad text-center col-xs-8 col-md-4 col-xs-push-2 col-md-push-4" ><a href="'.get_term_link($term).'" ><h4>'.$term->name.'</h4></p>'.$term->description.'</p></a></div></div>';
		}
	return $imprimir;
}


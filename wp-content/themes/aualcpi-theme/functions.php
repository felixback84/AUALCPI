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
//------------------ pruebas para gerarquisar taxonomia
// determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}

// so once you have this function you can just loop over the results returned by wp_get_object_terms

function project_get_item_classes($taxonomy, $results = 1) {
    // get terms for current post
    $terms = wp_get_object_terms( get_the_ID(), 'work_type' );
    // set vars
    $top_parent_terms = array();
    foreach ( $terms as $term ) {
        //get top level parent
        $top_parent = get_term_top_most_parent( $term->term_id, 'work_type' );
        //check if you have it in your array to only add it once
        if ( !in_array( $top_parent, $top_parent_terms ) ) {
            $top_parent_terms[] = $top_parent;
        }
    }
    // build output (the HTML is up to you)

    foreach ( $top_parent_terms as $term ) {
        echo " " . $term->slug;
    }
}

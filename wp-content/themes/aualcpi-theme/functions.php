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

/*---  llenar los seleccion -----*/
function llenarSeleccion($argsIdsTaxonomias,$nameSelect,$labelGeneral = 'Seleccionar ...'){
	//var_dump($argsIdsTaxonomias);
	//var_dump(implode(',',$argsIdsTaxonomias));
	//echo '----';
	$argsIdsTaxonomias=array('include'=>implode(',',$argsIdsTaxonomias));
	$categories = get_terms( $argsIdsTaxonomias );
	//var_dump($categories);
	$select = '<select name="'.$nameSelect.'" id="input" class="form-control" required="required">';
	$select .= '<option value="0">'.$labelGeneral.'</option>';
	foreach ($categories as $category) {
		$select .= '<option value="'.$category->term_id.'">'.$category->name.'</option>';
	}
	$select .= '</select>';
	return $select;
}

/*---  mostrar los post correspondientes a lo selecionado -----*/

function my_get_posts()  {
	if(is_array($_POST['comentarios'])){
		$comentarios = implode(',',$_POST['comentarios']);
	} else {
		$comentarios = $_POST['comentarios'];
	}
    if(is_array($_POST['catA'])){
		$catA_id = implode(',',$_POST['catA']);
	} else {
		$catA_id = $_POST['catA'];
	}
	if(is_array($_POST['catB'])){
		$catB_id = implode(',',$_POST['catB']);
	} else {
		$catB_id = $_POST['catB'];
	}
	// if(is_array($_POST['catC'])){
	// 	$catC_id = implode(',',$_POST['catC']);
	// } else {
	// 	$catC_id = $_POST['catC'];
	// }
	//echo "<script>javascript: alert('id".var_dump($catA_id)."')></script>";
	//var_dump('comentarios'.$comentarios);
	$argsTax = array(
		'tax_query' => array(
      		'relation' => 'AND',
			array(
				'taxonomy' => 'ciudad_investigaciones',
				'terms'    => $catA_id,
			),
		),
	);
    $args = array(
      'post_type' => 'investigacion',
      'post_status' => 'publish',
      'order'=> 'ASC',
      'orderby' => 'date',
    );
    $args['tax_query'] = array(
  		'relation' => 'AND'
	);
	
    if($catA_id != '0'){
    	$argsCat = array(
			'taxonomy' => 'ciudad_investigaciones',
			'terms'    => $catA_id,
		);
    	array_push($args['tax_query'],$argsCat);
    }

    if($catB_id != '0'){
	    $argsCatB = array(
				'taxonomy' => 'areas',
				'terms'    => $catB_id,
			);
	    array_push($args['tax_query'],$argsCatB);
	}

	// if($catC_id != '0'){
	//     $argsCatC = array(
	// 			'taxonomy' => 'areas',
	// 			'terms'    => $catC_id,
	// 		);
	//     array_push($args['tax_query'],$argsCatC);
	// }
	
    //echo "<script>javascript: alert('".var_dump($args)."')></script>";
    //$comentarios = 'LosComentarios';
	global $post;
    $posts =  query_posts($args);
 	//echo "<script>javascript: alert('".var_dump($posts)."')></script>";
    foreach ($posts as $post)   {
		setup_postdata($post);
		//var_dump($post);
		var_dump('num comments'.$post->comment_count);
		
		if($post->comment_count == '0' && $comentarios == 'SinComentarios' ){
			get_template_part( 'targetas-investigacion' ); 
		}
		if($post->comment_count != '0' && $comentarios == 'ConComentarios' ){
			get_template_part( 'targetas-investigacion' ); 
		}
		if($comentarios == 'LosComentarios' ){
			get_template_part( 'targetas-investigacion' ); 
		}
    }
    exit;
  }
 
  add_action('wp_ajax_my_get_posts', 'my_get_posts');
  add_action('wp_ajax_nopriv_my_get_posts', 'my_get_posts');
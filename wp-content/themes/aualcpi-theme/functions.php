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


/*----contar comentarios----*/
// $args = array(
//     'post_id' => 1,   // Use post_id, not post_ID
//         'count'   => true // Return only the count
// );
// $comments_count = get_comments( $args );
// echo $comments_count;

/*
		===================================
		functions verificar url para pagina usuario
		===================================
*/

function ocultarwpadminbar(){
	if (current_user_can('contribuidor') ) {
	  //show_admin_bar(false);
	?>
		<style type="text/css">
			#wpadminbar {
			    display: none;
			}
			.espacioObsionalNavFixed{
				margin-top: 0 !important;
			}
		</style>
    <?php
	}
}

add_action( 'wp_footer', 'ocultarwpadminbar' );

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


function formatoFechaEnEspañolComentarios($fecha){
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$date=date_format(date_create($fecha), 'H:i ');
	$date.=$meses[date_format(date_create($fecha),'n')-1];
	$date.=date_format(date_create($fecha), ' d \d\e Y');
	return $date;
}


add_action('init', 'reiniciarThemeInvestigacion');
function reiniciarThemeInvestigacion(){
	
	flush_rewrite_rules();
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

function verificarPathPageUser(){	
	$IDUSER= NULL;
	$userId = get_query_var('pageUser'); 
	//echo 'id user'.var_dump($userId);  
	if(!empty($userId)){
			$IDUSER=$userId;
	}else{
		if (is_user_logged_in()){
			$cu = wp_get_current_user();
			$IDUSER=$cu->ID;
		}else{
			wp_redirect( home_url(), 301 ); exit; 
		}
	}
	return $IDUSER;
}



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
//  function aualcpi_mostrarCategorias_movilidad($lista,$division){
// 	$i=0;
// 	$imprimir='';
// 		foreach ($lista as $term) {
// 				$i++;
// 				if($i>1){ $imprimir.= $division.' ';}
// 				$imprimir.= '<div class="row"><div class="categoriasDisponiblesMovilidad text-center col-xs-8 col-md-4 col-xs-push-2 col-md-push-4" ><a href="'.get_term_link($term).'" ><h4>'.$term->name.'</h4></p>'.$term->description.'</p></a></div></div>';
// 		}
// 	return $imprimir;
// }

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
	$cont=0;
	$paginaActual = 1;
	if(is_array($_POST['comentarios'])){$comentarios = implode(',',$_POST['comentarios']);
	} else {$comentarios = $_POST['comentarios'];}
    if(is_array($_POST['catA'])){$catA_id = implode(',',$_POST['catA']);
	} else {$catA_id = $_POST['catA'];}
	if(is_array($_POST['catB'])){$catB_id = implode(',',$_POST['catB']);
	} else {$catB_id = $_POST['catB'];}
	if(is_array($_POST['catC'])){$catC_id = implode(',',$_POST['catC']);
	} else {$catC_id = $_POST['catC'];}
	if(!empty($_POST['pagAct'])){$paginaActual = $_POST['pagAct'];}
	//echo "<script>javascript: alert('id".var_dump($catA_id)."')></script>";
	//var_dump('comentarios'.$comentarios);
	$args = array(
      'post_type' => 'investigacion',
      'post_status' => 'publish',
      'order'=> 'DESC',
      'orderby' => 'date',
      'posts_per_page' => 6, // post per page
      'paged' => $paginaActual
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
	    //$term=get_term_by('id',$catB_id,'areas');
		//var_dump($term);
		//echo $term->name;
		//echo '<p><script> jQuery("#text-retos").text("Retos regionales en '.$term->name.'"); </script></p>';
	}else{
		//echo '<p style="display:none;"><script> jQuery("#text-retos").text("Retos regionales"); </script></p>';
	}

    if($catC_id != '0'){
	    $argsCatC = array(
				'taxonomy' => 'status_inves',
				'terms'    => $catC_id,
			);
	    array_push($args['tax_query'],$argsCatC);
	}

	echo '<input id="paginaActual" type="hidden" value="'.$paginaActual.'" name="paginaActual">';
	global $post;
    $posts =  new WP_Query($args);
	if(empty($posts)){
		echo '<p class="text-center">No hay descargas</p>';
	}else{
		echo '<div class="container quitarPadding">
		<div class="col-sm-12  quitarPadding">';
	    while ( $posts->have_posts() ) :
	    	$posts->the_post();
	    	echo '<div class="col-xs-12 col-sm-6 col-md-4">';
			get_template_part( 'targetas-inves-inves' ); 
			echo '</div>';
		endwhile;
		echo '</div></div>';
	}
	echo '<div class="carousel-nav sombraInferior"><div class="container quitarPadding"><p class="tituloNavegacionCarousel" ><a href="'.home_url('/investigacion/').'">Más retos regionales</a>
			</p><p class="tituloNavegacionCarousel pull-right">';
    $total_pages = $posts->max_num_pages;
    //var_dump($total_pages);
		    if ($total_pages > 1){
		        $current_page = max(1, $paginaActual);
				$arrayPagination =array(
		            'base' => home_url('/movilidad/') . '%_%',
		            'format' => '/page/%#%',
		            'current' => $current_page,
		            'total' => $total_pages,
		            'prev_text'    => __('« prev'),
		            'next_text'    => __('next »'),
		        );  
		        echo paginate_links($arrayPagination);
		    } 
		    echo '</p></div></div>';
		    wp_reset_postdata();
    
    exit;
  }
 
  add_action('wp_ajax_my_get_posts', 'my_get_posts');
  add_action('wp_ajax_nopriv_my_get_posts', 'my_get_posts');


  /*---  mostrar los autores correspondientes a lo selecionado -----*/

function my_get_user()  {
	$cont=0;
	if(is_array($_POST['comentarios'])){$comentarios = implode(',',$_POST['comentarios']);
	} else { $comentarios = $_POST['comentarios']; }
    if(is_array($_POST['catA'])){ $catA_id = implode(',',$_POST['catA']);
	} else { $catA_id = $_POST['catA']; }
	if(is_array($_POST['catB'])){ $catB_id = implode(',',$_POST['catB']); 
	} else { $catB_id = $_POST['catB']; }
	if(is_array($_POST['catC'])){ $catC_id = implode(',',$_POST['catC']);
	} else { $catC_id = $_POST['catC']; }
	
    $args = array(
      'post_type' => 'investigacion',
      'post_status' => 'publish',
      'order'=> 'DESC',
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
	    //$term=get_term_by('id',$catB_id,'areas');
		//var_dump($term);
		//echo $term->name;
		//echo '<script> jQuery("#text-investigador").text("Investigadores regionales en '.$term->name.'"); </script>';
	}else{
		//echo '<script> jQuery("#text-investigador").text("Investigadores regionales"); </script>';
	}
    if($catC_id != '0'){
	    $argsCatC = array(
				'taxonomy' => 'status_inves',
				'terms'    => $catC_id,
			);
	    array_push($args['tax_query'],$argsCatC);
	}
	global $post;
    $posts =  query_posts($args);

	//var_dump($posts);
	
	$idsUsuarios= array();
	$idsTodosUsuarios= array();
    foreach ($posts as $post)   {
    	if(!in_array($post->post_author,$idsTodosUsuarios)){ array_push($idsTodosUsuarios,$post->post_author);}
		setup_postdata($post);
		//var_dump($post);
		//var_dump('post id'.$post->ID);
		$args = array(
	      'post_type' => 'contribuciones',
	      'post_status' => 'publish',
	      'post_parent' => $post->ID,
	      'order'=> 'DESC',
	      'orderby' => 'date',
	    );
	    
	 //    $postContribuciones =  query_posts($args);
	 //    ( is_array($postContribuciones) && !empty($postContribuciones)) ? $nContribuciones = '1': $nContribuciones = '0';
	 //    //echo $nContribuciones;
		// if($nContribuciones == '0' && $comentarios == 'SinContribuciones' ){
		// 	//echo 'idAutho'.$post->post_author;
		// 	if(!in_array($post->post_author,$idsUsuarios)){ array_push($idsUsuarios,$post->post_author);}
		// 	$cont++;
		// }
		// if($nContribuciones != '0' && $comentarios == 'ConContribuciones' ){
		// 	//echo 'idAutho'.$post->post_author;
		// 	if(!in_array($post->post_author,$idsUsuarios)){ array_push($idsUsuarios,$post->post_author);}
		// 	$cont++;
		// }
		// if($comentarios == 'Contribuciones' ){
		// 	//echo 'idAutho'.$post->post_author;
		// 	if(!in_array($post->post_author,$idsUsuarios)){ array_push($idsUsuarios,$post->post_author);}
		// 	$cont++;
		// }

  		 $postContribuciones =  query_posts($args);
	 	   ( is_array($postContribuciones) && !empty($postContribuciones)) ? $nContribuciones = '1': $nContribuciones = '0';
	 	 //echo $nContribuciones;
	 	 foreach ($postContribuciones as $postContribucion){
	 	 	if($nContribuciones != '0' && $comentarios == 'ConContribuciones' ){
				//echo 'idAutho'.$postContribucion->post_author;
				if(!in_array($postContribucion->post_author,$idsUsuarios)){ array_push($idsUsuarios,$postContribucion->post_author);}
				$cont++;
			}
			if($comentarios == 'Contribuciones' ){
				//echo 'idAutho'.$postContribucion->post_author;
				if(!in_array($postContribucion->post_author,$idsUsuarios)){ array_push($idsUsuarios,$postContribucion->post_author);}
				$cont++;
			}
	    }  
		if($nContribuciones == '0' && $comentarios == 'SinContribuciones' ){
			//echo 'idAutho'.$post->post_author;
			if(!in_array($post->post_author,$idsUsuarios)){ array_push($idsUsuarios,$post->post_author);}
			$cont++;
		}
    }

		

    //var_dump($idsUsuarios);
    if($catA_id == '0' && $catB_id == '0' && $catC_id == '0' && $comentarios == 'Contribuciones'){
    	foreach ($idsTodosUsuarios as $key => $id) {
			//echo "AidsU-i".$id;
			mostrarUsuariosInvestigacion($id,$key);
		}
    }else{
	    foreach ($idsUsuarios as $key => $id) {
			//echo "BidsU-i".$id;
			mostrarUsuariosInvestigacion($id,$key);
		}
	}
	wp_reset_postdata();
    exit;
  }

 function mostrarUsuariosInvestigacion($idAuthor,$cont){
 	$usuario = get_user_by('ID',$idAuthor);
 	//echo $cont;
 	if($cont == 0){
		echo '<div class="item active" cont="'.($cont+1).'">';
	}else{
		echo '<div class="item" cont="'.($cont+1).'">';
	}
	echo '<div class="col-xs-12 col-sm-6 col-md-4">';
	set_query_var('user',$usuario);
	get_template_part( 'targetas-autores' );
	echo '</div></div>'; 
 }
  add_action('wp_ajax_my_get_user', 'my_get_user');
  add_action('wp_ajax_nopriv_my_get_user', 'my_get_user');

/*---  function filtro becas -----*/
  function my_get_becas()  {
	$cont=0;
	$paginaActual = 1;
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
	if(!empty($_POST['pagAct'])){
		$paginaActual = $_POST['pagAct'];
	}
	//echo "<script>javascript: alert('id".var_dump($catA_id)."')></script>";
	//var_dump('comentarios'.$comentarios);
	
    $args = array(
      'post_type' => 'becas',
      'post_status' => 'publish',
      'order'=> 'DESC',
      'orderby' => 'date',
      'posts_per_page' => 6, // post per page
      'paged' => $paginaActual
    );
    $args['tax_query'] = array(
  		'relation' => 'AND'
	);
	
    if($catA_id != '0'){
    	$argsCat = array(
			'taxonomy' => 'ciudad_becas',
			'terms'    => $catA_id,
		);
    	array_push($args['tax_query'],$argsCat);
    }

    if($catB_id != '0'){
	    $argsCatB = array(
				'taxonomy' => 'categoria',
				'terms'    => $catB_id,
			);
	    array_push($args['tax_query'],$argsCatB);
	}
	echo '<input id="paginaActual" type="hidden" value="'.$paginaActual.'" name="paginaActual">';
	global $post;
    //$posts =  query_posts($args);
    $posts =  new WP_Query($args);
    //var_dump($posts);
	if(empty($posts)){
		echo '<p class="text-center">No hay descargas</p>';
	}else{
		echo '<div class="container quitarPadding">
		<div class="col-sm-12  quitarPadding">';
	    while ( $posts->have_posts() ) :
	    	$posts->the_post();
	    	echo '<div class="col-xs-12 col-sm-6 col-md-4">';
			get_template_part( 'targetas-beca'); 
			echo '</div>';
		endwhile;
		echo '</div></div>';
	}
	echo '<div class="carousel-nav sombraInferior"><div class="container quitarPadding"><p class="tituloNavegacionCarousel" ><a href="'.home_url('/becas/').'">Más becas</a>
			</p><p class="tituloNavegacionCarousel pull-right">';
	//echo "---- $cont ---";
    $total_pages = $posts->max_num_pages;
    //var_dump($total_pages);
		    if ($total_pages > 1){
		        $current_page = max(1, $paginaActual);
		        //echo "paginaActual";
		        //var_dump($current_page);
		        //echo "get pagenun link";
		        //var_dump(get_pagenum_link(1));
		        //echo "----";
				$arrayPagination =array(
		            'base' => home_url('/movilidad/') . '%_%',
		            'format' => '/page/%#%',
		            'current' => $current_page,
		            'total' => $total_pages,
		            'prev_text'    => __('« prev'),
		            'next_text'    => __('next »'),
		        );  
		        echo paginate_links($arrayPagination);
		    } 
		    echo '</p></div></div>';
    //echo "<script language='javascript'> jQuery('#carousel-example-generic-investigacion .contador').attr('cont',$cont) </script>";
    wp_reset_postdata();
    exit;
  }
 
  add_action('wp_ajax_my_get_becas', 'my_get_becas');
  add_action('wp_ajax_nopriv_my_get_becas', 'my_get_becas');

/*---  function filtro publicaciones -  -----*/
  function my_get_publicacion() {
	$cont=0;
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
	//echo "<script>javascript: alert('id".var_dump($catA_id)."')></script>";
	//var_dump('comentarios'.$comentarios);
	
    $args = array(
      'post_type' => 'publicacion',
      'post_status' => 'publish',
      'order'=> 'DESC',
      'orderby' => 'date',
    );
    $args['tax_query'] = array(
  		'relation' => 'AND'
	);
	
    if($catA_id != '0'){
    	$argsCat = array(
			'taxonomy' => 'categoria_conocimiento',
			'terms'    => $catA_id,
		);
    	array_push($args['tax_query'],$argsCat);
    }

    if($catB_id != '0'){
	    $argsCatB = array(
				'taxonomy' => 'tipo_publicaciones',
				'terms'    => $catB_id,
			);
	    array_push($args['tax_query'],$argsCatB);
	}

	global $post;
    $posts =  query_posts($args);
	if(empty($posts)){
		echo '<p class="text-center">No hay descargas</p>';
	}
    foreach ($posts as $post)   {
		setup_postdata($post);
		$args = array(
	      'post_type' => 'publicacion',
	      'post_status' => 'publish',
	      'post_parent' => $post->ID,
	      'order'=> 'DESC',
	      'orderby' => 'date',
	    );
	    
		if($cont == 0){
			echo '<div class="item active" cont="'.($cont+1).'">';
		}else{
			echo '<div class="item" cont="'.($cont+1).'">';
		}
	   	echo '<div class="col-xs-12 col-sm-6 col-md-4">';
		get_template_part( 'targetas-publicacion' ); 
		echo '</div></div>';
		$cont++;
    }
    //echo "<script language='javascript'> jQuery('#carousel-example-generic-investigacion .contador').attr('cont',$cont) </script>";
    wp_reset_postdata();
    exit;
  }
 
  add_action('wp_ajax_my_get_publicacion', 'my_get_publicacion');
  add_action('wp_ajax_nopriv_my_get_publicacion', 'my_get_publicacion');

/*
		===================================
		facebook add sdk
		===================================
*/
  
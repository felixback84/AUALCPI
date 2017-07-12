<?php get_header(); ?>
<!--  suscribirme  - paquina quiero ser miembro-->
<!-- <div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (317,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fondoPerfil.png" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php } ?>
				<div class="container">
					<div class="carousel-caption">
						<?php
							$post = get_post(317); 
							$contenido = $post->post_content;
							echo $contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<div class="container espacioBotton espacioTop">
	<div class="row">
		<h1 class="text-center">Quieres ser miembro</h1>
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            
<?php 
$userId= 0; 
if(isset($_GET['sr'])){
    $userId=$_GET['sr'];
}

$status = '';
if(isset($_GET['status'])){
    $status= $_GET['status'];
}
if($userId != 0){ $estado ='update';}else{$estado = 'new';}
$user_info = get_userdata($userId);
//var_dump($user_info);
$mail_val = $user_info->user_email;
$name_val = $user_info->user_login;
$pass_val = $user_info->user_login;
$pass2_val = $user_info->user_login;
$user_meta = get_user_meta( $userId );
//var_dump($user_meta);
//echo('----');
//var_dump($user_meta["first_name"][0]);
$first_val = $user_meta["first_name"][0];
$last_val = $user_meta["last_name"][0];
?>    
<?php // la URL que contendrá la acción es la propia página que contiene el formulario
$action_slug = home_url('/suscribirme/');
// preparing errors if sign up form has been submited
if ( isset($_POST['signup-submit']) ) {
        $estado = $_POST['estado'];
        $username = $_POST['signup-username'];
        $pass = $_POST['signup-pass'];
        $pass2 = $_POST['signup-pass2'];
        $mail = $_POST['signup-mail'];
        $firstname = $_POST['signup-firstname'];
        $lastname = $_POST['signup-lastname'];
        $description = $_POST['bibliografia'];
        // to sign up a new user
        // catching all $_POST data
        require_once(ABSPATH . WPINC . '/registration.php');

    	// if username is empty
        if ( $username == '' || $username == ' ' ) {
                $name_val = '';
                $name_msg = '<span class="error"><strong>El usuario es obligatorio.</strong></span>';
                $form_username_class = " error";
                $errors['user'] = "user";
        } elseif ( username_exists( $username ) && $estado == 'new') {
        		// if username already exist
                $name_val = $username;
                $name_msg = '<span class="error"><strong>El nombre de usuario ya existe.</strong> Intente con uno diferente.</span>';
                $form_username_class = " error";
                $errors['user'] = "user";
                //echo "<script type=\"text/javascript\">alert(\"user exists\");</script>";
        } else {
        		// if username is ok
                $name_val = $username;
                $name_msg = "";
                $form_username_class = "";
                //echo "<script type=\"text/javascript\">alert(\"user ok\");</script>";
        }

        // if the pass confirmation is not correct
        if($espacioTop == 'new'){
            if( $pass != ''){
                $pass_val = "";
                $pass_msg = '<span class="error"><strong>La contraseña no puede estar vacia.</strong></span>';
                $form_pass_class = " error";
                $errors['pass'] = "pass";
            }
            if ( $pass != $pass2 ) {
                    $pass_val = "";
                    $pass_msg = '<span class="error"><strong>La contraseña no son iguales intentelo de nuevo.</strong></span>';
                    $form_pass_class = " error";
                    $errors['pass'] = "pass";
           	} else {
                    $pass_val = "";
                    $pass_msg = "";
                    $form_pass_class = "";
            }
        }

        // if mail field is empty
        if ( $mail == '' ) {
                $mail_val = "";
                $mail_msg = '<span class="error"><strong>La direccion es obligatoria.</strong></span>';
                $form_mail_class = " error";
                $errors['mail'] = "mail";
        } elseif ( email_exists($mail) && $estado == 'new') {
        		// if mail is already asociated to other user
                $mail_val = $_POST['signup-mail'];
                $mail_msg = '<span class="error"><strong>La direccion de correo electronica ya se encuentra registrada.</strong> Intente una diferente.</span>';
                $form_mail_class = " error";
                $errors['mail'] = "mail";
        } else {
                $mail_val = $_POST['signup-mail'];
                $mail_msg = "";
                $form_mail_class = "";
                //echo "<script type=\"text/javascript\">alert(\"mail ok\");</script>";
        }
       

        if ( isset($errors)) {
                // if there is any error, stop the proccess
            // if(isset($errors['user'])){
            //     $name_msg = '<span class="error"><strong>You must choose a username: with an empty field you are out of the game.</strong></span>';
            // }
        	//echo "<script type=\"text/javascript\">alert(\"error $errors\");</script>";
        	//wp_redirect( home_url('/suscribirme/?P=1'));
            //exit;
        } else {
                // if no errors, do the sign up actions
                // if pass is empty, we generate a random one
                
                // if($estado != 'new'){
                //     if ( $pass == '' ) {

                //     }
                // }else{
                //     $random_pass = wp_generate_password( 12, false );
                //     if ( $pass == '' ) { $pass = $random_pass; }
                // }
                
                if($estado == 'new'){
                    $userdata = array(
                            'user_pass' => $pass,
                            'user_login' => $username,
                            'user_email' => $mail,
                            'first_name' => $firstname,
                            'last_name' => $lastname,
                            'description' => $description,
                            'role' => 'contribuidor',
                    );
                    $user_id = wp_insert_user( $userdata );
                    update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
                    update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
                    update_usermeta( $user_id, 'user_meta_image', $_POST['user_meta_image'] );
                    update_usermeta( $user_id, 'areas', $_POST['areas'] );
                    update_usermeta( $user_id, 'universidades_user', $_POST['universidades_user'] );
                    update_usermeta( $user_id, 'ciudad_user', $_POST['ciudad_user'] );
                    //echo "<script type=\"text/javascript\">alert(\"id $user_id\");</script>";
                    $success_msg = '<div id="AlertaCorrecta" class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="text-center"> El registro se realizo correctamente.</p></div>';
                    // to send confirmation mail to the new user
                    $user_data = get_userdata( $user_id );
                    $to = $mail;
                    $subject = 'Nombre de usuario y contraseña para ingresar a Aualcpi';
                    $message = 'Hola ' .$username. ',<br/> Ya tienes acceso la pagina Aualcpi con el nombre de usuario ('.$username.') y la contraseña (' .$pass. '), <br/>' ;
                    $headers[] = 'Correo registro Aualcpi';
                    wp_mail( $to, $subject, $message, $headers );
                    // to send a notification to web admin that a new user has sign up
                   //  $to = 'info@lamaletadefelix.com';
                   //  $subject = "New user has sign up in example.net";
                   //  $message = 'A new user has sign up in example.net: ' . "\r\n\r\n" .
                   //          '+ '.$user_data->user_login. "\r\n\r\n" .
                   //  $headers[] = 'From: My web -- a funny and simple web ';
                   //  $headers[] = 'Cc: info@lamaletadefelix.com';
                   //  wp_mail( $to, $subject, $message, $headers );
                    if(is_numeric($user_id)){
                    $action_slug = home_url('/suscribirme/?sr='.$user_id.'&status=OR');
                    wp_redirect( $action_slug );
                 		  exit;   
                    }
                }else{

                    $user_id = $_POST['IDUsurio'];
                    $user_fields = array();
                    if($pass != $pass2){
                        $user_fields = array(
                         'ID'           => $user_id,
                         'user_login'   => $username,
                         'user_pass'    => esc_attr($pass),
                         'first_name'   => esc_attr($firstname),
                         'last_name'    => esc_attr($lastname),
                         // 'display_name' => esc_attr($_POST['display_name']),
                         'user_email'   => esc_attr($mail),
                         'description'  => esc_attr($description),
                        );
                    }else{
                        $user_fields = array(
                         'ID'           => $user_id,
                         'user_login' => $username,
                         // 'nickname'     => esc_attr($_POST['nickname']),
                         'first_name'   => esc_attr($firstname),
                         'last_name'    => esc_attr($lastname),
                         // 'display_name' => esc_attr($_POST['display_name']),
                         'user_email'   => esc_attr($mail),
                         'description'  => esc_attr($description),
                        );
                    }
                    
                    wp_update_user($user_fields);
                    update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
                    update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
                    update_usermeta( $user_id, 'user_meta_image', $_POST['user_meta_image'] );
                    update_usermeta( $user_id, 'areas', $_POST['areas'] );
                    update_usermeta( $user_id, 'universidades_user', $_POST['universidades_user'] );
                    update_usermeta( $user_id, 'ciudad_user', $_POST['ciudad_user'] );

                    wp_redirect(home_url('/suscribirme/?sr='.$user_id.'&status=OU'));
                }
        } // end testing errors
} else {
// if no errors, nothing
}
echo $success_msg;
?>
<div class="alert alert-success" <?php if($status == 'OR'){ echo 'style="display: block;"';}else{echo 'style="display: none;"';} ?> >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <p class="text-center">El usuario fue registrado</p>
</div>
<div class="alert alert-success" <?php if($status == 'OU'){ echo 'style="display: block;"';}else{echo 'style="display: none;"';} ?> >
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <p class="text-center">El usuario fue actualizado</p>
</div>
<div id="formDatosUsuario">
<form id="signup" action="<?php echo $action_slug; ?>" method="post" name="signup">
	<fieldset class="required<?php echo $form_username_class; ?>">
        <input id="estado" name="estado" type="hidden" value="<?php echo $estado; ?>">
        <input id="IDUsurio" name="IDUsurio" type="hidden" value="<?php echo $userId; ?>">
	 	<label>Nombre de usuario</label><span class="req">*</span>
	 	<input id="signup-username" type="text" name="signup-username" value="<?php echo $name_val; ?>" />
		<div class="mini-faq"><?php echo $name_msg; ?></div>
	</fieldset>
    <fieldset>
        <label>Nombre</label>
        <input id="signup-firstname" type="text" name="signup-firstname" value="<?php echo $first_val; ?>" />
    </fieldset>
    <fieldset>
        <label>Apellido</label>
        <input id="signup-lastname" type="text" name="signup-lastname" value="<?php echo $last_val; ?>" />
     </fieldset>
    <fieldset class="required<?php echo $form_mail_class; ?>">
        <label>Correo electrónico</label><span class="req">*</span>
       
        <input id="signup-mail" type="text" name="signup-mail" value="<?php echo $mail_val; ?>" />
        <div class="mini-faq">El correo electronico es necesario para el registro pero este no se mostrar en la pagina web.</div>
    </fieldset>
    <fieldset>
        <label>Información biográfica</label>
        <textarea name="bibliografia" id="bibliografia" cols="30" rows="10"><?php echo esc_attr( get_the_author_meta( 'description', $userId ) ); ?></textarea>
        <!-- <input id="bibliografia" type="text" name="bibliografia" value="" /> -->
    </fieldset>
    <?php if($estado != 'new'){ ?>
    <fieldset>
        <label>Imagen de perfil</label>
        <div class="thumbnail">
            <?php echo get_avatar( $userId, '150' ,'','logo usurio',array(
            'class' => 'img-circle',
        )); ?>
        <p>Puedes cambiar tu foto de perfil en <a href="https://es.gravatar.com" target="_blank">Gravatar</a>.</p>
        </div>
    </fieldset>
    <?php } ?>
	<fieldset  id="Pass" <?php if($estado != 'new'){ echo 'style="display: none;"'; } ?>>
	 	<label>Contraseña</label>
		<input id="signup-pass" type="password" name="signup-pass" value="<?php echo $pass_val; ?>" />
		<div class="mini-faq"><strong>Cree una contraseña fuerte</strong>, la cual contenga caracteres, numeros y letras en mayusculas y minusculas.</div>
	</fieldset>
	<fieldset class="required<?php echo $form_pass_class; ?>" <?php if($estado != 'new'){ echo 'style="display: none;"'; } ?>>
		<label>Repetir contraseña</label>
		<input id="signup-pass2" type="password" name="signup-pass2" value="<?php echo $pass2_val; ?>" />
	</fieldset>
    <fieldset id="CbtnUPass" <?php if($estado == 'update'){ echo 'style="display: block;"'; }else{ echo 'style="display: none;"';} ?>>
        <label>Nueva contraseña</label>
        <input type="button" class="btn btn-pass" value="Cambiar contraseña">
    </fieldset>
<fieldset>
    <label for="twitter">Twitter</label>
    <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $userId ) ); ?>" class="regular-text" />
    <div class="mini-faq">Por favor escriba su Twitter username.</div>
</fieldset>
<fieldset>
    <label for="linkedin">Linkedin</label>
    <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $userId ) ); ?>" class="regular-text" />
     <div class="mini-faq">Por favor escriba su Linkedin username.</div>
</fieldset>
<fieldset>
<label for="user_meta_image">Seleccionar imagen:</label>
<div class="thumbnail">
    <img id="user_meta_image_show" src="<?php echo esc_url( get_the_author_meta( 'user_meta_image', $userId ) ); ?>" style="width:150px;">
</div>
    <input type='button' id="upload-button" class="button-primary" value="Cargar Imagen" />
    <input  type="text" name="user_meta_image" id="user_meta_image" value="<?php echo esc_url( get_the_author_meta( 'user_meta_image', $userId ) ); ?>" class="regular-text" />
    <div class="mini-faq">Selecionar una imagen para la portada.</div>
</fieldset> 


<fieldset class="listadoRadioBtn">
    <?php $tax = get_taxonomy( 'areas' );

    $terms = get_terms( 'areas', array( 'hide_empty' => false ) );
    ?>
    <label for="areas"><?php _e( 'Seleccione área de investigación' ); ?></label>
    <?php if ( !empty( $terms ) ) {
        foreach ( $terms as $term ) { ?>
        <div  class="items">
            <input type="radio" name="areas" id="areas-<?php echo esc_attr( $term->slug ); ?>" value="<?php echo esc_attr( $term->slug ); ?>" <?php checked( $term->slug, get_the_author_meta( 'areas', $userId )); ?> /> <label for="areas-<?php echo esc_attr( $term->slug ); ?>"><?php echo $term->name; ?></label>

            <?php $termsChields = get_terms( 'areas' , array( 'orderby' => 'name','parent' => $term->term_id,'hide_empty' => false)); 
            if ( !empty( $termsChields ) ) {
            foreach ( $termsChields as $termChield ) {?>
                    <input type="radio" name="areas" id="areas-<?php echo esc_attr( $termChield->slug ); ?>" value="<?php echo esc_attr( $termChield->slug ); ?>" <?php  checked( $termChield->slug, get_the_author_meta( 'areas', $userId )); ?> /> <label for="areas-<?php echo esc_attr( $termChield->slug ); ?>"><?php echo $termChield->name; ?></label> 
        <?php   }
            } ?>
        </div>
    <?php }
    }
    else {
        _e( 'No hay disponibles areas de investigaciones' );
    }?>
</fieldset>

<fieldset class="listadoRadioBtn">
    <?php $tax = get_taxonomy( 'universidades_user' );

    $terms = get_terms( 'universidades_user', array( 'hide_empty' => false ) );
    ?>
<label for="universidades_user"><?php _e( 'Seleccione su universidad' ); ?></label>
    <?php if ( !empty( $terms ) ) {
        foreach ( $terms as $term ) { ?>
        <div class="items">
            <input type="radio" name="universidades_user" id="universidades_user-<?php echo esc_attr( $term->slug ); ?>" value="<?php echo esc_attr( $term->slug ); ?>" <?php checked( $term->slug, get_the_author_meta( 'universidades_user', $userId )); ?> /> <label for="universidades_user-<?php echo esc_attr( $term->slug ); ?>"><?php echo $term->name; ?></label>
        </div>
        <?php }
    }
    else {
        _e( 'No hay universidades disponibles.' );
    }?>
</fieldset> 
<fieldset class="listadoRadioBtn">
        <?php $tax = get_taxonomy( 'ciudad_user' );

        $terms = get_terms( 'ciudad_user' , array( 'orderby' => 'name','parent' => 0,'hide_empty' => false));
        ?>
    <label for="ciudad_user"><?php _e( 'Seleccione su ciudad' ); ?></label>
    <?php if ( !empty( $terms ) ) {
        foreach ( $terms as $term ) { ?>
        <div  class="items">
            <p><?php echo $term->name; ?></p>
            <?php $termsChields = get_terms( 'ciudad_user' , array( 'orderby' => 'name','parent' => $term->term_id,'hide_empty' => false)); 
            if ( !empty( $termsChields ) ) {
            foreach ( $termsChields as $termChield ) {?>
                    <input type="radio" name="ciudad_user" id="ciudad_user-<?php echo esc_attr( $termChield->slug ); ?>" value="<?php echo esc_attr( $termChield->slug ); ?>" <?php  checked( $termChield->slug, get_the_author_meta( 'ciudad_user', $userId )); ?> /> <label for="ciudad_user-<?php echo esc_attr( $termChield->slug ); ?>"><?php echo $termChield->name; ?></label>
        </div>
        <?php   }
            }
        }
    }
    else {
        _e( 'No hay ciudad / Pais disponibles.' );
    }?>
</fieldset>  
<fieldset>
		<input id="signup-submit" class="btn btn-primary" type="submit" name="signup-submit" value="<?php if($estado == 'new'){ echo 'Suscribirme'; }else{ echo 'Actualizar';} ?>" />
</fieldset>
</form>
</div>
<?php?>
        </div>
	</div>
</div>
<?php get_footer(); ?>
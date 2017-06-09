<?php get_header(); ?>
<!-- paquina quiero ser miembro-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (317,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
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
</div>
<div class="container espacioBotton espacioTop">
	<div class="row">
		<h1 class="text-center">Quieres ser miembro</h1>
		
<?php // la URL que contendrá la acción es la propia página que contiene el formulario
$action_slug = home_url('/suscribirme/');
// preparing errors if sign up form has been submited
if ( isset($_POST['signup-submit']) ) {
        $username = $_POST['signup-username'];
        $pass = $_POST['signup-pass'];
        $pass2 = $_POST['signup-pass2'];
        $mail = $_POST['signup-mail'];
        $firstname = $_POST['signup-firstname'];
        $lastname = $_POST['signup-lastname'];
        // to sign up a new user
        // catching all $_POST data
        require_once(ABSPATH . WPINC . '/registration.php');

    	// if username is empty
        if ( $username == '' || $username == ' ' ) {
                $name_val = '';
                $name_msg = '<span class="error"><strong>El usuario es obligatorio.</strong></span>';
                $form_username_class = " error";
                $errors['user'] = "user";
        } elseif ( username_exists( $username )) {
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

        // if mail field is empty
        if ( $mail == '' ) {
                $mail_val = "";
                $mail_msg = '<span class="error"><strong>La direccion es obligatoria.</strong></span>';
                $form_mail_class = " error";
                $errors['mail'] = "mail";
        } elseif ( email_exists($mail) ) {
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
                $random_pass = wp_generate_password( 12, false );
                if ( $pass == '' ) { $pass = $random_pass; }
                $userdata = array(
                        'user_pass' => $pass,
                        'user_login' => $username,
                        'user_email' => $mail,
                        'first_name' => $firstname,
                        'last_name' => $lastname,
                        'role' => 'contribuidor',
                );
                $user_id = wp_insert_user( $userdata );
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
                wp_redirect( $action_slug );
             		  exit;   
                }
        } // end testing errors
} else {
// if no errors, nothing
}
echo $success_msg;
?>

<form id="signup" action="<?php echo $action_slug; ?>" method="post" name="signup">
	<fieldset class="required<?php echo $form_username_class; ?>">
	 	<div class="col-xs-12 col-sm-4"><label>Nombre de usuario</label><span class="req">*</span></div>
	 	<div class="col-xs-12 col-sm-8"><input id="signup-username" type="text" name="signup-username" value="<?php echo $name_val; ?>" />
		<div class="mini-faq"><?php echo $name_msg; ?></div></div>
	</fieldset>
	
	<fieldset>
	 	<div class="col-xs-12 col-sm-4"><label>Contraseña</label></div>
		<div class="col-xs-12 col-sm-8"><input id="signup-pass" type="password" name="signup-pass" value="" />
		<div class="mini-faq"><strong>Cree una contraseña fuerte</strong>, la cual contenga caracteres, numeros y letras en mayusculas y minusculas.</div></div>
	</fieldset>
	<fieldset class="required<?php echo $form_pass_class; ?>">
		<div class="col-xs-12 col-sm-4"><label>Contraseña confirmaccion</label></div>
		<div class="col-xs-12 col-sm-8"><input id="signup-pass2" type="password" name="signup-pass2" value="" />
		</div>
	</fieldset>

	<fieldset class="required<?php echo $form_mail_class; ?>">
		<div class="col-xs-12 col-sm-4"><label>Correo electrónico</label><span class="req">*</span></div>
		<div class="col-xs-12 col-sm-8"><input id="signup-mail" type="text" name="signup-mail" value="<?php echo $mail_val; ?>" />
		<div class="mini-faq">El correo electronico es necesario para el registro pero este no se mostrar en la pagina web.</div></div>
	</fieldset>

	<fieldset>
	 	<div class="col-xs-12 col-sm-4"><label>Nombre</label></div>
		<div class="col-xs-12 col-sm-8"><input id="signup-firstname" type="text" name="signup-firstname" value="<?php echo $first_val; ?>" />
		</div>
	</fieldset>
	<fieldset>
	 	<div class="col-xs-12 col-sm-4"><label>Apellido</label></div>
		<div class="col-xs-12 col-sm-8"><input id="signup-lastname" type="text" name="signup-lastname" value="<?php echo $last_val; ?>" /></div>
	 </fieldset>
	 <fieldset>
 			<div class="col-xs-12 col-sm-2 col-sm-push-4"><input id="signup-submit" class="btn btn-primary" type="submit" name="signup-submit" value="Suscribirme" /></div>
 	</fieldset>
</form>
<?php?>
	</div>
</div>
<?php get_footer(); ?>
<?php get_header(); ?>
<!-- paquina membresia-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<?php if(!empty(get_the_post_thumbnail (85,'post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']))){ ?>
					<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full sombraInferior', 'title' => 'Feature image','alt'   => 'imagen de inicio de la publicacion subida']); ?></div>
				<?php } else { ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imagenesTop.jpg" alt="imagen de inicio de la publicacion"  class="sombraInferior" width="" height="" />
				<?php } ?>
				<div class="container">
					<div class="carousel-caption">
						<?php
							$post = get_post(85); 
							$contenido = $post->post_content;
							echo $contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container espacioBotton">
	<div class="row espacioBotton">
		<h1 class="text-center">Descubre todos los beneficios que tenemos para ti</h1>
		<div id="carousel-members" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-xs-8 col-xs-push-2 fichaCentral" style="">
						<div class="col-xs-2 fichaLateralIzquierda" style=""></div>
						<div class="thumbnail">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco1.png" alt="imagen slider member 1" width="" height="" class="hidden-xs hidden-sm"/>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco2.png" alt="imagen slider member 1" width="" height="" class="visible-sm"/>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco3.png" alt="imagen slider member 1" width="" height="" class="visible-xs"/>
						</div>
						<div class="carousel-caption">
							<h1>Contenido 1.</h1>
							<div>Eos expedita odio deleniti cum fugit autem placeat commodi optio neque itaque iste asperiores recusandae veritatis, dignissimos sunt libero distinctio ratione voluptatum vero eaque est repellat, consequatur natus, sapiente quidem.</div>
							<div>Officia accusamus, neque sit accusantium veritatis. Facilis quaerat laudantium repudiandae, minima nostrum non molestias harum, temporibus earum cum officiis impedit numquam eos facere mollitia fuga pariatur, debitis, est voluptatum amet.</div>
						</div>
						<div class="col-xs-2 fichaLateralDerecha" style=""></div>
					</div>
				</div>
				<div class="item">
					<div class="col-xs-8 col-xs-push-2 fichaCentral" style="">
						<div class="col-xs-2 fichaLateralIzquierda" style=""></div>
						<div class="thumbnail">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco1.png" alt="imagen slider member 1" width="" height="" class="hidden-xs hidden-sm"/>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco2.png" alt="imagen slider member 1" width="" height="" class="visible-sm"/>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco3.png" alt="imagen slider member 1" width="" height="" class="visible-xs"/>
						</div>
						<div class="carousel-caption">
							<h1>Contenido 2.</h1>
							<div>Eos expedita odio deleniti cum fugit autem placeat commodi optio neque itaque iste asperiores recusandae veritatis, dignissimos sunt libero distinctio ratione voluptatum vero eaque est repellat, consequatur natus, sapiente quidem.</div>
							<div>Officia accusamus, neque sit accusantium veritatis. Facilis quaerat laudantium repudiandae, minima nostrum non molestias harum, temporibus earum cum officiis impedit numquam eos facere mollitia fuga pariatur, debitis, est voluptatum amet.</div>
						</div>
						<div class="col-xs-2 fichaLateralDerecha" style=""></div>
					</div>
				</div>	
			</div>
			<a class="left carousel-control" href="#carousel-members" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-members" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
</div>
<div class="container">
	<div class="row espacioBotton">
		<div id="carousel-dual-members" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="thumbnail">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco1.png" alt="imagen slider member 1" width="" height="" class="hidden-xs hidden-sm"/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco2.png" alt="imagen slider member 1" width="" height="" class="visible-sm"/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco3.png" alt="imagen slider member 1" width="" height="" class="visible-xs"/>
					</div>
					<div class="carousel-caption">
						<h1>¿Cuáles son lo requisitos para ingresar?</h1>
						<p>Eos expedita odio deleniti cum fugit autem placeat commodi optio neque itaque iste asperiores recusandae veritatis, dignissimos sunt libero distinctio ratione voluptatum vero eaque est repellat, consequatur natus, sapiente quidem.</p>
						<p>Officia accusamus, neque sit accusantium veritatis. Facilis quaerat laudantium repudiandae, minima nostrum non molestias harum, temporibus earum cum officiis impedit numquam eos facere mollitia fuga pariatur, debitis, est voluptatum amet.</p>
						<a href="<?php echo home_url('/suscribirme/');?>" class="btn btnSuscribirme">SUSCRIBIRME</a>
					</div>
				</div>
				<div class="item">
					<div class="thumbnail">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco1.png" alt="imagen slider member 1" width="" height="" class="hidden-xs hidden-sm"/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco2.png" alt="imagen slider member 1" width="" height="" class="visible-sm"/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fotoSliderBlanco3.png" alt="imagen slider member 1" width="" height="" class="visible-xs"/>
					</div>
					<div class="carousel-caption">
						<h1>Contenidos 2</h1>
						<p>Eos expedita odio deleniti cum fugit autem placeat commodi optio neque itaque iste asperiores recusandae veritatis, dignissimos sunt libero distinctio ratione voluptatum vero eaque est repellat, consequatur natus, sapiente quidem.</p>
						<p>Officia accusamus, neque sit accusantium veritatis. Facilis quaerat laudantium repudiandae, minima nostrum non molestias harum, temporibus earum cum officiis impedit numquam eos facere mollitia fuga pariatur, debitis, est voluptatum amet.</p>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-dual-members" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-dual-members" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-push-2">
			<h1 class="text-center">La mejor manera de integrar tu</h1>
			<h1 class="text-center">Universidad en una comunidad global</h1>
		</div>
	</div>
	<div class="row espacioBotton">
		<div class="col-xs-12 col-sm-6">
			<div class="targetaEstrellas">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estrellas.png" alt="">
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eius, iure sunt veritatis harum aperiam doloremque ipsa. Provident odio, dolorem, ipsum cumque non facere ea corrupti repellendus? Perspiciatis, dolorum, ipsa?</div>
						<div>Consequatur autem, delectus beatae. Rerum amet voluptatem et placeat commodi vitae a molestias accusamus dolores accusantium ullam, ad laborum illo eos odio aliquid nam quam veritatis, est atque soluta. Dicta!</div>
					</div>
				</div>
			</div>
			<div class="targetaEstrellas">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estrellas.png" alt="">
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, dicta molestias accusamus qui voluptates esse deserunt veritatis quam sunt rerum fuga officia cupiditate impedit illum ex consequatur, quod enim.</div>
						<div>Illum eius accusamus temporibus labore eveniet. Necessitatibus voluptatem, sed, commodi quas reprehenderit accusantium inventore distinctio suscipit mollitia, asperiores totam consequatur, eius dolorum possimus nihil ad voluptate doloribus aut! Dolor, enim.</div>
						<div>Natus deserunt quo, et ut laudantium veniam nostrum praesentium consequuntur earum ipsum numquam minus iste quasi. Soluta, nesciunt quas. Modi maxime ex consectetur ut, eveniet expedita illo quibusdam itaque autem.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="targetaEstrellas">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estrellas.png" alt="">
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eius, iure sunt veritatis harum aperiam doloremque ipsa. Provident odio, dolorem, ipsum cumque non facere ea corrupti repellendus? Perspiciatis, dolorum, ipsa?</div>
					</div>
				</div>
			</div>
			<div class="targetaEstrellas">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/estrellas.png" alt="">
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, dicta molestias accusamus qui voluptates esse deserunt veritatis quam sunt rerum fuga officia cupiditate impedit illum ex consequatur, quod enim.</div>
					</div>
				</div>
			</div>
				
		</div>
	</div>
</div>
<div class="container quitarPadding">
	<div class="divAsociados">
		<h1 class="text-center">Nuestras alianzas internacionales</h1>	
		<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-lg-2 col-xs-push-0 col-lg-push-1">
			<a href="#">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
			</a>
		</div>
	</div>
</div>
<?php get_footer(); ?>
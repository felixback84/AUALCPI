<?php get_header(); ?>
<!-- pagina nuestra asociacion-->
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<div class="thumbnail"><?php the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?></div>
				<div class="container">
					<div class="carousel-caption">
						<?php
						$post = get_post(81); 
						$contenido = $post->post_content;
						echo $contenido;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row bordetabVerticalNegro">
		<div class="tabVerticalNegro">
	        <div class="col-xs-9">
	          <!-- Tab panes -->
	          <div class="tab-content">
	            <div class="tab-pane active" id="home-r">
					<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam vitae voluptatum tempore laudantium error officiis impedit illum rerum corrupti qui iste, maiores, voluptate dignissimos recusandae distinctio eum voluptatibus quae dicta.</div>
					<div>Voluptatem numquam voluptatibus recusandae atque nobis sed quidem, possimus quasi suscipit. Ipsa est asperiores ullam, porro sapiente dolor. Rem quidem beatae similique maiores odio nobis corporis? Animi repellat, dicta ab?</div>
					<div>Qui unde ducimus nihil assumenda earum fugiat facere. Saepe blanditiis dignissimos, placeat nulla ea dolor, nesciunt aspernatur, fuga pariatur minus nihil! Illo iusto ipsa sequi aut ab neque accusamus rem?</div>
					<div>Suscipit porro molestias, necessitatibus sint ut blanditiis impedit sunt distinctio officia, doloremque eaque hic molestiae dolores deleniti autem voluptatem natus laborum tenetur eum eveniet ipsam, recusandae illo. Impedit, doloribus, ducimus.</div>
					<div>Non quasi, commodi at voluptatem dolorem ut optio eveniet assumenda minus animi maiores alias iusto consequatur soluta, ex vero autem. Praesentium porro mollitia laboriosam, vel repellendus voluptatum dolore facilis impedit.</div>
	            </div>
	            <div class="tab-pane" id="mision-r">
	            	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aliquam, quod maiores soluta harum placeat. Reiciendis dolores nulla maiores labore vel tempore, consectetur beatae iure saepe aliquam odit, itaque magnam!</div>
	            	<div>At voluptatum tempore natus cupiditate eligendi illum vero reprehenderit enim, pariatur omnis, dolores nemo amet illo laborum praesentium, perferendis. Provident obcaecati, eum doloremque ipsam, amet laborum cum aliquid laboriosam unde.</div>
	            	<div>Asperiores vitae nobis, impedit in mollitia, ratione, quidem commodi beatae, corporis quia laboriosam. Corporis itaque harum distinctio pariatur, voluptatum necessitatibus ex consequatur praesentium nostrum, inventore possimus ut minus ipsum quas?</div>
	            	<div>Recusandae non sint nisi! Perferendis beatae ad cumque hic aut dolores praesentium culpa neque vero, voluptates eveniet, ipsa earum consequuntur dolore, sapiente labore reprehenderit dignissimos accusamus corporis ab ea eum.</div>
	            	<div>Autem, cum, aliquid a sint architecto velit, nesciunt ut quasi eligendi perspiciatis similique in vitae molestiae. Sapiente eius fugiat quam fuga vel rem, vitae. Possimus neque voluptatibus assumenda, nemo molestias.</div>
	            </div>
	            <div class="tab-pane" id="vision-r">
	            	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, assumenda odio tempora corporis animi ipsa neque. Commodi provident nulla, nobis sint! Voluptas nulla ratione, necessitatibus doloremque facilis ut nemo error!</div>
	            	<div>Deserunt suscipit nemo saepe, earum quae adipisci officia sit deleniti cumque delectus at molestiae dolorem esse, fugit doloribus error facere. Neque quibusdam nesciunt, reprehenderit mollitia et porro. Accusantium, atque, delectus?</div>
	            	<div>Odit dolore aliquid pariatur inventore autem officiis. Enim libero ipsa ab voluptas quasi voluptatibus quia culpa, pariatur, mollitia repellat incidunt voluptatem rerum praesentium ullam quo quidem modi nemo recusandae adipisci.</div>
	            	<div>Harum corporis nisi numquam eligendi delectus voluptates deleniti earum pariatur, nemo temporibus sint cum eius odit suscipit rerum doloribus iste tenetur aut quibusdam, rem! Pariatur velit nihil fugit, dolorem iusto.</div>
	            	<div>Quae, tempore possimus. Modi eius assumenda iure ad corrupti impedit blanditiis, consequatur tenetur deleniti quam fugiat, corporis nisi inventore. Reiciendis magni ex, tempore nam delectus incidunt earum omnis. Adipisci, labore!</div>
	            </div>
	            <div class="tab-pane" id="organigrama-r">
	            	<div class="col-xs-12 col-sm-6">
	            		<?php get_template_part('targetas-miembrosQuienes'); ?>
	            	</div>
	            	<div class="col-xs-12 col-sm-6">
	            		<?php get_template_part('targetas-miembrosQuienes'); ?>
	            	</div>
	            	<div class="col-xs-12 col-sm-6">
	            		<?php get_template_part('targetas-miembrosQuienes'); ?>
	            	</div>
	            	<div class="col-xs-12 col-sm-6">
	            		<?php get_template_part('targetas-miembrosQuienes'); ?>
	            	</div>
	            </div>
	          </div>
	        </div>

	        <div class="col-xs-3"> <!-- required for floating -->
	          <!-- Nav tabs -->
	          <ul class="nav nav-tabs tabs-right">
	            <li class="active"><a href="#home-r" data-toggle="tab">Home</a></li>
	            <li><a href="#mision-r" data-toggle="tab">Misión</a></li>
	            <li><a href="#vision-r" data-toggle="tab">Visión</a></li>
	            <li><a href="#organigrama-r" data-toggle="tab"><span class="visible-xs" >organi...</span><span class="hidden-xs">Organigrama</span> </a></li>
	          </ul>
	        </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="thumbnail">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/imageContenidoNosotros.jpg" alt="" width="" height="" />
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h4>Los miembros de nuestra Asocición</h4>
		</div>
		<div class="col-xs-12 ">
			<div class="google-maps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254508.3928105967!2d-74.24789151416464!3d4.648625932411766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2zQm9nb3TDoQ!5e0!3m2!1ses!2sco!4v1489598353928" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>	
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="divAsociados">
		<div class="col-xs-12">
			<h4>Nuestras alianzas internacionales</h4>	
			<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
				<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
				<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
				<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
				<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-lg-2 col-lg-push-1">
				<a href="#">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-asocia.png" alt="logo asociado">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
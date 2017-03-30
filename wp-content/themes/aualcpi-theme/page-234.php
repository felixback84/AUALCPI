<?php get_header(); ?>
<!-- pagina pagina-usuario - variable pageUser -->
<?php  $userId= NULL; $userId= (int)verificarPathPageUser(); //var_dump($userId);?>
<div class="hidden-xs">
	<div id="imagenTop" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<div class="thumbnail"><?php 
				$imagenPortada = get_the_author_meta('user_meta_image',$userId);
				if(!empty($imagenPortada)){
					echo '<img src="'.$imagenPortada.'" alt="Imagen portada del perfil del usuario">';
				}else{
				the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); 
				}?></div>
				<div class="container">
					<div class="carousel-caption">
						<?php if ($userId == wp_get_current_user()->ID){ echo '<h3>Mi cuenta</h3>';}else{ echo '<h3>Perfil profesional</h3>';}?>
						<?php echo get_avatar( $userId, '100' ,'','logo usurio',array(
							'class' => 'img-circle',
						)); ?>
						<p><?php the_author_meta('user_nicename',$userId); ?></p>
						<p><?php the_author_meta('user_email',$userId); ?></p>
						<p><?php the_author_meta('twitter',$userId); ?></p>
						<p><?php the_author_meta('user_meta_image',$userId); ?></p>
						<p><?php var_dump(get_the_author_meta('user_meta_image',$userId)); ?></p>
					</div>
				</div>
			</div>
			<?php $imagenPortada = get_the_author_meta('biografia',$userId);
				if(!empty($imagenPortada)){ ?>
			<div class="item">
				<div class="thumbnail"><?php 
				$imagenPortada = get_the_author_meta('user_meta_image',$userId);
				if(!empty($imagenPortada)){
					echo '<img src="'.$imagenPortada.'" alt="Imagen portada del perfil del usuario"';
				}else{
				the_post_thumbnail ('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); 
				}?></div>
				<div class="container">
					<div class="carousel-caption">
						<p><?php the_author_meta('biografia',$userId); ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<p class="author-description author-bio">
			
		</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>